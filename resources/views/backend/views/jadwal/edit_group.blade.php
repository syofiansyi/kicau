@extends('backend.includes.index')
@section('main')
    @section('title')
        Restoran - Edit Event
    @endsection

    <!-- CONTENT WRAPPER -->
    <div class="ec-content-wrapper">
        <div>
            <a href="{{ route('jadwal') }}" class="btn btn-sm btn-primary"> View All group
            </a>
        </div>
        <div class="content">
            <div class="row">
                <div class="col-12">
                    <div class="card card-default">
                        <div class="card-header card-header-border-bottom">
                            <div class="breadcrumb-wrapper d-flex align-items-center justify-content-between">
                                <div>
                                    <h1>Edit Group </h1>
                                    {{--                                <p class="breadcrumbs"><span><a href="{{ route('event') }}">Event</a></span>--}}
                                    {{--                                    <span><i class="mdi mdi-chevron-right"></i></span>Edit Event--}}
                                    {{--                                </p>--}}
                                </div>
                            </div>
                        </div>

                        <div class="card-body">
                            <div class="row ec-vendor-uploads">
                                <div class="col-lg-12">
                                    <div class="ec-vendor-upload-detail">

                                        <form action="{{ route('update_group') }}" method="POST">
                                            @csrf
                                            <input type="hidden" name="id" value="{{ $group->id }}">
                                            <div class="form-group mb-5">
                                                <label for="group_name" class="form-label">Group Name</label>
                                                <input type="text" name="title" class="form-control" placeholder="Enter Group Name" required value="{{$group->title}}">
                                            </div>
                                            <div class="form-group mb-5">
                                                <label for="group_name" class="form-label">Group Name</label>
                                                <select class="form-select" name="jadwal_id">
                                                    @foreach ($jadwals as $jadwal)
                                                        <option value="{{ $jadwal->id }}" {{ $group->jadwal_id == $jadwal->id ? 'selected' : '' }}>
                                                            {{ $jadwal->title }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>

                                            <div class="d-flex justify-content-end">
                                                <button type="submit" class="btn btn-success me-2">Submit</button>
                                                <button type="button" class="btn btn-light" data-bs-dismiss="modal">Cancel</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                </div>

            </div>

        </div> <!-- End Content -->
    </div> <!-- End Content Wrapper -->

@endsection
