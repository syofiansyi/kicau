<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\GroupCLub;
use App\Models\Jadwal;
use App\Models\Group;
use App\Models\Club;
use App\Models\MatchGame;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class JadwalController extends Controller
{
    public function index()
    {
        $jadwals = Jadwal::latest()->paginate(10, ['*'], 'jadwals_page');
        $groups = Group::with(['jadwal'])->latest()->paginate(10, ['*'], 'groups_page');
        $clubs = Club::with(['groups.jadwal'])->latest()->paginate(10, ['*'], 'clubs_page');
        $matchs = MatchGame::with(['jadwal', 'group', 'clubHome', 'clubAway'])
            ->latest()
            ->paginate(10);

        return view('backend.views.jadwal.index', compact('jadwals','groups','clubs','matchs'));
    }
    public function getGroupsAndClubs($jadwalId)
    {
        // Ambil groups berdasarkan jadwal_id
        $groups = Group::where('jadwal_id', $jadwalId)->get();

        // Ambil clubs berdasarkan group_id dari groups yang ditemukan
        $groupIds = $groups->pluck('id'); // ambil semua id group
        $clubs = Club::whereHas('groups', function($query) use ($groupIds) {
            $query->whereIn('group_id', $groupIds);
        })->get();

        // Baru kembalikan ke frontend
        return response()->json([
            'groups' => $groups,
            'clubs' => $clubs,
        ]);
    }

// Ambil groups berdasarkan event (jadwal)
    public function getGroupsByEvent($jadwalId)
    {
        $groups = Group::where('jadwal_id', $jadwalId)->get();
        return response()->json([
            'groups' => $groups,
        ]);
    }

// Ambil clubs berdasarkan group
    public function getClubsByGroup($groupId)
    {
        // Cari semua club_id yang punya group_id = 5
        $clubIds = GroupClub::where('group_id', $groupId)->pluck('club_id');

        // Kalau tidak ada club
        if ($clubIds->isEmpty()) {
            return response()->json([
                'message' => 'Tidak ada club untuk group ini.'
            ], 404);
        }

        // Cari data clubs
        $clubs = Club::whereIn('id', $clubIds)->get();

        return response()->json([
            'clubs' => $clubs,
        ]);
    }


    public function StoreJadwal(Request $request)
    {
        $image = $request->file('photo');
        $destinationPath = 'Upload/jadwal/';
        $name_gen = date('YmdHis') . "." . $image->getClientOriginalExtension();
        $image->move($destinationPath, $name_gen);
        $save_url = $name_gen;

        $jadwal = Jadwal::create([
            'title' => ucfirst($request->title),
            'slug' => strtolower(str_replace(' ', '-', $request->title)),
            'tanggal_mulai' => $request->tanggal_mulai,
            'tanggal_selesai' => $request->tanggal_selesai,
            'photo' => $save_url,
            'created_at' => Carbon::now(),
        ]);

        $notification = [
            'message' => 'Insert Jadwal Successfully',
            'alert-type' => 'success'
        ];

        return redirect()->route('jadwal')->with($notification);
    }

    public function EditJadwal($id)
    {
        $jadwal = Jadwal::with('groups.clubs')->findOrFail($id);
        return view('backend.views.jadwal.edit', compact('jadwal'));
    }

    public function UpdateJadwal(Request $request)
    {
        $jadwal = Jadwal::findOrFail($request->id);
        $old_img = $request->old_image;

        $data = [
            'title' => ucfirst($request->title),
            'slug' => strtolower(str_replace(' ', '-', $request->title)),
            'tanggal_mulai' => $request->tanggal_mulai,
            'tanggal_selesai' => $request->tanggal_selesai,
            'updated_at' => Carbon::now(),
        ];

        if ($request->hasFile('photo')) {
            $image = $request->file('photo');
            $destinationPath = 'Upload/jadwal/';
            $name_gen = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $name_gen);
            $save_url = $name_gen;

            if (!empty($old_img) && File::exists(public_path('Upload/jadwal/'.$old_img))) {
                File::delete(public_path('Upload/jadwal/'.$old_img));
            }

            $data['photo'] = $save_url;
        }

        $jadwal->update($data);

        $notification = [
            'message'    => $request->hasFile('photo') ? 'Jadwal updated with new image' : 'Jadwal updated without image change',
            'alert-type' => 'success'
        ];

        return redirect()->route('jadwal')->with($notification);
    }

    public function DeleteJadwal($id)
    {
        DB::beginTransaction(); // pastikan aman pakai transaction

        try {
            $jadwal = Jadwal::findOrFail($id);

            // Cek dan hapus file photo
            if (File::exists(public_path('Upload/jadwal/' . $jadwal->photo))) {
                File::delete(public_path('Upload/jadwal/' . $jadwal->photo));
            }

            // Ambil semua group terkait
            $groups = Group::where('jadwal_id', $id)->get();

            foreach ($groups as $group) {
                // Hapus relasi club-club di tabel pivot group_club
                $group->clubs()->detach();

                // Hapus semua match yang berelasi dengan group ini
                MatchGame::where('group_id', $group->id)->delete();

                // Hapus groupnya
                $group->delete();
            }

            // Setelah semua relasi dihapus, baru hapus jadwal
            $jadwal->delete();

            DB::commit();

            $notification = [
                'message' => 'Deleted Jadwal, Group, Clubs, Matches Successfully',
                'alert-type' => 'success'
            ];

            return redirect()->back()->with($notification);

        } catch (\Exception $e) {
            DB::rollBack();

            $notification = [
                'message' => 'Error: ' . $e->getMessage(),
                'alert-type' => 'error'
            ];

            return redirect()->back()->with($notification);
        }
    }

    public function JadwalInActive($id)
    {
        Jadwal::findOrFail($id)->update(['status' => 0]);
        $notification = [
            'message' => 'Jadwal InActive',
            'alert-type' => 'success'
        ];
        return redirect()->back()->with($notification);
    }

    public function JadwalActive($id)
    {
        Jadwal::findOrFail($id)->update(['status' => 1]);
        $notification = [
            'message' => 'Jadwal Active',
            'alert-type' => 'success'
        ];
        return redirect()->back()->with($notification);
    }

    /* ========================= CRUD Tambahan ========================= */

    // Create Group
    public function StoreGroup(Request $request)
    {
        $request->validate([
            'jadwal_id' => 'required|exists:jadwal,id',
            'title' => 'required|string|max:255',
        ]);

        Group::create([
            'jadwal_id' => $request->jadwal_id,
            'title' => ucfirst($request->title),
        ]);

        return back()->with([
            'message' => 'Group created successfully',
            'alert-type' => 'success'
        ]);
    }
    public function EditGroup($id)
    {
        $jadwals = Jadwal::latest()->get();

        $group = Group::findOrFail($id);

        return view('backend.views.jadwal.edit_group', compact('jadwals','group'));
    }

    public function UpdateGroup(Request $request)
    {
        $jadwal = Group::findOrFail($request->id);


        $data = [
            'jadwal_id' => $request->jadwal_id,
            'title' => ucfirst($request->title),
            'updated_at' => Carbon::now(),
        ];

        $jadwal->update($data);

        $notification = [
            'message'    => $request->hasFile('photo') ? 'Jadwal Group updated with new image' : 'Jadwal updated without image change',
            'alert-type' => 'success'
        ];

        return redirect()->route('jadwal')->with($notification);
    }
    public function DeleteGroup($id)
    {
        DB::beginTransaction();

        try {
            $group = Group::findOrFail($id);

            // Detach clubs dari pivot table
            $group->clubs()->detach();

            // Hapus semua match yang berkaitan dengan group ini
            MatchGame::where('group_id', $group->id)->delete();

            // Hapus group
            $group->delete();

            DB::commit();

            $notification = [
                'message' => 'Group and related matches deleted successfully.',
                'alert-type' => 'success'
            ];

            return redirect()->back()->with($notification);

        } catch (\Exception $e) {
            DB::rollBack();

            $notification = [
                'message' => 'Error deleting group: ' . $e->getMessage(),
                'alert-type' => 'error'
            ];

            return redirect()->back()->with($notification);
        }
    }


    // Create Club di Group
    public function StoreClub(Request $request)
    {
        {

            // 1. Simpan club baru
            $image = $request->file('photo');
            $destinationPath = 'Upload/club/';
            $name_gen = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $name_gen);
            $save_url = $name_gen;

            $club = Club::create([
                'name' => ucfirst($request->name),
                'name_pemilik' => $request->name_pemilik,
                'alamat' => $request->alamat,
                'photo' => $save_url,
                'created_at' => Carbon::now(),
            ]);

            // 2. Simpan relasi club ke group di tabel pivot group_club
            GroupCLub::create([
                'group_id' => $request->group_data_club,
                'club_id' => $club->id,
            ]);

            return back()->with([
                'message' => 'Club added to group successfully',
                'alert-type' => 'success'
            ]);
        }
    }
    public function editClub($id)
    {
        $jadwals = Jadwal::latest()->get();
        $groups = Group::with(['jadwal'])->latest()->get();
        $club = Club::Findorfail($id);
        return view('backend.views.jadwal.edit_club', compact('club','jadwals','groups'));
    }
    public function updateDataClub(Request $request)
    {
        $club = Club::findOrFail($request->id);
        $old_img = $request->old_image;

        $data = [
            'name' => ucfirst($request->name),
            'name_pemilik' => $request->name_pemilik,
            'alamat' => $request->alamat,
            'updated_at' => Carbon::now(),
        ];

        // Update photo jika ada file baru
        if ($request->hasFile('photo')) {
            $image = $request->file('photo');
            $destinationPath = 'Upload/club/';
            $name_gen = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $name_gen);
            $save_url = $name_gen;

            // Hapus foto lama jika ada
            if (!empty($old_img) && File::exists(public_path('Upload/club/' . $old_img))) {
                File::delete(public_path('Upload/club/' . $old_img));
            }

            $data['photo'] = $save_url;
        }

        // Update data club
        $club->update($data);

        // Update relasi ke group (pivot table)
        if ($request->group_data_club) {
            // Hapus dulu relasi lama
            GroupCLub::where('club_id', $club->id)->delete();

            // Tambahkan relasi baru
            GroupCLub::create([
                'group_id' => $request->group_data_club,
                'club_id' => $club->id,
            ]);
        }

        $notification = [
            'message' => $request->hasFile('photo')
                ? 'Club updated with new image'
                : 'Club updated without image change',
            'alert-type' => 'success'
        ];

            return redirect()->route('jadwal')->with($notification);
        }
    public function DeleteClub($id)
    {
        DB::beginTransaction();

        try {
            $club = Club::findOrFail($id);

            // Hapus file gambar jika ada
            if (!empty($club->photo) && File::exists(public_path('Upload/club/' . $club->photo))) {
                File::delete(public_path('Upload/club/' . $club->photo));
            }

            // Hapus relasi club di tabel pivot group_club
            GroupCLub::where('club_id', $id)->delete();

            // Hapus club
            $club->delete();

            DB::commit();

            return redirect()->back()->with([
                'message' => 'Club and its group relation deleted successfully',
                'alert-type' => 'success',
            ]);

        } catch (\Exception $e) {
            DB::rollBack();

            return redirect()->back()->with([
                'message' => 'Failed to delete: ' . $e->getMessage(),
                'alert-type' => 'error',
            ]);
        }
    }


    // Create Match (pertandingan)
    public function StoreMatch(Request $request)
    {
        MatchGame::create([
            'group_id' => $request->group_data,
            'club_home_id' => $request->club_home_id,
            'club_away_id' => $request->club_away_id,
            'skor_home' => $request->skor_home ?? 0,
            'skor_away' => $request->skor_away ?? 0,
            'tanggal_pertandingan' => $request->tanggal_pertandingan,
        ]);

        return back()->with([
            'message' => 'Match created successfully',
            'alert-type' => 'success'
        ]);
    }
    public function UpdateMatch(Request $request, $id)
    {
        $match = MatchGame::findOrFail($id);

        $match->update([
//            'group_id' => $request->group_data,
            'club_home_id' => $request->club_home_id,
            'club_away_id' => $request->club_away_id,
            'skor_home' => $request->skor_home ?? 0,
            'skor_away' => $request->skor_away ?? 0,
            'tanggal_pertandingan' => $request->tanggal_pertandingan,
        ]);

        $notification = [
            'message' => $request->hasFile('photo')
                ? 'MatchGame updated with new image'
                : 'MatchGame updated without image change',
            'alert-type' => 'success'
        ];

        return redirect()->route('jadwal')->with($notification);
    }
    public function DeleteMatch($id)
    {
        $match = MatchGame::findOrFail($id);
        $match->delete();

        return back()->with([
            'message' => 'Match deleted successfully',
            'alert-type' => 'success',
        ]);
    }
    public function EditMatch($id)
    {
        $clubs = Club::latest()->get();
        $jadwals = Jadwal::latest()->get();
        $groups = Group::with(['jadwal'])->latest()->get();
        $match = MatchGame::Findorfail($id);
        return view('backend.views.jadwal.edit_match', compact('match','jadwals','groups','clubs'));
    }

}
