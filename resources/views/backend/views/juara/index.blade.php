@extends('backend.includes.index')

@section('main')
    @section('title')
        Gallery Happening
    @endsection
    <!-- start: page -->
    <section class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-sm-6">
                    <div class="mb-3">
                        <a href="#" class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#hasil_pertandingan" id="kt_toolbar_primary_button">Create</a>
                    </div>
                </div>
            </div>
            <table class="table table-bordered table-striped mb-0" >
                <thead>
                <tr>
                    <th>No</th>
                    <th>Title</th>
                    <th>Image</th>
                    <th>status</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach($juara as $item)
                    <tr data-item-id="1">
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $item->title }}</td>
                        <td>
                            <img class="tbl-thumb" src="{{ asset('Upload/juara/' . $item->photo) }}" alt="No img"
                                 style="height:40px; width:40px " />
                        </td>
                        <td>
                            @if ($item->status == 0)
                                <span class="badge rounded-pill bg-success">Active</span>
                            @else
                                <span class="badge rounded-pill bg-danger">InActive</span>
                            @endif
                        </td>

                        <td class="actions">
                            <a href="{{ route('edit.juara', $item->id) }}" class="on-default mx-1"><i
                                    class="fas fa-pencil-alt"></i></a>
                            <a href="{{ route('delete.juara', $item->id) }}" class="on-default mx-1" id="delete"><i
                                    class="far fa-trash-alt"></i></a>
                            @if ($item->status == 1)
                                <a href="{{ route('juara.inactive', $item->id) }}" type="button" class="on-default mx-1">
                                    <i class="fa fa-eye" class="on-default"></i></a>
                            @else
                                <a href="{{ route('juara.active', $item->id) }}" type="button" class="mx-1"> <i
                                        class="fa fa-eye-slash"></i></a>
                            @endif
                        </td>
                    </tr>
                @endforeach

                </tbody>
            </table>
            <div class="d-flex justify-content-end mt-3">
                {{ $juara->links('pagination::bootstrap-4') }}
            </div>
        </div>
    </section>
    <!-- end: page -->
    <!-- Modal Form -->

    <div class="modal fade" id="hasil_pertandingan" tabindex="-1" aria-hidden="true">
        <!--begin::Modal dialog-->
        <div class="modal-dialog modal-dialog-centered mw-900px">
            <!--begin::Modal content-->
            <div class="modal-content">
                <!--begin::Modal header-->
                <div class="modal-header">
                    <!--begin::Modal title-->
                    <h2>Create Juara</h2>
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
                        <form class="row g-3" action="{{ route('store.juara') }}" enctype="multipart/form-data" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label for="exampleFormControlInput1" class="form-label">Title</label>
                                <input type="text" name="title" class="form-control" id="title" placeholder="title">
                                <input type="hidden" id="id" name="id">
                            </div>

                            <div class="mb-3">
                                <label for="exampleFormControlInput1" class="form-label">description</label>
                                <textarea name="description"  id="editor" class="form-control"></textarea>
                            </div>

                            <div class="form-row mt-4">
                                <div class="form-group col-md-6">
                                    <label for="photo" class="form-label">Photo</label>
                                    <input type="file" class="form-control slug-title" id="photo" name="photo"
                                           id="formFile" onChange="mainThamUrl(this)">

                                    <img src="" id="photoMain" />
                                </div>
                            </div>
                            <div class="row">
                                <button  type="submit" id="simpan" class="btn btn-success " >Submit</button>
                                <button type="button" id="tutup" class="btn btn-default modal-dismiss mt-2">Cancel</button>
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
            .create(document.querySelector('#desc'))
            .then(desc => {
                console.log(desc);
            })
            .catch(error => {
                console.error(error);
            });
    </script>
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

@endsection
