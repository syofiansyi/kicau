@extends('frontend.includes.index')

@section('title')
    {{ $produk->title ?? 'produk' }} - LovedBird Indonesia
@endsection

@push('addon-style')
    <link href="{{ asset('Frontend/css/custome.css') }}" rel="stylesheet" type="text/css" />
    <style>
        .produk-image {
            max-height: 400px;
            object-fit: cover;
            transition: transform 0.3s ease;
        }
        
        .produk-image:hover {
            transform: scale(1.02);
        }
        
        .produk-info-item {
            display: flex;
            align-items: center;
            margin-bottom: 0.5rem;
            color: #6c757d;
        }
        
        .produk-info-item i {
            width: 20px;
            margin-right: 10px;
            color: #00b074;
        }
        
        .price-tag {
            font-size: 1.5rem;
            color: #00b074;
            font-weight: bold;
        }
        
        @media (max-width: 768px) {
            .produk-detail-container {
                flex-direction: column;
            }
            
            .produk-image-container {
                margin-right: 0;
                margin-bottom: 1.5rem;
            }
        }
    </style>
@endpush

@section('meta')
    <meta property="og:type" content="article">
    <meta property="og:title" content="{{ $produk->title ?? 'produk LovedBird Indonesia' }}">
    <meta property="og:description" content="{{ Str::limit(strip_tags($produk->description ?? ''), 150) }}">
    <meta property="og:image" content="{{ $produk->photo ? asset('Upload/produk/' . $produk->photo) : asset('Frontend/img/logo.png') }}">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:site_name" content="LovedBird Indonesia">
    <meta name="twitter:card" content="summary_large_image">
@endsection

@section('main')
    <div class="flex min-h-screen w-full">
        <!-- Konten Utama -->
        <div class="flex-shrink-0 w-full lg:w-4/5">
            <div class="d-flex flex-column flex-column-fluid">
                <!-- Toolbar -->
                <div id="kt_app_toolbar" class="app-toolbar py-3 py-lg-6">
                    <div id="kt_app_toolbar_container" class="app-container container-fluid d-flex flex-stack">
                        <!-- Page Title -->
                        <div class="page-title d-flex flex-column justify-content-center flex-wrap me-3">
                           
                            <h1 class="page-heading d-flex text-gray-900 fw-bold fs-3 flex-column justify-content-center my-0">
                                {{ $produk->title ?? 'Detail produk' }}
                            </h1>
                        </div>
                    </div>
                </div>

                <!-- Content -->
                <div id="kt_app_content" class="app-content flex-column-fluid">
                    <div class="app-container container-fluid">
                        <!-- produk Detail -->
                        <div class="container-fluid">
                            <!-- Gambar dan Deskripsi -->
                            <div class="d-flex flex-column flex-lg-row align-items-start pt-4 produk-detail-container">
                                <!-- Gambar -->
                                <div class="m-4 mb-lg-0 me-lg-5 flex-shrink-0 produk-image-container" style="max-width: 500px;">
                                    <img 
                                        src="{{ asset('Upload/produk/' . ($produk->photo ?? 'default.jpg')) }}" 
                                        alt="{{ $produk->title ?? 'Gambar produk' }}"
                                        class="img-fluid rounded shadow w-100 produk-image"
                                        onerror="this.src='{{ asset('Frontend/img/default-produk.jpg') }}'"
                                    />
                                </div>

                                <!-- Deskripsi -->
                                <div class="flex-grow-1">
                                    <div class="text-description mb-4" style="text-align: justify; line-height: 1.8;">
                                        @if(isset($produk->description) && !empty($produk->description))
                                            {!! $produk->description !!}
                                        @else
                                            <div class="alert alert-info">
                                                <i class="fas fa-info-circle me-2"></i>
                                                Deskripsi produk akan segera diupdate.
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>

                            <!-- Detail Informasi produk -->
                            <div class="card mt-4 shadow-sm border-0">
                                <div class="card-body p-4">
                                    <div class="row">
                                        <!-- Informasi produk -->
                                        <div class="col-lg-8">
                                            <h5 class="card-title fw-bold text-dark mb-4">
                                                <i class="fas fa-info-circle text-primary me-2"></i>
                                                Informasi produk
                                            </h5>
                                            
                                            <div class="row">
                                                <!-- Lokasi -->
                                                <div class="col-md-6 mb-3">
                                                    <div class="produk-info-item">
                                                        <i class="fas fa-map-marker-alt"></i>
                                                        <div>
                                                            <small class="text-muted">Lokasi</small>
                                                            <p class="mb-0 fw-semibold">
                                                                {{ $produk->lokasi ?? 'Lokasi belum ditentukan' }}
                                                            </p>
                                                        </div>
                                                    </div>
                                                </div>
                                                
                                                <!-- Tanggal -->
                                                <div class="col-md-6 mb-3">
                                                    <div class="produk-info-item">
                                                        <i class="fas fa-calendar-alt"></i>
                                                        <div>
                                                            <small class="text-muted">Tanggal</small>
                                                            <p class="mb-0 fw-semibold">
                                                                {{ $produk->tanggal ?? 'Tanggal belum ditentukan' }}
                                                            </p>
                                                        </div>
                                                    </div>
                                                </div>
                                                
                                                <!-- Waktu (jika ada) -->
                                                @if(isset($produk->waktu))
                                                <div class="col-md-6 mb-3">
                                                    <div class="produk-info-item">
                                                        <i class="fas fa-clock"></i>
                                                        <div>
                                                            <small class="text-muted">Waktu</small>
                                                            <p class="mb-0 fw-semibold">
                                                                {{ $produk->waktu }}
                                                            </p>
                                                        </div>
                                                    </div>
                                                </div>
                                                @endif
                                                
                                                <!-- Kuota (jika ada) -->
                                                @if(isset($produk->kuota))
                                                <div class="col-md-6 mb-3">
                                                    <div class="produk-info-item">
                                                        <i class="fas fa-users"></i>
                                                        <div>
                                                            <small class="text-muted">Kuota Peserta</small>
                                                            <p class="mb-0 fw-semibold">
                                                                {{ $produk->kuota }} orang
                                                            </p>
                                                        </div>
                                                    </div>
                                                </div>
                                                @endif
                                            </div>
                                        </div>
                                        
                                        <!-- Harga dan Aksi -->
                                        <div class="col-lg-4 border-start-lg">
                                            <div class="d-flex flex-column h-100 justify-content-between">
                                                <div>
                                                    <h6 class="text-muted mb-2">Harga Produk</h6>
                                                    <div class="price-tag mb-4">
                                                        Rp {{ number_format($produk->harga ?? 0, 0, ',', '.') }}
                                                    </div>
                                                </div>
                                                
                                                <!-- Tombol Aksi -->
                                                <div class="mt-3">
                                                    @if(isset($produk->link_pendaftaran))
                                                    <a href="{{ $produk->link_pendaftaran }}" 
                                                       target="_blank"
                                                       class="btn btn-success w-100 mb-2">
                                                        <i class="fas fa-ticket-alt me-2"></i>
                                                        Daftar Sekarang
                                                    </a>
                                                    @endif
                                                    
                                                   
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Sidebar Banner -->
        <div class="hidden lg:block lg:w-1/5">
            @include('components.banner')
        </div>
    </div>
@endsection