@extends('backend.includes.index')

@section('main')
@section('title')
    Event Date
@endsection
<!-- start: page -->
<section class="card">
    <div class="card-body">
        <div class="row">
            <div class="col-sm-6">
                <div class="mb-3">
                    <a href="#" class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#kt_modal_create_app" id="kt_toolbar_primary_button">Create</a>
                </div>
            </div>
        </div>
        <div class="table-responsive">
            <table id="kt_datatable_zero_configuration" class="table table-row-bordered gy-5">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Title</th>
                    <th>Image</th>
                    <th>Tanggal</th>
                    <th>Lokasi</th>
                    <th>Harga</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($events as $hap)
                    <tr data-item-id="1">
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $hap->title }}</td>
                        <td><img class="tbl-thumb" src="{{ asset('Upload/event/' . $hap->photo) }}" alt="No img"
                                 style="height:40px; width:40px " />
                        </td>
                        <td>{{ \Carbon\Carbon::parse($hap->tanggal)->format('d-m-y') }}</td>
                        <td>{{ $hap->lokasi }}</td>
                        <td>Rp {{number_format($hap->harga, 0, ',', '.')  }}</td>
                        <td>
                            @if ($hap->status == 0)
                                <span class="badge rounded-pill bg-success">Active</span>
                            @else
                                <span class="badge rounded-pill bg-danger">InActive</span>
                            @endif
                        </td>

                        <td class="actions">
                            <a href="{{ route('edit.event', $hap->id) }}" class="on-default mx-1"><i
                                    class="fas fa-pencil-alt"></i></a>
                            <a href="{{ route('delete.event', $hap->id) }}" class="on-default mx-1" id="delete"><i
                                    class="far fa-trash-alt"></i></a>
                                    @if ($hap->status == 1)
                                <a href="{{ route('event.inactive', $hap->id) }}" type="button" class="on-default mx-1">
                                    <i class="fa fa-eye" class="on-default"></i></i></a>
                            @else
                                <a href="{{ route('event.active', $hap->id) }}" type="button" class="mx-1"> <i
                                        class="fa fa-eye-slash"></i></i></a>
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        </div>
    </div>
</section>
<!-- end: page -->
<!-- Modal Form -->
<div class="modal fade" id="kt_modal_create_app" tabindex="-1" aria-hidden="true">
    <!--begin::Modal dialog-->
    <div class="modal-dialog modal-dialog-centered mw-900px">
        <!--begin::Modal content-->
        <div class="modal-content">
            <!--begin::Modal header-->
            <div class="modal-header">
                <!--begin::Modal title-->
                <h2>Create Event</h2>
                <!--end::Modal title-->
                <!--begin::Close-->
                <div class="btn btn-sm btn-icon btn-active-color-primary" data-bs-dismiss="modal">
                    <!--begin::Svg Icon | path: icons/duotune/arrows/arr061.svg-->
                    <span class="svg-icon svg-icon-1">
								<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
									<rect opacity="0.5" x="6" y="17.3137" width="16" height="2" rx="1" transform="rotate(-45 6 17.3137)" fill="black" />
									<rect x="7.41422" y="6" width="16" height="2" rx="1" transform="rotate(45 7.41422 6)" fill="black" />
								</svg>
							</span>
                    <!--end::Svg Icon-->
                </div>
                <!--end::Close-->
            </div>
            <!--end::Modal header-->
            <!--begin::Modal body-->
            <div class="modal-body py-lg-10 px-lg-10">
                <!--begin::Stepper-->
                <div class="stepper stepper-pills stepper-column d-flex flex-column flex-xl-row flex-row-fluid" id="kt_modal_create_app_stepper">
                    <form class="row g-3" action="{{ route('store.event') }}" enctype="multipart/form-data" method="POST">
                        @csrf


                        <div class="form-group col-6">
                            <label for="inputEmail4">Name Event</label>
                            <input type="text" class="form-control" id="inputEmail4" placeholder="Event Name" name="title">
                        </div>
                        <div class="form-group col-6">
                            <label for="inputEmail4">Lokasi</label>
                            <input type="text" class="form-control" id="inputEmail4" placeholder="Event Name" name="lokasi">
                        </div>
                        <div class="form-group col-6">
                            <label for="inputEmail4">Tanggal</label>
                            <input type="date" class="form-control" id="inputEmail4" placeholder="Event Name" name="tanggal">
                        </div>
                        <div class="form-group col-6">
                            <label for="inputEmail4">Harga</label>
                            <input type="number" class="form-control" id="inputEmail4" placeholder="Event Name" name="harga">
                        </div>
                        <div class="form-group mt-4">
                            <label for="inputAddress2">Description</label>
                            <textarea name="description" id="editor" class="form-control"></textarea>
                        </div>
                        <div class="form-row mt-4">
                            <div class="form-group col-md-6">
                                <label for="inputEmail4" class="form-label">Photo <span class="text-danger">*</span></label>
                                <input type="file" class="form-control slug-title" id="inputEmail4" name="photo"
                                       id="formFile" onChange="mainThamUrl(this)" required>

                                <img src="" id="photoMain" />
                            </div>
                        </div>
                        <div class="row mt-5">
                            <button type="submit" class="btn btn-success ">Submit</button>
                            <button class="btn btn-default modal-dismiss mt-2">Cancel</button>
                        </div>
                    </form>
                </div>
                <!--end::Stepper-->
            </div>
            <!--end::Modal body-->
        </div>
        <!--end::Modal content-->
    </div>
    <!--end::Modal dialog-->
</div>



<script src="https://cdn.ckeditor.com/ckeditor5/35.3.2/classic/ckeditor.js"></script>
<script>
    ClassicEditor
        .create(document.querySelector('#editor'))
        .then(editor => {
            console.log(editor);
        })
        .catch(error => {
            console.error(error);
        });
</script>
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
<script type="text/javascript">
    function mapsMainUrl(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                $('#mapsMain').attr('src', e.target.result).width(80).height(80);
            };
            reader.readAsDataURL(input.files[0]);
        }
    }
</script>
    <script>
        $("#kt_datatable_zero_configuration").DataTable();
    </script>
@endsection
