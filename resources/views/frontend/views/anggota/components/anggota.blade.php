<div class="anggota-section relative bg-gray-100 px-6 py-8 w-full min-h-screen">

    <!-- Heading dan Search -->
    <div class="mb-6">
        <div class="flex flex-col md:flex-row md:items-center justify-between gap-4">
            <div>
                <h1 class="text-2xl font-bold">Anggota KLI</h1>
                <h3 class="text-gray-500 text-sm font-light">Anggota Kopdar Lovebird Indonesia</h3>
            </div>

            <!-- Search Form -->
            <form method="GET" action="{{ url()->current() }}" class="w-full md:w-auto">
                <div class="relative">
                    <input type="text" name="search" placeholder="Cari anggota..." value="{{ request('search') }}"
                        class="w-full md:w-64 px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-red-800 focus:border-transparent">
                    <button type="submit"
                        class="absolute right-2 top-1/2 transform -translate-y-1/2 text-gray-500 hover:text-red-800">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                        </svg>
                    </button>
                </div>
            </form>
        </div>
    </div>

    <div class="mt-4">
        <div class="row mt-4">
            <div class="col-lg-12">
                <!-- Info Jumlah Data -->
                <div class="mb-4 text-sm text-gray-600">
                    Menampilkan {{ $anggota->firstItem() ?? 0 }} - {{ $anggota->lastItem() ?? 0 }} dari
                    {{ $anggota->total() }} anggota
                </div>

                <div class="scrollable-table overflow-x-auto bg-white rounded-lg shadow">
                    <table class="table table-bordered w-full text-black">
                        <thead class="bg-red-800 text-md font-bold text-white">
                            <tr class="align-middle">
                                <th class="px-3 py-3 w-12 text-center">No</th>
                                <th class="px-3 py-3">
                                    <div class="flex items-center justify-between">
                                        <span>Profile ID</span>
                                        <a href="{{ request()->fullUrlWithQuery(['sort' => 'nama_burung', 'direction' => request('direction') == 'asc' ? 'desc' : 'asc']) }}"
                                            class="text-white hover:text-gray-200">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none"
                                                viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M7 16V4m0 0L3 8m4-4l4 4m6 0v12m0 0l4-4m-4 4l-4-4" />
                                            </svg>
                                        </a>
                                    </div>
                                </th>
                                <th class="px-3 py-3">Nama Anggota</th>
                                <th class="px-3 py-3">Alamat Anggota</th>
                            </tr>
                        </thead>

                        <tbody>
                            @forelse ($anggota as $item)
                                <tr class="hover:bg-gray-50 transition">
                                    <td class="px-3 py-2 text-center">
                                        {{ ($anggota->currentPage() - 1) * $anggota->perPage() + $loop->iteration }}
                                    </td>

                                    <td class="px-3 py-2">
                                        <div class="flex items-center gap-3">
                                            <img src="{{ asset('Upload/anggota/' . $item->photo) }}" alt="Foto Anggota"
                                                class="w-[50px] h-[50px] object-cover rounded-md ring-1 ring-gray-300"
                                                loading="lazy"
                                                onerror="this.onerror=null;this.src='{{ asset('images/default-avatar.png') }}';">
                                            <span class="font-medium whitespace-nowrap">
                                                {{ $item->nama_burung }}
                                            </span>
                                        </div>
                                    </td>

                                    <td class="px-3 py-2 font-medium">
                                        {{ $item->nama_pemilik }}
                                    </td>

                                    <td class="px-3 py-2">
                                        {{ $item->alamat }}
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="4" class="px-3 py-4 text-center text-gray-500">
                                        Tidak ada data anggota ditemukan.
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                <!-- Pagination Bootstrap -->
                @if ($anggota->hasPages())
                    <div class="mt-4">

                        {{-- Desktop --}}
                        <div class="d-none d-md-block">
                            {!! $anggota->withQueryString()->links('pagination::bootstrap-5') !!}
                        </div>

                        {{-- Mobile --}}
                        <div class="d-block d-md-none">
                            <nav aria-label="Page navigation">
                                <ul class="pagination flex flex-wrap justify-center items-center gap-1">
                                    {{-- Previous Page Link --}}
                                    @if ($anggota->onFirstPage())
                                        <li class="page-item disabled">
                                            <span
                                                class="page-link px-3 py-2 text-sm rounded-md bg-gray-100 text-gray-400 border border-gray-300">
                                                &laquo;
                                            </span>
                                        </li>
                                    @else
                                        <li class="page-item">
                                            <a class="page-link px-3 py-2 text-sm rounded-md bg-white text-red-800 border border-red-300 hover:bg-red-50 transition-colors"
                                                href="{{ $anggota->previousPageUrl() }}" aria-label="Previous">
                                                &laquo;
                                            </a>
                                        </li>
                                    @endif

                                    {{-- Pagination Elements --}}
                                    @php
                                        $current = $anggota->currentPage();
                                        $last = $anggota->lastPage();
                                        $start = max($current - 1, 1);
                                        $end = min($current + 1, $last);

                                        if ($start == 1) {
                                            $end = min(3, $last);
                                        }
                                        if ($end == $last) {
                                            $start = max($last - 2, 1);
                                        }
                                    @endphp

                                    {{-- First Page --}}
                                    @if ($start > 1)
                                        <li class="page-item">
                                            <a class="page-link px-3 py-2 text-sm rounded-md bg-white text-red-800 border border-red-300 hover:bg-red-50 transition-colors"
                                                href="{{ $anggota->url(1) }}">
                                                1
                                            </a>
                                        </li>
                                        @if ($start > 2)
                                            <li class="page-item disabled">
                                                <span class="page-link px-2 py-2 text-gray-400">...</span>
                                            </li>
                                        @endif
                                    @endif

                                    {{-- Page Numbers --}}
                                    @for ($page = $start; $page <= $end; $page++)
                                        @if ($page == $current)
                                            <li class="page-item active">
                                                <span
                                                    class="page-link px-3 py-2 text-sm rounded-md bg-red-800 text-white border border-red-800">
                                                    {{ $page }}
                                                </span>
                                            </li>
                                        @else
                                            <li class="page-item">
                                                <a class="page-link px-3 py-2 text-sm rounded-md bg-white text-red-800 border border-red-300 hover:bg-red-50 transition-colors"
                                                    href="{{ $anggota->url($page) }}">
                                                    {{ $page }}
                                                </a>
                                            </li>
                                        @endif
                                    @endfor

                                    {{-- Last Page --}}
                                    @if ($end < $last)
                                        @if ($end < $last - 1)
                                            <li class="page-item disabled">
                                                <span class="page-link px-2 py-2 text-gray-400">...</span>
                                            </li>
                                        @endif
                                        <li class="page-item">
                                            <a class="page-link px-3 py-2 text-sm rounded-md bg-white text-red-800 border border-red-300 hover:bg-red-50 transition-colors"
                                                href="{{ $anggota->url($last) }}">
                                                {{ $last }}
                                            </a>
                                        </li>
                                    @endif

                                    {{-- Next Page Link --}}
                                    @if ($anggota->hasMorePages())
                                        <li class="page-item">
                                            <a class="page-link px-3 py-2 text-sm rounded-md bg-white text-red-800 border border-red-300 hover:bg-red-50 transition-colors"
                                                href="{{ $anggota->nextPageUrl() }}" aria-label="Next">
                                                &raquo;
                                            </a>
                                        </li>
                                    @else
                                        <li class="page-item disabled">
                                            <span
                                                class="page-link px-3 py-2 text-sm rounded-md bg-gray-100 text-gray-400 border border-gray-300">
                                                &raquo;
                                            </span>
                                        </li>
                                    @endif
                                </ul>
                            </nav>
                        </div>

                    </div>
                @endif
            </div>
        </div>
    </div>
