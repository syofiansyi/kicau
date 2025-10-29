<div id="kt_carousel_1_carousel" class="carousel carousel-custom slide" data-bs-ride="carousel" data-bs-interval="8000">
    <!--begin::Carousel-->
    <div class="carousel-inner">
        @foreach($Hotnews as $index => $hotnew)
            <!--begin::Item-->
            <div class="carousel-item {{ $index == 0 ? 'active' : '' }}">
                <div class="featured-post">
                    <!-- Ensure you have a proper image URL stored in your $hotnew object -->
                    <a href="{{ route('detail_berita', [$hotnew->id,$hotnew->slug]) }}">
                        <img src="{{ asset('Upload/news/' . $hotnew->photo) }}" alt="Featured Post Image" class="img-box" />
                    </a>

                    <div class="featured-overlay">
                        <h5 class="featured-title">{{ $hotnew->title }}</h5>
                    </div>
                </div>
            </div>
            <!--end::Item-->
        @endforeach
    </div>
    <!--end::Carousel-->

    <!--begin::Heading-->
    <div class="d-flex align-items-center justify-content-center flex-wrap">
        <!--begin::Carousel Indicators-->
        <ol class="p-0 m-0 carousel-indicators carousel-indicators-bullet carousel-indicators-active-primary">
            @foreach($Hotnews as $index => $hotnew)
                <li data-bs-target="#kt_carousel_1_carousel" data-bs-slide-to="{{ $index }}" class="ms-1 {{ $index == 0 ? 'active' : '' }}"></li>
            @endforeach
        </ol>
        <!--end::Carousel Indicators-->
    </div>
    <!--end::Heading-->
</div>
