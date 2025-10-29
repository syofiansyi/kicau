@extends('admin.admin_dashboard')
@section('main')
@section('title')
@endsection

<!-- CONTENT WRAPPER -->
<div class="ec-content-wrapper">
    <div class="content">
        <div class="row">
            <div class="col-12">
                <div class="card card-default">
                    <div class="card-header card-header-border-bottom">
                        <div class="breadcrumb-wrapper d-flex align-items-center justify-content-between">
                            <div>
                                <h1>Add User</h1>
                                <p class="breadcrumbs"><span><a href="{{ route('admin.user') }}">User</a></span>
                                    <span><i class="mdi mdi-chevron-right"></i></span>Add User
                                </p>
                            </div>
                            <div>
                                <a href="{{ route('admin.user') }}" class="btn btn-success"> View All
                                </a>
                            </div>
                        </div>
                    </div>

                    <div class="card-body">
                        <div class="row ec-vendor-uploads">
                            <div class="col-lg-12">
                                <div class="ec-vendor-upload-detail">
                                    <form class="row g-3" action="{{ route('update.user') }}"
                                        enctype="multipart/form-data" method="POST">
                                        @csrf

                                        <input type="hidden" name="id" value="{{ $user->id }}">
                                        <input type="hidden" name="old_image" value="{{ $user->photo }}">

                                        <div class="col-md-6">
                                            <label for="inputEmail4" class="form-label">Name</label>
                                            <input type="text" class="form-control slug-title" id="inputEmail4"
                                                name="name" placeholder="Add Name" value="{{ $user->name }}">
                                        </div>

                                        <div class="col-md-6">
                                            <label for="inputEmail4" class="form-label">Email</label>
                                            <input type="email" class="form-control slug-title" id="inputEmail4"
                                                name="email" placeholder="Add Email" value="{{ $user->email }}"
                                                disabled>
                                        </div>

                                        <div class="col-md-6">
                                            <label for="inputEmail4" class="form-label">Phone</label>
                                            <input type="number" class="form-control slug-title" id="inputEmail4"
                                                name="phone" placeholder="Add Phone" value="{{ $user->phone }}">
                                        </div>
                                        <div class="form-group  col-md-6">
                                            <label for="inputEmail4" class="form-label"> Category
                                            </label>
                                            <select name="role" id="" class="form-control populate">
                                                <option value="admin"{{ $user->role == 'admin' ? 'selected' : '' }}>
                                                    Super Admin</option>
                                                <option value="user" {{ $user->role == 'user' ? 'selected' : '' }}>
                                                    admin</option>
                                            </select>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="inputEmail4" class="form-label">Address</label>
                                            <input type="text" class="form-control slug-title" id="inputEmail4"
                                                name="address" placeholder="Add Address"
                                                value="{{ $user->address }}">
                                        </div>
                                        {{-- <div class="col-md-6">
                                            <label for="inputEmail4" class="form-label">Password</label>
                                            <input type="password" class="form-control slug-title" id="inputEmail4"
                                                name="password" placeholder="Add Password"
                                                value="{{ $user->password }}">
                                        </div> --}}
                                        <div class="col-md-6">
                                            <label for="inputEmail4" class="form-label">Photo</label>
                                            <input type="file" class="form-control slug-title" id="inputEmail4"
                                                name="photo" id="image">
                                        </div>

                                        <div class="row mb-3">
                                            <div class="col-sm-12 text-secondary">
                                                <img id="showImage" src="{{ asset($user->photo) }}" alt="Admin"
                                                    style="width:100px; height: 100px;">
                                            </div>
                                        </div>

                                        <div class="col-md-12">
                                            <button type="submit" class="btn btn-success ">Submit</button>
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
@endsection
