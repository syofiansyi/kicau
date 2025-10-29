@extends('backend.includes.index')
@section('main')
@section('title')
    Dashboard
@endsection
<!-- Top Statistics -->
<div class="container-fluid">
    <div class="row">
        @php
            $User = App\Models\User::where('status', 0)->count();
            $Users = App\Models\User::where('status', 1)->count();
            $Juara = App\Models\Juara::count();
            $Jadwal = App\Models\Jadwal::count();
            $Match = App\Models\MatchGame::count();
            $Event = App\Models\Event::count();
            $Slider = App\Models\Slider::count();
            $Berita = App\Models\News::count();
            $Klasemen = App\Models\Klasement::count();
        @endphp

            <!-- USER -->
        <div class="card col-lg-12 col-md-2" style="margin: 10px;">
            <div class="widget-summary widget-summary-xlg">
                <div class="widget-summary-col">
                    <div class="summary">
                        <h4 class="title"><i class="el el-group"> User</i></h4>
                        <div class="info">
                            <strong class="amount">{{ $User }}</strong>
                            <span class="text-danger">({{ $Users }})</span>
                        </div>
                    </div>
                    <div class="summary-footer">
                        @if (Auth::user()->role == 'admin')
                            <a href="{{ route('admin.user') }}" class="text-muted text-uppercase">(view all)</a>
                        @endif
                    </div>
                </div>
            </div>
        </div>

        <!-- JUARA -->
        <div class="card col-lg-12 col-md-2" style="margin: 10px;">
            <div class="widget-summary widget-summary-xlg">
                <div class="widget-summary-col">
                    <div class="summary">
                        <h4 class="title"><i class="el el-trophy"> Juara</i></h4>
                        <div class="info">
                            <strong class="amount">{{ $Juara }}</strong>
                        </div>
                    </div>
                    <div class="summary-footer">
                        <a href="{{ route('admin.juara') }}" class="text-muted text-uppercase">(view all)</a>
                    </div>
                </div>
            </div>
        </div>

        <!-- JADWAL -->
        <div class="card col-lg-12 col-md-2" style="margin: 10px;">
            <div class="widget-summary widget-summary-xlg">
                <div class="widget-summary-col">
                    <div class="summary">
                        <h4 class="title"><i class="el el-calendar"> Jadwal</i></h4>
                        <div class="info">
                            <strong class="amount">{{ $Jadwal }}</strong>
                        </div>
                    </div>
                    <div class="summary-footer">
                        <a href="{{ route('jadwal') }}" class="text-muted text-uppercase">(view all)</a>
                    </div>
                </div>
            </div>
        </div>

        <!-- MATCH -->
        <div class="card col-lg-12 col-md-2" style="margin: 10px;">
            <div class="widget-summary widget-summary-xlg">
                <div class="widget-summary-col">
                    <div class="summary">
                        <h4 class="title"><i class="el el-ok"> Match</i></h4>
                        <div class="info">
                            <strong class="amount">{{ $Match }}</strong>
                        </div>
                    </div>
                    <div class="summary-footer">
                        <a href="{{ route('jadwal') }}" class="text-muted text-uppercase">(view all)</a>
                    </div>
                </div>
            </div>
        </div>

        <!-- EVENT -->
        <div class="card col-lg-12 col-md-2" style="margin: 10px;">
            <div class="widget-summary widget-summary-xlg">
                <div class="widget-summary-col">
                    <div class="summary">
                        <h4 class="title"><i class="el el-flag"> Event</i></h4>
                        <div class="info">
                            <strong class="amount">{{ $Event }}</strong>
                        </div>
                    </div>
                    <div class="summary-footer">
                        <a href="{{ route('event') }}" class="text-muted text-uppercase">(view all)</a>
                    </div>
                </div>
            </div>
        </div>

        <!-- SLIDER -->
        <div class="card col-lg-12 col-md-2" style="margin: 10px;">
            <div class="widget-summary widget-summary-xlg">
                <div class="widget-summary-col">
                    <div class="summary">
                        <h4 class="title"><i class="el el-picture"> Slider</i></h4>
                        <div class="info">
                            <strong class="amount">{{ $Slider }}</strong>
                        </div>
                    </div>
                    <div class="summary-footer">
                        <a href="{{ route('slider') }}" class="text-muted text-uppercase">(view all)</a>
                    </div>
                </div>
            </div>
        </div>

        <!-- BERITA -->
        <div class="card col-lg-12 col-md-2" style="margin: 10px;">
            <div class="widget-summary widget-summary-xlg">
                <div class="widget-summary-col">
                    <div class="summary">
                        <h4 class="title"><i class="el el-bullhorn"> Berita</i></h4>
                        <div class="info">
                            <strong class="amount">{{ $Berita }}</strong>
                        </div>
                    </div>
                    <div class="summary-footer">
                        <a href="{{ route('news') }}" class="text-muted text-uppercase">(view all)</a>
                    </div>
                </div>
            </div>
        </div>

        <!-- KLASEMEN -->
        <div class="card col-lg-12 col-md-2" style="margin: 10px;">
            <div class="widget-summary widget-summary-xlg">
                <div class="widget-summary-col">
                    <div class="summary">
                        <h4 class="title"><i class="el el-stats"> Klasemen</i></h4>
                        <div class="info">
                            <strong class="amount">{{ $Klasemen }}</strong>
                        </div>
                    </div>
                    <div class="summary-footer">
                        <a href="{{ route('klasement_pertandingan') }}" class="text-muted text-uppercase">(view all)</a>
                    </div>
                </div>
            </div>
        </div>



    </div>
</div>


@endsection
