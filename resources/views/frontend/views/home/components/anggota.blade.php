<div class="anggota-section relative bg-gray-100 px-6 py-8 w-full">

    <!-- Heading -->
    <div class="mb-6 text-left">
        <h1 class="text-2xl font-bold">
            Anggota KLI
        </h1>
        <h3 class="text-gray-500 text-sm font-light">
            Anggota Kopdar Lovebird Indonesia
        </h3>
    </div>

    <div class="mt-4">
        <div class="row mt-4">

            <!-- Tabel -->
            <div class="col-lg-12">
                <div class="scrollable-table overflow-x-auto bg-white rounded-lg shadow">
                    <table class="table table-bordered w-full text-black">
                        <thead class="bg-red-800 text-md font-bold text-black text-center">
                            <tr class="align-middle">
                                <th class="px-3 py-3 w-12 ">No</th>
                                <th class="px-3 py-3">Profile ID</th>
                                <th class="px-3 py-3">Nama Anggota</th>
                                <th class="px-3 py-3">Alamat Anggota</th>
                            </tr>
                        </thead>



                        <tbody>
                            @foreach ($anggota as $item)
                                <tr class="hover:bg-gray-50 transition">
                                    <td class="px-3 py-2 text-center">
                                        {{ $loop->iteration }}
                                    </td>

                                    <td class="px-3 py-2">
                                        <div class="flex items-center gap-3">
                                            <img src="{{ asset('Upload/anggota/' . $item->photo) }}" alt="Foto Anggota"
                                                class="w-[50px] h-[50px] object-cover rounded-md ring-1 ring-gray-300"
                                                loading="lazy">
                                            <span class="font-medium whitespace-nowrap">
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
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>
</div>
