<!--Classement-->
<div class="mt-4">
    <!-- Title -->
    <div class="pt-5">
        <h2 class="text-left text-2xl font-bold">Top Rank</h2>
        <p class="text-muted">Pecinta Lovebird Terkemuka: Mereka yang Mengukir Sejarah</p>
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
                                <th scope="col">Pos</th>
                                <th scope="col">Nama Burung</th>
                                <th scope="col">Nama Pemilik</th>
                                <th scope="col">Alamat</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($klasement as $item)
                            <tr>
                                <td>{{ $item->posisi }}</td>
                                <td>
                                    <img src="{{ asset('Upload/klasement/' . $item->photo) }}" alt="Logo" class="me-2" width="50" height="50" />
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
