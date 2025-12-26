<div class="anggota-section relative bg-gray-100 px-6 py-8 w-full">

    <!-- Heading -->
    <div class="mb-6 text-left">
        <h1 class="text-2xl font-bold">Anggota KLI</h1>
        <h3 class="text-gray-500 text-sm font-light">
            Produk Unggulan KLI Kopdar Lovebird Indonesia
        </h3>
    </div>
    <div class="mt-4">
        <!-- Title -->
        <div class="row mt-4">
            <!-- Tabel -->
            <div class="col-lg-12">
                <div class="scrollable-table">
                    <table class="table table-bordered">
                        <thead class="bg-top-rank text-white">
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Nama Burung</th>
                                <th scope="col">Nama Pemilik</th>
                                <th scope="col">Alamat</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($anggota as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>
                                    <img src="{{ asset('Upload/anggota/' . $item->photo) }}" alt="Logo" class="me-2" width="50" height="50" />
                                    {{ $item->nama_burung }}
                                </td>
                                <td>{{ $item->nama_pemilik }}</td>
                                <td>{{ $item->alamat }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>





        </div>
    </div>
</div>
