<x-guest-layout>
    <div style="margin-bottom:1.75rem;">
        <div class="eyebrow">Join the circle</div>
        <h1 class="serif" style="font-size:2.25rem;line-height:1.1;margin:.35rem 0 .5rem;">Bring your point of view.</h1>
        <p class="muted" style="margin:0;font-size:.92rem;">A thoughtful place for curious people and good stories.</p>
    </div>
    <form method="POST" action="{{ route('register') }}" style="display:grid;gap:1rem;">
        @csrf
        <div class="field"><label for="name">Your name</label><input id="name" type="text" name="name" value="{{ old('name') }}" required autofocus autocomplete="name" placeholder="Alex Morgan"><x-input-error :messages="$errors->get('name')" class="field-error" /></div>
        <div class="field"><label for="email">Email address</label><input id="email" type="email" name="email" value="{{ old('email') }}" required autocomplete="username" placeholder="you@example.com"><x-input-error :messages="$errors->get('email')" class="field-error" /></div>
        <div class="field"><label for="password">Password</label><input id="password" type="password" name="password" required autocomplete="new-password" placeholder="At least 8 characters"><x-input-error :messages="$errors->get('password')" class="field-error" /></div>
        <div class="field"><label for="password_confirmation">Confirm password</label><input id="password_confirmation" type="password" name="password_confirmation" required autocomplete="new-password"><x-input-error :messages="$errors->get('password_confirmation')" class="field-error" /></div>
        <button class="btn btn-primary" type="submit" style="width:100%;margin-top:.25rem;">Create my account</button>
    </form>
    <p class="muted" style="text-align:center;font-size:.85rem;margin:1.35rem 0 0;">Already a member? <a href="{{ route('login') }}" style="color:var(--coral-dark);font-weight:700;">Log in</a></p>
</x-guest-layout>
