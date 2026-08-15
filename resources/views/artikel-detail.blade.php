@extends('layouts.app')

@section('title', $artikel->title)

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
        max-width: 860px;
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

    /* ── ARTICLE HERO ── */
    .artikel-hero {
        background: var(--white);
        padding: 3.5rem 2rem 0;
    }
    .artikel-hero-inner {
        max-width: 860px;
        margin: 0 auto;
    }
    .artikel-hero-meta {
        display: flex;
        align-items: center;
        gap: 10px;
        flex-wrap: wrap;
        margin-bottom: 1.25rem;
    }
    .artikel-cat-badge {
        display: inline-block;
        background: rgba(27,58,107,0.08);
        color: var(--primary);
        font-size: 11px;
        font-weight: 700;
        letter-spacing: 0.07em;
        text-transform: uppercase;
        padding: 4px 12px;
        border-radius: 20px;
    }
    .artikel-hero-meta-sep {
        width: 4px; height: 4px;
        border-radius: 50%;
        background: var(--border);
        flex-shrink: 0;
    }
    .artikel-hero-meta span {
        font-size: 13px;
        color: var(--text-muted);
        display: flex;
        align-items: center;
        gap: 5px;
    }
    .artikel-hero-meta span svg { width: 13px; height: 13px; stroke: currentColor; }

    .artikel-hero h1 {
        font-family: var(--font-display);
        font-size: clamp(1.75rem, 4vw, 2.6rem);
        font-weight: 700;
        color: var(--primary-dark);
        line-height: 1.3;
        margin-bottom: 1.5rem;
    }

    /* Author strip */
    .artikel-author-strip {
        display: flex;
        align-items: center;
        gap: 12px;
        padding: 1rem 0;
        border-top: 1px solid var(--border);
        border-bottom: 1px solid var(--border);
        margin-bottom: 0;
    }
    .artikel-avatar {
        width: 40px; height: 40px;
        border-radius: 50%;
        background: var(--primary);
        color: var(--white);
        font-size: 14px;
        font-weight: 700;
        display: flex;
        align-items: center;
        justify-content: center;
        flex-shrink: 0;
    }
    .artikel-author-info { flex: 1; }
    .artikel-author-name {
        font-size: 14px;
        font-weight: 600;
        color: var(--text-dark);
        line-height: 1.3;
    }
    .artikel-author-role {
        font-size: 12px;
        color: var(--text-muted);
    }
    .artikel-share {
        display: flex;
        align-items: center;
        gap: 8px;
    }
    .artikel-share-label { font-size: 12px; color: var(--text-muted); }
    .share-btn {
        width: 32px; height: 32px;
        border-radius: 50%;
        border: 1.5px solid var(--border);
        display: flex;
        align-items: center;
        justify-content: center;
        text-decoration: none;
        color: var(--text-muted);
        transition: border-color 0.2s, color 0.2s, background 0.2s;
    }
    .share-btn:hover {
        border-color: var(--primary);
        color: var(--primary);
        background: rgba(27,58,107,0.06);
    }
    .share-btn svg { width: 14px; height: 14px; stroke: currentColor; }

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

    /* ── ARTICLE BODY ── */
    .artikel-layout {
        max-width: 860px;
        margin: 0 auto;
        padding: 3rem 2rem 5rem;
        display: grid;
        grid-template-columns: 1fr 220px;
        gap: 3rem;
        align-items: start;
    }
    @media (max-width: 768px) {
        .artikel-layout { grid-template-columns: 1fr; gap: 2rem; }
    }

    /* Prose content */
    .artikel-prose {
        min-width: 0;
    }
    .artikel-prose h2 {
        font-family: var(--font-display);
        font-size: 1.45rem;
        font-weight: 700;
        color: var(--primary-dark);
        margin: 2rem 0 0.75rem;
        line-height: 1.35;
    }
    .artikel-prose h3 {
        font-family: var(--font-display);
        font-size: 1.15rem;
        font-weight: 600;
        color: var(--primary-dark);
        margin: 1.5rem 0 0.6rem;
    }
    .artikel-prose p {
        font-size: 16px;
        color: var(--text-mid);
        line-height: 1.85;
        margin-bottom: 1.25rem;
    }
    .artikel-prose ul,
    .artikel-prose ol {
        padding-left: 1.5rem;
        margin-bottom: 1.25rem;
    }
    .artikel-prose li {
        font-size: 16px;
        color: var(--text-mid);
        line-height: 1.8;
        margin-bottom: 0.4rem;
    }
    .artikel-prose blockquote {
        border-left: 4px solid var(--primary);
        background: rgba(27,58,107,0.04);
        margin: 1.5rem 0;
        padding: 1rem 1.5rem;
        border-radius: 0 var(--radius) var(--radius) 0;
        font-style: italic;
        color: var(--text-mid);
    }
    .artikel-prose img {
        display: block;
        margin: 0 auto;
        max-width: 100%;
        max-height: 400px;
        height: auto;
        object-fit: contain;
        object-position: center;
    }
    .artikel-prose a {
        color: var(--primary);
        text-decoration: underline;
        text-underline-offset: 3px;
    }
    .artikel-prose strong { color: var(--text-dark); font-weight: 600; }
    .artikel-prose hr {
        border: none;
        border-top: 1px solid var(--border);
        margin: 2rem 0;
    }
    .artikel-prose table {
        width: 100%;
        border-collapse: collapse;
        font-size: 14px;
        margin-bottom: 1.25rem;
    }
    .artikel-prose th {
        background: var(--surface);
        color: var(--primary-dark);
        font-weight: 600;
        padding: 10px 14px;
        border: 1px solid var(--border);
        text-align: left;
    }
    .artikel-prose td {
        padding: 10px 14px;
        border: 1px solid var(--border);
        color: var(--text-mid);
        vertical-align: top;
    }
    .artikel-prose tr:nth-child(even) td { background: rgba(245,243,238,0.5); }

    /* ── SIDEBAR ── */
    .artikel-sidebar {
        position: sticky;
        top: 90px;
    }
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

    /* Table of contents */
    .toc-list {
        list-style: none;
        padding: 0;
        display: flex;
        flex-direction: column;
        gap: 6px;
    }
    .toc-list li a {
        font-size: 13px;
        color: var(--text-muted);
        text-decoration: none;
        display: flex;
        align-items: flex-start;
        gap: 8px;
        line-height: 1.4;
        transition: color 0.2s;
    }
    .toc-list li a::before {
        content: '';
        width: 5px; height: 5px;
        border-radius: 50%;
        background: var(--border);
        margin-top: 6px;
        flex-shrink: 0;
        transition: background 0.2s;
    }
    .toc-list li a:hover { color: var(--primary); }
    .toc-list li a:hover::before { background: var(--primary); }

    /* Info widget */
    .info-row {
        display: flex;
        justify-content: space-between;
        align-items: center;
        font-size: 13px;
        padding: 6px 0;
        border-bottom: 1px solid var(--border);
    }
    .info-row:last-child { border-bottom: none; }
    .info-row-label { color: var(--text-muted); }
    .info-row-value { font-weight: 600; color: var(--text-dark); text-align: right; }

    /* ── RELATED ARTICLES ── */
    .related-section {
        background: var(--surface);
        padding: 3rem 2rem;
        border-top: 1px solid var(--border);
    }
    .related-inner { max-width: 860px; margin: 0 auto; }
    .related-title {
        font-family: var(--font-display);
        font-size: 1.3rem;
        font-weight: 700;
        color: var(--primary-dark);
        margin-bottom: 1.5rem;
        display: flex;
        align-items: center;
        gap: 10px;
    }
    .related-title::after {
        content: '';
        flex: 1;
        height: 1px;
        background: var(--border);
    }
    .related-grid {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: 1rem;
    }
    @media (max-width: 680px) { .related-grid { grid-template-columns: 1fr; } }

    .related-card {
        background: var(--white);
        border: 1px solid var(--border);
        border-radius: var(--radius-lg);
        overflow: hidden;
        text-decoration: none;
        display: flex;
        flex-direction: column;
        transition: box-shadow 0.25s, transform 0.25s;
    }
    .related-card:hover { box-shadow: var(--shadow-md); transform: translateY(-3px); }
    .related-card-thumb {
        height: 120px;
        background: linear-gradient(135deg, #EEF3FF 0%, #DDEAFF 100%);
        display: flex;
        align-items: center;
        justify-content: center;
        position: relative;
        overflow: hidden;
    }
    .related-card-thumb img {
        width: 100%; height: 100%; object-fit: cover;
        position: absolute; inset: 0;
    }
    .related-card-thumb svg { width: 36px; height: 36px; fill: var(--primary); opacity: 0.12; }
    .related-card-body { padding: 1rem; }
    .related-card-cat {
        font-size: 10px;
        font-weight: 700;
        text-transform: uppercase;
        letter-spacing: 0.06em;
        color: var(--accent);
        margin-bottom: 4px;
    }
    .related-card-body h4 {
        font-family: var(--font-display);
        font-size: 0.9rem;
        font-weight: 600;
        color: var(--text-dark);
        line-height: 1.4;
        display: -webkit-box;
        -webkit-line-clamp: 2;
        -webkit-box-orient: vertical;
        overflow: hidden;
    }
    .related-card-date {
        font-size: 11px;
        color: var(--text-muted);
        margin-top: 6px;
    }

    /* ── BACK NAV ── */
    .back-nav {
        display: inline-flex;
        align-items: center;
        gap: 6px;
        font-size: 13px;
        font-weight: 600;
        color: var(--primary);
        text-decoration: none;
        padding: 0.5rem 0;
        transition: gap 0.2s;
    }
    .back-nav:hover { gap: 9px; }
    .back-nav svg { width: 15px; height: 15px; stroke: currentColor; }
</style>

{{-- BREADCRUMB --}}
<div class="breadcrumb-bar">
    <div class="breadcrumb-inner">
        <a href="{{ url('/') }}">Beranda</a>
        <svg viewBox="0 0 24 24" fill="none" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="9 18 15 12 9 6"/></svg>
        <a href="{{ route('artikel.index') }}">Artikel</a>
        <svg viewBox="0 0 24 24" fill="none" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="9 18 15 12 9 6"/></svg>
        <span>{{ $artikel->title }}</span>
    </div>
</div>

{{-- HERO --}}
<div class="artikel-hero">
    <div class="artikel-hero-inner">
        <div class="artikel-hero-meta">
            @if($artikel->category)
                <span class="artikel-cat-badge">{{ $artikel->category->name }}</span>
                <span class="artikel-hero-meta-sep"></span>
            @endif
            <span>
                <svg viewBox="0 0 24 24" fill="none" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <rect x="3" y="4" width="18" height="18" rx="2"/><line x1="16" y1="2" x2="16" y2="6"/><line x1="8" y1="2" x2="8" y2="6"/><line x1="3" y1="10" x2="21" y2="10"/>
                </svg>
                {{ $artikel->created_at->translatedFormat('d F Y') }}
            </span>
            <span class="artikel-hero-meta-sep"></span>
            <span>
                <svg viewBox="0 0 24 24" fill="none" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"/><circle cx="12" cy="12" r="3"/>
                </svg>
                {{ ceil(str_word_count(strip_tags($artikel->content)) / 200) }} menit baca
            </span>
        </div>

        <h1>{{ $artikel->title }}</h1>

        <div class="artikel-author-strip">
            <div class="artikel-avatar">
                {{ strtoupper(substr($artikel->user->name ?? 'A', 0, 1)) }}
            </div>
            <div class="artikel-author-info">
                <div class="artikel-author-name">{{ $artikel->user->name ?? 'Admin OPD' }}</div>
                <div class="artikel-author-role">Penulis · {{ $artikel->updated_at->diffForHumans() }}</div>
            </div>
            <div class="artikel-share">
                <span class="artikel-share-label">Bagikan:</span>
                <a href="https://wa.me/?text={{ urlencode($artikel->title . ' ' . url()->current()) }}"
                   target="_blank" class="share-btn" title="WhatsApp">
                    <svg viewBox="0 0 24 24" fill="none" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M21 15a2 2 0 01-2 2H7l-4 4V5a2 2 0 012-2h14a2 2 0 012 2z"/>
                    </svg>
                </a>
                <button onclick="navigator.clipboard.writeText(window.location.href).then(()=>alert('Tautan disalin!'))"
                        class="share-btn" title="Salin tautan" style="background:none;border:1.5px solid var(--border);cursor:pointer;">
                    <svg viewBox="0 0 24 24" fill="none" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <rect x="9" y="9" width="13" height="13" rx="2"/><path d="M5 15H4a2 2 0 01-2-2V4a2 2 0 012-2h9a2 2 0 012 2v1"/>
                    </svg>
                </button>
            </div>
        </div>
    </div>
</div>

{{-- FEATURE IMAGE --}}
<div class="artikel-feature-img">
    <div class="artikel-feature-img-wrap">
        @if($artikel->image)
            <img src="{{ asset('storage/' . $artikel->image) }}" alt="{{ $artikel->title }}">
        @else
            <div class="artikel-feature-img-placeholder">
                <svg viewBox="0 0 24 24"><path d="M19 3H5a2 2 0 00-2 2v14a2 2 0 002 2h14a2 2 0 002-2V5a2 2 0 00-2-2z"/><circle cx="8.5" cy="8.5" r="1.5"/><polyline points="21 15 16 10 5 21"/></svg>
            </div>
        @endif
    </div>
</div>

{{-- ARTICLE BODY + SIDEBAR --}}
<div style="background:var(--white);">
    <div class="artikel-layout">
        {{-- PROSE --}}
        <article class="artikel-prose" id="artikel-content">
            {!! $artikel->content !!}

            {{-- Tags / bottom meta --}}
            <hr>
            <div style="display:flex;align-items:center;justify-content:space-between;flex-wrap:wrap;gap:12px;margin-top:1rem;">
                <div style="display:flex;align-items:center;gap:8px;">
                    @if($artikel->category)
                        <span style="font-size:13px;color:var(--text-muted);">Kategori:</span>
                        <a href="{{ route('artikel.index', ['kategori' => $artikel->category->id]) }}"
                           style="display:inline-block;background:rgba(27,58,107,0.08);color:var(--primary);font-size:12px;font-weight:600;padding:4px 12px;border-radius:20px;text-decoration:none;">
                            {{ $artikel->category->name }}
                        </a>
                    @endif
                </div>
                <a href="{{ route('artikel.index') }}" class="back-nav">
                    <svg viewBox="0 0 24 24" fill="none" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <line x1="19" y1="12" x2="5" y2="12"/><polyline points="12 19 5 12 12 5"/>
                    </svg>
                    Kembali ke Artikel
                </a>
            </div>
        </article>

        {{-- SIDEBAR --}}
        <aside class="artikel-sidebar">
            {{-- Info widget --}}
            <div class="sidebar-widget">
                <div class="sidebar-widget-title">Info Artikel</div>
                <div class="info-row">
                    <span class="info-row-label">Diterbitkan</span>
                    <span class="info-row-value">{{ $artikel->created_at->format('d M Y') }}</span>
                </div>
                <div class="info-row">
                    <span class="info-row-label">Diperbarui</span>
                    <span class="info-row-value">{{ $artikel->updated_at->format('d M Y') }}</span>
                </div>
                <div class="info-row">
                    <span class="info-row-label">Penulis</span>
                    <span class="info-row-value">{{ $artikel->user->name ?? 'Admin' }}</span>
                </div>
                @if($artikel->category)
                <div class="info-row">
                    <span class="info-row-label">Kategori</span>
                    <span class="info-row-value">{{ $artikel->category->name }}</span>
                </div>
                @endif
                <div class="info-row">
                    <span class="info-row-label">Estimasi baca</span>
                    <span class="info-row-value">{{ ceil(str_word_count(strip_tags($artikel->content)) / 200) }} menit</span>
                </div>
            </div>

            {{-- TOC (auto-generated from h2 tags) --}}
            <div class="sidebar-widget" id="toc-widget" style="display:none;">
                <div class="sidebar-widget-title">Daftar Isi</div>
                <ul class="toc-list" id="toc-list"></ul>
            </div>

            {{-- Dokumen Pendukung --}}
            @if($artikel->documents->count() > 0)
            <div class="sidebar-widget">
                <div class="sidebar-widget-title">Dokumen Pendukung</div>
                @foreach($artikel->documents as $doc)
                <a href="{{ asset('storage/' . $doc->file_path) }}" target="_blank"
                   style="display:inline-flex;align-items:center;gap:8px;padding:8px 14px;background:var(--white);border:1.5px solid var(--primary);border-radius:var(--radius);color:var(--primary);font-size:13px;font-weight:600;text-decoration:none;transition:all 0.2s;margin-bottom:8px;width:100%;"
                   onmouseover="this.style.background='var(--primary)';this.style.color='var(--white)'"
                   onmouseout="this.style.background='var(--white)';this.style.color='var(--primary)'">
                    <svg viewBox="0 0 24 24" width="16" height="16" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M14 2H6a2 2 0 00-2 2v16a2 2 0 002 2h12a2 2 0 002-2V8z"/><polyline points="14 2 14 8 20 8"/><line x1="16" y1="13" x2="8" y2="13"/><line x1="16" y1="17" x2="8" y2="17"/><polyline points="10 9 9 9 8 9"/>
                    </svg>
                    {{ strtoupper(pathinfo($doc->file_path, PATHINFO_EXTENSION)) }} Dokumen
                </a>
                @endforeach
            </div>
            @endif
        </aside>
    </div>
</div>

{{-- RELATED ARTICLES --}}
@if(isset($related) && $related->count() > 0)
<div class="related-section">
    <div class="related-inner">
        <div class="related-title">Artikel Terkait</div>
        <div class="related-grid">
            @foreach($related as $rel)
            <a href="{{ route('artikel.show', $rel->slug ?? $rel->id) }}" class="related-card">
                <div class="related-card-thumb">
                    @if($rel->image)
                        <img src="{{ asset('storage/' . $rel->image) }}" alt="{{ $rel->title }}">
                    @else
                        <svg viewBox="0 0 24 24"><path d="M19 3H5a2 2 0 00-2 2v14a2 2 0 002 2h14a2 2 0 002-2V5a2 2 0 00-2-2z"/></svg>
                    @endif
                </div>
                <div class="related-card-body">
                    @if($rel->category)
                        <div class="related-card-cat">{{ $rel->category->name }}</div>
                    @endif
                    <h4>{{ $rel->title }}</h4>
                    <div class="related-card-date">{{ $rel->created_at->format('d M Y') }}</div>
                </div>
            </a>
            @endforeach
        </div>
    </div>
</div>
@endif

<script>
    // Auto-generate Table of Contents from h2 inside artikel-prose
    document.addEventListener('DOMContentLoaded', function () {
        const content = document.getElementById('artikel-content');
        const tocList = document.getElementById('toc-list');
        const tocWidget = document.getElementById('toc-widget');
        const headings = content.querySelectorAll('h2');

        if (headings.length >= 2) {
            headings.forEach((h, i) => {
                const id = 'section-' + i;
                h.id = id;
                const li = document.createElement('li');
                li.innerHTML = `<a href="#${id}">${h.textContent}</a>`;
                tocList.appendChild(li);
            });
            tocWidget.style.display = 'block';
        }

        // Smooth scroll for TOC links
        document.querySelectorAll('.toc-list a').forEach(a => {
            a.addEventListener('click', function (e) {
                e.preventDefault();
                const target = document.querySelector(this.getAttribute('href'));
                if (target) {
                    window.scrollTo({ top: target.offsetTop - 100, behavior: 'smooth' });
                }
            });
        });

        // Animate in
        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.style.opacity = '1';
                    entry.target.style.transform = 'translateY(0)';
                }
            });
        }, { threshold: 0.1 });

        document.querySelectorAll('.related-card').forEach((card, i) => {
            card.style.opacity = '0';
            card.style.transform = 'translateY(20px)';
            card.style.transition = `opacity 0.4s ease ${i * 0.1}s, transform 0.4s ease ${i * 0.1}s, box-shadow 0.25s`;
            observer.observe(card);
        });
    });
</script>

@endsection