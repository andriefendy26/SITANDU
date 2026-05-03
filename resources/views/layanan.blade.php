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
        margin: 0 auto 2rem;
    }
    .hero-search-wrap {
        max-width: 480px;
        margin: 0 auto;
        position: relative;
    }
    .hero-search-wrap input {
        width: 100%;
        height: 48px;
        padding: 0 48px 0 18px;
        border-radius: 30px;
        border: none;
        font-family: var(--font-body);
        font-size: 14px;
        background: rgba(255,255,255,0.15);
        backdrop-filter: blur(8px);
        color: var(--white);
        outline: none;
        border: 1.5px solid rgba(255,255,255,0.3);
        transition: background 0.2s, border-color 0.2s;
    }
    .hero-search-wrap input::placeholder { color: rgba(255,255,255,0.6); }
    .hero-search-wrap input:focus {
        background: rgba(255,255,255,0.22);
        border-color: rgba(255,255,255,0.6);
    }
    .hero-search-wrap svg {
        position: absolute;
        right: 16px;
        top: 50%;
        transform: translateY(-50%);
        width: 18px; height: 18px;
        stroke: rgba(255,255,255,0.7);
    }

    /* ── FILTER BAR ── */
    .filter-bar {
        background: var(--white);
        border-bottom: 1px solid var(--border);
        padding: 1rem 2rem;
        /* position: sticky; */
        top: 68px;
        z-index: 99;
        box-shadow: var(--shadow-sm);
    }
    .filter-bar-inner {
        max-width: 1200px;
        margin: 0 auto;
        display: flex;
        align-items: center;
        gap: 1rem;
        flex-wrap: wrap;
    }
    .filter-label {
        font-size: 12px;
        font-weight: 600;
        color: var(--text-muted);
        text-transform: uppercase;
        letter-spacing: 0.06em;
        white-space: nowrap;
    }
    .filter-pills {
        display: flex;
        gap: 0.5rem;
        flex-wrap: wrap;
    }
    .filter-pill {
        display: inline-block;
        padding: 6px 14px;
        border-radius: 20px;
        font-size: 13px;
        font-weight: 500;
        border: 1.5px solid var(--border);
        color: var(--text-mid);
        background: var(--white);
        cursor: pointer;
        text-decoration: none;
        transition: all 0.2s;
    }
    .filter-pill:hover,
    .filter-pill.active {
        background: var(--primary);
        border-color: var(--primary);
        color: var(--white);
    }
    .filter-count {
        margin-left: auto;
        font-size: 13px;
        color: var(--text-muted);
        white-space: nowrap;
    }
    .filter-count span { font-weight: 600; color: var(--primary); }

    /* ── LAYANAN SECTION ── */
    .layanan-section {
        background: var(--surface);
        padding: 3.5rem 2rem 5rem;
    }
    .layanan-section-inner {
        max-width: 1200px;
        margin: 0 auto;
    }

    /* GROUPED BY KATEGORI */
    .layanan-group {
        margin-bottom: 3.5rem;
    }
    .layanan-group-header {
        display: flex;
        align-items: center;
        gap: 12px;
        margin-bottom: 1.5rem;
        padding-bottom: 0.875rem;
        border-bottom: 2px solid var(--border);
    }
    .layanan-group-dot {
        width: 10px; height: 10px;
        border-radius: 50%;
        background: var(--primary);
        flex-shrink: 0;
    }
    .layanan-group-title {
        font-family: var(--font-display);
        font-size: 1.2rem;
        font-weight: 700;
        color: var(--primary-dark);
    }
    .layanan-group-count {
        margin-left: auto;
        font-size: 12px;
        color: var(--text-muted);
        background: var(--surface-dark);
        padding: 3px 10px;
        border-radius: 12px;
        font-weight: 500;
    }

    .layanan-grid {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: 1.25rem;
    }
    @media (max-width: 900px) { .layanan-grid { grid-template-columns: repeat(2,1fr); } }
    @media (max-width: 580px) { .layanan-grid { grid-template-columns: 1fr; } }

    /* CARD — reuse template's exact style */
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

    /* Icon color variants per kategori */
    .layanan-card:nth-child(3n+1) .layanan-icon { background: #EEF3FF; }
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
    .layanan-link {
        display: inline-flex;
        align-items: center;
        gap: 6px;
        font-size: 13px;
        font-weight: 600;
        color: var(--primary);
        text-decoration: none;
        letter-spacing: 0.02em;
        transition: gap 0.2s;
        margin-top: auto;
    }
    .layanan-link:hover { gap: 10px; }
    .layanan-link svg { width: 14px; height: 14px; stroke: currentColor; }

    /* ── SINGLE PAGE VIEW (when no grouping) ── */
    .layanan-flat-grid {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: 1.25rem;
    }
    @media (max-width: 900px) { .layanan-flat-grid { grid-template-columns: repeat(2,1fr); } }
    @media (max-width: 580px) { .layanan-flat-grid { grid-template-columns: 1fr; } }

    /* ── EMPTY STATE ── */
    .empty-state {
        text-align: center;
        padding: 5rem 2rem;
        color: var(--text-muted);
    }
    .empty-state svg { width: 56px; height: 56px; margin: 0 auto 1rem; opacity: 0.3; }
    .empty-state p { font-size: 15px; }

    /* ── PAGINATION ── */
    .pagination-wrap {
        display: flex;
        justify-content: center;
        margin-top: 3rem;
    }
    .pagination-wrap .pagination { display: flex; gap: 6px; }
    .pagination-wrap .page-item .page-link {
        display: flex;
        align-items: center;
        justify-content: center;
        width: 36px; height: 36px;
        border-radius: var(--radius);
        border: 1.5px solid var(--border);
        font-size: 13px;
        font-weight: 500;
        color: var(--text-mid);
        text-decoration: none;
        transition: all 0.2s;
    }
    .pagination-wrap .page-item.active .page-link,
    .pagination-wrap .page-item .page-link:hover {
        background: var(--primary);
        border-color: var(--primary);
        color: var(--white);
    }
    .pagination-wrap .page-item.disabled .page-link {
        opacity: 0.4;
        pointer-events: none;
    }
</style>

{{-- PAGE HERO --}}
<div class="page-hero">
    <div class="page-hero-label">
        <svg viewBox="0 0 16 16" width="12" height="12" fill="currentColor">
            <path d="M8 1a7 7 0 100 14A7 7 0 008 1zM0 8a8 8 0 1116 0A8 8 0 010 8zm9 3H7V7h2v4zm0-5H7V4h2v2z"/>
        </svg>
        Informasi Layanan
    </div>
    <h1>Layanan Publik OPD</h1>
    <p>Panduan lengkap prosedur, persyaratan, dan informasi layanan yang disediakan untuk masyarakat.</p>

    <form method="GET" action="{{ route('layanan.index') }}" class="hero-search-wrap">
        @if(request('kategori'))
            <input type="hidden" name="kategori" value="{{ request('kategori') }}">
        @endif
        <input type="text" name="search" placeholder="Cari layanan yang Anda butuhkan…" value="{{ request('search') }}">
        <svg viewBox="0 0 24 24" fill="none" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
            <circle cx="11" cy="11" r="8"/><line x1="21" y1="21" x2="16.65" y2="16.65"/>
        </svg>
    </form>
</div>

{{-- FILTER BAR --}}
<div class="filter-bar">
    <div class="filter-bar-inner">
        <span class="filter-label">Kategori:</span>
        <div class="filter-pills">
            <a href="{{ route('layanan.index', request()->except('kategori')) }}"
               class="filter-pill {{ !request('kategori') ? 'active' : '' }}">Semua</a>
            @foreach($kategoris as $kategori)
                <a href="{{ route('layanan.index', array_merge(request()->except('kategori'), ['kategori' => $kategori->id])) }}"
                   class="filter-pill {{ request('kategori') == $kategori->id ? 'active' : '' }}">
                    {{ $kategori->name }}
                    <span style="opacity:0.6;font-size:10px;margin-left:2px">({{ $kategori->informasiLayanan->count() }})</span>
                </a>
            @endforeach
        </div>
        <span class="filter-count">
            <span>{{ $layanans->total() }}</span> layanan ditemukan
        </span>
    </div>
</div>

{{-- LAYANAN LIST --}}
<section class="layanan-section">
    <div class="layanan-section-inner">

        @if($layanans->count() > 0)

            {{-- If filtered by kategori or search → flat grid with pagination --}}
            @if(request('kategori') || request('search'))
                <div class="layanan-flat-grid">
                    @foreach($layanans as $layanan)
                    <div class="layanan-card">
                        <div class="layanan-icon">
                            <svg viewBox="0 0 24 24">
                                <path d="M9 11l3 3L22 4M21 12v7a2 2 0 01-2 2H5a2 2 0 01-2-2V5a2 2 0 012-2h11"/>
                            </svg>
                        </div>
                        <h3>{{ $layanan->title }}</h3>
                        <p>{{ Str::limit(strip_tags($layanan->content), 130) }}</p>
                        <a href="{{ route('layanan.show', $layanan->id) }}" class="layanan-link">
                            Selengkapnya
                            <svg viewBox="0 0 24 24" fill="none" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <line x1="5" y1="12" x2="19" y2="12"/><polyline points="12 5 19 12 12 19"/>
                            </svg>
                        </a>
                    </div>
                    @endforeach
                </div>

                <div class="pagination-wrap">
                    {{ $layanans->appends(request()->query())->links() }}
                </div>

            {{-- Default → grouped by kategori --}}
            @else
                @foreach($kategoris as $kategori)
                    @if($kategori->informasiLayanan->count() > 0)
                    <div class="layanan-group">
                        <div class="layanan-group-header">
                            <div class="layanan-group-dot"></div>
                            <span class="layanan-group-title">{{ $kategori->name }}</span>
                            <span class="layanan-group-count">{{ $kategori->informasiLayanan->count() }} layanan</span>
                        </div>
                        <div class="layanan-grid">
                            @foreach($kategori->informasiLayanan->take(6) as $layanan)
                            <div class="layanan-card">
                                <div class="layanan-icon">
                                    <svg viewBox="0 0 24 24">
                                        <path d="M9 11l3 3L22 4M21 12v7a2 2 0 01-2 2H5a2 2 0 01-2-2V5a2 2 0 012-2h11"/>
                                    </svg>
                                </div>
                                <h3>{{ $layanan->title }}</h3>
                                <p>{{ Str::limit(strip_tags($layanan->content), 130) }}</p>
                                <a href="{{ route('layanan.show', $layanan->id) }}" class="layanan-link">
                                    Selengkapnya →
                                </a>
                            </div>
                            @endforeach
                        </div>

                        @if($kategori->informasiLayanan->count() > 6)
                        <div style="text-align:center; margin-top:1.25rem;">
                            <a href="{{ route('layanan.index', ['kategori' => $kategori->id]) }}"
                               style="display:inline-flex;align-items:center;gap:6px;font-size:13px;font-weight:600;color:var(--primary);text-decoration:none;">
                                Lihat semua {{ $kategori->informasiLayanan->count() }} layanan {{ $kategori->name }}
                                <svg viewBox="0 0 24 24" width="14" height="14" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="5" y1="12" x2="19" y2="12"/><polyline points="12 5 19 12 12 19"/></svg>
                            </a>
                        </div>
                        @endif
                    </div>
                    @endif
                @endforeach
            @endif

        @else
            <div class="empty-state">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                    <circle cx="12" cy="12" r="10"/><line x1="12" y1="8" x2="12" y2="12"/><line x1="12" y1="16" x2="12.01" y2="16"/>
                </svg>
                <p>Belum ada layanan yang tersedia{{ request('search') ? ' untuk pencarian "' . request('search') . '"' : '' }}.</p>
            </div>
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