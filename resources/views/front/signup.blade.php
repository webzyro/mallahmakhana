<x-auth-layout>
    <section class="register-page">
        <button class="back-btn primary-btn">
            <i class="fa-solid fa-arrow-left"></i>
            <a href="{{ route('Home') }}" class="text-decoration-none text-white">Home</a>
        </button>
        <h1 class="text-center">Sign up</h1>
        <form action="{{ route('register.user') }}" method="POST">
            @csrf
            <label for="name">
                <span>Name:</span>
                <input type="text" placeholder="Name" name="name" value="{{ old('name') }}">
                @error('name')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </label>
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
            <label for="password_confirmation">
                <span>Confirm Password:</span>
                <input type="password" placeholder="Password" name="password_confirmation"
                    value="{{ old('password') }}">
                @error('password_confirmation')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </label>

            <button type="submit" class="primary-btn w-100 fw-semibold">Sign Up</button>

            <p class="p-0 m-0">Already have an account? <a href="{{ route('login') }}"
                    class='text-decoration-none text-primary'>Log
                    In</a></p>
        </form>
    </section>
</x-auth-layout>
