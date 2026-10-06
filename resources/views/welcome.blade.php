<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8"><meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>myblog · stories worth keeping</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="site-shell">
    <header class="app-nav">
        <div class="container nav-inner">
            <a href="/" class="brand"><span class="brand-mark">m</span><span class="brand-name">my<span>blog</span></span></a>
            <div class="nav-links">
                <a href="#why">Why myblog</a><a href="#about">About</a>
                @if (Route::has('login')) <a href="{{ route('login') }}">Log in</a> @endif
                @if (Route::has('register')) <a href="{{ route('register') }}" class="btn btn-primary" style="color:#fff;">Start writing</a> @endif
            </div>
        </div>
    </header>
    <main>
        <section class="hero">
            <div class="container hero-grid">
                <div>
                    <div class="eyebrow">A slower corner of the internet</div>
                    <h1>Stories with a little more <em>soul.</em></h1>
                    <p class="hero-copy">myblog is a warm, thoughtful home for essays, ideas, and the small observations that make a day memorable.</p>
                    <div class="hero-actions">
                        @if (Route::has('register')) <a href="{{ route('register') }}" class="btn btn-primary">Explore the journal <span>↗</span></a> @endif
                        @if (Route::has('login')) <a href="{{ route('login') }}" class="btn btn-secondary">I have an account</a> @endif
                    </div>
                    <div class="hero-note"><span class="avatar" style="width:28px;height:28px;background:var(--coral);">✦</span><span><strong>Made for curious people</strong><br>Read deeply. Share generously.</span></div>
                </div>
                <div class="hero-art" aria-label="A preview of the myblog reading experience">
                    <div class="hero-card back"></div>
                    <div class="hero-card main">
                        <div class="hero-card-top"><span>THE FIELD NOTES</span><span>03 / 24</span></div>
                        <div class="hero-card-body"><div class="eyebrow" style="color:#f5c9a7;">Editor's pick</div><h3>The art of noticing what is already here.</h3><p>By Mina Sol · 6 min read</p><div class="hero-card-image"></div></div>
                    </div>
                    <div class="orb"></div>
                </div>
            </div>
        </section>
        <section id="why" class="home-section">
            <div class="container">
                <div class="section-intro"><div><div class="eyebrow">The good stuff</div><h2>Designed for the way ideas grow.</h2></div><span class="muted" style="font-size:.85rem;">01 — 03</span></div>
                <div class="feature-grid">
                    <article class="surface feature-card"><div class="feature-icon">✎</div><h3>Write without noise</h3><p>A calm, focused editor for the stories you want to return to.</p></article>
                    <article class="surface feature-card"><div class="feature-icon">◌</div><h3>Find your people</h3><p>Follow honest perspectives from a growing community of authors.</p></article>
                    <article class="surface feature-card"><div class="feature-icon">↗</div><h3>Keep it yours</h3><p>Your voice, your archive, and a space that feels distinctly you.</p></article>
                </div>
            </div>
        </section>
    </main>
    <footer class="container" style="padding:1.5rem 0 2rem;border-top:1px solid var(--line);color:var(--muted);font-size:.82rem;display:flex;justify-content:space-between;"><span>© {{ date('Y') }} myblog</span><span>Made for meaningful things.</span></footer>
</body>
</html>
