@extends('backend.includes.index')

@section('main')
@section('title')
    Event Date
@endsection
<!-- start: page -->
<section class="card pb-5">
    <div class="card-body">
        <div class="row">
            <div class="col-sm-6">
                <div class="mb-3">
                    <a href="#" class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#hasil_pertandingan" id="kt_toolbar_primary_button">Create Hasil Pertandingan</a>
                </div>
            </div>
        </div>
        <div class="table-responsive">
            <table class="table table-bordered" >
                <thead>
                <tr class="fw-bold fs-6 text-gray-800">
                    <th>No</th>
                    <th>Nama Team 1</th>
                    <th>Skor Team 1</th>
                    <th>Gambar Team 1</th>
                    <th>Nama Team 2</th>
                    <th>Skor Team 2</th>
                    <th>Gambar Team 2</th>
                    <th>Tanggal</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($pertandingan as $hap)
                    <tr data-item-id="1">
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $hap->namateam1 }}</td>
                        <td>{{ $hap->skor1 }}</td>
                        <td><img class="tbl-thumb" src="{{ asset('Upload/hasil_pertandingan/' . $hap->photo1) }}" alt="No img"
                                 style="height:40px; width:40px " />
                        </td>
                        <td>{{ $hap->namateam2 }}</td>
                        <td>{{ $hap->skor2 }}</td>
                        <td><img class="tbl-thumb" src="{{ asset('Upload/hasil_pertandingan/' . $hap->photo2) }}" alt="No img"
                                 style="height:40px; width:40px " />
                        <td>{{ \Carbon\Carbon::parse($hap->tanggal)->format('d-m-y') }}</td>
                        <td>
                            @if ($hap->status == 0)
                                <span class="badge rounded-pill bg-success">Active</span>
                            @else
                                <span class="badge rounded-pill bg-danger">InActive</span>
                            @endif
                        </td>

                        <td class="actions">
                            <a href="{{ route('edit.pertandingan', $hap->id) }}" class="on-default mx-1"><i
                                    class="fas fa-pencil-alt"></i></a>
                            <a href="{{ route('delete.pertandingan', $hap->id) }}" class="on-default mx-1" id="delete"><i
                                    class="far fa-trash-alt"></i></a>
                            @if ($hap->status == 1)
                                <a href="{{ route('pertandingan.inactive', $hap->id) }}" type="button" class="on-default mx-1">
                                    <i class="fa fa-eye" class="on-default"></i></a>
                            @else
                                <a href="{{ route('pertandingan.active', $hap->id) }}" type="button" class="mx-1"> <i
                                        class="fa fa-eye-slash"></i></a>
                            @endif
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>

    </div>
</section>


