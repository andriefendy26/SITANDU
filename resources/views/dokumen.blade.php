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

@section('title', 'Dokumen')

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

    /* ── DOKUMEN SECTION ── */
    .dokumen-section {
        background: var(--white);
        padding: 3.5rem 2rem 5rem;
    }
    .dokumen-section-inner {
        max-width: 1200px;
        margin: 0 auto;
    }
    .dokumen-count {
        font-size: 13px;
        color: var(--text-muted);
        margin-bottom: 2rem;
    }
    .dokumen-count span { font-weight: 600; color: var(--primary); }

    /* STATS BAR */
    .dokumen-stats {
        display: flex;
        gap: 1rem;
        margin-bottom: 2.5rem;
        flex-wrap: wrap;
    }
    .dokumen-stat {
        background: var(--surface);
        border: 1px solid var(--border);
        border-radius: var(--radius-lg);
        padding: 1rem 1.5rem;
        display: flex;
        align-items: center;
        gap: 12px;
        flex: 1;
        min-width: 160px;
    }
    .dokumen-stat-icon {
        width: 40px; height: 40px;
        border-radius: var(--radius);
        background: var(--primary);
        display: flex;
        align-items: center;
        justify-content: center;
        flex-shrink: 0;
    }
    .dokumen-stat-icon svg { width: 18px; height: 18px; fill: var(--white); }
    .dokumen-stat-info { line-height: 1.3; }
    .dokumen-stat-num {
        font-size: 1.4rem;
        font-weight: 700;
        color: var(--primary);
        font-family: var(--font-display);
    }
    .dokumen-stat-label { font-size: 12px; color: var(--text-muted); }

    /* LIST */
    .dokumen-list {
        display: flex;
        flex-direction: column;
        gap: 0.75rem;
    }
    .dokumen-card {
        display: flex;
        align-items: center;
        gap: 1rem;
        background: var(--white);
        border: 1px solid var(--border);
        border-radius: var(--radius-lg);
        padding: 1.1rem 1.25rem;
        cursor: pointer;
        text-decoration: none;
        transition: box-shadow 0.25s, border-color 0.25s, transform 0.25s;
    }
    .dokumen-card:hover {
        box-shadow: var(--shadow-md);
        border-color: rgba(27,58,107,0.3);
        transform: translateX(4px);
    }
    .dokumen-file-icon {
        width: 52px;
        height: 60px;
        flex-shrink: 0;
        border-radius: var(--radius);
        background: var(--surface);
        border: 1px solid var(--border);
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        position: relative;
        overflow: hidden;
    }
    .dokumen-file-icon::after {
        content: attr(data-type);
        position: absolute;
        bottom: 0;
        left: 0;
        right: 0;
        background: var(--primary);
        color: var(--white);
        font-size: 8px;
        font-weight: 700;
        letter-spacing: 0.05em;
        text-align: center;
        padding: 2px 0;
    }
    .dokumen-file-icon.pdf::after { background: #D32F2F; }
    .dokumen-file-icon.doc::after { background: #1565C0; }
    .dokumen-file-icon.xls::after { background: #2E7D32; }
    .dokumen-file-icon.ppt::after { background: #E65100; }
    .dokumen-file-icon svg { width: 20px; height: 20px; fill: var(--primary); margin-bottom: 12px; }
    .dokumen-info { flex: 1; min-width: 0; }
    .dokumen-type {
        font-size: 11px;
        font-weight: 600;
        color: var(--accent);
        text-transform: uppercase;
        letter-spacing: 0.06em;
        margin-bottom: 3px;
    }
    .dokumen-info h4 {
        font-size: 0.95rem;
        font-weight: 600;
        color: var(--text-dark);
        line-height: 1.4;
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
        margin-bottom: 4px;
    }
    .dokumen-info p {
        font-size: 12px;
        color: var(--text-muted);
    }
    .dokumen-note {
        font-size: 12px;
        color: var(--text-muted);
        max-width: 300px;
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
        display: none;
    }
    @media (min-width: 768px) { .dokumen-note { display: block; } }

    .dokumen-actions {
        display: flex;
        align-items: center;
        gap: 8px;
        flex-shrink: 0;
    }
    .dokumen-download-btn {
        display: flex;
        align-items: center;
        gap: 6px;
        padding: 7px 14px;
        background: var(--primary);
        color: var(--white);
        border-radius: var(--radius);
        font-size: 12px;
        font-weight: 600;
        text-decoration: none;
        transition: background 0.2s;
    }
    .dokumen-download-btn:hover { background: var(--primary-dark); }
    .dokumen-download-btn svg { width: 13px; height: 13px; stroke: currentColor; fill: none; }
    .dokumen-arrow {
        width: 32px; height: 32px;
        display: flex;
        align-items: center;
        justify-content: center;
        border: 1.5px solid var(--border);
        border-radius: 50%;
        transition: background 0.2s, border-color 0.2s;
    }
    .dokumen-card:hover .dokumen-arrow {
        background: var(--primary);
        border-color: var(--primary);
    }
    .dokumen-arrow svg { width: 14px; height: 14px; fill: var(--text-muted); transition: fill 0.2s; }
    .dokumen-card:hover .dokumen-arrow svg { fill: var(--white); }

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
        <svg viewBox="0 0 16 16" width="12" height="12" fill="currentColor"><path d="M9 1H3a1 1 0 00-1 1v12a1 1 0 001 1h10a1 1 0 001-1V5L9 1zM9 2l3 3H9V2zM3 14V2h5v4h4v8H3z"/></svg>
        Pusat Dokumen
    </div>
    <h1>Dokumen & Formulir Resmi</h1>
    <p>Unduh dokumen resmi, formulir, SOP, dan laporan yang diterbitkan oleh Organisasi Perangkat Daerah.</p>
</div>

{{-- FILTER BAR --}}
<div class="filter-bar">
    <div class="filter-bar-inner">
        <span class="filter-label">Jenis:</span>
        <div class="filter-pills">
            <a href="{{ route('dokumen.index') }}" class="filter-pill {{ !request('jenis') ? 'active' : '' }}">Semua</a>
            @foreach($jenisDokumens as $jenis)
                <a href="{{ route('dokumen.index', ['jenis' => $jenis->id]) }}"
                   class="filter-pill {{ request('jenis') == $jenis->id ? 'active' : '' }}">
                    {{ $jenis->title }}
                </a>
            @endforeach
        </div>
        <div class="filter-search">
            <form method="GET" action="{{ route('dokumen.index') }}">
                @if(request('jenis'))
                    <input type="hidden" name="jenis" value="{{ request('jenis') }}">
                @endif
                <input type="text" name="search" placeholder="Cari dokumen…" value="{{ request('search') }}">
                <svg viewBox="0 0 24 24" fill="none" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <circle cx="11" cy="11" r="8"/><line x1="21" y1="21" x2="16.65" y2="16.65"/>
                </svg>
            </form>
        </div>
    </div>
</div>

{{-- DOKUMEN LIST --}}
<section class="dokumen-section">
    <div class="dokumen-section-inner">

        {{-- Stats --}}
        <div class="dokumen-stats">
            <div class="dokumen-stat">
                <div class="dokumen-stat-icon">
                    <svg viewBox="0 0 24 24"><path d="M14 2H6a2 2 0 00-2 2v16a2 2 0 002 2h12a2 2 0 002-2V8z"/><polyline points="14 2 14 8 20 8" fill="none" stroke="white" stroke-width="2"/></svg>
                </div>
                <div class="dokumen-stat-info">
                    <div class="dokumen-stat-num">{{ $dokumens->total() }}</div>
                    <div class="dokumen-stat-label">Total Dokumen</div>
                </div>
            </div>
            @foreach($jenisDokumens->take(3) as $jenis)
            <div class="dokumen-stat">
                <div class="dokumen-stat-icon" style="background: var(--accent);">
                    <svg viewBox="0 0 24 24"><path d="M22 19a2 2 0 01-2 2H4a2 2 0 01-2-2V5a2 2 0 012-2h5l2 3h9a2 2 0 012 2z" fill="white"/></svg>
                </div>
                <div class="dokumen-stat-info">
                    <div class="dokumen-stat-num">{{ $jenis->dokumen->count() }}</div>
                    <div class="dokumen-stat-label">{{ $jenis->title }}</div>
                </div>
            </div>
            @endforeach
        </div>

        <p class="dokumen-count">Menampilkan <span>{{ $dokumens->total() }}</span> dokumen</p>

        @if($dokumens->count() > 0)
            <div class="dokumen-list">
                @foreach($dokumens as $dokumen)
                @php
                    $ext = strtolower(pathinfo($dokumen->path, PATHINFO_EXTENSION));
                    $extLabel = strtoupper($ext) ?: 'FILE';
                    $iconClass = in_array($ext, ['pdf']) ? 'pdf' :
                                 (in_array($ext, ['doc','docx']) ? 'doc' :
                                 (in_array($ext, ['xls','xlsx']) ? 'xls' :
                                 (in_array($ext, ['ppt','pptx']) ? 'ppt' : '')));
                @endphp
                <a href="{{ route('dokumen.download', $dokumen->id) }}" class="dokumen-card">
                    <div class="dokumen-file-icon {{ $iconClass }}" data-type="{{ $extLabel }}">
                        <svg viewBox="0 0 24 24"><path d="M14 2H6a2 2 0 00-2 2v16a2 2 0 002 2h12a2 2 0 002-2V8z"/><polyline points="14 2 14 8 20 8" style="fill:none;stroke:var(--primary);stroke-width:2"/></svg>
                    </div>
                    <div class="dokumen-info">
                        @if($dokumen->jenisDokumen)
                            <div class="dokumen-type">{{ $dokumen->jenisDokumen->title }}</div>
                        @endif
                        <h4>{{ $dokumen->title }}</h4>
                        <p>Diperbarui {{ $dokumen->updated_at->format('d M Y') }} · Oleh {{ $dokumen->user->name ?? 'Admin' }}</p>
                    </div>
                    @if($dokumen->note)
                    <div class="dokumen-note">{{ $dokumen->note }}</div>
                    @endif
                    <div class="dokumen-actions">
                        <span class="dokumen-download-btn">
                            <svg viewBox="0 0 24 24" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M21 15v4a2 2 0 01-2 2H5a2 2 0 01-2-2v-4"/><polyline points="7 10 12 15 17 10"/><line x1="12" y1="15" x2="12" y2="3"/>
                            </svg>
                            Unduh
                        </span>
                        <div class="dokumen-arrow">
                            <svg viewBox="0 0 24 24"><polyline points="6 9 12 15 18 9"/></svg>
                        </div>
                    </div>
                </a>
                @endforeach
            </div>

            <div class="pagination-wrap">
                {{ $dokumens->appends(request()->query())->links() }}
            </div>
        @else
            <div class="empty-state">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M14 2H6a2 2 0 00-2 2v16a2 2 0 002 2h12a2 2 0 002-2V8z"/><polyline points="14 2 14 8 20 8"/>
                </svg>
                <p>Belum ada dokumen yang tersedia{{ request('search') ? ' untuk pencarian "' . request('search') . '"' : '' }}.</p>
            </div>
        @endif
    </div>
</section>

<script>
    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.style.opacity = '1';
                entry.target.style.transform = 'translateX(0)';
            }
        });
    }, { threshold: 0.08 });

    document.querySelectorAll('.dokumen-card').forEach((card, i) => {
        card.style.opacity = '0';
        card.style.transform = 'translateX(-16px)';
        card.style.transition = `opacity 0.4s ease ${i * 0.05}s, transform 0.4s ease ${i * 0.05}s, box-shadow 0.25s, border-color 0.25s`;
        observer.observe(card);
    });
</script>

@endsection
</body>
</html>