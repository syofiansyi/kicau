<div class=" mt-4">
    <h3 class="fw-bold">Lates News</h3>
    <div class="d-flex justify-content-center mb-4">
    <form method="GET" action="{{ route('artikel_berita') }}" style="width: 100%;">
        <div class="input-group">
            <input
                type="text"
                name="search"
                class="form-control"
                placeholder="Cari berita..."
                value="{{ request('search') }}"
                aria-label="Cari berita"
            />
            <button class="btn btn-primary" type="submit">  <i class="fa fa-search"></i>
</button>
        </div>
    </form>
</div>
    <div class="row">
        @foreach ($news as $berita)
        <div class="col-md-6 col-lg-3 mb-4">
            <a class="news-card" href="{{ route('detail_berita', [$berita->id,$berita->slug]) }}">
                <img src="{{ asset('Upload/news/' . $berita->photo) }}" class="news-image" alt="News Image" />
                <div class="news-content">
                    <h5 class="news-title-all"> {{$berita->title}}</h5>
                    <p class="news-description-all" v-html="truncateHtml(news.detailBerita , 32)"></p>
                    <p class="news-description-all" >
                    </p>
                    @php
                        $plainText = strip_tags($berita->description); // Hilangkan tag HTML
                        $words = explode(' ', $plainText);             // Pisahkan jadi array kata
                        $excerpt = implode(' ', array_slice($words, 0, 10)); // Ambil 30 kata pertama
                    @endphp

                    <p  class="news-date">{{ $excerpt }}{{ count($words) > 10 ? '...' : '' }}</p>
                    <p class="news-date">{{ $berita->tanggal }}</p>
                </div>
            </a>
        </div>
        @endforeach
    </div>
    <div class="d-flex justify-content-center mt-4">
        {!! $news->links('pagination::bootstrap-5') !!}
    </div>
</div>
