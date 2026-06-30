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

@section('title', 'Kegiatan Posyandu')

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
        padding: 1rem;
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
    .filter-search {
        margin-right: auto;
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

    /* ── KEGIATAN GRID ── */
    .kegiatan-section {
        background: var(--white);
        padding: 3.5rem 2rem 5rem;
    }
    .kegiatan-section-inner {
        max-width: 1200px;
        margin: 0 auto;
    }
    .kegiatan-count {
        font-size: 13px;
        color: var(--text-muted);
        margin-bottom: 2rem;
    }
    .kegiatan-count span { font-weight: 600; color: var(--primary); }

    .kegiatan-grid {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: 1.5rem;
    }
    @media (max-width: 900px) { .kegiatan-grid { grid-template-columns: repeat(2,1fr); } }
    @media (max-width: 580px) { .kegiatan-grid { grid-template-columns: 1fr; } }

    .kegiatan-card {
        background: var(--white);
        border: 1px solid var(--border);
        border-radius: var(--radius-lg);
        overflow: hidden;
        transition: box-shadow 0.3s, transform 0.3s;
        display: flex;
        flex-direction: column;
    }
    .kegiatan-card:hover {
        box-shadow: var(--shadow-md);
        transform: translateY(-4px);
    }
    .kegiatan-img {
        height: 200px;
        background: linear-gradient(135deg, #EEF3FF 0%, #DDEAFF 100%);
        position: relative;
        overflow: hidden;
        display: flex;
        align-items: center;
        justify-content: center;
    }
    .kegiatan-img img {
        width: 100%; height: 100%;
        object-fit: cover;
        position: absolute; inset: 0;
    }
    .kegiatan-img-placeholder {
        width: 60px; height: 60px;
        opacity: 0.2;
    }
    .kegiatan-img-placeholder svg { width: 100%; height: 100%; fill: var(--primary); }
    /* .kegiatan-tag {
        display: block;
        position: absolute;
        bottom: 12px; left: 12px;
        background: var(--primary);
        color: var(--white);
        font-size: 11px;
        font-weight: 600;
        letter-spacing: 0.04em;
        padding: 4px 10px;
        border-radius: 4px;
        text-transform: uppercase;
    } */
    .kegiatan-body {
        padding: 1.25rem 1.25rem 1rem;
        flex: 1;
        display: flex;
        flex-direction: column;
    }
    .kegiatan-meta {
        display: flex;
        align-items: center;
        gap: 12px;
        margin-bottom: 0.6rem;
    }
    .kegiatan-meta-item {
        display: flex;
        align-items: center;
        gap: 5px;
        font-size: 11px;
        color: var(--text-muted);
    }
    .kegiatan-meta-item svg { width: 13px; height: 13px; stroke: currentColor; }
    .kegiatan-card h3 {
        font-family: var(--font-display);
        font-size: 1.05rem;
        font-weight: 600;
        color: var(--text-dark);
        line-height: 1.45;
        margin-bottom: 0.5rem;
    }
    .kegiatan-card p {
        font-size: 13px;
        color: var(--text-muted);
        line-height: 1.6;
        flex: 1;
        display: -webkit-box;
        -webkit-line-clamp: 3;
        -webkit-box-orient: vertical;
        overflow: hidden;
    }
    .kegiatan-footer {
        padding: 0.875rem 1.25rem;
        border-top: 1px solid var(--border);
        display: flex;
        align-items: center;
        justify-content: space-between;
    }
    .kegiatan-author {
        display: flex;
        align-items: center;
        gap: 8px;
    }
    .kegiatan-avatar {
        width: 26px; height: 26px;
        border-radius: 50%;
        background: var(--primary);
        color: var(--white);
        font-size: 10px;
        font-weight: 700;
        display: flex;
        align-items: center;
        justify-content: center;
    }
    .kegiatan-author-name {
        font-size: 12px;
        color: var(--text-muted);
        font-weight: 500;
    }
    .kegiatan-read-more {
        font-size: 12px;
        font-weight: 600;
        color: var(--primary);
        text-decoration: none;
        display: flex;
        align-items: center;
        gap: 4px;
        transition: gap 0.2s;
    }
    .kegiatan-read-more:hover { gap: 7px; }
    .kegiatan-read-more svg { width: 14px; height: 14px; stroke: currentColor; }

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
        /* margin-bottom: 1.5rem; */
    }
</style>

{{-- PAGE HERO --}}
<div class="page-hero">
    <div class="page-hero-label">
        <svg viewBox="0 0 16 16" width="12" height="12" fill="currentColor"><path d="M8 0C3.6 0 0 3.6 0 8s3.6 8 8 8 8-3.6 8-8-3.6-8-8-8zm0 12c-.6 0-1-.4-1-1s.4-1 1-1 1 .4 1 1-.4 1-1 1zm1-3H7V4h2v5z"/></svg>
        Portal Kegiatan Posyandu
    </div>
    <h1>Kegiatan Posyandu</h1>
    <p>Dokumentasi seluruh kegiatan, program, dan aktivitas yang dilaksanakan oleh Organisasi Perangkat Daerah.</p>
</div>
{{-- 
{{-- FILTER BAR --}}
<div class="filter-bar">
    <div class="filter-bar-inner">
        {{-- SEARCH FORM --}}
        <div class="layanan-search-wrap">
            <form action="{{ route('kegiatanposyandu.index') }}" method="GET" class="layanan-search">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <circle cx="11" cy="11" r="8"/>
                    <line x1="21" y1="21" x2="16.65" y2="16.65"/>
                </svg>
                 <input type="text" name="search" placeholder="Cari kegiatan…" value="{{ request('search') }}">
                @if(request('kategori'))
                    <input type="hidden" name="kategori" value="{{ request('kategori') }}">
                @endif
                <button type="submit">Cari</button>
            </form>
        </div>
    </div>
</div>

{{-- KEGIATAN LIST --}}
<section class="kegiatan-section">
    <div class="kegiatan-section-inner">
        
        <p class="kegiatan-count">Menampilkan <span>{{ $kegiatans->total() }}</span> kegiatan</p>
        

        @if($kegiatans->count() > 0)
            <div class="kegiatan-grid">
                @foreach($kegiatans as $kegiatan)
                <div class="kegiatan-card">
                    <div class="kegiatan-img">
                        @if($kegiatan->image)
                            <img src="{{ asset('storage/' . $kegiatan->image) }}" alt="{{ $kegiatan->title }}">
                        @else
                            <div class="kegiatan-img-placeholder">
                                <svg viewBox="0 0 24 24"><path d="M19 3H5a2 2 0 00-2 2v14a2 2 0 002 2h14a2 2 0 002-2V5a2 2 0 00-2-2zM5 3h14v10l-4-4-4 4-2-2-4 4V5a2 2 0 012-2z"/></svg>
                            </div>
                        @endif
                        @if($kegiatan->kategori)
                            <div class="kegiatan-tag">{{ $kegiatan->kategori->name }}</div>
                        @endif
                    </div>
                    <div class="kegiatan-body">
                        <div class="kegiatan-meta">
                            <span class="kegiatan-meta-item">
                                <svg viewBox="0 0 24 24" fill="none" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <rect x="3" y="4" width="18" height="18" rx="2" ry="2"/><line x1="16" y1="2" x2="16" y2="6"/><line x1="8" y1="2" x2="8" y2="6"/><line x1="3" y1="10" x2="21" y2="10"/>
                                </svg>
                                {{ $kegiatan->created_at->format('d M Y') }}
                            </span>
                        </div>
                        <h3>{{ $kegiatan->title }}</h3>
                        <p>{{ Str::limit(strip_tags($kegiatan->content), 120) }}</p>
                    </div>
                    <div class="kegiatan-footer">
                        <div class="kegiatan-author">
                            <div class="kegiatan-avatar">{{ strtoupper(substr($kegiatan->user->name ?? 'A', 0, 1)) }}</div>
                            <span class="kegiatan-author-name">{{ $kegiatan->user->name ?? 'Admin' }}</span>
                        </div>
                        <a href="{{ route('kegiatanposyandu.show', $kegiatan->slug ?? $kegiatan->id) }}" class="kegiatan-read-more">
                            Selengkapnya
                            <svg viewBox="0 0 24 24" fill="none" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <line x1="5" y1="12" x2="19" y2="12"/><polyline points="12 5 19 12 12 19"/>
                            </svg>
                        </a>
                    </div>
                </div>
                @endforeach
            </div>

            <div class="pagination-wrap">
                {{ $kegiatans->appends(request()->query())->links() }}
            </div>
        @else
            <div class="empty-state">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                    <circle cx="12" cy="12" r="10"/><line x1="12" y1="8" x2="12" y2="12"/><line x1="12" y1="16" x2="12.01" y2="16"/>
                </svg>
                <p>Belum ada kegiatan yang tersedia{{ request('search') ? ' untuk pencarian "' . request('search') . '"' : '' }}.</p>
            </div>
        @endif
    </div>
</section>

<script>
    // Animate cards on scroll
    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.style.opacity = '1';
                entry.target.style.transform = 'translateY(0)';
            }
        });
    }, { threshold: 0.08 });

    document.querySelectorAll('.kegiatan-card').forEach((card, i) => {
        card.style.opacity = '0';
        card.style.transform = 'translateY(24px)';
        card.style.transition = `opacity 0.5s ease ${i * 0.07}s, transform 0.5s ease ${i * 0.07}s, box-shadow 0.3s`;
        observer.observe(card);
    });
</script>
@endsection
</body>
</html>