<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Portal Informasi OPD - Pemerintah Daerah</title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;600;700&family=Plus+Jakarta+Sans:wght@300;400;500;600&display=swap" rel="stylesheet">
</head>
<body>

@extends('layouts.app')

@section('content')
<!-- HERO -->

<section class="hero">
  <div class="hero-pattern"></div>
  <div class="hero-grid"></div>
  <div class="hero-inner">
    <div> 
      <div class="hero-badge"><span></span> Portal Resmi Pemerintah Daerah</div>
      <h1>Transparansi &amp;<br><em>Pelayanan Publik</em><br>Terbaik</h1>
      <p>Akses informasi layanan, dokumen resmi, kegiatan OPD, dan artikel terkini secara mudah, cepat, dan terpercaya dalam satu portal terintegrasi.</p>
      <div class="hero-actions">
        <a href="/layanan" class="btn-primary">
          <svg viewBox="0 0 24 24" width="16" height="16" fill="currentColor"><path d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 000 4h6a2 2 0 000-4M9 5a2 2 0 012-2h2a2 2 0 012 2"/></svg>
          Lihat Layanan
        </a>
        <a href="/artikel" class="btn-outline">
          <svg viewBox="0 0 24 24" width="16" height="16" fill="none" stroke="currentColor" stroke-width="2"><path d="M14 2H6a2 2 0 00-2 2v16a2 2 0 002 2h12a2 2 0 002-2V8z"/><polyline points="14 2 14 8 20 8"/></svg>
          Lihat Artikel
        </a>
      </div>
    </div>
    <div class="hero-visual">
      <div class="hero-card">
        <div class="hero-card-icon">
          <svg viewBox="0 0 24 24"><path d="M17 21v-2a4 4 0 00-4-4H5a4 4 0 00-4 4v2M9 11a4 4 0 100-8 4 4 0 000 8zM23 21v-2a4 4 0 00-3-3.87M16 3.13a4 4 0 010 7.75"/></svg>
        </div>
        <h4>Informasi Layanan</h4>
        <p>Panduan lengkap prosedur &amp; persyaratan layanan</p>
      </div>
      <div class="hero-card">
        <div class="hero-card-icon">
          <svg viewBox="0 0 24 24"><path d="M14 2H6a2 2 0 00-2 2v16a2 2 0 002 2h12a2 2 0 002-2V8zM14 2v6h6M16 13H8M16 17H8M10 9H8"/></svg>
        </div>
        <h4>Dokumen &amp; Arsip Resmi</h4>
        <p>Unduh peraturan, laporan, dan dokumen resmi OPD kapan saja</p>
      </div>
      <div class="hero-card">
        <div class="hero-card-icon">
          <svg viewBox="0 0 24 24"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"/><line x1="16" y1="2" x2="16" y2="6"/><line x1="8" y1="2" x2="8" y2="6"/><line x1="3" y1="10" x2="21" y2="10"/></svg>
        </div>
        <h4>Kegiatan OPD</h4>
        <p>Informasi program dan kegiatan terkini dinas</p>
      </div>
      <div class="hero-card">
        <div class="hero-card-icon">
          <svg viewBox="0 0 24 24"><path d="M12 20h9M16.5 3.5a2.121 2.121 0 013 3L7 19l-4 1 1-4L16.5 3.5z"/></svg>
        </div>
        <h4>Artikel &amp; Berita</h4>
        <p>Informasi terkini seputar kebijakan &amp; program daerah</p>
      </div>
    </div>
  </div>
</section>

<!-- STATS -->
<div class="stats">
  <div class="stats-inner">
    <div class="stat-item">
      <div class="stat-number">{{$stats['layanan']}}</div>
      <div class="stat-label">Jenis Layanan</div>
    </div>
    <div class="stat-item">
      <div class="stat-number">{{$stats['dokumen']}}</div>
      <div class="stat-label">Dokumen Tersedia</div>
    </div>
    <div class="stat-item">
      <div class="stat-number">{{$stats['kegiatan']}}</div>
      <div class="stat-label">Kegiatan OPD</div>
    </div>
    <div class="stat-item">
      <div class="stat-number">{{$stats['artikel']}}</div>
      <div class="stat-label">Artikel Diterbitkan</div>
    </div>
  </div>
