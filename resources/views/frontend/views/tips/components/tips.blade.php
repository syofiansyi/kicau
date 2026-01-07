<div class="row p-10">
    @foreach ($tips as $tip)
        <div class="col-lg-3 col-md-6 col-sm-12 mb-4 d-flex">

            <a href="{{ route('tips.detail', $tip->id) }}"
               class="text-decoration-none text-dark w-100">

                <div
                    class="shadow-sm"
                    style="
                        height: 100%;
                        display: flex;
                        flex-direction: column;
                        transition: transform .3s ease, box-shadow .3s ease;
                    "
                    onmouseover="this.style.transform='translateY(-4px)'; this.style.boxShadow='0 10px 25px rgba(0,0,0,.15)'"
                    onmouseout="this.style.transform='translateY(0)'; this.style.boxShadow=''"
                >

                    <!-- Image -->
                    <div style="height:180px; overflow:hidden;">
                        <img
                            src="{{ asset('Upload/tips/' . $tip->photo) }}"
                            alt="{{ $tip->title }}"
                            style="
                                width:100%;
                                height:100%;
                                object-fit:cover;
                            "
                        >
                    </div>

                    <!-- Content -->
                    <div
                        style="
                            flex:1;
                            padding:16px;
                            display:flex;
                            flex-direction:column;
                            justify-content:space-between;
                        "
                    >
                        <h6 style="font-weight:600; margin-bottom:12px;">
                            {{ Str::limit($tip->title, 60) }}
                        </h6>

                        <span
                            class="btn btn-sm btn-dark"
                            style="align-self:flex-start;"
                        >
                            Detail Tips
                        </span>
                    </div>

                </div>

            </a>
        </div>
    @endforeach
</div>

<div class="d-flex justify-content-center mt-4">
    {!! $tips->links('pagination::bootstrap-5') !!}
</div>
