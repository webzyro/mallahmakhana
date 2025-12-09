<x-auth-layout>
    <section class="register-page">
        <button class="back-btn primary-btn">
            <i class="fa-solid fa-arrow-left"></i>
            <a href="{{ route('Home') }}" class="text-decoration-none text-white">Home</a>
        </button>
        <h1 class="text-center">Log in</h1>
        <form action="{{ route('login.user') }}" method="POST">
            @csrf
            <label for="email">
                <span>Email:</span>
                <input type="email" placeholder="Email" name="email" value="{{ old('email') }}">
                @error('email')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </label>
            <label for="password">
                <span>Password:</span>
                <input type="password" placeholder="Password" name="password" value="{{ old('password') }}">
                @error('password')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </label>

            <button type="submit" class="primary-btn w-100 fw-semibold">Log In</button>

            <p class="p-0 m-0">Don't have an Account? <a href="{{ route('register') }}"
                    class='text-decoration-none text-primary'>Sign Up</a></p>
        </form>
    </section>
</x-auth-layout>
