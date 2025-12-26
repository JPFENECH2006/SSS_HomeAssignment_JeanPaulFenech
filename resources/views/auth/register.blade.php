<x-guest-layout>
    <h3 class="text-center mb-4">Register</h3>

    <form method="POST" action="{{ route('register') }}">
        @csrf

        <div class="mb-3">
            <label class="form-label">Name</label>
            <input
                type="text"
                name="name"
                class="form-control"
                value="{{ old('name') }}"
                required
            >
            @error('name')
                <div class="text-danger small">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label class="form-label">Email</label>
            <input
                type="email"
                name="email"
                class="form-control"
                value="{{ old('email') }}"
                required
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

        <div class="mb-3">
            <label class="form-label">Confirm Password</label>
            <input
                type="password"
                name="password_confirmation"
                class="form-control"
                required
            >
        </div>

        <button class="btn btn-success w-100">Register</button>

        <div class="text-center mt-3">
            <a href="{{ route('login') }}">Already registered?</a>
        </div>
    </form>
</x-guest-layout>
