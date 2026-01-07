 <div class="d-flex justify-content-center mb-4 sm:px-6 md:px-10 lg:px-20 ">
     <form method="GET" action="{{ route('home') }}" style="width: 100%;">
         <div class="input-group d-flex" style="
        width: 100%;
        
      ">
             <span class="bg-white"
                 style="
          border-right: none;
          padding-left: 1.5rem;
          padding-right: 0;
          border-top-left-radius: 25px;
          border-bottom-left-radius: 25px;
          display: flex;
          align-items: center;
          justify-content: center;
          flex-shrink: 0;
        ">
                 <i class="fa fa-search"></i>
             </span>

             <input type="search" name="search"
                 class="form-control border-0   px-4 py-2 rounded-none
  flex-grow basis-0 min-w-0 placeholder:text-xs sm:placeholder:text-sm md:placeholder:text-base"
                 placeholder="Cari di Kopdar Loverbird Indonesia ....." value="{{ request('search') }}"
                 aria-label="Cari Pertandingan" enterkeyhint="search" />

             <select name="filter" class="form-select"
                 style="
          border: none;
          border-left: none;
          border-top-right-radius: 25px;
          border-bottom-right-radius: 25px;
          flex-shrink: 0;
          flex-basis: 120px;
          max-width: 120px;
          min-width: 120px;
        ">
                 <option value="all" {{ request('filter') == 'all' ? 'selected' : '' }}>Semua</option>
                 <option value="news" {{ request('filter') == 'news' ? 'selected' : '' }}>Berita</option>
                 <option value="events" {{ request('filter') == 'events' ? 'selected' : '' }}>Event</option>
                 <option value="tips" {{ request('filter') == 'tips' ? 'selected' : '' }}>Tips & Trick</option>
             </select>
         </div>
     </form>
 </div>
