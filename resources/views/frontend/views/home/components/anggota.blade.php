<div class="anggota-section relative bg-gray-100 px-6 py-8 w-full min-h-screen">

    <div class="mb-6 text-left">
        <h1 class="text-2xl font-bold">
            Anggota KLI
        </h1>
        <h3 class="text-gray-500 text-sm font-light">
            Anggota Kopdar Lovebird Indonesia
        </h3>
    </div>
    <a href="{{ route('anggota') }}">
        <div class="mt-4">
            <div class="row mt-4">
                <div class="col-lg-12">


                    <div class="scrollable-table overflow-x-auto bg-white rounded-lg shadow">
                        <table class="table table-bordered w-full text-black">
                            <thead class="bg-red-800 text-md font-bold text-white">
                                <tr class="align-middle">
                                    <th class="px-3 py-3 w-12 text-center">No</th>
                                    <th class="px-3 py-3">
                                        <div class="flex items-center justify-between">
                                            <span>Profile ID</span>
                                            <a href="{{ request()->fullUrlWithQuery(['sort' => 'nama_burung', 'direction' => request('direction') == 'asc' ? 'desc' : 'asc']) }}"
                                                class="text-white hover:text-gray-200">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none"
                                                    viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        stroke-width="2"
                                                        d="M7 16V4m0 0L3 8m4-4l4 4m6 0v12m0 0l4-4m-4 4l-4-4" />
                                                </svg>
                                            </a>
                                        </div>
                                    </th>
                                    <th class="px-3 py-3">Nama Anggota</th>
                                    <th class="px-3 py-3">Alamat Anggota</th>
                                </tr>
                            </thead>

                            <tbody>
                                @forelse ($anggota as $item)
                                    <tr class="hover:bg-gray-50 transition">
                                        <td class="px-3 py-2 text-center">
                                            {{ $loop->iteration }}
                                        </td>

                                        <td class="px-3 py-2 max-w-[150px]">
                                            <div class="flex items-center gap-3">
                                                <img src="{{ asset('Upload/anggota/' . $item->photo) }}"
                                                    alt="Foto Anggota"
                                                    class="w-[50px] h-[50px] object-cover rounded-md ring-1 ring-gray-300"
                                                    loading="lazy"
                                                    onerror="this.onerror=null;this.src='{{ asset('images/default-avatar.png') }}';">
                                                <span
                                                    class="font-medium whitespace-nowrap overflow-hidden text-ellipsis max-w-[100px]"
                                                    title="{{ $item->nama_burung }}">
                                                    {{ $item->nama_burung }}
                                                </span>
                                            </div>
                                        </td>


                                        <td class="px-3 py-2 font-medium">
                                            {{ $item->nama_pemilik }}
                                        </td>

                                        <td class="px-3 py-2">
                                            {{ $item->alamat }}
                                        </td>
                                    </tr>
                                @empty
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>
</div>
</a>
<style>
    .scrollable-table {
        overflow-x: auto;
        border-radius: 8px;
    }

    .table {
        min-width: 800px;
    }

    .table thead th {
        position: sticky;
        top: 0;
        background-color: #991b1b;
        z-index: 10;
    }

    .table tbody tr:last-child td {
        border-bottom: none;
    }
</style>