</div>

<!-- SEARCH BAR -->
{{-- <div class="search-bar">
  <div class="search-inner">
    <div class="search-input-wrap">
      <svg viewBox="0 0 24 24"><circle cx="11" cy="11" r="8"/><line x1="21" y1="21" x2="16.65" y2="16.65"/></svg>
      <input type="text" class="search-input" placeholder="Cari layanan, dokumen, atau informasi...">
    </div>
    <select class="search-select">
      <option>Semua Kategori</option>
      <option>Informasi Layanan</option>
      <option>Dokumen</option>
      <option>Kegiatan OPD</option>
      <option>Artikel</option>
    </select>
    <button class="search-btn">Cari Sekarang</button>
  </div>
</div> --}}

<!-- LAYANAN -->
<section class="layanan" id="layanan">
  <div class="container">
    <div class="section-label">Informasi Layanan</div>
    <div style="display:flex; justify-content:space-between; align-items:flex-end; flex-wrap:wrap; gap:1rem; margin-bottom:0.5rem;">
      <div>
        <h2 class="section-title">Layanan Publik<br>yang Kami Sediakan</h2>
        <p class="section-desc">Temukan berbagai informasi layanan yang disediakan oleh OPD untuk masyarakat.</p>
      </div>
      <a href="/layanan" class="view-all">Lihat Semua →</a>
    </div>
    <div class="layanan-grid">
      @foreach($layanan as $item)
        <div class="layanan-card">
            <div class="layanan-icon">...</div>
            <h3>{{ $item->name }}</h3>
            <p>{{ $item->deskripsi }}</p>
            <a href="{{ route('layanan.index', ['kategori' => $item->id]) }}" class="layanan-link">
                Selengkapnya →
            </a>
        </div>
      @endforeach
    </div>
  </div>
</section>

