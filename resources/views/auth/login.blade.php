<x-guest-layout>
    <h3 class="text-center mb-4">Login</h3>

    @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <div class="mb-3">
            <label class="form-label">Email</label>
            <input
                type="email"
                name="email"
                class="form-control"
                value="{{ old('email') }}"
                required
                autofocus
            >
            @error('email')
                <div class="text-danger small">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label class="form-label">Password</label>
            <input
                type="password"
                name="password"
                class="form-control"
                required
            >
            @error('password')
                <div class="text-danger small">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3 form-check">
            <input type="checkbox" name="remember" class="form-check-input" id="remember">
            <label class="form-check-label" for="remember">Remember me</label>
        </div>

        <button class="btn btn-primary w-100">Login</button>

        <div class="text-center mt-3">
            <a href="{{ route('register') }}">Create an account</a>
        </div>
    </form>
</x-guest-layout>
