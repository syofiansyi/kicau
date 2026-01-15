@extends('backend.includes.index')

@section('main')
@section('title')
    Gallery Slider
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
        <table class="table table-bordered table-striped mb-0">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Image</th>
                    <th>Kategori</th>
                    <th>status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>

                @foreach ($sliders as $hap)
                    <tr data-item-id="1">
                        <td>{{ $loop->iteration }}</td>
                        <td><img class="tbl-thumb" src="{{ asset('Upload/slider/' . $hap->photo) }}" alt="No img"
                                style="height:40px; width:40px " />
                        </td>
                        <td>{{ $hap->kategori }}</td>
                        <td>
                            @if ($hap->status == 0)
                                <span class="badge rounded-pill bg-success">Active</span>
                            @else
                                <span class="badge rounded-pill bg-danger">InActive</span>
                            @endif
                        </td>
                        <td class="actions">
                            <a href="{{ route('delete.slider', $hap->id) }}" class="on-default mx-2" id="delete"><i
                                    class="far fa-trash-alt"></i></a>
                            @if ($hap->status == 1)
                                <a href="{{ route('slider.inactive', $hap->id) }}" type="button"
                                    class="on-default mx-2">
                                    <i class="fa fa-eye-slash" class="on-default mx-2"></i></a>
                            @else
                                <a href="{{ route('slider.active', $hap->id) }}" type="button"> <i
                                        class="fa fa-eye mx-2"></i></a>
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

<div class="modal fade" id="kt_modal_create_app" tabindex="-1" aria-hidden="true">
    <!--begin::Modal dialog-->
    <div class="modal-dialog modal-dialog-centered mw-900px">
        <!--begin::Modal content-->
        <div class="modal-content">
            <!--begin::Modal header-->
            <div class="modal-header">
                <!--begin::Modal title-->
                <h2>Create App</h2>
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
                <form class="row g-3" action="{{ route('store.slider') }}" enctype="multipart/form-data" method="POST">
                    @csrf

                    <!-- PHOTO -->
                    <div class="form-row mt-4 col-12">
                        <div class="form-group col-md-12">
                            <label class="form-label">
                                Photo <span class="text-danger">*</span>
                            </label>
                            <input type="file" class="form-control" name="photo" id="formFile"
                                onChange="mainThamUrl(this)" required>
                            <img src="" id="photoMain" style="margin-top:10px; height:80px;" />
                        </div>
                    </div>

                    <!-- KATEGORI (DROPDOWN) -->
                    <div class="form-row mt-4 col-12">
                        <div class="form-group col-md-12">
                            <label for="kategori">
                                Kategori <span class="text-danger">*</span>
                            </label>

                            <select class="form-control" id="kategori" name="kategori" required>
                                <option value="">-- Pilih Kategori --</option>
                                <option value="slider">Slider</option>
                                <option value="banner">Banner</option>
                            </select>
                        </div>
                    </div>

                    <div class="row mt-3">
                        <button type="submit" class="btn btn-success">Submit</button>
                        <button type="button" class="btn btn-secondary mt-2" data-bs-dismiss="modal">
                            Cancel
                        </button>
                    </div>

                </form>
            </div>

            <!--end::Modal body-->
        </div>
        <!--end::Modal content-->
    </div>
    <!--end::Modal dialog-->
</div>
@endsection
