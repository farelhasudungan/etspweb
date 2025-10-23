@extends('layouts.app')
@section('title', 'Contact — Beauté Verse')
@push('styles')
    <style>
        :root {
            --rose: #ff3a75;
            --ink: #0f172a;
            --muted: #6b7280;
            --bg: #fff;
            --border: #eee;
            --container: 1100px
        }

        * {
            box-sizing: border-box
        }

        html,
        body {
            margin: 0;
            background: var(--bg);
            color: var(--ink);
            font: 16px/1.6 'Inter', system-ui
        }

        a {
            color: inherit;
            text-decoration: none
        }

        .container {
            max-width: var(--container);
            margin: auto;
            padding: 0 20px
        }

        header {
            padding: 18px 0;
            border-bottom: 1px solid var(--border);
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 16px
        }

        .brand {
            font-family: 'Playfair Display', serif;
            font-weight: 700;
            font-size: 28px
        }

        .back {
            color: var(--rose);
            font-weight: 700
        }

        .hero {
            padding: 26px 0
        }

        h1 {
            font: 800 36px/1.2 'Inter';
            margin: 4px 0 8px
        }

        p.lead {
            color: var(--muted);
            margin: 0
        }

        .grid {
            display: grid;
            grid-template-columns: 1.2fr .8fr;
            gap: 28px;
            margin: 26px 0 50px
        }

        .card {
            background: #fff;
            border: 1px solid var(--border);
            border-radius: 16px;
            box-shadow: 0 12px 28px rgba(0, 0, 0, .06)
        }

        .card.pad {
            padding: 20px
        }

        label {
            display: block;
            font-weight: 600;
            margin: 10px 0 6px
        }

        input,
        textarea {
            width: 100%;
            padding: 12px 14px;
            border: 1px solid #e5e7eb;
            border-radius: 12px;
            outline: none
        }

        textarea {
            min-height: 130px;
            resize: vertical
        }

        .row {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 12px
        }

        .btn {
            background: var(--rose);
            color: #fff;
            border: none;
            border-radius: 12px;
            padding: 12px 16px;
            font-weight: 800;
            cursor: pointer
        }

        .info {
            display: grid;
            gap: 12px
        }

        .info h3 {
            font: 800 18px/1.2 'Inter';
            margin: 0 0 6px
        }

        .info .line {
            display: flex;
            gap: 10px;
            color: #374151
        }

        .muted {
            color: var(--muted)
        }

        .map {
            height: 230px;
            border-bottom-left-radius: 16px;
            border-bottom-right-radius: 16px;
            background: linear-gradient(135deg, #ffe5ef, #f9d7f8)
        }

        footer {
            padding: 24px 0;
            border-top: 1px solid var(--border);
            color: #6b7280;
            text-align: center
        }

        @media (max-width:900px) {
            .grid {
                grid-template-columns: 1fr
            }

            .row {
                grid-template-columns: 1fr
            }
        }
    </style>
@endpush
@section('content')
    <header class="container">
        <div class="brand">Beauté Verse</div>
        <a class="back" href="{{ route('home') }}">← Back to Home</a>
    </header>
    <main class="container">
        <section class="hero">
            <h1>Contact Us</h1>
            <p class="lead">Have questions about orders, partnerships, or products? Drop us a message — we’re happy to help
                ✨</p>
        </section>
        <section class="grid">
            <div class="card">
                <div class="pad">
                    <form id="contactForm">
                        <div class="row">
                            <div>
                                <label for="name">Full Name</label>
                                <input id="name" type="text" placeholder="Your name" required />
                            </div>
                            <div>
                                <label for="email">Email</label>
                                <input id="email" type="email" placeholder="you@example.com" required />
                            </div>
                        </div>
                        <div class="row">
                            <div>
                                <label for="phone">WhatsApp (optional)</label>
                                <input id="phone" type="tel" placeholder="08xxxx" />
                            </div>
                            <div>
                                <label for="topic">Topic</label>
                                <input id="topic" type="text" placeholder="Order, product, partnership..." />
                            </div>
                        </div>
                        <label for="message">Message</label>
                        <textarea id="message" placeholder="Type your message here" required></textarea>
                        <div style="display:flex;justify-content:flex-end;margin-top:12px">
                            <button class="btn" type="submit">Send Message</button>
                        </div>
                    </form>
                </div>
                <div class="map" aria-label="Map placeholder"></div>
            </div>
            <aside class="card pad">
                <div class="info">
                    <h3>Customer Care</h3>
                    <div class="line">📧 <a href="mailto:cs@beauteverse.com">cs@beauteverse.com</a></div>
                    <div class="line">💬 <a href="https://wa.me/62811987888" target="_blank" rel="noopener">0811 987 888
                            (WhatsApp)</a></div>
                    <div class="line muted">🕘 Mon–Fri 09.00–18.00 WIB</div>
                    <hr style="border:none;border-top:1px solid #eee;margin:10px 0">
                    <h3>Office</h3>
                    <div class="line">🏢 Jl. Cantik Raya No. 88, Jakarta</div>
                    <div class="line muted">Pickup by appointment only</div>
                    <hr style="border:none;border-top:1px solid #eee;margin:10px 0">
                    <h3>Social</h3>
                    <div class="line">📸 <a href="#">Instagram</a></div>
                    <div class="line">🎵 <a href="#">TikTok</a></div>
                    <div class="line">▶️ <a href="#">YouTube</a></div>
                </div>
            </aside>
        </section>
    </main>
    <footer>© 2025 Beauté Verse · All rights reserved.</footer>
@endsection
@push('scripts')
    <script>
        document.getElementById('contactForm').addEventListener('submit', function (e) { e.preventDefault(); const name = document.getElementById('name').value.trim(); alert('Thanks, ' + (name || 'Beauté Babe') + '! Your message has been received.'); this.reset(); window.scrollTo({ top: 0, behavior: 'smooth' }); });
    </script>
@endpush