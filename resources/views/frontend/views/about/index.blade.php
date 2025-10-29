@extends('frontend.includes.index')


@section('title')
    Kopdar LovedBird Indonesia - About
@endsection
@push('addon-style')
    <link href="{{ asset('Frontend/css/about.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('Frontend/css/custome.css') }}" rel="stylesheet" type="text/css" />
@endpush
@section('main')
    <div class="d-flex flex-column flex-column-fluid">
        <!--begin::Content-->
        <div id="kt_app_content" class="app-content flex-column-fluid">
            <div class="app-container container-fluid">
                <!-- Hero Section -->
                <div class="hero-section bg-white">
                    <div class="row">
                        <div class="hero-logo col-4">
                            <img src="{{ asset('Frontend/img/logo.png') }}" alt="Lovebird Logo">
                        </div>
                        <div class="hero-title col-8">
                            Kopdar Lovebird Indonesia
                        </div>
                    </div>
                    <!-- Deskripsi di tengah -->
                    <div class="hero-content">
                        <p>
                            Kopdar Lovebird Indonesia berdiri dan terbentuk dari kalangan penghobby lovebird baik kicau maupun singing, dengan tujuan untuk menampung aspirasi Penggiat, penghobby dan pecinta lovebird indonesia, yang kedepan bakal menjadi penggerak perekonomian masyarakat indonesia melalui UMKM seperti (penyelenggara lomba burung lovebird, peternak Lovebird, penjual pakan, penjual aksesoris, penjual kandang) dan masih banyak lagi yang berhubungan dengan burung Lovebird.
                        </p>
                    </div>

                </div>

                <!-- Three Cards Section -->
                <div class="container pt-15">
                    <div class="row text-center">
                        <div class="col-md-4 pt-3">
                            <div class="card-custom">
                                <h5>Visi</h5>
                                <p>Menjadikan Lovebird Sebagai hobby yang makin di minati di kalangan kicau mania, serta dapat meningkatkan silaturahim antar kicaumania dan dapat selaras dengan program pemerintah dalam rangka mengerakkan roda perekonomian UMKM Indonesia.

                                </p>
                            </div>
                        </div>
                        <div class="col-md-4 pt-3">
                            <div class="card-custom">
                                <h5>Misi</h5>
                                <p>Menjadikan lovebird sebagai sarana penyambung silaturahim kicau mania dan pengerak roda perekonomian UMKM serta dapat meyuguhkan Kompetisi yang Fairplay dengan mengedepankan kualitas, profesionalisme, jujur dan adil.

                                </p>
                            </div>
                        </div>
                        <div class="col-md-4 pt-3">
                            <div class="card-custom">
                                <h5>Mengapa Kami</h5>
                                <p>Kopdar Lovebird Indonesia memiliki program kegiatan berupa penyelenggaraan kompetisi Lovebird SINGING CONTEST dan BEAUTY CONTEST yang kesemuanya kompetisi hanya untuk burung Lovebird, dengan mengedepankan Fairplay dengan Juri/pengadil kualitas, profesional, jujur dan adil serta dapat memberikan peluang pada masyarakat UMKM indonesia yang bersinggungan dengan hobby lovebird.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- About Section -->
                <div class="container about-section">
                    <div class="row">
                        <div class="col-md-6">
                            <h3>Who We Are</h3>
                            <p>Kami adalah penghobi lovebird untuk langkah awal mengadakan pendekatan secara intens ke teman-teman pemain burung lovebird mencari apa kecenderungan yang membuat lovebird makin di tinggalkan oleh penghobi burung, sehingga kami berkumpul dan saling berkomunikasi satu sama lain berupaya agar lovebird biar diminati kembali dan mengambil sebuah kesimpulannya bahwa setiap hobi butuh sebuah tantangan atau kompetisi untuk memberi penyemangat mencetak burung lovebird terbaik dari segi penampilan suara ataupun visual maka inilah yang menjadi Latar Belakang terbentuknya “KOPDAR LOVEBIRD INDONESIA” untuk menampung aspirasi Pengiat Lovebird di Indonesia.</p>
                        </div>
                        <div class="col-md-6 ">
                            <div class="image-stack">
                                <img src="{{ asset('Frontend/img/wwa.jpg') }}" alt="Event Image 1">
                                <!--                <img src="../../../assets/img/logo_lovedbird.jpg" alt="Event Image 2">-->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--end::Content-->
    </div>
@endsection
