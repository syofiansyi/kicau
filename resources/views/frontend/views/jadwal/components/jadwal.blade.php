<div class="d-flex flex-column flex-column-fluid">
    <!--begin::Content-->
    <div id="kt_app_content" class="app-content flex-column-fluid">
        <div class="app-container container-fluid">
            <!--Event-->
            <div class="event-carousel transition-all duration-1000 ease-in-out">
                 <div class=" mt-4">
    <div class="d-flex justify-content-center mb-4">
    <form method="GET" action="{{ route('pertandingan') }}" style="width: 100%;">
        <div class="input-group">
            <input
                type="text"
                name="search"
                class="form-control"
                placeholder="Cari Pertandingan..."
                value="{{ request('search') }}"
                aria-label="Cari Pertandingan"
            />
            <button class="btn btn-primary" type="submit">  <i class="fa fa-search"></i>
</button>
        </div>
    </form>
</div>
                <h3 class="text-center text-lg font-semibold text-gray-500">Lovedbird Jadwal Event</h3>
                <h1 class="text-center text-2xl font-bold">Jadwal Pertandingan</h1>
                
                <div class="row">
                    @foreach ($jadwals  as $jadwal)
                        <div class="col-lg-3 col-md-6 col-sm-12 mb-4">
                            <a href="{{ route('detail.group', $jadwal->id) }}">

                            <div class="event-card hover:scale-105 transition-transform duration-300">
                                <div class="image-container">
                                    <img src="{{ asset('Upload/jadwal/' . $jadwal->photo) }}" class="event-image" alt="Event Image" />
                                </div>
                                <div class="event-info">
                                    <p class="date">
                                        <i class="fa fa-calendar-week fs-2 mx-2"></i>
                                        {{ \Carbon\Carbon::parse($jadwal->tanggal_mulai)->translatedFormat('d F Y') }} -
                                        {{ \Carbon\Carbon::parse($jadwal->tanggal_selesai)->translatedFormat('d F Y') }}
                                    </p>
                                    <h3 class="title">{{ $jadwal->title }}</h3>
                                </div>
                            </div>
                            </a>
                        </div>
                    @endforeach
                </div>

{{--                 Pagination --}}
                <div class="d-flex justify-content-center mt-4">
                    {!! $jadwals->links('pagination::bootstrap-5') !!}
                </div>


            </div>
        </div>
    </div>
    <!--end::Content-->
</div>
