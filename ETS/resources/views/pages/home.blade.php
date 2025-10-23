@extends('layouts.app')

@section('title', 'Beauté Verse — Home')

@push('styles')
    <style>
        :root {
            --bg: linear-gradient(180deg, #fffafe, #fff7fb);
            --text: #3a2e3f;
            --muted: #b6a7c3;
            --rose: #ff7ab8;
            --pink: #ffd1e6;
            --pill: #fff0f7;
            --card: #ffffff;
            --shadow: 0 20px 50px rgba(255, 182, 216, .25);
            --container: 1200px;
            --radius: 24px
        }

        * {
            box-sizing: border-box
        }

        html,
        body {
            margin: 0;
            background: var(--bg);
            color: var(--text);
            font: 16px/1.5 'Inter', system-ui, -apple-system, Segoe UI, Roboto, Arial, sans-serif
        }

        a {
            color: inherit;
            text-decoration: none
        }

        .container {
            max-width: var(--container);
            margin-inline: auto;
            padding-inline: 20px
        }

        .topbar {
            display: flex;
            align-items: center;
            gap: 20px;
            padding: 20px 0;
            position: sticky;
            top: 0;
            background: var(--bg);
            z-index: 100;
            box-shadow: 0 2px 8px rgba(0, 0, 0, .05)
        }

        .logo {
            font-family: 'Playfair Display', serif;
            font-weight: 700;
            font-size: 28px
        }

        .logo a {
            display: inline-block
        }

        .search {
            flex: 1;
            display: flex;
            align-items: center
        }

        .search input {
            width: 100%;
            padding: 12px 16px;
            border: 1px solid #eee;
            border-radius: 999px;
            background: #fff
        }

        .search input:focus {
            outline: none;
            box-shadow: 0 0 0 3px #ffe3f1
        }

        .actions {
            display: flex;
            align-items: center;
            gap: 14px;
            margin-left: auto
        }

        .login {
            color: var(--rose);
            font-weight: 700
        }

        .cart {
            position: relative
        }

        .badge {
            position: absolute;
            top: -8px;
            right: -10px;
            background: var(--rose);
            color: #fff;
            border-radius: 999px;
            padding: 2px 6px;
            font-size: 12px
        }

        .nav {
            display: flex;
            gap: 16px;
            padding: 10px 0
        }

        .nav a {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            padding: 10px 14px;
            border-radius: 999px;
            background: var(--pill);
            border: 1px solid #ffe3f1;
            color: #6b4e5a;
            font-weight: 700
        }

        .hero {
            display: grid;
            grid-template-columns: 1.4fr .6fr;
            gap: 20px;
            margin: 26px 0
        }

        .slides {
            display: flex;
            transition: transform .6s ease
        }

        .slide {
            min-width: 100%
        }

        .grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 20px
        }

        .tile {
            position: relative;
            border-radius: var(--radius);
            overflow: hidden;
            box-shadow: var(--shadow);
            background: var(--card)
        }

        .tile img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            display: block
        }

        .right-banner {
            border-radius: var(--radius);
            padding: 24px;
            background: linear-gradient(180deg, #fff6fb, #ffeaf4);
            box-shadow: var(--shadow)
        }

        .cta {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            background: var(--rose);
            color: #fff;
            padding: 10px 14px;
            border-radius: 999px;
            font-weight: 800;
            border: none;
            cursor: pointer
        }

        .arrow {
            display: inline-block;
            transform: translateX(0);
            transition: transform .2s
        }

        .cta:hover .arrow {
            transform: translateX(3px)
        }

        .products {
            margin: 40px 0
        }

        .products h2 {
            font-family: 'Playfair Display', serif;
            font-size: 28px;
            margin: 0 0 14px
        }

        .product-row {
            display: flex;
            gap: 16px;
            overflow: auto;
            padding-bottom: 6px
        }

        .product-card {
            min-width: 230px;
            border: 1px solid #eee;
            border-radius: 18px;
            background: #fff;
            box-shadow: 0 8px 24px rgba(255, 182, 216, .2)
        }

        .product-thumb {
            height: 160px;
            border-bottom: 1px solid #f4e1eb;
            background: #fff
        }

        .product-thumb img {
            width: 100%;
            height: 100%;
            object-fit: cover
        }

        .product-body {
            padding: 12px
        }

        .product-title {
            font-weight: 800;
            margin: 0 0 4px
        }

        .product-brand {
            color: #8b6f7b;
            font-size: 14px;
            margin: 0 0 6px
        }

        .product-price {
            font-weight: 900;
            color: #e21f66
        }

        #cartModal {
            border: none;
            border-radius: 0;
            padding: 0;
            width: min(980px, 95vw)
        }

        #cartModal::backdrop {
            background: rgba(0, 0, 0, .35)
        }

        .checkout {
            display: grid;
            grid-template-columns: 1.6fr .9fr;
            gap: 28px;
            padding: 28px;
            background: #fff
        }

        .checkout h1 {
            margin: 0 0 10px
        }

        .items {
            display: grid;
            gap: 12px;
            min-height: 160px
        }

        .items.empty {
            place-items: center;
            color: #777;
            border: 1px dashed #eee;
            border-radius: 12px;
            padding: 18px
        }

        .cart-item {
            display: grid;
            grid-template-columns: 72px 1fr auto;
            gap: 10px;
            align-items: center;
            border: 1px solid #eee;
            padding: 10px;
            border-radius: 12px;
            background: #fff
        }

        .cart-item-info {
            display: grid
        }

        .cart-item-name {
            font-weight: 700
        }

        .cart-item-price {
            color: #e21f66;
            font-weight: 800
        }

        .cart-item-controls {
            display: flex;
            gap: 6px
        }

        .qty-btn {
            width: 30px;
            height: 30px;
            border: 1px solid #eee;
            background: #fafafa;
            border-radius: 8px;
            cursor: pointer
        }

        .remove-btn {
            border: none;
            background: #fff;
            color: #e21f66;
            font-weight: 700;
            cursor: pointer
        }

        .summary {
            border: 1px solid #eee;
            border-radius: 12px;
            padding: 14px;
            background: #fff;
            height: fit-content
        }

        .summary h3 {
            margin: 0 0 10px
        }

        .row {
            display: flex;
            justify-content: space-between;
            margin: 8px 0
        }

        .total {
            font-weight: 800
        }

        .btn-primary {
            width: 100%;
            background: #ff7ab8;
            color: #fff;
            border: none;
            border-radius: 12px;
            padding: 12px 16px;
            font-weight: 800;
            cursor: pointer
        }

        .cart-close {
            position: absolute;
            right: 10px;
            top: 10px;
            border: none;
            background: #fff;
            width: 36px;
            height: 36px;
            border-radius: 10px;
            cursor: pointer
        }

        @media (max-width:900px) {
            .hero {
                grid-template-columns: 1fr
            }

            .grid {
                grid-template-columns: 1fr
            }
        }
    </style>