<!-- KEGIATAN OPD -->
<section class="kegiatan" id="kegiatan">
  <div class="container">
    <div class="kegiatan-header">
      <div>
        <div class="section-label">Kegiatan OPD</div>
        <h2 class="section-title">Program &amp; Kegiatan<br>Terkini Dinas</h2>
      </div>
      <a href="/kegiatan" class="view-all">Lihat Semua →</a>
    </div>
    <div class="kegiatan-grid">
      @if($kegiatan->isEmpty())
        <p style="grid-column:1/-1;text-align:center;color:rgba(0,0,0,0.6);">Belum ada kegiatan yang dipublikasikan.</p>
      @endif
      @foreach ($kegiatan as $i => $item)
        <div class="kegiatan-card">
          
            {{-- Thumbnail --}}
            <div class="artikel-thumb {{ $item->image ? '' : ['t1','t2','t3'][$i % 3] }}"
                style="{{ $item->image ? 'padding:0; background:none;' : '' }}">
              @if($item->image)
                <img src="{{ asset('storage/' . $item->image) }}"
                    alt="{{ $item->title }}"
                    style="width:100%; height:100%; object-fit:cover; display:block;">
              @else
                <p>Tidak ada thumbnail</p>
              @endif
            </div>
            {{-- <div class="kegiatan-img">
                <div class="kegiatan-img-bg type-{{ ($loop->iteration % 3) + 1 }}"></div>
                <div class="kegiatan-tag">{{ $item->kategori->name }}</div>
                <svg viewBox="0 0 24 24"><path d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/></svg>
            </div> --}}
            <div class="kegiatan-body">
                <div class="kegiatan-meta">{{ \Carbon\Carbon::parse($item->tanggal)->translatedFormat('d F Y') }} · {{ $item->lokasi }}</div>
                <h3>{{ $item->title }}</h3>
                <p>{{ strip_tags($item->content) }}</p>
            </div>
        </div>
      @endforeach
      {{-- <div class="kegiatan-card">
        <div class="kegiatan-img">
          <div class="kegiatan-img-bg type-1"></div>
          <div class="kegiatan-tag">Sosialisasi</div>
          <svg viewBox="0 0 24 24"><path d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/></svg>
        </div>
        <div class="kegiatan-body">
          <div class="kegiatan-meta">24 April 2025 · Balai Kota</div>
          <h3>Sosialisasi Program Pemberdayaan Masyarakat Terpadu Tahun 2025</h3>
          <p>Kegiatan sosialisasi kepada seluruh lapisan masyarakat mengenai program unggulan pemerintah daerah.</p>
        </div>
      </div>
      <div class="kegiatan-card">
        <div class="kegiatan-img">
          <div class="kegiatan-img-bg type-2"></div>
          <div class="kegiatan-tag">Pelatihan</div>
          <svg viewBox="0 0 24 24"><path d="M12 14l9-5-9-5-9 5 9 5z"/><path d="M12 14l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14z"/></svg>
        </div>
        <div class="kegiatan-body">
          <div class="kegiatan-meta">20 April 2025 · Gedung Diklat</div>
          <h3>Pelatihan Digital untuk UMKM Daerah</h3>
          <p>Workshop transformasi digital bagi pelaku UMKM lokal.</p>
        </div>
      </div>
      <div class="kegiatan-card">
        <div class="kegiatan-img">
          <div class="kegiatan-img-bg type-3"></div>
          <div class="kegiatan-tag">Rapat</div>
          <svg viewBox="0 0 24 24"><path d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"/></svg>
        </div>
        <div class="kegiatan-body">
          <div class="kegiatan-meta">18 April 2025 · Ruang Rapat</div>
          <h3>Rapat Koordinasi Lintas Sektor Semester I</h3>
          <p>Koordinasi program antar dinas untuk sinergi capaian target.</p>
        </div>
      </div> --}}
    </div>
  </div>
</section>

<!-- ARTIKEL -->
<section class="artikel" id="artikel">
  <div class="container">
    <div style="display:flex; justify-content:space-between; align-items:flex-end; flex-wrap:wrap; gap:1rem;">
      <div>
        <div class="section-label">Artikel &amp; Berita</div>
        <h2 class="section-title">Informasi &amp; Kabar<br>Terbaru Daerah</h2>
      </div>
      <a href="/artikel" class="view-all">Lihat Semua →</a>
    </div>
    <div class="artikel-grid">
      @if($artikels->isEmpty())
        <p style="grid-column:1/-1;text-align:center;color:rgba(0,0,0,0.6);">Belum ada artikel yang dipublikasikan.</p>
      @endif

      @foreach($artikels as $i => $item)
      <div class="artikel-card">

        {{-- Thumbnail --}}
        <div class="artikel-thumb {{ $item->image ? '' : ['t1','t2','t3'][$i % 3] }}"
            style="{{ $item->image ? 'padding:0; background:none;' : '' }}">
          @if($item->image)
            <img src="{{ asset('storage/' . $item->image) }}"
                alt="{{ $item->title }}"
                style="width:100%; height:100%; object-fit:cover; display:block;">
          @else
            <p>Tidak ada thumbnail</p>
          @endif
        </div>

        <div class="artikel-body">
          <span class="artikel-cat">{{ $item->category->name }}</span>
          <h3>{{ $item->title }}</h3>
          <p>{{ Illuminate\Support\Str::limit(strip_tags($item->content), 150) }}...</p>
          <div class="artikel-footer">
            <span>{{ $item->created_at->format('d M Y') }}</span>
            <span>oleh {{ $item->user->name }}</span>
          </div>
        </div>

      </div>
      @endforeach
    </div>
  </div>
