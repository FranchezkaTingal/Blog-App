<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MyBlog</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <style>
        :root {
            --bg: #0f172a;
            --bg-soft: #111827;
            --text: #f8fafc;
            --text-muted: #94a3b8;
            --line: rgba(148, 163, 184, 0.25);
            --glass: rgba(15, 23, 42, 0.52);
            --glass-strong: rgba(15, 23, 42, 0.78);
            --cta-start: #06b6d4;
            --cta-end: #2563eb;
            --glow: rgba(37, 99, 235, 0.45);
        }

        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            font-family: "Inter", sans-serif;
            background:
                radial-gradient(circle at 15% 20%, rgba(6, 182, 212, 0.2), transparent 42%),
                radial-gradient(circle at 80% 10%, rgba(59, 130, 246, 0.2), transparent 40%),
                linear-gradient(140deg, #0b1224 0%, #111827 48%, #0f172a 100%);
            color: var(--text);
            min-height: 100vh;
            line-height: 1.6;
        }

        .container {
            width: min(1160px, 92%);
            margin: 0 auto;
        }

        .site-header {
            position: sticky;
            top: 0;
            z-index: 20;
            backdrop-filter: blur(12px);
            background: rgba(15, 23, 42, 0.58);
            border-bottom: 1px solid rgba(148, 163, 184, 0.15);
        }

        .nav-wrap {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 1rem;
            padding: 1rem 0;
        }

        .logo {
            text-decoration: none;
            font-size: 1.4rem;
            font-weight: 800;
            letter-spacing: 0.02em;
            color: var(--text);
        }

        .logo span {
            background: linear-gradient(120deg, var(--cta-start), var(--cta-end));
            -webkit-background-clip: text;
            background-clip: text;
            color: transparent;
        }

        .nav-actions {
            display: flex;
            align-items: center;
            gap: 0.9rem;
        }

        .btn {
            text-decoration: none;
            font-weight: 600;
            border-radius: 999px;
            padding: 0.62rem 1.15rem;
            border: 1px solid transparent;
            transition: 0.25s ease;
            display: inline-flex;
            align-items: center;
            justify-content: center;
        }

        .btn-login {
            color: #cbd5e1;
            padding: 0.5rem 0.8rem;
        }

        .btn-login:hover {
            color: #f8fafc;
        }

        .btn-primary {
            color: #ffffff;
            background: linear-gradient(120deg, var(--cta-start), var(--cta-end));
            box-shadow: 0 10px 26px var(--glow);
        }

        .btn-primary:hover {
            transform: translateY(-1px);
            box-shadow: 0 16px 34px rgba(37, 99, 235, 0.5);
        }

        .hero {
            padding: 4.8rem 0 3.2rem;
        }

        .hero-grid {
            display: grid;
            grid-template-columns: 1.02fr 0.98fr;
            align-items: center;
            gap: 2.2rem;
        }

        .hero-text h1 {
            font-size: clamp(2rem, 4vw, 3.3rem);
            line-height: 1.15;
            font-weight: 800;
            margin-bottom: 1.1rem;
            max-width: 16ch;
        }

        .hero-text p {
            color: var(--text-muted);
            font-size: 1.05rem;
            max-width: 58ch;
            margin-bottom: 1.75rem;
        }

        .hero-actions {
            display: flex;
            flex-wrap: wrap;
            gap: 0.85rem;
        }

        .btn-secondary {
            color: #dbeafe;
            border-color: rgba(59, 130, 246, 0.45);
            background: rgba(15, 23, 42, 0.35);
        }

        .btn-secondary:hover {
            border-color: rgba(96, 165, 250, 0.95);
            background: rgba(30, 41, 59, 0.55);
            color: #ffffff;
        }

        .visual-wrap {
            position: relative;
            padding: 1rem;
        }

        .visual-wrap::before {
            content: "";
            position: absolute;
            inset: 12% 8% auto;
            height: 58%;
            border-radius: 22px;
            background: radial-gradient(circle at 50% 50%, rgba(37, 99, 235, 0.4), transparent 72%);
            filter: blur(14px);
            z-index: 0;
        }

        .mockup {
            position: relative;
            z-index: 1;
            border: 1px solid rgba(148, 163, 184, 0.26);
            border-radius: 18px;
            background: linear-gradient(145deg, rgba(30, 41, 59, 0.72), rgba(15, 23, 42, 0.82));
            backdrop-filter: blur(12px);
            box-shadow: 0 18px 50px rgba(2, 6, 23, 0.65);
            overflow: hidden;
        }

        .mockup-top {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 0.85rem 1rem;
            border-bottom: 1px solid rgba(148, 163, 184, 0.18);
            background: rgba(15, 23, 42, 0.4);
        }

        .dots {
            display: flex;
            gap: 0.35rem;
        }

        .dot {
            width: 0.55rem;
            height: 0.55rem;
            border-radius: 999px;
            background: rgba(148, 163, 184, 0.55);
        }

        .mockup-label {
            color: #cbd5e1;
            font-size: 0.82rem;
            font-weight: 500;
        }

        .mockup-content {
            padding: 1.1rem;
            display: grid;
            gap: 0.85rem;
        }

        .pane {
            border-radius: 12px;
            background: var(--glass);
            border: 1px solid rgba(148, 163, 184, 0.17);
            padding: 0.8rem;
        }

        .pane-line {
            height: 0.52rem;
            border-radius: 999px;
            background: rgba(148, 163, 184, 0.3);
            margin-bottom: 0.55rem;
        }

        .pane-line:last-child {
            margin-bottom: 0;
            width: 72%;
        }

        .node-network {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 0.85rem;
            padding-top: 0.2rem;
        }

        .node {
            aspect-ratio: 1;
            border-radius: 999px;
            border: 1px solid rgba(96, 165, 250, 0.55);
            background: radial-gradient(circle at 35% 30%, rgba(125, 211, 252, 0.7), rgba(37, 99, 235, 0.35) 48%, rgba(15, 23, 42, 0.2));
            box-shadow: 0 0 22px rgba(59, 130, 246, 0.35);
        }

        .social-proof {
            padding: 0.2rem 0 3.8rem;
        }

        .proof-panel {
            border: 1px solid rgba(148, 163, 184, 0.2);
            border-radius: 16px;
            background: var(--glass-strong);
            backdrop-filter: blur(10px);
            padding: 1rem 1.2rem;
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 1rem;
            flex-wrap: wrap;
        }

        .proof-copy {
            color: #e2e8f0;
            font-weight: 600;
            letter-spacing: 0.01em;
        }

        .proof-logos {
            display: flex;
            align-items: center;
            gap: 1.1rem;
            flex-wrap: wrap;
            color: rgba(148, 163, 184, 0.75);
            font-size: 0.84rem;
            text-transform: uppercase;
            letter-spacing: 0.12em;
        }

        .site-footer {
            border-top: 1px solid transparent;
            border-image: linear-gradient(90deg, rgba(6, 182, 212, 0), rgba(6, 182, 212, 0.55), rgba(37, 99, 235, 0.55), rgba(37, 99, 235, 0));
            border-image-slice: 1;
            padding: 1.25rem 0 2.2rem;
            text-align: center;
            color: var(--text-muted);
            font-size: 0.92rem;
        }

        @media (max-width: 960px) {
            .hero-grid {
                grid-template-columns: 1fr;
            }

            .visual-wrap {
                max-width: 580px;
                width: 100%;
                margin: 0 auto;
            }
        }

        @media (max-width: 640px) {
            .nav-wrap {
                padding: 0.85rem 0;
            }

            .hero {
                padding-top: 3.8rem;
            }

            .hero-actions {
                width: 100%;
            }

            .hero-actions .btn {
                flex: 1 1 180px;
            }
        }
    </style>
