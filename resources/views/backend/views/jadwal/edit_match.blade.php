@extends('backend.includes.index')
@section('main')
    @section('title')
        Restoran - Edit Event
    @endsection

    <!-- CONTENT WRAPPER -->
    <div class="ec-content-wrapper">
        <div>
            <a href="{{ route('jadwal') }}" class="btn btn-sm btn-primary"> View All
            </a>
        </div>
        <div class="content">
            <div class="row">
                <div class="col-12">
                    <div class="card card-default">
                        <div class="card-header card-header-border-bottom">
                            <div class="breadcrumb-wrapper d-flex align-items-center justify-content-between">
                                <div>
                                    <h1>Edit Match </h1>
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

                                        <form action="{{ route('update.match', $match->id) }}" method="POST" class="row">
                                            @csrf
                                            <!-- Home Club -->
                                            <div class="form-group mb-3 col-6" >
                                                <label for="club_home_id" class="form-label">Home Club</label>
                                                <select name="club_home_id" class="form-control" required>
                                                    @foreach($clubs as $club)
                                                        <option value="{{ $club->id }}" {{ $club->id == $match->club_home_id ? 'selected' : '' }}>
                                                            {{ $club->name }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <!-- Home Club -->
                                            <div class="form-group mb-3 col-6" >
                                                <label for="club_home_id" class="form-label">Skor Home</label>
                                                <!-- Score Home -->
                                                <input type="number" name="skor_home" value="{{ $match->skor_home }}" class="form-control mb-3" required>
                                            </div>

                                            <!-- Home Club -->
                                            <div class="form-group mb-3 col-6">
                                                <label for="club_away_id" class="form-label">Home Away</label>
                                                <select name="club_away_id" class="form-control" required>
                                                    @foreach($clubs as $club)
                                                        <option value="{{ $club->id }}" {{ $club->id == $match->club_away_id ? 'selected' : '' }}>
                                                            {{ $club->name }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <!-- Home Club -->
                                            <div class="form-group mb-3 col-6" >
                                                <label for="club_home_id" class="form-label">Skor Away</label>
                                                <input type="number" name="skor_away" value="{{ $match->skor_away }}" class="form-control mb-3" required>
                                            </div>
                                            <!-- Score Away -->

                                            <div class="form-group mb-3 col-12" >
                                                <label for="club_home_id" class="form-label">Tanggal Pertandingan</label>
                                                <input type="date" name="tanggal_pertandingan" value="{{ $match->tanggal_pertandingan }}" class="form-control mb-3" required>
                                            </div>
                                            <!-- Match Date -->


                                            <div class="d-flex justify-content-end">
                                                <button type="submit" class="btn btn-success me-2">Submit</button>
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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>


    <!-- Script CKEditor -->
{{--    <script src="https://cdn.ckeditor.com/ckeditor5/35.3.2/classic/ckeditor.js"></script>--}}
{{--    <script>--}}
{{--        ClassicEditor--}}
{{--            .create(document.querySelector('#editor'))--}}
{{--            .catch(error => {--}}
{{--                console.error(error);--}}
{{--            });--}}
{{--    </script>--}}

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
