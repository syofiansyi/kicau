<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Group;
use Illuminate\Http\Request;

class GroupController extends Controller
{
    public function index(){
        $Jadwal = Group::with('clubs', 'matches')->latest()->get();
        return view('backend.views.jadwal.index',compact('Jadwal'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'schedule_id' => 'required|exists:schedules,id',
            'name' => 'required|string',
        ]);

        $group = Group::create($data);

        return response()->json($group, 201);
    }

    public function show(Group $group)
    {
        return $group->load('clubs', 'matches');
    }

    public function update(Request $request, Group $group)
    {
        $data = $request->validate([
            'schedule_id' => 'sometimes|exists:schedules,id',
            'name' => 'sometimes|string',
        ]);

        $group->update($data);

        return response()->json($group);
    }

    public function destroy(Group $group)
    {
        $group->delete();

        return response()->json(null, 204);
    }
}