</section>

<!-- DOKUMEN -->
{{-- <section class="dokumen" id="dokumen">
  <div class="container">
    <div style="display:flex; justify-content:space-between; align-items:flex-end; flex-wrap:wrap; gap:1rem; margin-bottom:0;">
      <div>
        <div class="section-label">Dokumen Resmi</div>
        <h2 class="section-title">Unduh Dokumen<br>&amp; Arsip Dinas</h2>
        <p class="section-desc">Akses dan unduh dokumen resmi, peraturan, laporan, dan formulir yang dibutuhkan.</p>
      </div>
      <a href="#" class="view-all">Lihat Semua →</a>
    </div>
    <div class="dokumen-grid">
      <div class="dokumen-card">
        <div class="dokumen-file-icon" data-type="PDF">
          <svg viewBox="0 0 24 24"><path d="M14 2H6a2 2 0 00-2 2v16a2 2 0 002 2h12a2 2 0 002-2V8z"/><polyline points="14 2 14 8 20 8"/></svg>
        </div>
        <div class="dokumen-info">
          <div class="dokumen-type">Peraturan Daerah</div>
          <h4>Perda No. 5 Tahun 2024 tentang Tata Ruang</h4>
          <p>Diterbitkan 12 Jan 2024 · 2.4 MB</p>
        </div>
        <div class="dokumen-arrow">
          <svg viewBox="0 0 24 24"><polyline points="6 9 12 15 18 9"/></svg>
        </div>
      </div>
      <div class="dokumen-card">
        <div class="dokumen-file-icon" data-type="XLSX">
          <svg viewBox="0 0 24 24"><path d="M14 2H6a2 2 0 00-2 2v16a2 2 0 002 2h12a2 2 0 002-2V8z"/><polyline points="14 2 14 8 20 8"/></svg>
        </div>
        <div class="dokumen-info">
          <div class="dokumen-type">Laporan Keuangan</div>
          <h4>Laporan Realisasi Anggaran Triwulan I 2025</h4>
          <p>Diterbitkan 5 Apr 2025 · 1.8 MB</p>
        </div>
        <div class="dokumen-arrow">
          <svg viewBox="0 0 24 24"><polyline points="6 9 12 15 18 9"/></svg>
        </div>
      </div>
      <div class="dokumen-card">
        <div class="dokumen-file-icon" data-type="PDF">
          <svg viewBox="0 0 24 24"><path d="M14 2H6a2 2 0 00-2 2v16a2 2 0 002 2h12a2 2 0 002-2V8z"/><polyline points="14 2 14 8 20 8"/></svg>
        </div>
        <div class="dokumen-info">
          <div class="dokumen-type">Formulir Layanan</div>
          <h4>Formulir Permohonan Izin Mendirikan Bangunan (IMB)</h4>
          <p>Diperbarui 1 Mar 2025 · 320 KB</p>
        </div>
        <div class="dokumen-arrow">
          <svg viewBox="0 0 24 24"><polyline points="6 9 12 15 18 9"/></svg>
        </div>
      </div>
      <div class="dokumen-card">
        <div class="dokumen-file-icon" data-type="PDF">
          <svg viewBox="0 0 24 24"><path d="M14 2H6a2 2 0 00-2 2v16a2 2 0 002 2h12a2 2 0 002-2V8z"/><polyline points="14 2 14 8 20 8"/></svg>
        </div>
        <div class="dokumen-info">
          <div class="dokumen-type">Standar Operasional</div>
          <h4>SOP Pelayanan Publik Dinas Lingkup OPD 2025</h4>
          <p>Diterbitkan 15 Feb 2025 · 4.1 MB</p>
        </div>
        <div class="dokumen-arrow">
          <svg viewBox="0 0 24 24"><polyline points="6 9 12 15 18 9"/></svg>
        </div>
      </div>
      <div class="dokumen-card">
        <div class="dokumen-file-icon" data-type="DOC">
          <svg viewBox="0 0 24 24"><path d="M14 2H6a2 2 0 00-2 2v16a2 2 0 002 2h12a2 2 0 002-2V8z"/><polyline points="14 2 14 8 20 8"/></svg>
        </div>
        <div class="dokumen-info">
          <div class="dokumen-type">Panduan</div>
          <h4>Panduan Penggunaan Sistem Informasi Online OPD</h4>
          <p>Diperbarui 10 Apr 2025 · 890 KB</p>
        </div>
        <div class="dokumen-arrow">
          <svg viewBox="0 0 24 24"><polyline points="6 9 12 15 18 9"/></svg>
        </div>
      </div>
      <div class="dokumen-card">
        <div class="dokumen-file-icon" data-type="PDF">
          <svg viewBox="0 0 24 24"><path d="M14 2H6a2 2 0 00-2 2v16a2 2 0 002 2h12a2 2 0 002-2V8z"/><polyline points="14 2 14 8 20 8"/></svg>
        </div>
        <div class="dokumen-info">
          <div class="dokumen-type">Laporan Tahunan</div>
          <h4>Laporan Tahunan Kinerja OPD Tahun 2024</h4>
          <p>Diterbitkan 31 Jan 2025 · 6.7 MB</p>
        </div>
        <div class="dokumen-arrow">
          <svg viewBox="0 0 24 24"><polyline points="6 9 12 15 18 9"/></svg>
        </div>
      </div>
    </div>
  </div>
</section> --}}