</div>

<style>
    .scrollable-table {
        overflow-x: auto;
        border-radius: 8px;
    }

    .table {
        min-width: 800px;
    }

    .table thead th {
        position: sticky;
        top: 0;
        background-color: #991b1b;
        z-index: 10;
    }

    .table tbody tr:last-child td {
        border-bottom: none;
    }

    /* Custom Pagination Styles for Mobile */
    .pagination {
        display: flex;
        flex-wrap: wrap;
        justify-content: center;
        gap: 4px;
        margin: 20px 0;
    }

    .page-link {
        min-width: 36px;
        height: 36px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 14px;
        font-weight: 500;
        transition: all 0.2s ease;
    }

    .page-item.active .page-link {
        background-color: #991b1b;
        color: white;
        border-color: #991b1b;
        box-shadow: 0 2px 4px rgba(153, 27, 27, 0.2);
    }

    .page-item:not(.active) .page-link:hover {
        background-color: #fef2f2;
        transform: translateY(-1px);
    }

    .page-item.disabled .page-link {
        cursor: not-allowed;
        opacity: 0.6;
    }

    /* Search Input */
    input[name="search"] {
        transition: all 0.3s;
    }

    input[name="search"]:focus {
        box-shadow: 0 0 0 3px rgba(153, 27, 27, 0.1);
    }

    /* Responsive */
    @media (max-width: 640px) {
        .flex-col.md\:flex-row {
            flex-direction: column;
            align-items: stretch !important;
        }

        input[name="search"] {
            width: 100% !important;
        }

        .pagination {
            gap: 3px;
        }

        .page-link {
            min-width: 32px;
            height: 32px;
            font-size: 13px;
            padding: 0 8px;
        }
    }

    @media (max-width: 380px) {
        .pagination {
            gap: 2px;
        }

        .page-link {
            min-width: 28px;
            height: 28px;
            font-size: 12px;
            padding: 0 6px;
        }
    }
</style>
