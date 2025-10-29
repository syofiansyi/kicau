@extends('backend.includes.index')

@section('main')
    @section('title')
        Event Date
    @endsection

    <!-- start: Jadwal -->
    <section class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-sm-6">
                    <div class="mb-3">
                        <a href="#" class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#kt_modal_create_app" id="kt_toolbar_primary_button">Create Jadwal Event</a>
                    </div>
                </div>
            </div>
            <table class="table table-bordered table-striped mb-0" id="datatable-editable">
                <thead>
                <tr>
                    <th>No</th>
                    <th>Title</th>
                    <th>Image</th>
                    <th>Event Date</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($jadwals as $jadwal)
                    <tr data-item-id="{{ $jadwal->id }}">
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $jadwal->title }}</td>
                        <td>
                            <img class="tbl-thumb" src="{{ asset('Upload/jadwal/' . $jadwal->photo) }}" alt="No img" style="height:40px; width:40px" />
                        </td>
                        <td>
                            {{ \Carbon\Carbon::parse($jadwal->tanggal_mulai)->format('d M Y') }} -
                            {{ \Carbon\Carbon::parse($jadwal->tanggal_selesai)->format('d M Y') }}
                        </td>
                        <td>
                            @if ($jadwal->status == 0)
                                <span class="badge rounded-pill bg-success">Active</span>
                            @else
                                <span class="badge rounded-pill bg-danger">InActive</span>
                            @endif
                        </td>
                        <td class="actions">
                            <a href="{{ route('edit.jadwal', $jadwal->id) }}" class="on-default mx-1">
                                <i class="fas fa-pencil-alt"></i>
                            </a>
                            <a href="{{ route('delete.jadwal', $jadwal->id) }}" class="on-default mx-1" id="delete">
                                <i class="far fa-trash-alt"></i>
                            </a>
                            @if ($jadwal->status == 1)
                                <a href="{{ route('jadwal.inactive', $jadwal->id) }}" class="on-default mx-1">
                                    <i class="fa fa-eye"></i>
                                </a>
                            @else
                                <a href="{{ route('jadwal.active', $jadwal->id) }}" class="mx-1">
                                    <i class="fa fa-eye-slash"></i>
                                </a>
                            @endif
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            <div class="mt-3">
                {{ $jadwals->links('pagination::bootstrap-5') }}
            </div>
        </div>
    </section>
    <!-- end: Jadwal -->


    <!-- start: Group -->
    <section class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-sm-6">
                    <div class="mb-3">
                        <a href="#" class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#kt_modal_create_group" id="kt_toolbar_primary_button">Create Group</a>
                    </div>
                </div>
            </div>
{{--            <pre>{{ dd($groups) }}</pre>--}}
            <table class="table table-bordered table-striped mb-0" id="datatable-editable">
                <thead>
                <tr>
                    <th>No</th>
                    <th>Title</th>
                    <th>Event Jadwal Nama</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($groups as $group)
                    <tr data-item-id="{{ $group->id }}">
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $group->title }}</td>
                        <td>{{ $group->jadwal->title ?? '-' }}</td>
                        <td class="actions">
                            <a href="{{ route('edit.group', $group->id) }}" class="on-default mx-1">
                                <i class="fas fa-pencil-alt"></i>
                            </a>
                            <a href="{{ route('delete.group', $group->id) }}" class="on-default mx-1" id="delete">
                                <i class="far fa-trash-alt"></i>
                            </a>
                        </td>
                    </tr>
                @endforeach
                </tbody>

            </table>
            <div class="mt-3">
                {{ $groups->links('pagination::bootstrap-5') }}
            </div>
        </div>
    </section>
    <!-- end: Group -->

    <!-- start: $clubs -->
    <section class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-sm-6">
                    <div class="mb-3">
                        <a href="#" class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#kt_modal_create_group_club" id="kt_toolbar_primary_button">Create Club</a>
                    </div>
                </div>
            </div>
            {{--            <pre>{{ dd($groups) }}</pre>--}}
            <table class="table table-bordered table-striped mb-0" id="datatable-editable">
                <thead>
                <tr>
                    <th>No</th>
                    <th>Name</th>
                    <th>Photo</th>
                    <th>Nama Pemilik</th>
                    <th>Alamat</th>
                    <th>Group</th>
                    <th>Event</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($clubs as $club)
                    <tr data-item-id="{{ $club->id }}">
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $club->name }}</td>
                        <td>
                            <img class="tbl-thumb" src="{{ asset('Upload/club/' . $club->photo) }}" alt="No img" style="height:40px; width:40px" />
                        </td>
                        <td>{{ $club->name_pemilik ?? '-' }}</td>
                        <td>{{ $club->alamat ?? '-' }}</td>

                        <!-- Group -->
                        <td>
                            @foreach($club->groups as $group)
                                {{ $group->title ?? '-' }}<br>
                            @endforeach
                        </td>

                        <!-- Event -->
                        <td>
                            @foreach($club->groups as $group)
                                @if($group->jadwal)
                                    {{ $group->jadwal->title ?? '-' }}<br>
                                @else
                                    -
                                @endif
                            @endforeach
                        </td>

                        <td class="actions">
                            <a href="{{ route('clubs.edit', $club->id) }}" class="on-default mx-1">
                                <i class="fas fa-pencil-alt"></i>
                            </a>
                            <a href="{{ route('delete.club', $club->id) }}" class="on-default mx-1" id="delete">
                                <i class="far fa-trash-alt"></i>
                            </a>
                        </td>

                    </tr>
                @endforeach
                </tbody>


            </table>
            <div class="mt-3">
                {{ $clubs->links('pagination::bootstrap-5') }}
            </div>
        </div>
    </section>
    <!-- end: $clubs -->


    <!-- start: Match -->
    <section class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-sm-6">
                    <div class="mb-3">
                        <a href="#" class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#kt_modal_create_match" id="kt_toolbar_primary_button">Create Match</a>
                    </div>
                </div>
            </div>
            <table class="table table-bordered table-striped mb-0" id="datatable-editable">
                <thead>
                <tr>
                    <th>No</th>
                    <th>Event</th>
                    <th>Group</th>
                    <th>Club Home</th>
                    <th>Skor Home</th>
                    <th>Club Away</th>
                    <th>Skor Away</th>
                    <th>Tanggal Pertandingan</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($matchs  as $match)
                    <tr data-item-id="{{ $club->id }}">
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $match->jadwal->title}}</td>
                        <td>{{ $match->group->title }}</td>
                        <td>{{ $match->clubHome->name }}</td>
                        <td>{{ $match->skor_home }}</td>
                        <td>{{ $match->clubAway->name }}</td>
                        <td>{{ $match->skor_away}}</td>
                        <td>{{ $match->tanggal_pertandingan}}</td>
                        <td class="actions">
                            <a href="{{ route('edit.match', $match->id) }}" class="on-default mx-1">
                                <i class="fas fa-pencil-alt"></i>
                            </a>
                            <a href="{{ route('delete.match', $match->id) }}" class="on-default mx-1" id="delete">
                                <i class="far fa-trash-alt"></i>
                            </a>
                        </td>
                    </tr>
                @endforeach
                </tbody>


            </table>
            <div class="mt-3">
                {{ $clubs->links('pagination::bootstrap-5') }}
            </div>
        </div>
    </section>
    <!-- end: Match -->


    <!-- Modal Form Create Event -->
    <div class="modal fade" id="kt_modal_create_app" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered mw-900px">
            <div class="modal-content">
                <div class="modal-header">
                    <h2>Create Event</h2>
                    <div class="btn btn-sm btn-icon btn-active-color-primary" data-bs-dismiss="modal">
                    <span class="svg-icon svg-icon-1">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                            <rect opacity="0.5" x="6" y="17.3137" width="16" height="2" rx="1" transform="rotate(-45 6 17.3137)" fill="black"/>
                            <rect x="7.41422" y="6" width="16" height="2" rx="1" transform="rotate(45 7.41422 6)" fill="black"/>
                        </svg>
                    </span>
                    </div>
                </div>
                <div class="modal-body py-lg-10 px-lg-10">
                    <form class="row g-3" action="{{ route('store.jadwal') }}" enctype="multipart/form-data" method="POST">
                        @csrf
                        <div class="form-group col-6">
                            <label>Judul Jadwal/Event</label>
                            <input type="text" class="form-control" name="title" placeholder="Masukkan Judul Event" required>
                        </div>

                        <div class="form-group col-6">
                            <label>Tanggal Mulai</label>
                            <input type="date" class="form-control" name="tanggal_mulai" required>
                        </div>

                        <div class="form-group col-6">
                            <label>Tanggal Selesai</label>
                            <input type="date" class="form-control" name="tanggal_selesai" required>
                        </div>
                        <div class="form-group col-6 mt-4">
                            <label>Upload Gambar <span class="text-danger">*</span></label>
                            <input type="file" class="form-control" name="photo" onchange="mainThamUrl(this)" required>
                            <img src="" id="photoMain" class="mt-2" />
                        </div>

                        <div class="row mt-5">
                            <button type="submit" class="btn btn-success">Submit</button>
                            <button type="button" class="btn btn-default modal-dismiss mt-2" data-bs-dismiss="modal">Cancel</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Create Group -->
    <div class="modal fade" id="kt_modal_create_group" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered mw-900px">
            <div class="modal-content">
                <div class="modal-header">
                    <h2>Create Group</h2>
                    <button type="button" class="btn btn-sm btn-icon btn-active-color-primary" data-bs-dismiss="modal">
                    <span class="svg-icon svg-icon-1">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                            <rect opacity="0.5" x="6" y="17.3137" width="16" height="2" rx="1" transform="rotate(-45 6 17.3137)" fill="black" />
                            <rect x="7.41422" y="6" width="16" height="2" rx="1" transform="rotate(45 7.41422 6)" fill="black" />
                        </svg>
                    </span>
                    </button>
                </div>
                <div class="modal-body py-lg-10 px-lg-10">
                    <form action="{{ route('store.group') }}" method="POST">
                        @csrf
                        <div class="form-group mb-5">
                            <label for="group_name" class="form-label">Group Name</label>
                            <input type="text" name="title" class="form-control" placeholder="Enter Group Name" required>
                        </div>
                        <div class="form-group mb-5">
                            <label for="group_name" class="form-label">Group Name</label>
                            <select class="form-select" name="jadwal_id">
                                @foreach ($jadwals as $jadwal)
                                <option value="{{$jadwal->id}}">{{$jadwal->title}}</option>
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

    <!-- Modal Create Group Club -->
    <div class="modal fade" id="kt_modal_create_group_club" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered mw-900px">
            <div class="modal-content">
                <!-- Header -->
                <div class="modal-header">
                    <h2 class="modal-title">Create Group Club</h2>
                    <button type="button" class="btn btn-sm btn-icon btn-active-color-primary" data-bs-dismiss="modal">
                    <span class="svg-icon svg-icon-1">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                            <rect opacity="0.5" x="6" y="17.3137" width="16" height="2" rx="1" transform="rotate(-45 6 17.3137)" fill="black"/>
                            <rect x="7.41422" y="6" width="16" height="2" rx="1" transform="rotate(45 7.41422 6)" fill="black"/>
                        </svg>
                    </span>
                    </button>
                </div>

                <!-- Body -->
                <div class="modal-body py-lg-10 px-lg-10">
                    <form action="{{ route('group-club.store') }}" method="POST" enctype="multipart/form-data">

                    @csrf
                        <!-- Pilih Event -->
                        <div class="form-group mb-5">
                            <label for="event_data" class="form-label">Pilih Event / Jadwal</label>
                            <select name="event_data" id="event_data" class="form-control" required>
                                <option selected disabled>Pilih Event</option>
                                @foreach($jadwals as $event)
                                    <option value="{{ $event->id }}">{{ $event->title }}</option>
                                @endforeach
                            </select>
                        </div>

                        <!-- Pilih Group -->
                        <div class="form-group mb-5">
                            <label for="group_data_club" class="form-label">Pilih Group</label>
                            <select name="group_data_club" id="group_data_club" class="form-control" required disabled>
                                <option selected disabled>Pilih Group</option>
                            </select>
                        </div>

                        <div class="form-group mb-5">
                            <label for="name" class="form-label">Club Name</label>
                            <input type="text" id="name" name="name" class="form-control" placeholder="Enter club name" required>
                        </div>
                        <div class="form-group mb-5">
                            <label for="nama_pemilik" class="form-label"> Nama Pemilik</label>
                            <input type="text" id="name_pemilik" name="name_pemilik" class="form-control" placeholder="Enter Nama Pemilik" required>
                        </div>

                        <div class="form-group mb-5">
                            <label for="alamat" class="form-label">Alamat</label>
                            <input type="text" id="alamat" name="alamat" class="form-control" placeholder="Enter club alamat" required>
                        </div>
                        <div class="form-group col-6 mt-4">
                            <label>Upload Gambar <span class="text-danger">*</span></label>
                            <input type="file" class="form-control" name="photo" onchange="mainThamUrl(this)" required>
                            <img src="" id="photoMain" class="mt-2" />
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
    <!-- Modal Create Match -->
    <div class="modal fade" id="kt_modal_create_match" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered mw-900px">
            <div class="modal-content">
                <div class="modal-header">
                    <h2>Create Match</h2>
                    <button type="button" class="btn btn-sm btn-icon btn-active-color-primary" data-bs-dismiss="modal">
                    <span class="svg-icon svg-icon-1">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                            <rect opacity="0.5" x="6" y="17.3137" width="16" height="2" rx="1" transform="rotate(-45 6 17.3137)" fill="black" />
                            <rect x="7.41422" y="6" width="16" height="2" rx="1" transform="rotate(45 7.41422 6)" fill="black" />
                        </svg>
                    </span>
                    </button>
                </div>
                <div class="modal-body py-lg-10 px-lg-10">
                    <form action="{{ route('store.match') }}" method="POST">
                        @csrf
                        <!-- Pilih Event -->
                        <div class="form-group mb-5">
                            <label for="event_id" class="form-label">Pilih Event / Jadwal</label>
                            <select name="event_id" id="event_id" class="form-control" required>
                                <option selected disabled>Pilih Event</option>
                                @foreach($jadwals as $event)
                                    <option value="{{ $event->id }}">{{ $event->title }}</option>
                                @endforeach
                            </select>
                        </div>

                        <!-- Pilih Group -->
                        <div class="form-group mb-5">
                            <label for="group_data" class="form-label">Pilih Group</label>
                            <select name="group_data" id="group_data" class="form-control" required disabled>
                                <option selected disabled>Pilih Group</option>
                            </select>
                        </div>

                        <!-- Pilih Home Club -->
                        <div class="form-group mb-5">
                            <label for="club_home_id" class="form-label">Home Club</label>
                            <select name="club_home_id" id="club_home_id" class="form-control" required disabled>
                                <option selected disabled>Pilih Home Club</option>
                            </select>
                        </div>
                        <!-- Skor Home -->
                        <div class="form-group mb-5">
                            <label for="score_home" class="form-label">Score Home</label>
                            <input type="number" name="skor_home" id="score_home" class="form-control" value="0" required>
                        </div>

                        <!-- Pilih Away Club -->
                        <div class="form-group mb-5">
                            <label for="club_away_id" class="form-label">Away Club</label>
                            <select name="club_away_id" id="club_away_id" class="form-control" required disabled>
                                <option selected disabled>Pilih Away Club</option>
                            </select>
                        </div>
                        <!-- Skor Away -->
                        <div class="form-group mb-5">
                            <label for="score_away" class="form-label">Score Away</label>
                            <input type="number" name="skor_away" id="score_away" class="form-control" value="0" required>
                        </div>
                        <!-- Match Date -->
                        <div class="form-group mb-5">
                            <label for="tanggal_pertandingan" class="form-label">Match Date</label>
                            <input type="date" name="tanggal_pertandingan" class="form-control" required>
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