<!-- CTA -->
<section class="cta">
  <div class="cta-inner">
    <h2>Butuh Bantuan Layanan?</h2>
    <p>Tim kami siap membantu Anda menemukan informasi yang dibutuhkan. Hubungi kami atau kunjungi kantor dinas terdekat.</p>
    <div class="cta-buttons">
      <a href="tel:+62" class="btn-primary">
        <svg viewBox="0 0 24 24" width="16" height="16" fill="currentColor"><path d="M22 16.92v3a2 2 0 01-2.18 2 19.79 19.79 0 01-8.63-3.07 19.5 19.5 0 01-6-6 19.79 19.79 0 01-3.07-8.67A2 2 0 014.11 2h3a2 2 0 012 1.72 12.84 12.84 0 00.7 2.81 2 2 0 01-.45 2.11L8.09 9.91a16 16 0 006 6l1.27-1.27a2 2 0 012.11-.45 12.84 12.84 0 002.81.7A2 2 0 0122 16.92z"/></svg>
        Hubungi Kami
      </a>
      <a href="/admin/login" class="btn-outline">
        <svg viewBox="0 0 24 24" width="16" height="16" fill="none" stroke="currentColor" stroke-width="2"><path d="M15 3h4a2 2 0 012 2v14a2 2 0 01-2 2h-4M10 17l5-5-5-5M15 12H3"/></svg>
        Login Admin
      </a>
    </div>
  </div>
</section>
@endsection

<script>
  document.querySelectorAll('a[href^="#"]').forEach(anchor => {
    anchor.addEventListener('click', function(e) {
      const target = document.querySelector(this.getAttribute('href'));
      if (target) {
        e.preventDefault();
        target.scrollIntoView({ behavior: 'smooth', block: 'start' });
      }
    });
  });

  const observer = new IntersectionObserver((entries) => {
    entries.forEach(entry => {
      if (entry.isIntersecting) {
        entry.target.style.opacity = '1';
        entry.target.style.transform = 'translateY(0)';
      }
    });
  }, { threshold: 0.1 });

  document.querySelectorAll('.layanan-card, .kegiatan-card, .artikel-card, .dokumen-card').forEach(card => {
    card.style.opacity = '0';
    card.style.transform = 'translateY(20px)';
    card.style.transition = 'opacity 0.5s ease, transform 0.5s ease, box-shadow 0.3s';
    observer.observe(card);
  });
</script> 
</body>
</html>