</head>
<body>
    <header class="site-header">
        <div class="container nav-wrap">
            <a href="#" class="logo">My<span>Blog</span></a>

            <div class="nav-actions">
                @if (Route::has('login'))
                    <a href="{{ route('login') }}" class="btn btn-login">Login</a>
                @endif

                @if (Route::has('register'))
                    <a href="{{ route('register') }}" class="btn btn-primary">Sign Up</a>
                @endif
            </div>
        </div>
    </header>

    <main>
        <section class="hero">
            <div class="container hero-grid">
                <div class="hero-text">
                    <h1>Share Your Stories With the World</h1>
                    <p>
                        A seamless, modern platform where writers and readers connect through meaningful stories,
                        practical ideas, and fresh perspectives.
                    </p>

                    <div class="hero-actions">
                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="btn btn-primary">Start Reading</a>
                            <a href="{{ route('register') }}" class="btn btn-secondary">Start Writing</a>
                        @endif
                    </div>
                </div>

                <div class="visual-wrap">
                    <div class="mockup">
                        <div class="mockup-top">
                            <div class="dots">
                                <span class="dot"></span>
                                <span class="dot"></span>
                                <span class="dot"></span>
                            </div>
                            <span class="mockup-label">Dashboard Preview</span>
                        </div>

                        <div class="mockup-content">
                            <div class="pane">
                                <div class="pane-line"></div>
                                <div class="pane-line"></div>
                                <div class="pane-line"></div>
                            </div>

                            <div class="pane">
                                <div class="node-network">
                                    <div class="node"></div>
                                    <div class="node"></div>
                                    <div class="node"></div>
                                </div>
                            </div>

                            <div class="pane">
                                <div class="pane-line" style="width: 82%;"></div>
                                <div class="pane-line" style="width: 64%;"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="social-proof">
            <div class="container">
                <div class="proof-panel">
                    <p class="proof-copy">Join 100,000+ modern writers building their audience on MyBlog.</p>
                    <div class="proof-logos">
                        <span>Nebula Labs</span>
                        <span>CloudNova</span>
                        <span>SyntaxFlow</span>
                        <span>ByteForge</span>
                    </div>
                </div>
            </div>
        </section>
    </main>

    <footer class="site-footer">
        <div class="container">&copy; 2026 MyBlog</div>
    </footer>
</body>
</html>