{{--    Edit CLub--}}
    <!-- Modal Create Group Club -->
    <div class="modal fade" id="kt_modal_edit_group_club" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered mw-900px">
            <div class="modal-content">
                <div class="modal-header">
                    <h2 class="modal-title">Edit Group Club</h2>
                    <button type="button" class="btn btn-sm btn-icon btn-active-color-primary" data-bs-dismiss="modal">
                    <span class="svg-icon svg-icon-1">
                        <!-- Close button icon -->
                    </span>
                    </button>
                </div>

                <div class="modal-body py-lg-10 px-lg-10">
                    <form action="{{ route('club.update') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" id="club_id" name="club_id">

                        <!-- Event and Group fields -->
                        <div class="form-group mb-5">
                            <label for="event_edit" class="form-label">Pilih Event / Jadwal</label>
                            <select name="event_edit" id="event_edit" class="form-control" required>
                                <option selected disabled>Pilih Event</option>
                                @foreach($jadwals as $event)
                                    <option value="{{ $event->id }}">{{ $event->title }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group mb-5">
                            <label for="group_data_club_edit" class="form-label">Pilih Group</label>
                            <select name="group_data_club_edit" id="group_data_club_edit" class="form-control" required disabled>
                                <option selected disabled>Pilih Group</option>
                            </select>
                        </div>

                        <!-- Club Name, Pemilik and Alamat fields -->
                        <div class="form-group mb-5">
                            <label for="name" class="form-label">Club Name</label>
                            <input type="text" id="name_edit" name="name" class="form-control" placeholder="Enter club name" required>
                        </div>
                        <div class="form-group mb-5">
                            <label for="name_pemilik" class="form-label">Nama Pemilik</label>
                            <input type="text" id="name_pemilik_edit" name="name_pemilik" class="form-control" placeholder="Enter Nama Pemilik" required>
                        </div>
                        <div class="form-group mb-5">
                            <label for="alamat" class="form-label">Alamat</label>
                            <input type="text" id="alamat_edit" name="alamat" class="form-control" placeholder="Enter club alamat" required>
                        </div>

                        <!-- Image upload field -->
                        <div class="form-group col-6 mt-4">
                            <label>Upload Gambar <span class="text-danger">*</span></label>
                            <input type="file" class="form-control" name="photo" onchange="mainThamUrl(this)" >
                            <img src="" id="photoMain_edit" class="mt-2" style="width: 200px" />
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

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>


    <!-- Script CKEditor -->
    <script src="https://cdn.ckeditor.com/ckeditor5/35.3.2/classic/ckeditor.js"></script>
    <script>
        ClassicEditor
            .create(document.querySelector('#editor'))
            .catch(error => {
                console.error(error);
            });
    </script>

    <!-- Script Preview Gambar -->
    <script type="text/javascript">
        function mainThamUrl(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#photoMain').attr('src', e.target.result).width(80).height(80);
                };
                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>
    <script>
        $(document).ready(function() {
            $('#event_edit').change(function() {
                var eventId = $(this).val();
                if (eventId) {
                    $.ajax({
                        url: '/admin/get_group/' + eventId,
                        type: 'GET',
                        success: function(response) {
                            console.log('Groups:', response.groups);

                            // Populate Group
                            const $groupSelect = $('#group_data_club_edit');
                            $groupSelect.empty().append('<option value="" disabled selected>Pilih Group</option>');

                            if (response.groups && response.groups.length > 0) {
                                response.groups.forEach(function(group) {
                                    $groupSelect.append(new Option(group.title, group.id));
                                });
                                $groupSelect.prop('disabled', false);
                            } else {
                                $groupSelect.prop('disabled', true);
                            }
                        },
                        error: function(xhr, status, error) {
                            console.error('AJAX Error (Group):', error);
                        }
                    });
                }
            });
            $('#event_data').change(function() {
                var eventId = $(this).val();
                if (eventId) {
                    $.ajax({
                        url: '/admin/get_group/' + eventId,
                        type: 'GET',
                        success: function(response) {
                            console.log('Groups:', response.groups);

                            // Populate Group
                            const $groupSelect = $('#group_data_club');
                            $groupSelect.empty().append('<option value="" disabled selected>Pilih Group</option>');

                            if (response.groups && response.groups.length > 0) {
                                response.groups.forEach(function(group) {
                                    $groupSelect.append(new Option(group.title, group.id));
                                });
                                $groupSelect.prop('disabled', false);
                            } else {
                                $groupSelect.prop('disabled', true);
                            }
                        },
                        error: function(xhr, status, error) {
                            console.error('AJAX Error (Group):', error);
                        }
                    });
                }
            });
            // Kalau event (jadwal) dipilih
            $('#event_id').change(function() {
                var eventId = $(this).val();
                if (eventId) {
                    $.ajax({
                        url: '/admin/get_group/' + eventId,
                        type: 'GET',
                        success: function(response) {
                            console.log('Groups:', response.groups);

                            // Populate Group
                            const $groupSelect = $('#group_data');
                            $groupSelect.empty().append('<option value="" disabled selected>Pilih Group</option>');

                            if (response.groups && response.groups.length > 0) {
                                response.groups.forEach(function(group) {
                                    $groupSelect.append(new Option(group.title, group.id));
                                });
                                $groupSelect.prop('disabled', false);
                            } else {
                                $groupSelect.prop('disabled', true);
                            }

                            // Reset Clubs karena belum pilih group
                            $('#club_home_id').empty().append('<option value="" disabled selected>Pilih Home Club</option>').prop('disabled', true);
                            $('#club_away_id').empty().append('<option value="" disabled selected>Pilih Away Club</option>').prop('disabled', true);
                        },
                        error: function(xhr, status, error) {
                            console.error('AJAX Error (Group):', error);
                        }
                    });
                }
            });

            // Kalau group dipilih
            $('#group_data').change(function() {
                var groupId = $(this).val();
                if (groupId) {
                    $.ajax({
                        url: '/admin/get_clubs/' + groupId,
                        type: 'GET',
                        success: function(response) {
                            console.log('Clubs:', response.clubs);

                            // Populate Clubs
                            const $homeSelect = $('#club_home_id');
                            const $awaySelect = $('#club_away_id');
                            $homeSelect.empty().append('<option value="" disabled selected>Pilih Home Club</option>');
                            $awaySelect.empty().append('<option value="" disabled selected>Pilih Away Club</option>');

                            if (response.clubs && response.clubs.length > 0) {
                                response.clubs.forEach(function(club) {
                                    $homeSelect.append(new Option(club.name, club.id));
                                    $awaySelect.append(new Option(club.name, club.id));
                                });
                                $homeSelect.prop('disabled', false);
                                $awaySelect.prop('disabled', false);
                            } else {
                                $homeSelect.prop('disabled', true);
                                $awaySelect.prop('disabled', true);
                            }
                        },
                        error: function(xhr, status, error) {
                            console.error('AJAX Error (Club):', error);
                        }
                    });
                }
            });
        });
    </script>
    <script>
        $(document).ready(function() {

            // When the edit button is clicked
            $('.btn-edit-club').on('click', function() {
                var id = $(this).data('id');  // Fetch the id from the clicked button

                $.ajax({
                    url: `/admin/jadwal/clubs/${id}`,  // Use dynamic ID in the URL
                    type: "GET",
                    cache: false,
                    success: function(response) {
                        console.log(response.club);  // Check the data received

                        // Check each field before setting the value
                        console.log('Setting Name:', response.club.name);
                        console.log('Setting Name Pemilik:', response.club.name_pemilik);
                        console.log('Setting Alamat:', response.club.alamat);

                        // Populate the form with data
                        $('#club_id').val(response.club.id);
                        $('#name_edit').val(response.club.name);
                        $('#name_pemilik_edit').val(response.club.name_pemilik);
                        $('#alamat_edit').val(response.club.alamat);

                        // Show the photo if it exists
                        if (response.club.photo) {
                            $('#photoMain_edit').attr('src', `/Upload/club/${response.club.photo}`).show();
                        } else {
                            $('#photoMain_edit').hide();
                        }

                        // Enable the group dropdown if necessary
                        $('#group_data_club').prop('disabled', false);

                        // Show the modal only after the fields are populated
                        $('#kt_modal_edit_group_club').modal('show');
                    }


                });
            });

        });

        // Preview image after file selection
        function mainThamUrl(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#photoMain').attr('src', e.target.result).width(80).height(80);
                };
                reader.readAsDataURL(input.files[0]);
            }
        }

    </script>


@endsection
