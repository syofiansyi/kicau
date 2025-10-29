<div class="d-flex flex-column flex-column-fluid">
    <!--begin::Content-->
    <div id="kt_app_content" class="app-content flex-column-fluid">
        <div class="app-container container-fluid">
            <div class="event-carousel transition-all duration-1000 ease-in-out">
                <h1 class="text-center text-2xl font-bold mb-5">Match Group: {{ $groupSelected->title }}</h1>

                @forelse ($matches as $match)
                    <div class="container-fluid my-3 p-3 border rounded shadow-sm">
                        <div class="row text-center align-items-center">
                            <!-- Klub Home -->
                            <div class="col-4">
                                <h4 class="mb-2">{{ $match->clubHome->name }}</h4>
                                <img src="{{ asset('Upload/club/' . $match->clubHome->photo) }}" alt="Logo {{ $match->clubHome->name }}" width="60">
                            </div>

                            <!-- Skor dan Tanggal -->
                            <div class="col-4 d-flex flex-column justify-content-center align-items-center">
                                <div class="d-flex align-items-center mb-1">
                                    <span class="mx-2 fs-5 fw-bold">{{ $match->skor_home ?? 0 }}</span>
                                    <span class="mx-2">VS</span>
                                    <span class="mx-2 fs-5 fw-bold">{{ $match->skor_away ?? 0 }}</span>
                                </div>
                                <small>{{ \Carbon\Carbon::parse($match->tanggal_pertandingan)->translatedFormat('d F Y') }}</small>
                            </div>

                            <!-- Klub Away -->
                            <div class="col-4">
                                <h4 class="mb-2">{{ $match->clubAway->name }}</h4>
                                <img src="{{ asset('Upload/club/' . $match->clubAway->photo) }}" alt="Logo {{ $match->clubAway->name }}" width="60">
                            </div>
                        </div>
                    </div>

                @empty
                    <p class="text-center text-muted">Belum ada pertandingan di grup ini.</p>
                @endforelse
            </div>
        </div>
    </div>
    <!--end::Content-->
</div>
