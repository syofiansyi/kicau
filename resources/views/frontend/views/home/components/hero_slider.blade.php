<div id="kt_carousel_1_carousel" class="carousel carousel-custom slide" data-bs-ride="carousel" data-bs-interval="8000">
    <!--begin::Carousel-->
    <div class="carousel-inner">
        @foreach ($sliders as $index => $slider)
            <div class="carousel-item {{ $index == 0 ? 'active' : '' }}">
                <div class="featured-post">
                    <img src="{{ asset('Upload/slider/' . $slider->photo) }}" alt="Featured Post Image" class="img-box" />
                </div>
            </div>
        @endforeach
    </div>
    <!--end::Carousel-->

    <!--begin::Heading-->
    <div class="d-flex align-items-center justify-content-center flex-wrap">
        <!--begin::Carousel Indicators-->
        <ol class="p-0 m-0 carousel-indicators carousel-indicators-bullet carousel-indicators-active-primary">
            @foreach ($sliders as $index => $slider)
                <li data-bs-target="#kt_carousel_1_carousel" data-bs-slide-to="{{ $index }}" class="ms-1 {{ $index == 0 ? 'active' : '' }}"></li>
            @endforeach
        </ol>
        <!--end::Carousel Indicators-->
    </div>
    <!--end::Heading-->
</div>
