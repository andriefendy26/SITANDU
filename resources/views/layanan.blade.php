@extends('layouts.app')

@section('title', 'Layanan')

@section('content')

<style>
    /* ── PAGE HERO ── */
    .page-hero {
        background: linear-gradient(135deg, var(--primary-dark) 0%, var(--primary) 60%, var(--primary-light) 100%);
        padding: 7rem 2rem 4rem;
        text-align: center;
        position: relative;
        overflow: hidden;
    }
    .page-hero::before {
        content: '';
        position: absolute;
        inset: 0;
        background: url("data:image/svg+xml,%3Csvg width='60' height='60' viewBox='0 0 60 60' xmlns='http://www.w3.org/2000/svg'%3E%3Cg fill='none' fill-rule='evenodd'%3E%3Cg fill='%23ffffff' fill-opacity='0.04'%3E%3Cpath d='M36 34v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6 34v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6 4V0H4v4H0v2h4v4h2V6h4V4H6z'/%3E%3C/g%3E%3C/g%3E%3C/svg%3E");
    }
    .page-hero-label {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        background: rgba(200,146,42,0.2);
        border: 1px solid rgba(200,146,42,0.4);
        color: var(--accent-light);
        font-size: 11px;
        font-weight: 600;
        letter-spacing: 0.1em;
        text-transform: uppercase;
        padding: 6px 14px;
        border-radius: 20px;
        margin-bottom: 1.25rem;
    }
    .page-hero h1 {
        font-family: var(--font-display);
        font-size: clamp(2rem, 5vw, 3rem);
        font-weight: 700;
        color: var(--white);
        margin-bottom: 1rem;
        line-height: 1.2;
    }
    .page-hero p {
        font-size: 1.05rem;
        color: rgba(255,255,255,0.75);
        max-width: 560px;
        margin: 0 auto;
    }

    /* ── LAYANAN SECTION ── */
    .layanan-section {
        background: var(--surface);
        padding: 3.5rem 2rem 5rem;
    }
    .layanan-section-inner {
        max-width: 1200px;
        margin: 0 auto;
    }
    .section-header {
        display: flex;
        justify-content: space-between;
        align-items: flex-end;
        flex-wrap: wrap;
        gap: 1rem;
        margin-bottom: 2rem;
    }
    .section-label {
        font-size: 11px;
        font-weight: 600;
        letter-spacing: 0.1em;
        text-transform: uppercase;
        color: var(--primary);
        margin-bottom: 0.4rem;
    }
    .section-title {
        font-family: var(--font-display);
        font-size: clamp(1.5rem, 3vw, 2rem);
        font-weight: 700;
        color: var(--primary-dark);
        line-height: 1.25;
        margin: 0 0 0.4rem;
    }
    .section-desc {
        font-size: 14px;
        color: var(--text-muted);
        margin: 0;
    }
    .view-all {
        display: inline-flex;
        align-items: center;
        gap: 6px;
        font-size: 13px;
        font-weight: 600;
        color: var(--primary);
        text-decoration: none;
        white-space: nowrap;
        transition: gap 0.2s;
    }
    .view-all:hover { gap: 10px; }

    /* ── SEARCH BOX ── */
    .layanan-search {
        display: flex;
        align-items: center;
        gap: 8px;
        background: var(--white);
        border: 1px solid var(--border);
        border-radius: var(--radius-lg, 10px);
        padding: 0.6rem 1rem;
        max-width: 360px;
        width: 100%;
        box-shadow: var(--shadow-sm);
    }
    .layanan-search svg {
        width: 16px; height: 16px;
        stroke: var(--text-muted);
        flex-shrink: 0;
    }
    .layanan-search input {
        border: none;
        outline: none;
        flex: 1;
        font-size: 14px;
        color: var(--primary-dark);
        background: transparent;
    }
    .layanan-search input::placeholder { color: var(--text-muted); }
    .layanan-search button {
        background: var(--primary);
        color: var(--white);
        border: none;
        border-radius: 8px;
        padding: 0.45rem 0.9rem;
        font-size: 13px;
        font-weight: 600;
        cursor: pointer;
        flex-shrink: 0;
    }
    .layanan-search button:hover { background: var(--primary-dark); }
    .layanan-search-wrap {
        margin-bottom: 1.5rem;
    }

    /* ── GRID ── */
    .layanan-grid {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: 1.25rem;
    }
    @media (max-width: 900px) { .layanan-grid { grid-template-columns: repeat(2,1fr); } }
    @media (max-width: 580px) { .layanan-grid { grid-template-columns: 1fr; } }

    /* ── CARD ── */
    .layanan-card {
        background: var(--white);
        border-radius: var(--radius-lg);
        padding: 1.75rem;
        border: 1px solid var(--border);
        box-shadow: var(--shadow-sm);
        transition: transform 0.3s, box-shadow 0.3s;
        position: relative;
        overflow: hidden;
        display: flex;
        flex-direction: column;
        text-decoration: none;
        cursor: pointer;
    }
    .layanan-card::before {
        content: '';
        position: absolute;
        top: 0; left: 0; right: 0;
        height: 3px;
        background: var(--primary);
        transform: scaleX(0);
        transform-origin: left;
        transition: transform 0.3s;
    }
    .layanan-card:hover {
        transform: translateY(-6px);
        box-shadow: var(--shadow-md);
    }
    .layanan-card:hover::before { transform: scaleX(1); }

    .layanan-thumb {
        width: 100%;
        height: 150px;
        border-radius: 12px;
        overflow: hidden;
        margin-bottom: 1.25rem;
        background: #EEF3FF;
        flex-shrink: 0;
    }
    .layanan-thumb img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        display: block;
        transition: transform 0.3s;
    }
    .layanan-card:hover .layanan-thumb img {
        transform: scale(1.05);
    }

    .layanan-icon {
        width: 52px; height: 52px;
        border-radius: 12px;
        background: #EEF3FF;
        display: flex;
        align-items: center;
        justify-content: center;
        margin-bottom: 1.25rem;
        flex-shrink: 0;
    }
    .layanan-icon svg { width: 26px; height: 26px; fill: var(--primary); }

    .layanan-card:nth-child(3n+1) .layanan-icon { background: #EEF3FF; }
    .layanan-card:nth-child(3n+1) .layanan-icon svg { fill: var(--primary); }
    .layanan-card:nth-child(3n+2) .layanan-icon { background: #FFF8EE; }
    .layanan-card:nth-child(3n+2) .layanan-icon svg { fill: var(--accent); }
    .layanan-card:nth-child(3n+3) .layanan-icon { background: #F0FAF0; }
    .layanan-card:nth-child(3n+3) .layanan-icon svg { fill: #2E7D32; }

    .layanan-card h3 {
        font-size: 17px;
        font-weight: 600;
        color: var(--primary-dark);
        margin-bottom: 0.5rem;
        font-family: var(--font-display);
        line-height: 1.35;
    }
    .layanan-card p {
        font-size: 14px;
        color: var(--text-muted);
        line-height: 1.7;
        margin-bottom: 1.25rem;
        flex: 1;
        display: -webkit-box;
        -webkit-line-clamp: 3;
        -webkit-box-orient: vertical;
        overflow: hidden;
    }
    .layanan-badge {
        display: inline-flex;
        align-items: center;
        gap: 5px;
        font-size: 12px;
        font-weight: 600;
        color: var(--primary);
        margin-top: auto;
    }
    .layanan-badge svg { width: 13px; height: 13px; stroke: currentColor; }

    .layanan-link {
        display: inline-flex;
        align-items: center;
        gap: 6px;
        font-size: 13px;
        font-weight: 600;
        color: var(--primary);
        text-decoration: none;
        margin-top: auto;
        transition: gap 0.2s;
    }
    .layanan-link:hover { gap: 10px; }
    .layanan-link svg { width: 14px; height: 14px; stroke: currentColor; }

    /* ── EMPTY STATE ── */
    .empty-state {
        text-align: center;
        padding: 5rem 2rem;
        color: var(--text-muted);
    }
    .empty-state svg { width: 56px; height: 56px; margin: 0 auto 1rem; opacity: 0.3; }
    .empty-state p { font-size: 15px; }
</style>

{{-- PAGE HERO --}}
<div class="page-hero">
    <div class="page-hero-label">
        <svg viewBox="0 0 16 16" width="12" height="12" fill="currentColor">
            <path d="M8 1a7 7 0 100 14A7 7 0 008 1zM0 8a8 8 0 1116 0A8 8 0 010 8zm9 3H7V7h2v4zm0-5H7V4h2v2z"/>
        </svg>
        Informasi Posyandu
    </div>
    <h1>Layanan Posyandu</h1>
    <p>Panduan lengkap prosedur, persyaratan, dan informasi layanan yang disediakan untuk masyarakat.</p>
</div>

{{-- LAYANAN LIST --}}
{{-- <section class="layanan-section">
    <div class="layanan-section-inner">

        <div class="section-header">
            <div>
                <div class="section-label">Informasi Layanan</div>
                <h2 class="section-title">Layanan Publik<br>yang Kami Sediakan</h2>
                <p class="section-desc">Temukan berbagai informasi layanan yang disediakan untuk masyarakat.</p>
            </div>
        </div>

        @if($kategoris->count() > 0)
            <div class="layanan-grid">
                @foreach($kategoris as $kategori)
                    @if($kategori->informasiLayanan->count() > 0)
                    <a href="{{ route('layanan.index', ['kategori' => $kategori->id]) }}" class="layanan-card">
                        <div class="layanan-icon">
                            <svg viewBox="0 0 24 24">
                                <path d="M9 11l3 3L22 4M21 12v7a2 2 0 01-2 2H5a2 2 0 01-2-2V5a2 2 0 012-2h11"/>
                            </svg>
                        </div>
                        <h3>{{ $kategori->name }}</h3>
                        <p>{{ $kategori->deskripsi ?? 'Lihat berbagai layanan dalam kategori ini.' }}</p>
                        <span class="layanan-badge">
                            {{ $kategori->informasiLayanan->count() }} layanan tersedia
                            <svg viewBox="0 0 24 24" fill="none" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <line x1="5" y1="12" x2="19" y2="12"/><polyline points="12 5 19 12 12 19"/>
                            </svg>
                        </span>
                    </a>
                    @endif
                @endforeach
            </div>
        @else
            <div class="empty-state">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                    <circle cx="12" cy="12" r="10"/><line x1="12" y1="8" x2="12" y2="12"/><line x1="12" y1="16" x2="12.01" y2="16"/>
                </svg>
                <p>Belum ada kategori layanan yang tersedia.</p>
            </div>
        @endif

    </div>
</section> --}}

{{-- LAYANAN LIST --}}
<section class="layanan-section">
    <div class="layanan-section-inner">
        {{-- SEARCH FORM --}}
        <div class="layanan-search-wrap">
            <form action="{{ route('layanan.index') }}" method="GET" class="layanan-search">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <circle cx="11" cy="11" r="8"/>
                    <line x1="21" y1="21" x2="16.65" y2="16.65"/>
                </svg>
                <input
                    type="text"
                    name="search"
                    value="{{ request('search') }}"
                    placeholder="Cari layanan..."
                >
                @if(request('kategori'))
                    <input type="hidden" name="kategori" value="{{ request('kategori') }}">
                @endif
                <button type="submit">Cari</button>
            </form>
        </div>
        
        @if(isset($layanans))
            {{-- ✅ MODE: List layanan per kategori / search --}}
            <div class="section-header">
                <div>
                    <div class="section-label">Informasi Layanan</div>
                    <h2 class="section-title">
                        @if(request('kategori'))
                            {{ $kategoris->firstWhere('id', request('kategori'))?->name }}
                        @else
                            Hasil Pencarian
                        @endif
                    </h2>
                    <p class="section-desc">{{ $layanans->total() }} layanan ditemukan</p>
                </div>
                <a href="{{ route('layanan.index') }}" class="view-all">← Semua Kategori</a>
            </div>

            @if($layanans->count() > 0)
                <div class="layanan-grid">
                    @foreach($layanans as $layanan)
                    <a href="{{ route('layanan.show', $layanan->id) }}" class="layanan-card">
                        @if($layanan->image)
                            <div class="layanan-thumb">
                                <img src="{{ asset('storage/' . $layanan->image) }}" alt="{{ $layanan->title }}">
                            </div>
                        @else
                            <div class="layanan-icon">
                                <svg viewBox="0 0 24 24">
                                    <path d="M9 11l3 3L22 4M21 12v7a2 2 0 01-2 2H5a2 2 0 01-2-2V5a2 2 0 012-2h11"/>
                                </svg>
                            </div>
                        @endif
                        <h3>{{ $layanan->title }}</h3>
                        <p>{{ Str::limit(strip_tags($layanan->content), 120) }}</p>
                        <span class="layanan-link">
                            Selengkapnya
                            <svg viewBox="0 0 24 24" fill="none" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <line x1="5" y1="12" x2="19" y2="12"/><polyline points="12 5 19 12 12 19"/>
                            </svg>
                        </span>
                    </a>
                    @endforeach
                </div>

                <div style="display:flex;justify-content:center;margin-top:3rem;">
                    {{ $layanans->appends(request()->query())->links() }}
                </div>
            @else
                <div class="empty-state">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                        <circle cx="12" cy="12" r="10"/><line x1="12" y1="8" x2="12" y2="12"/><line x1="12" y1="16" x2="12.01" y2="16"/>
                    </svg>
                    <p>Belum ada layanan dalam kategori ini.</p>
                </div>
            @endif

        @else
            {{-- MODE: Grid kategori (default, sudah ada) --}}
            <div class="section-header">
                <div>
                    <div class="section-label">Informasi Layanan</div>
                    <h2 class="section-title">Layanan Publik<br>yang Kami Sediakan</h2>
                    <p class="section-desc">Temukan berbagai informasi layanan yang disediakan untuk masyarakat.</p>
                </div>
            </div>

            @if($kategoris->count() > 0)
                <div class="layanan-grid">
                    @foreach($kategoris as $kategori)
                        @if($kategori->informasiLayanan->count() > 0)
                        <a href="{{ route('layanan.index', ['kategori' => $kategori->id]) }}" class="layanan-card">
                            <div class="layanan-icon">
                                <svg viewBox="0 0 24 24">
                                    <path d="M9 11l3 3L22 4M21 12v7a2 2 0 01-2 2H5a2 2 0 01-2-2V5a2 2 0 012-2h11"/>
                                </svg>
                            </div>
                            <h3>{{ $kategori->name }}</h3>
                            <p>{{ $kategori->deskripsi ?? 'Lihat berbagai layanan dalam kategori ini.' }}</p>
                            <span class="layanan-badge">
                                {{ $kategori->informasiLayanan->count() }} layanan tersedia
                                <svg viewBox="0 0 24 24" fill="none" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <line x1="5" y1="12" x2="19" y2="12"/><polyline points="12 5 19 12 12 19"/>
                                </svg>
                            </span>
                        </a>
                        @endif
                    @endforeach
                </div>
            @else
                <div class="empty-state">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                        <circle cx="12" cy="12" r="10"/><line x1="12" y1="8" x2="12" y2="12"/><line x1="12" y1="16" x2="12.01" y2="16"/>
                    </svg>
                    <p>Belum ada kategori layanan yang tersedia.</p>
                </div>
            @endif
        @endif

    </div>
</section>




<script>
    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.style.opacity = '1';
                entry.target.style.transform = 'translateY(0)';
            }
        });
    }, { threshold: 0.08 });

    document.querySelectorAll('.layanan-card').forEach((card, i) => {
        card.style.opacity = '0';
        card.style.transform = 'translateY(20px)';
        card.style.transition = `opacity 0.45s ease ${i * 0.06}s, transform 0.45s ease ${i * 0.06}s, box-shadow 0.3s`;
        observer.observe(card);
    });
</script>

@endsection