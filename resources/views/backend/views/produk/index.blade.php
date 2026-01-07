@extends('backend.includes.index')

@section('main')
@section('title')
    Produk
@endsection
<!-- start: page -->
<section class="card">
    <div class="card-body">
        <div class="row">
            <div class="col-sm-6">
                <div class="mb-3">
                    <a href="#" class="btn btn-sm btn-primary" data-bs-toggle="modal"
                        data-bs-target="#kt_modal_create_app" id="kt_toolbar_primary_button">Create</a>
                </div>
            </div>
        </div>
        <div class="table-responsive">
            <table id="kt_datatable_zero_configuration" class="table table-row-bordered gy-5">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Produk</th>
                        <th>Description</th>
                        <th>Harga</th>
                        <th>Link Tiktok</th>
                        <th>Link Shopee</th>
                        <th>photo</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($produk as $hap)
                        <tr data-item-id="1">
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $hap->title }}</td>
                            <td>{!! Str::limit($hap->description, 50) !!}</td>
                            <td>Rp {{ number_format($hap->harga, 0, ',', '.') }}</td>
                            <td>{{ $hap->shopee }}</td>
                            <td>{{ $hap->tiktok }}</td>

                            <td><img class="tbl-thumb" src="{{ asset('Upload/produk/' . $hap->photo) }}" alt="No img"
                                    style="height:40px; width:40px " />
                            </td>
                            <td class="actions">
                                <a href="{{ route('backend.produk.edit', $hap->id) }}" class="on-default mx-1"><i
                                        class="fas fa-pencil-alt"></i></a>
                                <form action="{{ route('backend.produk.destroy', $hap->id) }}" method="POST"
                                    class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-link">
                                        <i class="far fa-trash-alt"></i>
                                    </button>
                                </form>



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
                <h2>Create Produk</h2>
                <!--end::Modal title-->
                <!--begin::Close-->
                <div class="btn btn-sm btn-icon btn-active-color-primary" data-bs-dismiss="modal">
                    <!--begin::Svg Icon | path: icons/duotune/arrows/arr061.svg-->
                    <span class="svg-icon svg-icon-1">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                            fill="none">
                            <rect opacity="0.5" x="6" y="17.3137" width="16" height="2" rx="1"
                                transform="rotate(-45 6 17.3137)" fill="black" />
                            <rect x="7.41422" y="6" width="16" height="2" rx="1"
                                transform="rotate(45 7.41422 6)" fill="black" />
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
                <div class="stepper stepper-pills stepper-column d-flex flex-column flex-xl-row flex-row-fluid"
                    id="kt_modal_create_app_stepper">
                    <form class="row g-3" action="{{ route('backend.produk.store') }}" enctype="multipart/form-data"
                        method="POST">
                        @csrf


                        <div class="form-group col-6">
                            <label for="inputEmail4">Nama Produk</label>
                            <input type="text" class="form-control" id="inputEmail4" placeholder="Nama Produk"
                                name="title">
                        </div>
                        <div class="form-group col-6">
                            <label for="inputEmail4">Description</label>
                            <input type="text" class="form-control" id="inputEmail4" placeholder="Descripsi"
                                name="description">
                        </div>

                        <div class="form-group col-6">
                            <label for="inputEmail4">Harga</label>
                            <input type="number" class="form-control" id="inputEmail4" placeholder="Harga"
                                name="harga">
                        </div>

                        <div class="form-group col-md-6">
                            <label for="inputEmail4" class="form-label">Photo <span class="text-danger">*</span></label>
                            <input type="file" class="form-control slug-title" id="inputEmail4" name="photo"
                                id="formFile" onChange="mainThamUrl(this)" required>

                            <img src="" id="photoMain" />
                        </div>
                        <div class="form-group col-6">
                            <label for="inputEmail4">Link Shopee</label>
                            <input type="text" class="form-control" id="inputEmail4" placeholder="Input Link Shope"
                                name="shopee">
                        </div>
                        <div class="form-group col-6">
                            <label for="inputEmail4">Link Tiktok</label>
                            <input type="text" class="form-control" id="inputEmail4"
                                placeholder="Input Link Tiktok" name="tiktok">
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
