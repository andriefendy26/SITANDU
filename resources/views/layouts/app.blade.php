<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Portal Informasi OPD - Pemerintah Daerah</title>
    <meta charset="UTF-8">
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
        /* ── NAVBAR ── */
        .nav {
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
            min-width: 0;
        }

        .nav-logo {
            width: 42px;
            height: 42px;
            border-radius: 8px;
            flex-shrink: 0;
        }

        .nav-title {
            display: flex;
            flex-direction: column;
            min-width: 0;
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
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
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

        /* ── HAMBURGER BUTTON (hidden on desktop) ── */
        .nav-burger {
            display: none;
            flex-direction: column;
            justify-content: center;
            gap: 5px;
            width: 32px;
            height: 32px;
            background: none;
            border: none;
            cursor: pointer;
            padding: 0;
            flex-shrink: 0;
        }

        .nav-burger span {
            display: block;
            width: 100%;
            height: 2px;
            background: var(--primary);
            border-radius: 2px;
            transition: transform 0.25s, opacity 0.25s;
        }

        .nav-burger.active span:nth-child(1) { transform: translateY(7px) rotate(45deg); }
        .nav-burger.active span:nth-child(2) { opacity: 0; }
        .nav-burger.active span:nth-child(3) { transform: translateY(-7px) rotate(-45deg); }

        /* ── RESPONSIVE BREAKPOINTS ── */

        /* Tablet: kecilkan title, kurangi gap */
        @media (max-width: 992px) {
            .nav-inner { padding: 0 1.5rem; gap: 1rem; }
            .nav-links { gap: 1.25rem; }
            .nav-title span:last-child { display: none; } /* sembunyikan subtitle panjang */
        }

        /* Mobile: hamburger + dropdown menu */
        @media (max-width: 768px) {
            .nav-burger { display: flex; }

            .nav-links {
                display: none; /* default tersembunyi */
                position: absolute;
                top: 68px;
                left: 0;
                right: 0;
                flex-direction: column;
                align-items: stretch;
                gap: 0;
                background: var(--white);
                border-bottom: 1px solid var(--border);
                box-shadow: 0 8px 16px rgba(0,0,0,0.06);
            }

            .nav-links.active {
                display: flex; /* tampil saat aktif */
            }

            .nav-links li {
                width: 100%;
                border-bottom: 1px solid var(--border);
            }

            .nav-links li:last-child { border-bottom: none; }

            .nav-links a {
                display: block;
                padding: 14px 1.5rem;
                font-size: 15px;
            }

            .btn-nav {
                margin: 0.75rem 1.5rem;
                text-align: center;
                display: block;
            }
        }

        /* Extra small: perkecil logo & title */
        @media (max-width: 420px) {
            .nav-logo { width: 34px; height: 34px; }
            .nav-title span:first-child { font-size: 13px; }
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
            padding: 1rem 2rem;
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
     /* Hero visual */
        .hero-visual {
            display: flex;
            align-items: center;
            justify-content: center;
            position: relative;
            /* padding: 2rem; */
        }

        /* Lingkaran dekorasi di belakang gambar */
        .hero-visual::before {
            content: '';
            position: absolute;
            width: 380px;
            height: 380px;
            border-radius: 50%;
            background: linear-gradient(135deg, rgba(var(--primary-rgb, 37, 99, 235), 0.08) 0%, rgba(var(--primary-rgb, 37, 99, 235), 0.03) 100%);
            border: 2px dashed rgba(var(--primary-rgb, 37, 99, 235), 0.15);
            animation: rotateSlow 20s linear infinite;
            z-index: 0;
        }

        /* Lingkaran kedua lebih kecil */
        .hero-visual::after {
            content: '';
            position: absolute;
            width: 280px;
            height: 280px;
            border-radius: 50%;
            background: linear-gradient(135deg, rgba(var(--primary-rgb, 37, 99, 235), 0.05) 0%, transparent 100%);
            z-index: 0;
        }

        /* Gambar utama */
        .hero-visual img {
            position: relative;
            z-index: 1;
            width: 380px;
            height: auto;
            border-radius: 1.5rem;
            filter: drop-shadow(0 20px 40px rgba(0, 0, 0, 0.12)) drop-shadow(0 8px 16px rgba(0, 0, 0, 0.08));
            animation: floatUpDown 4s ease-in-out infinite;
            transition: filter 0.3s ease;
        }

        .hero-visual img:hover {
            filter: drop-shadow(0 28px 50px rgba(0, 0, 0, 0.18)) drop-shadow(0 12px 20px rgba(0, 0, 0, 0.1));
        }

        /* Animasi mengambang */
        @keyframes floatUpDown {
            0%, 100% { transform: translateY(0px); }
            50%       { transform: translateY(-14px); }
        }

        /* Animasi rotasi lambat pada ring */
        @keyframes rotateSlow {
            from { transform: rotate(0deg); }
            to   { transform: rotate(360deg); }
        }

        /* Responsif */
        @media (max-width: 768px) {
            .hero-visual img {
                width: 260px;
            }
            .hero-visual::before {
                width: 280px;
                height: 280px;
            }
            .hero-visual::after {
                width: 200px;
                height: 200px;
            }
        }
        
        /* ── DOKUMENTASI GRID ── */
        .doc-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 0.75rem;
        }
        @media (max-width: 600px) {
            .doc-grid { grid-template-columns: repeat(2, 1fr); }
        }
        .doc-item {
            aspect-ratio: 1 / 1;
            border-radius: var(--radius);
            overflow: hidden;
            border: 1px solid var(--border);
            background: var(--surface);
            display: block;
        }
        .doc-item img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.3s;
        }
        .doc-item:hover img {
            transform: scale(1.06);
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
    @include('component.header')
    @yield('content')
    @include('component.footer')
</body>
<script>
        const burger = document.getElementById('navBurger');
        const navLinks = document.getElementById('navLinks');

        burger.addEventListener('click', function () {
            const isOpen = navLinks.classList.toggle('active');
            burger.classList.toggle('active');
            burger.setAttribute('aria-expanded', isOpen);
        });

        // Tutup menu saat klik link
        navLinks.querySelectorAll('a').forEach(link => {
            link.addEventListener('click', () => {
                navLinks.classList.remove('active');
                burger.classList.remove('active');
                burger.setAttribute('aria-expanded', false);
            });
        });
        
    </script>
</html>