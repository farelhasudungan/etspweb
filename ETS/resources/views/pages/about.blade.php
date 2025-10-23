@extends('layouts.app')
@section('title', 'About — Beauté Verse')
@push('styles')
    <style>
        :root {
            --container: 1100px;
            --rose: #ff3a75;
            --ink: #111827
        }

        * {
            box-sizing: border-box
        }

        html,
        body {
            margin: 0;
            font: 16px/1.6 'Inter', system-ui
        }

        a {
            text-decoration: none;
            color: inherit
        }

        header {
            padding: 18px 0;
            border-bottom: 1px solid #eee
        }

        .container {
            max-width: var(--container);
            margin: auto;
            padding: 0 20px
        }

        .brand {
            font-family: 'Playfair Display', serif;
            font-weight: 700;
            font-size: 28px
        }

        .hero {
            padding: 30px 0 0
        }

        .hero img {
            width: 100%;
            border-radius: 18px;
            box-shadow: 0 14px 40px rgba(0, 0, 0, .08);
            display: block;
            object-fit: cover
        }

        h1 {
            font: 800 34px/1.2 'Inter';
            margin: 18px 0 6px;
            color: var(--ink)
        }

        .grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 28px;
            margin: 24px 0 60px
        }

        h3 {
            letter-spacing: 2px;
            color: #0f172a;
            font-weight: 800;
            font-size: 13px;
            margin: 0 0 8px
        }

        p {
            color: #374151;
            margin: 0
        }

        footer {
            padding: 30px 0;
            border-top: 1px solid #eee;
            color: #6b7280;
            text-align: center
        }

        .back {
            color: var(--rose);
            font-weight: 700
        }

        @media (max-width:900px) {
            .grid {
                grid-template-columns: 1fr
            }
        }
    </style>
@endpush
@section('content')
    <header>
        <div class="container" style="display:flex;justify-content:space-between;align-items:center;gap:16px">
            <div class="brand">Beauté Verse</div>
            <a class="back" href="{{ route('home') }}">← Back to Home</a>
        </div>
    </header>
    <main class="container">
        <section class="hero" aria-label="About illustration">
            <img alt="Beauté Verse community illustration"
                src="https://images.unsplash.com/photo-1520975934851-1796a4cb4a02?q=80&w=1600&auto=format&fit=crop" />
        </section>
        <h1>About Beauté Verse</h1>
        <section class="grid">
            <article>
                <h3>YOUR ONLINE BEAUTY DESTINATION</h3>
                <p>Beauté Verse is your trusted destination for authentic beauty products—makeup, skincare, bodycare,
                    fragrance, and tools—curated for beauty lovers across Indonesia.</p>
            </article>
            <article>
                <h3>DELIVERY GUARANTEED</h3>
                <p>We partner with reliable logistics and operate our own fulfillment SOP so orders are processed smoothly
                    and returns are hassle-free.</p>
            </article>
            <article>
                <h3>ONLY THE AUTHENTIC & BPOM READY</h3>
                <p>Authenticity matters. We work with authorized distributors and brands; products are original and eligible
                    for BPOM registration and local compliance.</p>
            </article>
            <article>
                <h3>YOUR DAILY READ OF ALL THINGS BEAUTY</h3>
                <p>Discover tips, trends, and brand updates through our journal—helping you craft a routine that fits your
                    unique beauty style.</p>
            </article>
        </section>
    </main>
    <footer>© 2025 Beauté Verse · All rights reserved.</footer>
@endsection