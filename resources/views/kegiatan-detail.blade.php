@extends('layouts.app')

@section('title', ' - Layanan OPD')

@section('content')

<style>
    /* ── BREADCRUMB ── */
    .breadcrumb-bar {
        background: var(--surface);
        border-bottom: 1px solid var(--border);
        padding: 0.75rem 2rem;
        margin-top: 68px;
    }
    .breadcrumb-inner {
        max-width: 960px;
        margin: 0 auto;
        display: flex;
        align-items: center;
        gap: 8px;
        font-size: 13px;
        color: var(--text-muted);
        flex-wrap: wrap;
    }
    .breadcrumb-inner a {
        color: var(--text-muted);
        text-decoration: none;
        transition: color 0.2s;
    }
    .breadcrumb-inner a:hover { color: var(--primary); }
    .breadcrumb-inner svg { width: 12px; height: 12px; stroke: currentColor; flex-shrink: 0; }
    .breadcrumb-inner span:last-child {
        color: var(--text-dark);
        font-weight: 500;
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
        max-width: 300px;
    }

    /* ── LAYANAN HERO ── */
    .layanan-hero {
        background: linear-gradient(135deg, var(--primary-dark) 0%, var(--primary) 100%);
        padding: 3.5rem 2rem;
        position: relative;
        overflow: hidden;
    }
    .layanan-hero::before {
        content: '';
        position: absolute;
        inset: 0;
        background: url("data:image/svg+xml,%3Csvg width='60' height='60' viewBox='0 0 60 60' xmlns='http://www.w3.org/2000/svg'%3E%3Cg fill='none' fill-rule='evenodd'%3E%3Cg fill='%23ffffff' fill-opacity='0.04'%3E%3Cpath d='M36 34v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6 34v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6 4V0H4v4H0v2h4v4h2V6h4V4H6z'/%3E%3C/g%3E%3C/g%3E%3C/svg%3E");
    }
    .layanan-hero-inner {
        max-width: 960px;
        margin: 0 auto;
        position: relative;
    }
    .layanan-hero-top {
        display: flex;
        align-items: flex-start;
        gap: 1.5rem;
    }
    .layanan-hero-icon {
        width: 64px; height: 64px;
        border-radius: 14px;
        background: rgba(255,255,255,0.15);
        border: 1.5px solid rgba(255,255,255,0.25);
        display: flex;
        align-items: center;
        justify-content: center;
        flex-shrink: 0;
    }
    .layanan-hero-icon svg { width: 30px; height: 30px; fill: var(--white); }
    .layanan-hero-text { flex: 1; }
    .layanan-hero-cat {
        display: inline-flex;
        align-items: center;
        gap: 6px;
        background: rgba(200,146,42,0.25);
        border: 1px solid rgba(200,146,42,0.4);
        color: var(--accent-light);
        font-size: 11px;
        font-weight: 600;
        letter-spacing: 0.08em;
        text-transform: uppercase;
        padding: 4px 12px;
        border-radius: 20px;
        margin-bottom: 0.875rem;
        text-decoration: none;
        transition: background 0.2s;
    }
    .layanan-hero-cat:hover { background: rgba(200,146,42,0.4); }
    .layanan-hero h1 {
        font-family: var(--font-display);
        font-size: clamp(1.5rem, 4vw, 2.2rem);
        font-weight: 700;
        color: var(--white);
        line-height: 1.3;
        margin-bottom: 0.75rem;
    }
    .layanan-hero-meta {
        display: flex;
        align-items: center;
        gap: 16px;
        flex-wrap: wrap;
    }
    .layanan-hero-meta span {
        display: flex;
        align-items: center;
        gap: 5px;
        font-size: 13px;
        color: rgba(255,255,255,0.7);
    }
    .layanan-hero-meta svg { width: 13px; height: 13px; stroke: currentColor; }
    
    /* ── FEATURE IMAGE ── */
    .artikel-feature-img {
        max-width: 860px;
        margin: 0 auto;
        padding: 0 2rem;
    }
    .artikel-feature-img-wrap {
        height: 420px;
        border-radius: var(--radius-lg);
        overflow: hidden;
        background: linear-gradient(135deg, #EEF3FF 0%, #DDEAFF 100%);
        display: flex;
        align-items: center;
        justify-content: center;
        margin: 2rem 0 0;
    }
    .artikel-feature-img-wrap img {
        width: 100%; height: 100%;
        object-fit: cover;
    }
    .artikel-feature-img-placeholder svg {
        width: 80px; height: 80px;
        fill: var(--primary);
        opacity: 0.12;
    }
    @media (max-width: 680px) { .artikel-feature-img-wrap { height: 240px; } }

    /* ── MAIN LAYOUT ── */
    .layanan-layout {
        max-width: 960px;
        margin: 0 auto;
        padding: 2.5rem 2rem 5rem;
        display: grid;
        grid-template-columns: 1fr 260px;
        gap: 2.5rem;
        align-items: start;
        background: var(--white);
    }
    @media (max-width: 800px) {
        .layanan-layout { grid-template-columns: 1fr; gap: 1.5rem; }
    }

    /* ── CONTENT AREA ── */
    .layanan-content { min-width: 0; }

    /* Info boxes */
    .layanan-info-boxes {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: 1rem;
        margin-bottom: 2rem;
    }
    @media (max-width: 600px) { .layanan-info-boxes { grid-template-columns: 1fr 1fr; } }

    .info-box {
        background: var(--surface);
        border: 1px solid var(--border);
        border-radius: var(--radius-lg);
        padding: 1rem 1.1rem;
    }
    .info-box-label {
        font-size: 11px;
        font-weight: 600;
        color: var(--text-muted);
        text-transform: uppercase;
        letter-spacing: 0.06em;
        margin-bottom: 5px;
    }
    .info-box-value {
        font-size: 14px;
        font-weight: 600;
        color: var(--primary-dark);
        line-height: 1.4;
    }

    /* Prose */
    .layanan-prose h2 {
        font-family: var(--font-display);
        font-size: 1.3rem;
        font-weight: 700;
        color: var(--primary-dark);
        margin: 2rem 0 0.75rem;
        line-height: 1.35;
        padding-bottom: 0.5rem;
        border-bottom: 2px solid var(--border);
    }
    .layanan-prose h3 {
        font-size: 1.05rem;
        font-weight: 600;
        color: var(--primary);
        margin: 1.5rem 0 0.5rem;
    }
    .layanan-prose p {
        font-size: 15px;
        color: var(--text-mid);
        line-height: 1.85;
        margin-bottom: 1.1rem;
    }
    .layanan-prose ul {
        padding-left: 1.4rem;
        margin-bottom: 1.25rem;
    }
    .layanan-prose ul li {
        font-size: 15px;
        color: var(--text-mid);
        line-height: 1.8;
        margin-bottom: 0.35rem;
    }
    .layanan-prose ol {
        padding-left: 1.4rem;
        margin-bottom: 1.25rem;
        counter-reset: ol-counter;
        list-style: none;
    }
    .layanan-prose ol li {
        font-size: 15px;
        color: var(--text-mid);
        line-height: 1.8;
        margin-bottom: 0.5rem;
        position: relative;
        padding-left: 0.5rem;
        counter-increment: ol-counter;
    }
    .layanan-prose ol li::before {
        content: counter(ol-counter) '.';
        color: var(--primary);
        font-weight: 700;
        position: absolute;
        left: -1.4rem;
        width: 1.4rem;
        text-align: right;
    }
    .layanan-prose strong { color: var(--text-dark); font-weight: 600; }
    .layanan-prose a { color: var(--primary); text-underline-offset: 3px; }
    .layanan-prose hr {
        border: none;
        border-top: 1px solid var(--border);
        margin: 2rem 0;
    }
    .layanan-prose table {
        width: 100%;
        border-collapse: collapse;
        font-size: 14px;
        margin-bottom: 1.25rem;
        border-radius: var(--radius);
        overflow: hidden;
        border: 1px solid var(--border);
    }
    .layanan-prose th {
        background: var(--primary);
        color: var(--white);
        font-weight: 600;
        padding: 10px 14px;
        text-align: left;
        font-size: 13px;
    }
    .layanan-prose td {
        padding: 10px 14px;
        border-bottom: 1px solid var(--border);
        color: var(--text-mid);
        vertical-align: top;
        font-size: 14px;
    }
    .layanan-prose tr:last-child td { border-bottom: none; }
    .layanan-prose tr:nth-child(even) td { background: rgba(245,243,238,0.5); }

    /* Callout box */
    .layanan-callout {
        background: rgba(27,58,107,0.05);
        border: 1px solid rgba(27,58,107,0.15);
        border-left: 4px solid var(--primary);
        border-radius: 0 var(--radius) var(--radius) 0;
        padding: 1rem 1.25rem;
        margin: 1.5rem 0;
        font-size: 14px;
        color: var(--text-mid);
        line-height: 1.7;
    }
    .layanan-callout strong { color: var(--primary-dark); }

    /* Bottom actions */
    .layanan-bottom-actions {
        display: flex;
        align-items: center;
        justify-content: space-between;
        flex-wrap: wrap;
        gap: 12px;
        padding-top: 1.5rem;
        border-top: 1px solid var(--border);
        margin-top: 2rem;
    }
    .btn-back {
        display: inline-flex;
        align-items: center;
        gap: 6px;
        font-size: 13px;
        font-weight: 600;
        color: var(--text-muted);
        text-decoration: none;
        border: 1.5px solid var(--border);
        padding: 8px 16px;
        border-radius: var(--radius);
        transition: all 0.2s;
    }
    .btn-back:hover { border-color: var(--primary); color: var(--primary); }
    .btn-back svg { width: 14px; height: 14px; stroke: currentColor; }
    .btn-contact {
        display: inline-flex;
        align-items: center;
        gap: 6px;
        font-size: 13px;
        font-weight: 600;
        color: var(--white);
        text-decoration: none;
        background: var(--primary);
        padding: 9px 18px;
        border-radius: var(--radius);
        transition: background 0.2s;
    }
    .btn-contact:hover { background: var(--primary-dark); }
    .btn-contact svg { width: 14px; height: 14px; stroke: currentColor; }

    /* ── SIDEBAR ── */
    .layanan-sidebar { position: sticky; top: 90px; }

    .sidebar-widget {
        background: var(--surface);
        border: 1px solid var(--border);
        border-radius: var(--radius-lg);
        padding: 1.25rem;
        margin-bottom: 1.25rem;
    }
    .sidebar-widget-title {
        font-size: 11px;
        font-weight: 700;
        color: var(--text-muted);
        text-transform: uppercase;
        letter-spacing: 0.08em;
        margin-bottom: 1rem;
        padding-bottom: 0.75rem;
        border-bottom: 1px solid var(--border);
    }

    /* Steps sidebar */
    .steps-list {
        display: flex;
        flex-direction: column;
        gap: 0;
    }
    .step-item {
        display: flex;
        gap: 10px;
        padding-bottom: 1rem;
        position: relative;
    }
    .step-item:not(:last-child)::before {
        content: '';
        position: absolute;
        left: 13px;
        top: 26px;
        bottom: 0;
        width: 1.5px;
        background: var(--border);
    }
    .step-num {
        width: 26px; height: 26px;
        border-radius: 50%;
        background: var(--primary);
        color: var(--white);
        font-size: 11px;
        font-weight: 700;
        display: flex;
        align-items: center;
        justify-content: center;
        flex-shrink: 0;
        position: relative;
        z-index: 1;
    }
    .step-text {
        font-size: 13px;
        color: var(--text-mid);
        line-height: 1.5;
        padding-top: 4px;
    }

    /* Contact widget */
    .contact-item {
        display: flex;
        align-items: center;
        gap: 10px;
        padding: 8px 0;
        border-bottom: 1px solid var(--border);
        font-size: 13px;
    }
    .contact-item:last-child { border-bottom: none; }
    .contact-item svg { width: 14px; height: 14px; stroke: var(--primary); flex-shrink: 0; }
    .contact-item a { color: var(--primary); text-decoration: none; }
    .contact-item a:hover { text-decoration: underline; }

    /* ── RELATED LAYANAN ── */
    .related-section {
        background: var(--surface);
        padding: 3rem 2rem;
        border-top: 1px solid var(--border);
    }
    .related-inner { max-width: 960px; margin: 0 auto; }
    .related-title {
        font-family: var(--font-display);
        font-size: 1.2rem;
        font-weight: 700;
        color: var(--primary-dark);
        margin-bottom: 1.25rem;
        display: flex;
        align-items: center;
        gap: 10px;
    }
    .related-title::after { content: ''; flex: 1; height: 1px; background: var(--border); }

    .related-grid {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: 1rem;
    }
    @media (max-width: 680px) { .related-grid { grid-template-columns: 1fr; } }

    .related-layanan-card {
        background: var(--white);
        border: 1px solid var(--border);
        border-radius: var(--radius-lg);
        padding: 1.25rem;
        text-decoration: none;
        display: flex;
        flex-direction: column;
        position: relative;
        overflow: hidden;
        transition: box-shadow 0.25s, transform 0.25s;
    }
    .related-layanan-card::before {
        content: '';
        position: absolute;
        top: 0; left: 0; right: 0;
        height: 3px;
        background: var(--primary);
        transform: scaleX(0);
        transform-origin: left;
        transition: transform 0.3s;
    }
    .related-layanan-card:hover { box-shadow: var(--shadow-md); transform: translateY(-4px); }
    .related-layanan-card:hover::before { transform: scaleX(1); }
    .related-layanan-icon {
        width: 40px; height: 40px;
        border-radius: 9px;
        background: #EEF3FF;
        display: flex;
        align-items: center;
        justify-content: center;
        margin-bottom: 0.875rem;
    }
    .related-layanan-icon svg { width: 18px; height: 18px; fill: var(--primary); }
    .related-layanan-card h4 {
        font-family: var(--font-display);
        font-size: 0.95rem;
        font-weight: 600;
        color: var(--primary-dark);
        line-height: 1.4;
        margin-bottom: 0.4rem;
    }
    .related-layanan-card p {
        font-size: 12px;
        color: var(--text-muted);
        line-height: 1.6;
        flex: 1;
        display: -webkit-box;
        -webkit-line-clamp: 2;
        -webkit-box-orient: vertical;
        overflow: hidden;
    }
    .related-layanan-link {
        margin-top: 0.75rem;
        font-size: 12px;
        font-weight: 600;
        color: var(--primary);
        display: flex;
        align-items: center;
        gap: 4px;
        transition: gap 0.2s;
    }
    .related-layanan-link:hover { gap: 7px; }
    .related-layanan-link svg { width: 12px; height: 12px; stroke: currentColor; }
</style>

{{-- BREADCRUMB --}}
<div class="breadcrumb-bar">
    <div class="breadcrumb-inner">
        <a href="{{ url('/') }}">Beranda</a>
        <svg viewBox="0 0 24 24" fill="none" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="9 18 15 12 9 6"/></svg>
        <a href="{{ route('layanan.index') }}">Layanan</a>
        @if($kegiatan->kategori)
        <svg viewBox="0 0 24 24" fill="none" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="9 18 15 12 9 6"/></svg>
        <a href="{{ route('layanan.index', ['kategori' => $kegiatan->kategori->id]) }}">{{ $kegiatan->kategori->name }}</a>
        @endif
        <svg viewBox="0 0 24 24" fill="none" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="9 18 15 12 9 6"/></svg>
        <span>{{ $kegiatan->title }}</span>
    </div>
</div>

{{-- HERO --}}
<div class="layanan-hero">
    <div class="layanan-hero-inner">
        <div class="layanan-hero-top">
            <div class="layanan-hero-icon">
                <svg viewBox="0 0 24 24">
                    <path d="M9 11l3 3L22 4M21 12v7a2 2 0 01-2 2H5a2 2 0 01-2-2V5a2 2 0 012-2h11"/>
                </svg>
            </div>
            <div class="layanan-hero-text">
                @if($kegiatan->kategori)
                    <a href="{{ route('layanan.index', ['kategori' => $kegiatan->kategori->id]) }}"
                       class="layanan-hero-cat">
                        {{ $kegiatan->kategori->name }}
                    </a>
                @endif
                <h1>{{ $kegiatan->title }}</h1>
                <div class="layanan-hero-meta">
                    <span>
                        <svg viewBox="0 0 24 24" fill="none" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <rect x="3" y="4" width="18" height="18" rx="2"/><line x1="16" y1="2" x2="16" y2="6"/><line x1="8" y1="2" x2="8" y2="6"/><line x1="3" y1="10" x2="21" y2="10"/>
                        </svg>
                        Diperbarui {{ $kegiatan->updated_at->translatedFormat('d F Y') }}
                    </span>
                    <span>
                        <svg viewBox="0 0 24 24" fill="none" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M20 21v-2a4 4 0 00-4-4H8a4 4 0 00-4 4v2"/><circle cx="12" cy="7" r="4"/>
                        </svg>
                        {{ $kegiatan->user->name ?? 'Admin OPD' }}
                    </span>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="artikel-feature-img">
    <div class="artikel-feature-img-wrap">
        @if($kegiatan->image)
            <img src="{{ asset('storage/' . $kegiatan->image) }}" alt="{{ $kegiatan->title }}">
        @else
            <div class="artikel-feature-img-placeholder">
                <svg viewBox="0 0 24 24"><path d="M19 3H5a2 2 0 00-2 2v14a2 2 0 002 2h14a2 2 0 002-2V5a2 2 0 00-2-2z"/><circle cx="8.5" cy="8.5" r="1.5"/><polyline points="21 15 16 10 5 21"/></svg>
            </div>
        @endif
    </div>
</div>


{{-- MAIN LAYOUT --}}
{{-- MAIN LAYOUT --}}
<div style="background:var(--white);">
    <div class="layanan-layout">

        {{-- CONTENT --}}
        <div class="layanan-content">

            {{-- Quick info boxes --}}
            <div class="layanan-info-boxes">
                @if($kegiatan->kategori)
                <div class="info-box">
                    <div class="info-box-label">Kategori</div>
                    <div class="info-box-value">{{ $kegiatan->kategori->name }}</div>
                </div>
                @endif
                <div class="info-box">
                    <div class="info-box-label">Diterbitkan</div>
                    <div class="info-box-value">{{ $kegiatan->created_at->format('d M Y') }}</div>
                </div>
                <div class="info-box">
                    <div class="info-box-label">Penanggung Jawab</div>
                    <div class="info-box-value">{{ $kegiatan->user->name ?? 'Admin OPD' }}</div>
                </div>
            </div>

            {{-- Callout / disclaimer --}}
            <div class="layanan-callout">
                <strong>Informasi Penting:</strong> Pastikan Anda membaca seluruh persyaratan dan prosedur sebelum mengajukan permohonan layanan ini. Untuk pertanyaan lebih lanjut, hubungi petugas kami.
            </div>

            {{-- Main content --}}
            <div class="layanan-prose" id="layanan-content">
                {!! $kegiatan->content !!}
            </div>

            {{-- ✅ Dokumentasi foto — dipindah ke dalam .layanan-content --}}
            <div class="dokumentasi-section">
                <h2 style="font-family:var(--font-display);font-size:1.3rem;font-weight:700;color:var(--primary-dark);margin:2rem 0 1rem;padding-bottom:0.5rem;border-bottom:2px solid var(--border);">
                    Dokumentasi Kegiatan
                </h2>

                <div class="doc-grid">
                    @forelse($kegiatan->dokumentasi as $foto)
                        <a href="{{ asset('storage/' . $foto->file_path) }}" target="_blank" class="doc-item">
                            <img src="{{ asset('storage/' . $foto->file_path) }}" alt="Dokumentasi kegiatan">
                        </a>
                    @empty
                        <p style="color:var(--text-muted); font-size:14px;">Belum ada dokumentasi.</p>
                    @endforelse
                </div>
            </div>

            {{-- Bottom actions --}}
            <div class="layanan-bottom-actions">
                <a href="{{ route('layanan.index') }}" class="btn-back">
                    <svg viewBox="0 0 24 24" fill="none" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <line x1="19" y1="12" x2="5" y2="12"/><polyline points="12 19 5 12 12 5"/>
                    </svg>
                    Kembali ke Layanan
                </a>
                <a href="tel:+62" class="btn-contact">
                    <svg viewBox="0 0 24 24" fill="none" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M22 16.92v3a2 2 0 01-2.18 2 19.79 19.79 0 01-8.63-3.07A19.5 19.5 0 014.21 9.85 19.79 19.79 0 011.14 4.18 2 2 0 013.11 2h3a2 2 0 012 1.72c.127.96.361 1.903.7 2.81a2 2 0 01-.45 2.11L7.09 9.91a16 16 0 006 6l1.27-1.27a2 2 0 012.11-.45c.907.339 1.85.573 2.81.7A2 2 0 0122 16.92z"/>
                    </svg>
                    Hubungi Kami
                </a>
            </div>
        </div>

        {{-- SIDEBAR --}}
        <aside class="layanan-sidebar">

            {{-- Alur layanan (auto parse numbered steps from content) --}}
            <div class="sidebar-widget" id="steps-widget" style="display:none;">
                <div class="sidebar-widget-title">Alur Layanan</div>
                <div class="steps-list" id="steps-list"></div>
            </div>

            {{-- Kontak --}}
            <div class="sidebar-widget">
                <div class="sidebar-widget-title">Butuh Bantuan?</div>
                <div class="contact-item">
                    <svg viewBox="0 0 24 24" fill="none" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M22 16.92v3a2 2 0 01-2.18 2 19.79 19.79 0 01-8.63-3.07A19.5 19.5 0 014.21 9.85 19.79 19.79 0 011.14 4.18 2 2 0 013.11 2h3a2 2 0 012 1.72c.127.96.361 1.903.7 2.81a2 2 0 01-.45 2.11L7.09 9.91a16 16 0 006 6l1.27-1.27a2 2 0 012.11-.45c.907.339 1.85.573 2.81.7A2 2 0 0122 16.92z"/>
                    </svg>
                    <a href="tel:+62">Telepon Dinas</a>
                </div>
                <div class="contact-item">
                    <svg viewBox="0 0 24 24" fill="none" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"/><polyline points="22,6 12,13 2,6"/>
                    </svg>
                    <a href="mailto:info@opd.go.id">Email Kami</a>
                </div>
                <div class="contact-item">
                    <svg viewBox="0 0 24 24" fill="none" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/>
                    </svg>
                    <span style="color:var(--text-mid);">Senin–Jumat, 08.00–16.00</span>
                </div>
            </div>

            {{-- Layanan terkait --}}
            @if(isset($related) && $related->count() > 0)
            <div class="sidebar-widget">
                <div class="sidebar-widget-title">Layanan Terkait</div>
                <div style="display:flex;flex-direction:column;gap:8px;">
                    @foreach($related as $rel)
                    <a href="{{ route('layanan.show', $rel->id) }}"
                       style="display:flex;align-items:center;gap:10px;padding:8px;border-radius:var(--radius);background:var(--white);border:1px solid var(--border);text-decoration:none;transition:border-color 0.2s,background 0.2s;"
                       onmouseover="this.style.borderColor='var(--primary)';this.style.background='rgba(27,58,107,0.03)'"
                       onmouseout="this.style.borderColor='var(--border)';this.style.background='var(--white)'">
                        <div style="width:32px;height:32px;border-radius:7px;background:#EEF3FF;display:flex;align-items:center;justify-content:center;flex-shrink:0;">
                            <svg viewBox="0 0 24 24" width="15" height="15" fill="var(--primary)">
                                <path d="M9 11l3 3L22 4M21 12v7a2 2 0 01-2 2H5a2 2 0 01-2-2V5a2 2 0 012-2h11"/>
                            </svg>
                        </div>
                        <span style="font-size:13px;color:var(--text-dark);font-weight:500;line-height:1.4;display:-webkit-box;-webkit-line-clamp:2;-webkit-box-orient:vertical;overflow:hidden;">{{ $rel->title }}</span>
                    </a>
                    @endforeach
                </div>
            </div>
            @endif

        </aside>
    </div>
</div>

{{-- RELATED LAYANAN BOTTOM --}}
@if(isset($related) && $related->count() > 0)
<div class="related-section">
    <div class="related-inner">
        <div class="related-title">Layanan Lainnya dalam Kategori Ini</div>
        <div class="related-grid">
            @foreach($related as $rel)
            <a href="{{ route('layanan.show', $rel->id) }}" class="related-layanan-card">
                <div class="related-layanan-icon">
                    <svg viewBox="0 0 24 24">
                        <path d="M9 11l3 3L22 4M21 12v7a2 2 0 01-2 2H5a2 2 0 01-2-2V5a2 2 0 012-2h11"/>
                    </svg>
                </div>
                <h4>{{ $rel->title }}</h4>
                <p>{{ Str::limit(strip_tags($rel->content), 90) }}</p>
                <span class="related-layanan-link">
                    Lihat Layanan
                    <svg viewBox="0 0 24 24" fill="none" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <line x1="5" y1="12" x2="19" y2="12"/><polyline points="12 5 19 12 12 19"/>
                    </svg>
                </span>
            </a>
            @endforeach
        </div>
    </div>
</div>
@endif

<script>
    document.addEventListener('DOMContentLoaded', function () {
        // Auto-extract numbered steps from ol inside content for sidebar widget
        const content = document.getElementById('layanan-content');
        const stepsList = document.getElementById('steps-list');
        const stepsWidget = document.getElementById('steps-widget');

        if (content) {
            const firstOl = content.querySelector('ol');
            if (firstOl) {
                const items = firstOl.querySelectorAll('li');
                if (items.length >= 2) {
                    items.forEach((li, i) => {
                        const div = document.createElement('div');
                        div.className = 'step-item';
                        div.innerHTML = `
                            <div class="step-num">${i + 1}</div>
                            <div class="step-text">${li.textContent.trim()}</div>
                        `;
                        stepsList.appendChild(div);
                    });
                    stepsWidget.style.display = 'block';
                }
            }
        }

        // Animate related cards
        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.style.opacity = '1';
                    entry.target.style.transform = 'translateY(0)';
                }
            });
        }, { threshold: 0.1 });

        document.querySelectorAll('.related-layanan-card').forEach((card, i) => {
            card.style.opacity = '0';
            card.style.transform = 'translateY(20px)';
            card.style.transition = `opacity 0.4s ease ${i * 0.1}s, transform 0.4s ease ${i * 0.1}s, box-shadow 0.25s`;
            observer.observe(card);
        });
    });
</script>

@endsection