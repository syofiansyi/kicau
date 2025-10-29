<div class="d-flex flex-column flex-column-fluid">
    <!--begin::Content-->
    <div id="kt_app_content" class="app-content flex-column-fluid">
        <div class="app-container container-fluid">
            <!--Event-->
            <div class="event-carousel transition-all duration-1000 ease-in-out">
                <h3 class="text-center text-lg font-semibold text-gray-500">Lovedbird Jadwal Event</h3>
                <h1 class="text-center text-2xl font-bold">Group {{$jadwal->title}} </h1>
                <div class="row">
                    @foreach ($groups as $group)
                        <div class="col-lg-3 col-md-6 col-sm-12 mb-4">
                            <a href="{{ route('detail.match', ['jadwal' => $jadwal->id, 'group' => $group->id]) }}">

                            <div class="event-card hover:scale-105 transition-transform duration-300">
                                <div class="event-info">
                                    <h3 class="title">{{ $group->title }}</h3>
                                    <p class="date">
                                        <i class="fa fa-calendar-day fs-2"> </i>
                                        {{ \Carbon\Carbon::parse($jadwal->tanggal_mulai)->translatedFormat('d F Y') }} -
                                        {{ \Carbon\Carbon::parse($jadwal->tanggal_selesai)->translatedFormat('d F Y') }}
                                    </p>

                                </div>
                            </div>
                            </a>
                        </div>
                    @endforeach
                </div>
                <!-- Pagination -->
                <div class="d-flex justify-content-center mt-4">
                    {!! $groups->links('pagination::bootstrap-5') !!}
                </div>

            </div>

            <div style="width: 100%;  margin: auto;">
                <h1 class="text-start text-2xl font-bold">Jadwal Event {{$jadwal->title}} </h1>
                <img src="{{ asset('Upload/jadwal/' . $jadwal->photo) }}" alt="Logo" style="width: 100%; max-width: 50vw; height: auto;">

            </div>
        </div>
    </div>
    <!--end::Content-->
</div>