<section class="card pt-5">
    <div class="card-body">
        <div class="row">
            <div class="col-sm-6">
                <div class="mb-3">
                    <a href="#" class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#klasement" id="kt_toolbar_primary_button">Create Top Rank</a>
                </div>
            </div>
        </div>
        <table class="table table-bordered table-striped mb-0" id="datatable-editable">
            <thead>
            <tr>
                <th>No</th>
                <th>Nama Burung</th>
                <th>Image</th>
                <th>Nama Pemilik</th>
                <th>Posisi</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($klasement as $hap)
                <tr data-item-id="1">
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $hap->nama_burung }}</td>
                    <td><img class="tbl-thumb" src="{{ asset('Upload/klasement/' . $hap->photo) }}" alt="No img"
                             style="height:40px; width:40px " />
                    </td>
                    <td>{{ $hap->nama_pemilik }}</td>
                    <td>{{ $hap->posisi }}</td>

                    <td>
                        @if ($hap->status == 0)
                            <span class="badge rounded-pill bg-success">Active</span>
                        @else
                            <span class="badge rounded-pill bg-danger">InActive</span>
                        @endif
                    </td>

                    <td class="actions">
                        <a href="{{ route('edit.klasement', $hap->id) }}" class="on-default mx-1"><i
                                class="fas fa-pencil-alt"></i></a>
                        <a href="{{ route('delete.klasement', $hap->id) }}" class="on-default mx-1" id="delete"><i
                                class="far fa-trash-alt"></i></a>
                        @if ($hap->status == 1)
                            <a href="{{ route('klasement.inactive', $hap->id) }}" type="button" class="on-default mx-1">
                                <i class="fa fa-eye" class="on-default"></i></a>
                        @else
                            <a href="{{ route('klasement.active', $hap->id) }}" type="button" class="mx-1"> <i
                                    class="fa fa-eye-slash"></i></a>
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
<div class="modal fade" id="hasil_pertandingan" tabindex="-1" aria-hidden="true">
    <!--begin::Modal dialog-->
    <div class="modal-dialog modal-dialog-centered mw-900px">
        <!--begin::Modal content-->
        <div class="modal-content">
            <!--begin::Modal header-->
            <div class="modal-header">
                <!--begin::Modal title-->
                <h2>Create Hasil Pertandingan (Result)</h2>
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
                    <form class="row g-3" action="{{ route('store.pertandingan') }}" enctype="multipart/form-data" method="POST">
                        @csrf
                        <div class="form-group col-6">
                            <label for="inputEmail4">Team 1</label>
                            <input type="text" class="form-control" id="inputEmail4" placeholder="Nama Team" name="namateam1">
                        </div>
                        <div class="form-group col-6">
                            <label for="inputEmail4">Skor 1</label>
                            <input type="text" class="form-control" id="inputEmail4" placeholder="Skor" name="skor1">
                        </div>
                        <div class="form-group col-6">
                            <label for="inputEmail4">Team 2</label>
                            <input type="text" class="form-control" id="inputEmail4" placeholder="Event Team" name="namateam2">
                        </div>
                        <div class="form-group col-6">
                            <label for="inputEmail4">Skor 2</label>
                            <input type="number" class="form-control" id="inputEmail4" placeholder="Skor" name="skor2">
                        </div>
                        <div class="form-group col-12">
                            <label for="inputEmail4">Tanggal</label>
                            <input type="date" class="form-control" id="inputEmail4" placeholder="Event Name" name="tanggal">
                        </div>
                        <div class="form-row mt-4">
                            <div class="form-group col-md-6">
                                <label for="photo1" class="form-label">Photo Tim 1 <span class="text-danger">*</span></label>
                                <input type="file" class="form-control" name="photo1" id="photo1" required>
                                <img src="" id="preview1" />
                            </div>
                            <div class="form-group col-md-6">
                                <label for="photo2" class="form-label">Photo Tim 2 <span class="text-danger">*</span></label>
                                <input type="file" class="form-control" name="photo2" id="photo2" required>
                                <img src="" id="preview2" />
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

<div class="modal fade" id="klasement" tabindex="-1" aria-hidden="true">
    <!--begin::Modal dialog-->
    <div class="modal-dialog modal-dialog-centered mw-900px">
        <!--begin::Modal content-->
        <div class="modal-content">
            <!--begin::Modal header-->
            <div class="modal-header">
                <!--begin::Modal title-->
                <h2>Create Top Rank</h2>
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
                    <form class="row g-3" action="{{ route('store.klasement') }}" enctype="multipart/form-data" method="POST">
                        @csrf
                        <div class="form-group col-6">
                            <label for="inputEmail4">Nama Burung</label>
                            <input type="text" class="form-control" id="inputEmail4" placeholder="Nama Burung" name="nama_burung">
                        </div>
                        <div class="form-group col-6">
                            <label for="inputEmail4">Nama Pemilik</label>
                            <input type="text" class="form-control" id="inputEmail4" placeholder="Nama Pemilik" name="nama_pemilik">
                        </div>
                        <div class="form-group col-6">
                            <label for="inputEmail4">Alamat</label>
                            <input type="text" class="form-control" id="inputEmail4" placeholder="Alamat" name="alamat">
                        </div>
                        <div class="form-group col-6">
                            <label for="inputEmail4">posisi</label>
                            <input type="number" class="form-control" id="inputEmail4" placeholder="Alamat" name="posisi">
                        </div>
                        <div class="form-row mt-4 col-12" >
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

<script>
    document.getElementById('photo1').onchange = evt => {
        const [file] = evt.target.files;
        if (file) document.getElementById('preview1').src = URL.createObjectURL(file);
    }

    document.getElementById('photo2').onchange = evt => {
        const [file] = evt.target.files;
        if (file) document.getElementById('preview2').src = URL.createObjectURL(file);
    }
</script>

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
@endsection
