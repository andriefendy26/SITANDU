<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Portal Informasi OPD - Pemerintah Daerah</title>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;600;700&family=Plus+Jakarta+Sans:wght@300;400;500;600&display=swap" rel="stylesheet">
<style>
  *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }

  :root {
    --primary: #1B3A6B;
    --primary-light: #2756A4;
    --primary-dark: #0F2240;
    --accent: #C8922A;
    --accent-light: #E8B84B;
    --surface: #F5F3EE;
    --surface-dark: #EAE7DF;
    --white: #FFFFFF;
    --text-dark: #1A1A1A;
    --text-mid: #444444;
    --text-muted: #777777;
    --border: rgba(27, 58, 107, 0.15);
    --shadow-sm: 0 2px 12px rgba(27,58,107,0.08);
    --shadow-md: 0 8px 32px rgba(27,58,107,0.12);
    --shadow-lg: 0 16px 56px rgba(27,58,107,0.16);
    --font-display: 'Playfair Display', Georgia, serif;
    --font-body: 'Plus Jakarta Sans', sans-serif;
    --radius: 6px;
    --radius-lg: 12px;
  }

  html { scroll-behavior: smooth; }

  body {
    font-family: var(--font-body);
    font-size: 16px;
    line-height: 1.7;
    color: var(--text-dark);
    background: var(--white);
    overflow-x: hidden;
  }

  /* ── NAVBAR ── */
  nav {
    position: fixed;
    top: 0; left: 0; right: 0;
    z-index: 999;
    background: rgba(255,255,255,0.97);
    border-bottom: 1px solid var(--border);
    backdrop-filter: blur(8px);
  }

  .nav-inner {
    max-width: 1200px;
    margin: 0 auto;
    padding: 0 2rem;
    height: 68px;
    display: flex;
    align-items: center;
    justify-content: space-between;
    gap: 2rem;
  }

  .nav-brand {
    display: flex;
    align-items: center;
    gap: 12px;
    text-decoration: none;
  }

  .nav-logo {
    width: 42px;
    height: 42px;
    background: var(--primary);
    border-radius: 8px;
    display: flex;
    align-items: center;
    justify-content: center;
  }

  .nav-logo svg { width: 24px; height: 24px; fill: var(--white); }

  .nav-title {
    display: flex;
    flex-direction: column;
  }

  .nav-title span:first-child {
    font-family: var(--font-display);
    font-size: 15px;
    font-weight: 700;
    color: var(--primary);
    line-height: 1.2;
  }

  .nav-title span:last-child {
    font-size: 11px;
    color: var(--text-muted);
    letter-spacing: 0.04em;
    text-transform: uppercase;
  }

  .nav-links {
    display: flex;
    align-items: center;
    gap: 2rem;
    list-style: none;
  }

  .nav-links a {
    font-size: 14px;
    font-weight: 500;
    color: var(--text-mid);
    text-decoration: none;
    transition: color 0.2s;
  }

  .nav-links a:hover { color: var(--primary); }

  .btn-nav {
    padding: 8px 20px;
    background: var(--primary);
    color: var(--white) !important;
    border-radius: var(--radius);
    font-size: 13px !important;
    font-weight: 600 !important;
    letter-spacing: 0.02em;
    transition: background 0.2s, transform 0.1s !important;
  }

  .btn-nav:hover {
    background: var(--primary-light) !important;
    transform: translateY(-1px);
  }

  /* ── HERO ── */
  .hero {
    min-height: 100vh;
    padding-top: 68px;
    background: linear-gradient(160deg, var(--primary-dark) 0%, var(--primary) 50%, #1E4D8C 100%);
    position: relative;
    display: flex;
    align-items: center;
    overflow: hidden;
  }

  .hero-pattern {
    position: absolute;
    inset: 0;
    background-image:
      radial-gradient(circle at 20% 20%, rgba(200,146,42,0.1) 0%, transparent 50%),
      radial-gradient(circle at 80% 80%, rgba(255,255,255,0.05) 0%, transparent 40%);
  }

  .hero-grid {
    position: absolute;
    inset: 0;
    background-image:
      linear-gradient(rgba(255,255,255,0.03) 1px, transparent 1px),
      linear-gradient(90deg, rgba(255,255,255,0.03) 1px, transparent 1px);
    background-size: 48px 48px;
  }

  .hero-inner {
    position: relative;
    max-width: 1200px;
    margin: 0 auto;
    padding: 5rem 2rem;
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 5rem;
    align-items: center;
  }

  .hero-badge {
    display: inline-flex;
    align-items: center;
    gap: 8px;
    padding: 6px 16px;
    border: 1px solid rgba(200,146,42,0.5);
    border-radius: 100px;
    background: rgba(200,146,42,0.1);
    color: var(--accent-light);
    font-size: 12px;
    font-weight: 600;
    letter-spacing: 0.06em;
    text-transform: uppercase;
    margin-bottom: 1.5rem;
  }

  .hero-badge span {
    width: 6px; height: 6px;
    background: var(--accent-light);
    border-radius: 50%;
    display: inline-block;
    animation: pulse 2s ease-in-out infinite;
  }

  @keyframes pulse {
    0%, 100% { opacity: 1; transform: scale(1); }
    50% { opacity: 0.5; transform: scale(0.8); }
  }

  .hero h1 {
    font-family: var(--font-display);
    font-size: clamp(2.2rem, 4vw, 3.2rem);
    font-weight: 700;
    color: var(--white);
    line-height: 1.2;
    margin-bottom: 1.25rem;
  }

  .hero h1 em {
    font-style: normal;
    color: var(--accent-light);
  }

  .hero p {
    font-size: 17px;
    color: rgba(255,255,255,0.75);
    line-height: 1.8;
    margin-bottom: 2rem;
    font-weight: 300;
  }

  .hero-actions {
    display: flex;
    gap: 1rem;
    flex-wrap: wrap;
  }

  .btn-primary {
    display: inline-flex;
    align-items: center;
    gap: 8px;
    padding: 14px 28px;
    background: var(--accent);
    color: var(--white);
    border-radius: var(--radius);
    font-size: 15px;
    font-weight: 600;
    text-decoration: none;
    transition: background 0.2s, transform 0.15s, box-shadow 0.2s;
    box-shadow: 0 4px 20px rgba(200,146,42,0.4);
  }

  .btn-primary:hover {
    background: var(--accent-light);
    transform: translateY(-2px);
    box-shadow: 0 8px 28px rgba(200,146,42,0.5);
  }

  .btn-outline {
    display: inline-flex;
    align-items: center;
    gap: 8px;
    padding: 14px 28px;
    border: 1.5px solid rgba(255,255,255,0.35);
    color: rgba(255,255,255,0.9);
    border-radius: var(--radius);
    font-size: 15px;
    font-weight: 500;
    text-decoration: none;
    transition: border-color 0.2s, background 0.2s;
  }

  .btn-outline:hover {
    border-color: rgba(255,255,255,0.7);
    background: rgba(255,255,255,0.08);
  }

  /* Hero visual */
  .hero-visual {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 1rem;
  }

  .hero-card {
    background: rgba(255,255,255,0.07);
    border: 1px solid rgba(255,255,255,0.12);
    border-radius: var(--radius-lg);
    padding: 1.25rem;
    backdrop-filter: blur(4px);
    transition: transform 0.3s;
    animation: floatUp 0.8s ease-out both;
  }

  .hero-card:hover { transform: translateY(-4px); }
  .hero-card:nth-child(1) { animation-delay: 0.1s; }
  .hero-card:nth-child(2) { animation-delay: 0.2s; grid-column: span 2; }
  .hero-card:nth-child(3) { animation-delay: 0.3s; }
  .hero-card:nth-child(4) { animation-delay: 0.4s; }

  @keyframes floatUp {
    from { opacity: 0; transform: translateY(20px); }
    to { opacity: 1; transform: translateY(0); }
  }

  .hero-card-icon {
    width: 36px; height: 36px;
    background: rgba(200,146,42,0.2);
    border-radius: 8px;
    display: flex;
    align-items: center;
    justify-content: center;
    margin-bottom: 0.75rem;
  }

  .hero-card-icon svg { width: 18px; height: 18px; fill: var(--accent-light); }

  .hero-card h4 {
    font-size: 13px;
    font-weight: 600;
    color: var(--white);
    margin-bottom: 4px;
  }

  .hero-card p {
    font-size: 11px;
    color: rgba(255,255,255,0.5);
    margin: 0;
    line-height: 1.5;
  }

  /* ── STATS ── */
  .stats {
    background: var(--primary-dark);
    padding: 2.5rem 0;
    border-top: 1px solid rgba(255,255,255,0.06);
  }

  .stats-inner {
    max-width: 1200px;
    margin: 0 auto;
    padding: 0 2rem;
    display: grid;
    grid-template-columns: repeat(4, 1fr);
    gap: 2rem;
  }

  .stat-item {
    text-align: center;
    padding: 1rem;
    border-right: 1px solid rgba(255,255,255,0.08);
  }

  .stat-item:last-child { border-right: none; }

  .stat-number {
    font-family: var(--font-display);
    font-size: 2.2rem;
    font-weight: 700;
    color: var(--accent-light);
    line-height: 1;
    margin-bottom: 4px;
  }

  .stat-label {
    font-size: 12px;
    color: rgba(255,255,255,0.5);
    text-transform: uppercase;
    letter-spacing: 0.06em;
  }

  /* ── SECTIONS COMMON ── */
  section {
    padding: 6rem 0;
  }

  .container {
    max-width: 1200px;
    margin: 0 auto;
    padding: 0 2rem;
  }

  .section-label {
    display: inline-flex;
    align-items: center;
    gap: 8px;
    font-size: 12px;
    font-weight: 700;
    text-transform: uppercase;
    letter-spacing: 0.1em;
    color: var(--accent);
    margin-bottom: 1rem;
  }

  .section-label::before {
    content: '';
    width: 24px;
    height: 2px;
    background: var(--accent);
    border-radius: 2px;
  }

  .section-title {
    font-family: var(--font-display);
    font-size: clamp(1.8rem, 3vw, 2.5rem);
    font-weight: 700;
    color: var(--primary-dark);
    line-height: 1.3;
    margin-bottom: 1rem;
  }

  .section-desc {
    font-size: 17px;
    color: var(--text-muted);
    max-width: 600px;
    line-height: 1.8;
    font-weight: 300;
  }

  /* ── LAYANAN ── */
  .layanan { background: var(--surface); }

  .layanan-grid {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: 1.5rem;
    margin-top: 3rem;
  }

  .layanan-card {
    background: var(--white);
    border-radius: var(--radius-lg);
    padding: 2rem;
    border: 1px solid var(--border);
    box-shadow: var(--shadow-sm);
    transition: transform 0.3s, box-shadow 0.3s;
    position: relative;
    overflow: hidden;
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
  }

  .layanan-icon svg { width: 26px; height: 26px; fill: var(--primary); }

  .layanan-card h3 {
    font-size: 17px;
    font-weight: 600;
    color: var(--primary-dark);
    margin-bottom: 0.5rem;
    font-family: var(--font-display);
  }

  .layanan-card p {
    font-size: 14px;
    color: var(--text-muted);
    line-height: 1.7;
    margin-bottom: 1.25rem;
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
  }

  .layanan-link:hover { gap: 10px; }

  /* ── KEGIATAN ── */
  .kegiatan { background: var(--white); }

  .kegiatan-header {
    display: flex;
    justify-content: space-between;
    align-items: flex-end;
    margin-bottom: 3rem;
  }

  .kegiatan-grid {
    display: grid;
    grid-template-columns: 1.4fr 1fr 1fr;
    gap: 1.5rem;
  }

  .kegiatan-card {
    border-radius: var(--radius-lg);
    overflow: hidden;
    border: 1px solid var(--border);
    box-shadow: var(--shadow-sm);
    transition: transform 0.3s, box-shadow 0.3s;
    background: var(--white);
  }

  .kegiatan-card:hover {
    transform: translateY(-4px);
    box-shadow: var(--shadow-md);
  }

  .kegiatan-img {
    height: 180px;
    background: var(--primary);
    position: relative;
    overflow: hidden;
    display: flex;
    align-items: center;
    justify-content: center;
  }

  .kegiatan-card:first-child .kegiatan-img { height: 240px; }

  .kegiatan-img-bg {
    position: absolute;
    inset: 0;
  }

  .kegiatan-img-bg.type-1 {
    background: linear-gradient(135deg, #1B3A6B 0%, #2756A4 100%);
  }

  .kegiatan-img-bg.type-2 {
    background: linear-gradient(135deg, #0F4C75 0%, #1B6CA8 100%);
  }

  .kegiatan-img-bg.type-3 {
    background: linear-gradient(135deg, #1a3a4a 0%, #2d6a8a 100%);
  }

  .kegiatan-img svg {
    position: relative;
    width: 52px; height: 52px;
    fill: rgba(255,255,255,0.2);
  }

  .kegiatan-tag {
    position: absolute;
    top: 1rem; left: 1rem;
    background: var(--accent);
    color: var(--white);
    font-size: 10px;
    font-weight: 700;
    text-transform: uppercase;
    letter-spacing: 0.08em;
    padding: 4px 10px;
    border-radius: 4px;
  }

  .kegiatan-body {
    padding: 1.5rem;
  }

  .kegiatan-meta {
    font-size: 11px;
    color: var(--text-muted);
    text-transform: uppercase;
    letter-spacing: 0.06em;
    margin-bottom: 0.5rem;
  }

  .kegiatan-card h3 {
    font-family: var(--font-display);
    font-size: 16px;
    font-weight: 600;
    color: var(--primary-dark);
    line-height: 1.4;
    margin-bottom: 0.5rem;
  }

  .kegiatan-card p {
    font-size: 13px;
    color: var(--text-muted);
    line-height: 1.6;
  }

  /* ── ARTIKEL ── */
  .artikel { background: var(--surface); }

  .artikel-grid {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: 1.5rem;
    margin-top: 3rem;
  }

  .artikel-card {
    background: var(--white);
    border-radius: var(--radius-lg);
    overflow: hidden;
    border: 1px solid var(--border);
    box-shadow: var(--shadow-sm);
    transition: transform 0.3s, box-shadow 0.3s;
  }

  .artikel-card:hover {
    transform: translateY(-4px);
    box-shadow: var(--shadow-md);
  }

  .artikel-thumb {
    height: 160px;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 3rem;
  }

  .artikel-thumb.t1 { background: linear-gradient(135deg, #EEF3FF 0%, #DDEAFF 100%); }
  .artikel-thumb.t2 { background: linear-gradient(135deg, #FFF8EE 0%, #FEEEDD 100%); }
  .artikel-thumb.t3 { background: linear-gradient(135deg, #F0FAF0 0%, #DAEEDA 100%); }

  .artikel-body { padding: 1.5rem; }

  .artikel-cat {
    display: inline-block;
    font-size: 10px;
    font-weight: 700;
    text-transform: uppercase;
    letter-spacing: 0.08em;
    color: var(--primary);
    background: #EEF3FF;
    padding: 3px 10px;
    border-radius: 4px;
    margin-bottom: 0.75rem;
  }

  .artikel-card h3 {
    font-family: var(--font-display);
    font-size: 15px;
    font-weight: 600;
    color: var(--primary-dark);
    line-height: 1.4;
    margin-bottom: 0.5rem;
  }

  .artikel-card p {
    font-size: 13px;
    color: var(--text-muted);
    line-height: 1.6;
    margin-bottom: 1rem;
  }

  .artikel-footer {
    display: flex;
    align-items: center;
    justify-content: space-between;
    font-size: 11px;
    color: var(--text-muted);
    padding-top: 1rem;
    border-top: 1px solid var(--border);
  }

  /* ── DOKUMEN ── */
  .dokumen { background: var(--white); }

  .dokumen-grid {
    display: grid;
    grid-template-columns: repeat(2, 1fr);
    gap: 1rem;
    margin-top: 3rem;
  }

  .dokumen-card {
    display: flex;
    align-items: center;
    gap: 1rem;
    padding: 1.25rem 1.5rem;
    background: var(--surface);
    border: 1px solid var(--border);
    border-radius: var(--radius-lg);
    transition: transform 0.2s, box-shadow 0.2s, border-color 0.2s;
    text-decoration: none;
    cursor: pointer;
  }

  .dokumen-card:hover {
    transform: translateY(-2px);
    box-shadow: var(--shadow-sm);
    border-color: var(--primary);
  }

  .dokumen-file-icon {
    width: 44px; height: 52px;
    background: var(--white);
    border: 1px solid var(--border);
    border-radius: 8px;
    display: flex;
    align-items: center;
    justify-content: center;
    flex-shrink: 0;
    position: relative;
  }

  .dokumen-file-icon::after {
    content: attr(data-type);
    position: absolute;
    bottom: 4px;
    font-size: 7px;
    font-weight: 800;
    letter-spacing: 0.04em;
    text-transform: uppercase;
    color: var(--primary);
  }

  .dokumen-file-icon svg { width: 20px; height: 20px; fill: var(--primary); margin-bottom: 10px; }

  .dokumen-info { flex: 1; min-width: 0; }

  .dokumen-type {
    font-size: 10px;
    font-weight: 700;
    text-transform: uppercase;
    letter-spacing: 0.08em;
    color: var(--accent);
    margin-bottom: 3px;
  }

  .dokumen-info h4 {
    font-size: 14px;
    font-weight: 600;
    color: var(--primary-dark);
    white-space: nowrap;
    overflow: hidden;
    text-overflow: ellipsis;
  }

  .dokumen-info p {
    font-size: 12px;
    color: var(--text-muted);
  }

  .dokumen-arrow {
    width: 32px; height: 32px;
    border-radius: 50%;
    background: var(--white);
    border: 1px solid var(--border);
    display: flex;
    align-items: center;
    justify-content: center;
    flex-shrink: 0;
    transition: background 0.2s, border-color 0.2s;
  }

  .dokumen-card:hover .dokumen-arrow {
    background: var(--primary);
    border-color: var(--primary);
  }

  .dokumen-card:hover .dokumen-arrow svg { fill: var(--white); }
  .dokumen-arrow svg { width: 14px; height: 14px; fill: var(--text-muted); transition: fill 0.2s; }

  /* ── CTA ── */
  .cta {
    background: var(--primary);
    padding: 5rem 0;
    text-align: center;
    position: relative;
    overflow: hidden;
  }

  .cta::before {
    content: '';
    position: absolute;
    inset: 0;
    background: radial-gradient(circle at 50% 50%, rgba(200,146,42,0.1), transparent 70%);
  }

  .cta-inner { position: relative; max-width: 700px; margin: 0 auto; padding: 0 2rem; }

  .cta h2 {
    font-family: var(--font-display);
    font-size: clamp(1.8rem, 3vw, 2.4rem);
    font-weight: 700;
    color: var(--white);
    margin-bottom: 1rem;
  }

  .cta p {
    font-size: 17px;
    color: rgba(255,255,255,0.7);
    margin-bottom: 2.5rem;
    font-weight: 300;
  }

  .cta-buttons { display: flex; gap: 1rem; justify-content: center; flex-wrap: wrap; }

  /* ── FOOTER ── */
  footer {
    background: var(--primary-dark);
    color: rgba(255,255,255,0.6);
    padding: 4rem 0 2rem;
  }

  .footer-inner {
    max-width: 1200px;
    margin: 0 auto;
    padding: 0 2rem;
  }

  .footer-grid {
    display: grid;
    grid-template-columns: 2fr 1fr 1fr 1fr;
    gap: 3rem;
    padding-bottom: 3rem;
    border-bottom: 1px solid rgba(255,255,255,0.08);
    margin-bottom: 2rem;
  }

  .footer-brand p {
    font-size: 14px;
    line-height: 1.8;
    margin-top: 1rem;
  }

  .footer-col h4 {
    font-size: 12px;
    font-weight: 700;
    text-transform: uppercase;
    letter-spacing: 0.1em;
    color: rgba(255,255,255,0.9);
    margin-bottom: 1.25rem;
  }

  .footer-col ul { list-style: none; }

  .footer-col ul li {
    margin-bottom: 0.6rem;
  }

  .footer-col ul li a {
    font-size: 14px;
    color: rgba(255,255,255,0.5);
    text-decoration: none;
    transition: color 0.2s;
  }

  .footer-col ul li a:hover { color: var(--accent-light); }

  .footer-bottom {
    display: flex;
    justify-content: space-between;
    align-items: center;
    font-size: 13px;
  }

  .footer-bottom a { color: var(--accent-light); text-decoration: none; }

  /* ── SEARCH BAR ── */
  .search-bar {
    background: var(--white);
    padding: 2rem 0;
    border-bottom: 1px solid var(--border);
    box-shadow: var(--shadow-sm);
    position: sticky;
    top: 68px;
    z-index: 99;
  }

  .search-inner {
    max-width: 1200px;
    margin: 0 auto;
    padding: 0 2rem;
    display: flex;
    gap: 1rem;
  }

  .search-input-wrap {
    flex: 1;
    position: relative;
  }

  .search-input-wrap svg {
    position: absolute;
    left: 14px;
    top: 50%;
    transform: translateY(-50%);
    width: 18px; height: 18px;
    fill: var(--text-muted);
    pointer-events: none;
  }

  .search-input {
    width: 100%;
    height: 46px;
    padding: 0 1rem 0 44px;
    border: 1.5px solid var(--border);
    border-radius: var(--radius);
    font-family: var(--font-body);
    font-size: 15px;
    color: var(--text-dark);
    outline: none;
    transition: border-color 0.2s;
    background: var(--surface);
  }

  .search-input:focus { border-color: var(--primary); background: var(--white); }
  .search-input::placeholder { color: var(--text-muted); }

  .search-select {
    height: 46px;
    padding: 0 1rem;
    border: 1.5px solid var(--border);
    border-radius: var(--radius);
    font-family: var(--font-body);
    font-size: 14px;
    color: var(--text-mid);
    background: var(--surface);
    outline: none;
    cursor: pointer;
    min-width: 160px;
  }

  .search-btn {
    height: 46px;
    padding: 0 24px;
    background: var(--primary);
    color: var(--white);
    border: none;
    border-radius: var(--radius);
    font-family: var(--font-body);
    font-size: 14px;
    font-weight: 600;
    cursor: pointer;
    transition: background 0.2s;
    white-space: nowrap;
  }

  .search-btn:hover { background: var(--primary-light); }

  /* responsive */
  @media (max-width: 900px) {
    .hero-inner { grid-template-columns: 1fr; gap: 3rem; }
    .hero-visual { display: none; }
    .layanan-grid { grid-template-columns: 1fr 1fr; }
    .kegiatan-grid { grid-template-columns: 1fr; }
    .artikel-grid { grid-template-columns: 1fr 1fr; }
    .dokumen-grid { grid-template-columns: 1fr; }
    .footer-grid { grid-template-columns: 1fr 1fr; gap: 2rem; }
    .stats-inner { grid-template-columns: repeat(2,1fr); }
    .nav-links { display: none; }
  }

  @media (max-width: 600px) {
    .layanan-grid { grid-template-columns: 1fr; }
    .artikel-grid { grid-template-columns: 1fr; }
    .footer-grid { grid-template-columns: 1fr; }
    .stats-inner { grid-template-columns: 1fr 1fr; }
  }

  /* View all button */
  .view-all {
    display: inline-flex;
    align-items: center;
    gap: 6px;
    font-size: 13px;
    font-weight: 600;
    color: var(--primary);
    text-decoration: none;
    border: 1.5px solid var(--primary);
    border-radius: var(--radius);
    padding: 8px 18px;
    transition: background 0.2s, color 0.2s;
    white-space: nowrap;
  }

  .view-all:hover {
    background: var(--primary);
    color: var(--white);
  }
</style>
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
        <a href="#layanan" class="btn-primary">
          <svg viewBox="0 0 24 24" width="16" height="16" fill="currentColor"><path d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 000 4h6a2 2 0 000-4M9 5a2 2 0 012-2h2a2 2 0 012 2"/></svg>
          Lihat Layanan
        </a>
        <a href="#dokumen" class="btn-outline">
          <svg viewBox="0 0 24 24" width="16" height="16" fill="none" stroke="currentColor" stroke-width="2"><path d="M14 2H6a2 2 0 00-2 2v16a2 2 0 002 2h12a2 2 0 002-2V8z"/><polyline points="14 2 14 8 20 8"/></svg>
          Unduh Dokumen
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
      <div class="stat-number">24+</div>
      <div class="stat-label">Jenis Layanan</div>
    </div>
    <div class="stat-item">
      <div class="stat-number">180+</div>
      <div class="stat-label">Dokumen Tersedia</div>
    </div>
    <div class="stat-item">
      <div class="stat-number">60+</div>
      <div class="stat-label">Kegiatan OPD</div>
    </div>
    <div class="stat-item">
      <div class="stat-number">120+</div>
      <div class="stat-label">Artikel Diterbitkan</div>
    </div>
  </div>
</div>

<!-- SEARCH BAR -->
<div class="search-bar">
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
</div>

<!-- LAYANAN -->
<section class="layanan" id="layanan">
  <div class="container">
    <div class="section-label">Informasi Layanan</div>
    <div style="display:flex; justify-content:space-between; align-items:flex-end; flex-wrap:wrap; gap:1rem; margin-bottom:0.5rem;">
      <div>
        <h2 class="section-title">Layanan Publik<br>yang Kami Sediakan</h2>
        <p class="section-desc">Temukan berbagai informasi layanan yang disediakan oleh OPD untuk masyarakat.</p>
      </div>
      <a href="#" class="view-all">Lihat Semua →</a>
    </div>
    <div class="layanan-grid">
      <div class="layanan-card">
        <div class="layanan-icon">
          <svg viewBox="0 0 24 24"><path d="M9 14l6-6M9 8h.01M15 14h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
        </div>
        <h3>Perizinan Usaha</h3>
        <p>Panduan dan prosedur pengurusan izin usaha mikro, kecil, dan menengah di wilayah daerah.</p>
        <a href="#" class="layanan-link">Selengkapnya →</a>
      </div>
      <div class="layanan-card">
        <div class="layanan-icon">
          <svg viewBox="0 0 24 24"><path d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/></svg>
        </div>
        <h3>Administrasi Kependudukan</h3>
        <p>Layanan pengurusan KTP, KK, akta kelahiran, dan dokumen kependudukan lainnya.</p>
        <a href="#" class="layanan-link">Selengkapnya →</a>
      </div>
      <div class="layanan-card">
        <div class="layanan-icon">
          <svg viewBox="0 0 24 24"><path d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/></svg>
        </div>
        <h3>Pendidikan &amp; Beasiswa</h3>
        <p>Informasi program bantuan pendidikan, beasiswa daerah, dan fasilitas sekolah.</p>
        <a href="#" class="layanan-link">Selengkapnya →</a>
      </div>
      <div class="layanan-card">
        <div class="layanan-icon">
          <svg viewBox="0 0 24 24"><path d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"/></svg>
        </div>
        <h3>Kesehatan Masyarakat</h3>
        <p>Jadwal posyandu, imunisasi, BPJS, dan program kesehatan masyarakat lainnya.</p>
        <a href="#" class="layanan-link">Selengkapnya →</a>
      </div>
      <div class="layanan-card">
        <div class="layanan-icon">
          <svg viewBox="0 0 24 24"><path d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/></svg>
        </div>
        <h3>Infrastruktur &amp; Tata Ruang</h3>
        <p>Informasi tentang pembangunan infrastruktur, tata ruang kota, dan perencanaan wilayah.</p>
        <a href="#" class="layanan-link">Selengkapnya →</a>
      </div>
      <div class="layanan-card">
        <div class="layanan-icon">
          <svg viewBox="0 0 24 24"><path d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
        </div>
        <h3>Ketenagakerjaan</h3>
        <p>Informasi lowongan kerja, pelatihan, dan program pemberdayaan tenaga kerja daerah.</p>
        <a href="#" class="layanan-link">Selengkapnya →</a>
      </div>
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
      <a href="#" class="view-all">Lihat Semua →</a>
    </div>
    <div class="kegiatan-grid">
      <div class="kegiatan-card">
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
      </div>
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
      <a href="#" class="view-all">Lihat Semua →</a>
    </div>
    <div class="artikel-grid">
      <div class="artikel-card">
        <div class="artikel-thumb t1">📋</div>
        <div class="artikel-body">
          <span class="artikel-cat">Kebijakan</span>
          <h3>Peraturan Baru Pengurusan Izin Lingkungan Hidup Tahun 2025</h3>
          <p>Pemerintah daerah menerbitkan peraturan baru yang menyederhanakan prosedur pengurusan izin lingkungan...</p>
          <div class="artikel-footer">
            <span>20 Apr 2025</span>
            <span>oleh Admin OPD</span>
          </div>
        </div>
      </div>
      <div class="artikel-card">
        <div class="artikel-thumb t2">🏗️</div>
        <div class="artikel-body">
          <span class="artikel-cat">Infrastruktur</span>
          <h3>Pembangunan Jalan Lingkar Utara Ditargetkan Selesai 2025</h3>
          <p>Proyek strategis pembangunan jalan lingkar utara senilai ratusan miliar terus dikebut penyelesaiannya...</p>
          <div class="artikel-footer">
            <span>18 Apr 2025</span>
            <span>oleh Tim Redaksi</span>
          </div>
        </div>
      </div>
      <div class="artikel-card">
        <div class="artikel-thumb t3">🌿</div>
        <div class="artikel-body">
          <span class="artikel-cat">Lingkungan</span>
          <h3>Program Penghijauan Kota Berhasil Tanam 10.000 Pohon</h3>
          <p>Gerakan tanam pohon yang melibatkan seluruh elemen masyarakat berhasil mencapai target ambisius...</p>
          <div class="artikel-footer">
            <span>15 Apr 2025</span>
            <span>oleh Humas OPD</span>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- DOKUMEN -->
<section class="dokumen" id="dokumen">
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
</section>

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