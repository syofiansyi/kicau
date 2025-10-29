@extends('backend.includes.index')

@section('main')
@section('title')
    User
@endsection
<!-- start: page -->
<section class="card">
    <div class="card-body">
        <div class="row">
            <div class="col-sm-6">
                <div class="mb-3">
                    <button class="modal-with-form btn btn-success" href="#modalForm">Add <i
                            class="fas fa-plus"></i></button>
                </div>
            </div>
        </div>
        <table class="table table-bordered table-striped mb-0" id="datatable-editable">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Image</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>role</th>
                    <th>status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>

                @foreach ($users as $user)
                    <tr data-item-id="{{ $loop->iteration }}">
                        <td>{{ $loop->iteration }}</td>
                        <td><img src="{{ asset($user->photo) }}" alt="" style="height:40px; width:40px "></td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->phone }}</td>
                        <td>@if ($user->role == 'user')
                            <p>Admin</p>
                        @else
                            <p>Super Admin</p>
                        @endif
                        </td>
                        <td>
                            @if ($user->status == 0)
                                <span class="badge rounded-pill bg-success">Active</span>
                            @else
                                <span class="badge rounded-pill bg-danger">InActive</span>
                            @endif
                        </td>
                        <td class="actions">
                            <a href="{{ route('edit.user', $user->id) }}" class="on-default "><i
                                    class="fas fa-pencil-alt"></i></a>
                            <a href="{{ route('delete.user', $user->id) }}" class="on-default" id="delete"><i
                                    class="far fa-trash-alt"></i></a>
                            @if ($user->status == 1)
                                <a href="{{ route('user.inactive', $user->id) }}" type="button" class="on-default"> <i
                                        class="el el-eye-open" class="on-default"></i></i></a>
                            @else
                                <a href="{{ route('user.active', $user->id) }}" type="button"> <i
                                        class="el el-eye-close"></i></i></a>
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</section>
<!-- end: page -->
<!-- Modal Form -->

<div id="modalForm" class="modal-block modal-block-primary mfp-hide">
    <section class="card">
        <header class="card-header">
            <h2 class="card-title">Registration Form</h2>
        </header>
        <div class="card-body">
            <form action="{{ route('store.user') }}" enctype="multipart/form-data" method="POST">
                @csrf
                <div class="form-row row mt-4">
                    <div class="form-group col-md-6">
                        <label for="inputEmail4" class="form-label">Name</label>
                        <input type="text" class="form-control slug-title" id="inputEmail4" name="name"
                            placeholder="Add Name" required>
                    </div>
                    <div class="form-group  col-md-6">
                        <label for="inputEmail4" class="form-label">Email</label>
                        <input type="email" class="form-control slug-title" id="inputEmail4" name="email"
                            placeholder="Add Email" required>
                    </div>
                </div>
                <div class="form-row row mt-4">
                    <div class="form-group  col-md-6">
                        <label for="inputEmail4" class="form-label">Phone</label>
                        <input type="number" class="form-control slug-title" id="inputEmail4" name="phone"
                            placeholder="Add Phone" >
                    </div>
                    <div class="form-group  col-md-6">
                        <label for="inputEmail4" class="form-label">Password</label>
                        <input type="password" class="form-control slug-title" id="inputEmail4" name="password"
                            placeholder="Add Password" required>
                    </div>
                </div>


                <div class="form-row row mt-4">
                    <div class="form-group col-md-6">
                        <label for="inputEmail4" class="form-label">Address</label>
                        <input type="text" class="form-control slug-title" id="inputEmail4" name="address"
                            placeholder="Add Address" >
                    </div>

                    <div class="form-group  col-md-6">
                        <label for="inputEmail4" class="form-label"> Category
                        </label>
                        <select name="role" id="" class="form-control populate">
                            <option selected="">Open this select Group</option>
                            <option value="admin">Super Admin</option>
                            <option value="user">admin</option>
                        </select>
                    </div>
                </div>

                <div class="form-row mt-4">
                    <div class="form-group col-md-6">
                        <label for="inputEmail4" class="form-label">Photo</label>
                        <input type="file" class="form-control slug-title" id="inputEmail4" name="photo"
                            id="formFile" onChange="mainThamUrl(this)">

                        <img src="" id="photoMain" />
                    </div>
                    <div class="row">
                        <button type="submit" class="btn btn-success ">Submit</button>
                        <button class="btn btn-default modal-dismiss">Cancel</button>
                    </div>
            </form>
        </div>
    </section>
</div>
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
    @if (Session::has('message'))
        var type = "{{ Session::get('alert-type', 'info') }}"
        switch (type) {
            case 'info':
                toastr.info(" {{ Session::get('message') }} ");
                break;

            case 'success':
                toastr.success(" {{ Session::get('message') }} ");
                break;

            case 'warning':
                toastr.warning(" {{ Session::get('message') }} ");
                break;

            case 'error':
                toastr.error(" {{ Session::get('message') }} ");
                break;
        }
    @endif
</script>
@endsection
