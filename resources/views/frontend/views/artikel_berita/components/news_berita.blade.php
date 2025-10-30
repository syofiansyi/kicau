<div class=" mt-4">
    <h3 class="fw-bold">Lates News</h3>
    <div class="d-flex justify-content-center mt-6">
    <form method="GET" action="{{ route('artikel_berita') }}" style="width: 100%;">
       <div class="input-group ">
  <span
    class="input-group-text bg-white"
    style="border-right: none; padding-left: 1.5rem; padding-right: 0rem;"
  >
    <i class="fa fa-search"></i>
  </span>
  <input
    type="text"
    name="search"
    class="form-control shadow-gray-100"
    placeholder="Cari di Kopdar Loverbird Indonesia ....."
    value="{{ request('search') }}"
    aria-label="Cari Pertandingan"
    style="border-left: none;"
  />
</div>
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
