<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Pemerintah Daerah -</title>
</head>
<body>
@extends('layouts.app')

@section('title', 'Artikel')

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

    /* ── FILTER BAR ── */
    .filter-bar {
        background: var(--white);
        border-bottom: 1px solid var(--border);
        padding: 1rem 2rem;
        position: sticky;
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
    .filter-search {
        margin-left: auto;
        position: relative;
    }
    .filter-search input {
        height: 36px;
        padding: 0 36px 0 14px;
        border: 1.5px solid var(--border);
        border-radius: 20px;
        font-family: var(--font-body);
        font-size: 13px;
        color: var(--text-dark);
        background: var(--surface);
        outline: none;
        width: 220px;
        transition: border-color 0.2s;
    }
    .filter-search input:focus { border-color: var(--primary); }
    .filter-search svg {
        position: absolute;
        right: 12px;
        top: 50%;
        transform: translateY(-50%);
        width: 15px;
        height: 15px;
        stroke: var(--text-muted);
    }

    /* ── ARTIKEL SECTION ── */
    .artikel-section {
        background: var(--surface);
        padding: 3.5rem 2rem 5rem;
    }
    .artikel-section-inner {
        max-width: 1200px;
        margin: 0 auto;
    }
    .artikel-count {
        font-size: 13px;
        color: var(--text-muted);
        margin-bottom: 2rem;
    }
    .artikel-count span { font-weight: 600; color: var(--primary); }

    /* FEATURED (first article bigger) */
    .artikel-featured {
        display: grid;
        grid-template-columns: 1.4fr 1fr;
        gap: 1.5rem;
        margin-bottom: 1.5rem;
    }
    @media (max-width: 768px) { .artikel-featured { grid-template-columns: 1fr; } }

    .artikel-grid {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: 1.5rem;
    }
    @media (max-width: 900px) { .artikel-grid { grid-template-columns: repeat(2,1fr); } }
    @media (max-width: 580px) { .artikel-grid { grid-template-columns: 1fr; } }

    /* CARD */
    .artikel-card {
        background: var(--white);
        border: 1px solid var(--border);
        border-radius: var(--radius-lg);
        overflow: hidden;
        display: flex;
        flex-direction: column;
        transition: box-shadow 0.3s, transform 0.3s;
    }
    .artikel-card:hover {
        box-shadow: var(--shadow-md);
        transform: translateY(-4px);
    }
    /* Featured card horizontal layout */
    .artikel-card.featured-main {
        flex-direction: row;
        align-items: stretch;
    }
    .artikel-card.featured-main .artikel-thumb {
        width: 45%;
        height: auto;
        border-radius: 0;
        flex-shrink: 0;
    }
    .artikel-card.featured-main .artikel-body {
        display: flex;
        flex-direction: column;
        justify-content: center;
        padding: 2rem;
    }
    .artikel-card.featured-main h3 { font-size: 1.35rem; }
    @media (max-width: 768px) {
        .artikel-card.featured-main { flex-direction: column; }
        .artikel-card.featured-main .artikel-thumb { width: 100%; height: 200px; }
    }

    .artikel-thumb {
        height: 180px;
        background: linear-gradient(135deg, #EEF3FF 0%, #DDEAFF 100%);
        position: relative;
        overflow: hidden;
        display: flex;
        align-items: center;
        justify-content: center;
    }
    .artikel-thumb img {
        width: 100%; height: 100%;
        object-fit: cover;
        position: absolute; inset: 0;
    }
    .artikel-thumb-placeholder {
        width: 48px; height: 48px; opacity: 0.15;
    }
    .artikel-thumb-placeholder svg { width: 100%; height: 100%; fill: var(--primary); }
    .artikel-thumb.t1 { background: linear-gradient(135deg, #EEF3FF 0%, #DDEAFF 100%); }
    .artikel-thumb.t2 { background: linear-gradient(135deg, #FFF8EE 0%, #FEEEDD 100%); }
    .artikel-thumb.t3 { background: linear-gradient(135deg, #F0FAF0 0%, #DAEEDA 100%); }
    .artikel-thumb.t4 { background: linear-gradient(135deg, #FFF0F5 0%, #FFE0ED 100%); }

    .artikel-body { padding: 1.25rem; flex: 1; display: flex; flex-direction: column; }

    .artikel-cat {
        display: inline-block;
        background: rgba(27,58,107,0.08);
        color: var(--primary);
        font-size: 11px;
        font-weight: 700;
        letter-spacing: 0.06em;
        text-transform: uppercase;
        padding: 3px 9px;
        border-radius: 4px;
        margin-bottom: 0.65rem;
    }
    .artikel-card h3 {
        font-family: var(--font-display);
        font-size: 1rem;
        font-weight: 600;
        color: var(--text-dark);
        line-height: 1.45;
        margin-bottom: 0.5rem;
    }
    .artikel-card p {
        font-size: 13px;
        color: var(--text-muted);
        line-height: 1.65;
        flex: 1;
        display: -webkit-box;
        -webkit-line-clamp: 3;
        -webkit-box-orient: vertical;
        overflow: hidden;
    }
    .artikel-footer {
        padding: 0.875rem 1.25rem;
        border-top: 1px solid var(--border);
        display: flex;
        align-items: center;
        justify-content: space-between;
    }
    .artikel-meta {
        display: flex;
        align-items: center;
        gap: 10px;
        font-size: 11px;
        color: var(--text-muted);
    }
    .artikel-meta span {
        display: flex;
        align-items: center;
        gap: 4px;
    }
    .artikel-meta svg { width: 12px; height: 12px; stroke: currentColor; }
    .artikel-read-more {
        font-size: 12px;
        font-weight: 600;
        color: var(--primary);
        text-decoration: none;
        display: flex;
        align-items: center;
        gap: 4px;
        transition: gap 0.2s;
    }
    .artikel-read-more:hover { gap: 7px; }
    .artikel-read-more svg { width: 14px; height: 14px; stroke: currentColor; }

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
        <svg viewBox="0 0 16 16" width="12" height="12" fill="currentColor"><path d="M14 1H2a1 1 0 00-1 1v12a1 1 0 001 1h12a1 1 0 001-1V2a1 1 0 00-1-1zM2 13V4h12v9H2zM3 2h10v1H3z"/></svg>
        Portal Artikel
    </div>
    <h1>Artikel & Berita Terkini</h1>
    <p>Informasi, berita, dan artikel terbaru seputar kegiatan dan kebijakan Organisasi Perangkat Daerah.</p>
</div>

{{-- FILTER BAR --}}
<div class="filter-bar">
    <div class="filter-bar-inner">
        <span class="filter-label">Kategori:</span>
        <div class="filter-pills">
            <a href="{{ route('artikel.index') }}" class="filter-pill {{ !request('kategori') ? 'active' : '' }}">Semua</a>
            @foreach($kategoris as $kategori)
                <a href="{{ route('artikel.index', ['kategori' => $kategori->id]) }}"
                   class="filter-pill {{ request('kategori') == $kategori->id ? 'active' : '' }}">
                    {{ $kategori->name }}
                </a>
            @endforeach
        </div>
        <div class="filter-search">
            <form method="GET" action="{{ route('artikel.index') }}">
                @if(request('kategori'))
                    <input type="hidden" name="kategori" value="{{ request('kategori') }}">
                @endif
                <input type="text" name="search" placeholder="Cari artikel…" value="{{ request('search') }}">
                <svg viewBox="0 0 24 24" fill="none" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <circle cx="11" cy="11" r="8"/><line x1="21" y1="21" x2="16.65" y2="16.65"/>
                </svg>
            </form>
        </div>
    </div>
</div>

{{-- ARTIKEL LIST --}}
<section class="artikel-section">
    <div class="artikel-section-inner">
        <p class="artikel-count">Menampilkan <span>{{ $artikels->total() }}</span> artikel</p>

        @if($artikels->count() > 0)
            @php $thumbClasses = ['t1','t2','t3','t4']; @endphp

            {{-- Featured: first article on current page --}}
            @if($artikels->currentPage() == 1 && !request('search') && !request('kategori'))
            @php $featured = $artikels->first(); @endphp
            <div class="artikel-featured">
                <div class="artikel-card featured-main">
                    <div class="artikel-thumb {{ $thumbClasses[0] }}">
                        @if($featured->image)
                            <img src="{{ asset('storage/' . $featured->image) }}" alt="{{ $featured->title }}">
                        @else
                            <div class="artikel-thumb-placeholder">
                                <svg viewBox="0 0 24 24"><path d="M19 3H5a2 2 0 00-2 2v14a2 2 0 002 2h14a2 2 0 002-2V5a2 2 0 00-2-2z"/></svg>
                            </div>
                        @endif
                    </div>
                    <div class="artikel-body">
                        @if($featured->category)
                            <span class="artikel-cat">{{ $featured->category->name }}</span>
                        @endif
                        <h3>{{ $featured->title }}</h3>
                        <p>{{ Str::limit(strip_tags($featured->content), 180) }}</p>
                        <div class="artikel-footer" style="padding: 1rem 0 0; border-top: none; margin-top: auto;">
                            <div class="artikel-meta">
                                <span>
                                    <svg viewBox="0 0 24 24" fill="none" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="4" width="18" height="18" rx="2"/><line x1="16" y1="2" x2="16" y2="6"/><line x1="8" y1="2" x2="8" y2="6"/><line x1="3" y1="10" x2="21" y2="10"/></svg>
                                    {{ $featured->created_at->format('d M Y') }}
                                </span>
                                <span>Oleh {{ $featured->user->name ?? 'Admin' }}</span>
                            </div>
                            <a href="{{ route('artikel.show', $featured->slug ?? $featured->id) }}" class="artikel-read-more">
                                Baca Selengkapnya
                                <svg viewBox="0 0 24 24" fill="none" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="5" y1="12" x2="19" y2="12"/><polyline points="12 5 19 12 12 19"/></svg>
                            </a>
                        </div>
                    </div>
                </div>
                {{-- 2nd article as side card --}}
                @if($artikels->count() > 1)
                @php $second = $artikels->skip(1)->first(); @endphp
                <div class="artikel-card">
                    <div class="artikel-thumb {{ $thumbClasses[1] }}">
                        @if($second->image)
                            <img src="{{ asset('storage/' . $second->image) }}" alt="{{ $second->title }}">
                        @else
                            <div class="artikel-thumb-placeholder">
                                <svg viewBox="0 0 24 24"><path d="M19 3H5a2 2 0 00-2 2v14a2 2 0 002 2h14a2 2 0 002-2V5a2 2 0 00-2-2z"/></svg>
                            </div>
                        @endif
                    </div>
                    <div class="artikel-body">
                        @if($second->category)
                            <span class="artikel-cat">{{ $second->category->name }}</span>
                        @endif
                        <h3>{{ $second->title }}</h3>
                        <p>{{ Str::limit(strip_tags($second->content), 120) }}</p>
                    </div>
                    <div class="artikel-footer">
                        <div class="artikel-meta">
                            <span>{{ $second->created_at->format('d M Y') }}</span>
                        </div>
                        <a href="{{ route('artikel.show', $second->slug ?? $second->id) }}" class="artikel-read-more">
                            Baca
                            <svg viewBox="0 0 24 24" fill="none" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="5" y1="12" x2="19" y2="12"/><polyline points="12 5 19 12 12 19"/></svg>
                        </a>
                    </div>
                </div>
                @endif
            </div>

            {{-- Rest of articles --}}
            @php $restArtikels = $artikels->skip(2); @endphp
            @else
            @php $restArtikels = $artikels; @endphp
            @endif

            @if(isset($restArtikels) && $restArtikels->count() > 0)
            <div class="artikel-grid">
                @foreach($restArtikels as $i => $artikel)
                <div class="artikel-card">
                    <div class="artikel-thumb {{ $thumbClasses[$i % 4] }}">
                        @if($artikel->image)
                            <img src="{{ asset('storage/' . $artikel->image) }}" alt="{{ $artikel->title }}">
                        @else
                            <div class="artikel-thumb-placeholder">
                                <svg viewBox="0 0 24 24"><path d="M19 3H5a2 2 0 00-2 2v14a2 2 0 002 2h14a2 2 0 002-2V5a2 2 0 00-2-2z"/></svg>
                            </div>
                        @endif
                    </div>
                    <div class="artikel-body">
                        @if($artikel->category)
                            <span class="artikel-cat">{{ $artikel->category->name }}</span>
                        @endif
                        <h3>{{ $artikel->title }}</h3>
                        <p>{{ Str::limit(strip_tags($artikel->content), 110) }}</p>
                    </div>
                    <div class="artikel-footer">
                        <div class="artikel-meta">
                            <span>
                                <svg viewBox="0 0 24 24" fill="none" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="4" width="18" height="18" rx="2"/><line x1="16" y1="2" x2="16" y2="6"/><line x1="8" y1="2" x2="8" y2="6"/><line x1="3" y1="10" x2="21" y2="10"/></svg>
                                {{ $artikel->created_at->format('d M Y') }}
                            </span>
                        </div>
                        <a href="{{ route('artikel.show', $artikel->slug ?? $artikel->id) }}" class="artikel-read-more">
                            Baca
                            <svg viewBox="0 0 24 24" fill="none" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="5" y1="12" x2="19" y2="12"/><polyline points="12 5 19 12 12 19"/></svg>
                        </a>
                    </div>
                </div>
                @endforeach
            </div>
            @endif

            <div class="pagination-wrap">
                {{ $artikels->appends(request()->query())->links() }}
            </div>
        @else
            <div class="empty-state">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M14 2H6a2 2 0 00-2 2v16a2 2 0 002 2h12a2 2 0 002-2V8z"/><polyline points="14 2 14 8 20 8"/>
                </svg>
                <p>Belum ada artikel yang tersedia{{ request('search') ? ' untuk pencarian "' . request('search') . '"' : '' }}.</p>
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

    document.querySelectorAll('.artikel-card').forEach((card, i) => {
        card.style.opacity = '0';
        card.style.transform = 'translateY(24px)';
        card.style.transition = `opacity 0.5s ease ${i * 0.07}s, transform 0.5s ease ${i * 0.07}s, box-shadow 0.3s`;
        observer.observe(card);
    });
</script>

@endsection
</body>
</html>