@endpush

@section('content')
    <header class="container topbar">
        <div class="logo"><a href="{{ route('home') }}">Beauté Verse</a></div>
        <div class="search">
            <input type="text" placeholder="Cari produk..." oninput="filterProducts(this.value)">
        </div>
        <div class="actions">
            <a href="#" class="login" id="openLogin"><b>Login</b></a>
            <a href="#" class="cart" id="openCart">🛒<span class="badge" id="cartBadge">0</span></a>
        </div>
    </header>
    <div style="border-bottom:1px solid rgba(255,122,184,0.3);width:100%;height:1px;margin-bottom:10px"></div>
    <nav class="container nav" aria-label="Main navigation">
        <a href="{{ route('makeup') }}"><span class="icon">💄</span>Makeup</a>
        <a href="{{ route('skincare') }}"><span class="icon">✨</span>Skincare</a>
        <a href="{{ route('bodycare') }}"><span class="icon">🧴</span>Bodycare</a>
    </nav>
    <main class="container">
        <section class="hero" aria-label="Promotions carousel">
            <div class="tile" style="height:320px;overflow:hidden">
                <div id="slides" class="slides">
                    <img class="slide"
                        src="https://images.unsplash.com/photo-1505739776726-3e4fd9d8d2e1?q=80&w=1600&auto=format&fit=crop"
                        alt="Slide 1">
                    <img class="slide"
                        src="https://images.unsplash.com/photo-1598440947619-2c35fc9aa908?q=80&w=1600&auto=format&fit=crop"
                        alt="Slide 2">
                    <img class="slide"
                        src="https://images.unsplash.com/photo-1532712938310-34cb3982ef74?q=80&w=1600&auto=format&fit=crop"
                        alt="Slide 3">
                </div>
                <div
                    style="position:absolute;inset:0;display:flex;align-items:center;justify-content:space-between;padding:0 10px">
                    <button id="prev" class="cta">‹</button>
                    <button id="next" class="cta">›</button>
                </div>
                <div id="dots" class="dots"
                    style="position:absolute;left:0;right:0;bottom:10px;display:flex;gap:6px;justify-content:center"></div>
            </div>
            <div class="right-banner">
                <div class="eyebrow" style="font-weight:800;color:#a06c84">Fresh Arrivals</div>
                <h2 style="margin:4px 0 6px">Glow With Confidence</h2>
                <p style="margin:0 0 12px;color:#7b6a7a">Explore curated picks from top brands, now on promo.</p>
                <button class="cta">Shop Now <span class="arrow">→</span></button>
            </div>
        </section>

        <section class="products">
            <h2>Trending Today</h2>
            <div class="product-row" id="row1"></div>
        </section>

        <section class="products">
            <h2>Editor’s Picks</h2>
            <div class="product-row" id="row2"></div>
        </section>

        <section class="products">
            <h2>Best Sellers</h2>
            <div class="product-row" id="row3"></div>
        </section>
    </main>
    <section class="container"
        style="margin-top:60px;display:flex;justify-content:space-between;align-items:center;padding:30px 0;border-top:1px solid #eee;border-bottom:1px solid #eee">
        <div style="font-family:'Playfair Display',serif;font-size:28px;font-weight:600">Beauté Verse</div>
        <div style="color:#6b7280;font-weight:500">Your Trusted Beauty Destination</div>
        <div style="display:flex;gap:18px;font-size:24px">
            <a href="#">📸</a>
            <a href="#">🎵</a>
            <a href="#">▶️</a>
        </div>
    </section>
    <footer class="container" style="margin-top:80px;padding-top:50px;border-top:1px solid #eee">
        <div style="display:flex;justify-content:space-between;flex-wrap:wrap;gap:40px">
            <div>
                <div style="font-family:'Playfair Display',serif;font-size:22px;font-weight:700;margin-bottom:8px">About
                </div>
                <div style="color:#6b7280;max-width:360px">Curated beauty destination with authentic products and delightful
                    experience.</div>
            </div>
            <div>
                <div style="font-weight:800;margin-bottom:8px">Support</div>
                <div><a href="{{ route('contact') }}">Contact</a></div>
                <div><a href="{{ route('about') }}">About</a></div>
            </div>
        </div>
        <div style="margin-top:40px;font-size:14px;color:#6b7280;text-align:center">© 2025 Beauté Verse. All Rights
            Reserved.</div>
    </footer>
