 <div class="d-flex justify-content-center mb-4 sm:px-6 md:px-10 lg:px-20 ">
     <form method="GET" action="{{ route('artikel_berita') }}" style="width: 100%;">
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

             <input type="text" name="search" class="form-control "
                 placeholder="Cari di Kopdar Loverbird Indonesia ....." value="{{ request('search') }}"
                 aria-label="Cari Pertandingan"
                 style="
          border: none;
          border-radius: 0;
          border-top-right-radius: 25px;
          border-bottom-right-radius: 25px;
        " />
         </div>
     </form>
 </div>
