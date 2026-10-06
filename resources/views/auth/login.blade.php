<x-guest-layout>
    <div style="margin-bottom:1.75rem;">
        <div class="eyebrow">Welcome back</div>
        <h1 class="serif" style="font-size:2.25rem;line-height:1.1;margin:.35rem 0 .5rem;">Make yourself at home.</h1>
        <p class="muted" style="margin:0;font-size:.92rem;">Sign in to continue reading and sharing stories.</p>
    </div>

    <x-auth-session-status class="alert success" :status="session('status')" />
    @if ($errors->any())
        <div class="alert error" style="width:100%;margin:0 0 1rem;">{{ $errors->first() }}</div>
    @endif

    <form method="POST" action="{{ route('login') }}" style="display:grid;gap:1rem;">
        @csrf
        <div class="field">
            <label for="email">Email address</label>
            <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus autocomplete="username" placeholder="you@example.com">
            <x-input-error :messages="$errors->get('email')" class="field-error" />
        </div>
        <div class="field">
            <div style="display:flex;justify-content:space-between;align-items:center;">
                <label for="password">Password</label>
                @if (Route::has('password.request'))
                    <a href="{{ route('password.request') }}" class="muted" style="font-size:.78rem;">Forgot password?</a>
                @endif
            </div>
            <div style="position:relative;">
                <input id="password" type="password" name="password" required autocomplete="current-password" style="padding-right:4rem;">
                <button type="button" onclick="togglePassword('password', this)" style="position:absolute;right:.75rem;top:50%;transform:translateY(-50%);border:0;background:none;color:var(--muted);cursor:pointer;font-size:.78rem;">Show</button>
            </div>
            <x-input-error :messages="$errors->get('password')" class="field-error" />
        </div>
        <label style="display:flex;align-items:center;gap:.5rem;color:var(--muted);font-size:.82rem;">
            <input type="checkbox" name="remember" style="accent-color:var(--coral);"> Keep me signed in
        </label>
        <button class="btn btn-primary" type="submit" style="width:100%;">Log in</button>
    </form>

    <div style="margin-top:1.35rem;padding:1rem;border-radius:14px;background:#fff4e9;border:1px solid #f1d7bd;">
        <div style="font-weight:700;font-size:.82rem;margin-bottom:.55rem;">Demo access</div>
        <div style="display:grid;gap:.35rem;color:var(--muted);font-size:.78rem;">
            <button type="button" onclick="fillDemo('admin@myblog.demo','DemoAdmin123!')" style="border:0;background:none;text-align:left;padding:0;color:var(--ink);cursor:pointer;">Admin · <strong>admin@myblog.demo</strong> <span class="muted">/ DemoAdmin123!</span></button>
            <button type="button" onclick="fillDemo('reader@myblog.demo','DemoReader123!')" style="border:0;background:none;text-align:left;padding:0;color:var(--ink);cursor:pointer;">Reader · <strong>reader@myblog.demo</strong> <span class="muted">/ DemoReader123!</span></button>
        </div>
    </div>
    <p class="muted" style="text-align:center;font-size:.85rem;margin:1.35rem 0 0;">New here? <a href="{{ route('register') }}" style="color:var(--coral-dark);font-weight:700;">Create an account</a></p>
    <script>
        function togglePassword(id, button) {
            const input = document.getElementById(id);
            input.type = input.type === 'password' ? 'text' : 'password';
            button.textContent = input.type === 'password' ? 'Show' : 'Hide';
        }
        function fillDemo(email, password) {
            document.getElementById('email').value = email;
            document.getElementById('password').value = password;
        }
    </script>
</x-guest-layout>