@endsection

@push('scripts')
    <script>
        const slides = document.getElementById('slides'); const total = slides.children.length; let idx = 0; const dots = document.getElementById('dots'); function renderDots() { dots.innerHTML = ''; for (let i = 0; i < total; i++) { const d = document.createElement('button'); d.className = 'dot' + (i === idx ? ' active' : ''); d.setAttribute('aria-label', 'Go to slide ' + (i + 1)); d.onclick = () => { idx = i; update() }; dots.appendChild(d); } } function update() { slides.style.transform = `translateX(-${idx * 100}%)`; Array.from(dots.children).forEach((el, i) => { el.classList.toggle('active', i === idx); }); } document.getElementById('prev').onclick = () => { idx = (idx - 1 + total) % total; update() }; document.getElementById('next').onclick = () => { idx = (idx + 1) % total; update() }; renderDots(); update(); let auto = setInterval(() => { idx = (idx + 1) % total; update() }, 6000);['prev', 'next', 'dots', 'slides'].forEach(id => { (id === 'dots' ? dots : document.getElementById(id)).addEventListener('mouseenter', () => clearInterval(auto)); (id === 'dots' ? dots : document.getElementById(id)).addEventListener('mouseleave', () => { auto = setInterval(() => { idx = (idx + 1) % total; update() }, 6000) }); });
        const PRODUCTS = [
            { name: 'Velvet Lip Cream', brand: 'Rosé All Day', price: 'Rp 129.000', img: 'https://images.unsplash.com/photo-1582092724463-5ccb8a1670c2?q=80&w=800&auto=format&fit=crop' },
            { name: 'Glass Skin Serum', brand: 'Skintific', price: 'Rp 149.000', img: 'https://images.unsplash.com/photo-1585238341211-c9ff9806cf54?q=80&w=800&auto=format&fit=crop' },
            { name: 'Eyeshadow Quad', brand: 'Dear Me', price: 'Rp 179.000', img: 'https://images.unsplash.com/photo-1611930022073-b7a4ba5fcccd?q=80&w=800&auto=format&fit=crop' },
            { name: 'Hydrating Toner', brand: 'Hanasui', price: 'Rp 69.000', img: 'https://images.unsplash.com/photo-1584697964403-7632084e19ab?q=80&w=800&auto=format&fit=crop' },
            { name: 'SPF 50 PA++++', brand: 'Azarine', price: 'Rp 79.000', img: 'https://images.unsplash.com/photo-1556228720-195a672e8a03?q=80&w=800&auto=format&fit=crop' }
        ];
        function card(p) { return `<article class="product-card"><div class="product-thumb"><img src="${p.img}" alt="${p.name}"></div><div class="product-body"><div class="product-title">${p.name}</div><div class="product-brand">${p.brand}</div><div class="product-price">${p.price}</div></div></article>` }
        function mountRow(elId) { const el = document.getElementById(elId); el.innerHTML = PRODUCTS.map(card).join('') }
        mountRow('row1'); mountRow('row2'); mountRow('row3');
        const CART_KEY = 'bv_cart'; function getCart() { try { return JSON.parse(localStorage.getItem(CART_KEY) || '[]') } catch (e) { return [] } }
        function saveCart(cart) { localStorage.setItem(CART_KEY, JSON.stringify(cart)) }
        function updateCartBadge() { const items = getCart(); const total = items.reduce((a, b) => a + b.qty, 0); const badge = document.getElementById('cartBadge'); if (badge) badge.textContent = String(total) }
        function renderCartItems() {
            const items = getCart(); const list = document.getElementById('cartItems'); if (!list) return; if (!items.length) { list.classList.add('empty'); list.innerHTML = '<div class="empty">Your cart is empty</div>' } else { list.classList.remove('empty'); list.innerHTML = items.map((it, i) => `<div class="cart-item"><img src="${it.img}" alt="" style="width:72px;height:72px;object-fit:cover;border-radius:10px"><div class="cart-item-info"><div class="cart-item-name">${it.name}</div><div class="cart-item-price">${it.price}</div></div><div class="cart-item-controls"><button class="qty-btn" onclick="decQty(${i})">-</button><div style="min-width:24px;text-align:center">${it.qty}</div><button class="qty-btn" onclick="incQty(${i})">+</button><button class="remove-btn" onclick="removeFromCart(${i})">Remove</button></div></div>`).join('') }
            const subtotal = items.reduce((sum, it) => sum + parseInt(it.price.replace(/[^0-9]/g, '')) * it.qty, 0); const fmt = val => 'Rp ' + val.toLocaleString('id-ID'); const sEl = document.getElementById('subtotal'); const tEl = document.getElementById('total'); if (sEl) sEl.textContent = fmt(subtotal); if (tEl) tEl.textContent = fmt(subtotal)
        }
        function incQty(i) { const c = getCart(); c[i].qty++; saveCart(c); renderCartItems(); updateCartBadge() }
        function decQty(i) { const c = getCart(); c[i].qty = Math.max(1, c[i].qty - 1); saveCart(c); renderCartItems(); updateCartBadge() }
        function removeFromCart(i) { const c = getCart(); c.splice(i, 1); saveCart(c); renderCartItems(); updateCartBadge() }
        const openCart = document.getElementById('openCart'); const cartModal = document.getElementById('cartModal'); if (openCart && cartModal) { openCart.addEventListener('click', e => { e.preventDefault(); renderCartItems(); cartModal.showModal() }); document.getElementById('closeCart').addEventListener('click', () => cartModal.close()) }
        function filterProducts(term) { const list = [...document.querySelectorAll('.product-card')]; list.forEach(card => { const txt = card.textContent.toLowerCase(); card.style.display = txt.includes(term.toLowerCase()) ? '' : 'none' }) }
        const loginModal = document.getElementById('loginModal'); const registerModal = document.getElementById('registerModal'); const openLogin = document.getElementById('openLogin'); if (openLogin && loginModal) { openLogin.addEventListener('click', e => { e.preventDefault(); loginModal.showModal() }) }
        const regLink = document.getElementById('openRegister'); if (regLink) { regLink.addEventListener('click', e => { e.preventDefault(); registerModal.showModal() }) }
        const regName = document.getElementById('regName'); const regEmail = document.getElementById('regEmail'); const regPass = document.getElementById('regPass'); const regAgree = document.getElementById('regAgree'); const regError = document.getElementById('regError'); const regCancel = document.getElementById('regCancel'); const loginCancel = document.getElementById('loginCancel'); if (regCancel) regCancel.addEventListener('click', () => registerModal.close()); if (loginCancel) loginCancel.addEventListener('click', () => loginModal.close()); const createAccount = document.getElementById('createAccount'); if (createAccount) { createAccount.addEventListener('click', () => { const ok = regName.value.trim() && regEmail.value.trim() && regPass.value.length >= 6 && regAgree.checked; if (!ok) { regError.style.display = 'block'; return; } regError.style.display = 'none'; localStorage.setItem('bv_registered', '1'); registerModal.close(); loginModal.showModal(); }) }
        document.addEventListener('DOMContentLoaded', updateCartBadge);
    </script>
@endpush