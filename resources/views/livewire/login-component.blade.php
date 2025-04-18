<x-form>
    <div class="space-y-4 max-w-xl mx-auto">
        <h2>Login to your account</h2>
        <form action="{{ route('user.login_submit') }}" method="POST">
            @csrf
            <div>
                <label for="email">Email:</label>
                <input type="email" name="email" id="email" value="{{ old('email') }}" required />
            </div>
            <div>
                <label for="password">Password:</label>
                <input type="password" name="password" id="password" value="{{ old('password') }}" required />
            </div>
            <button type="submit" class="btn btn-primary">Login</button>
        </form>

        <!-- validation errors -->
        @if ($errors->any())
            <ul class="max-w-2xl px-4 py-2 bg-red-100">
                @foreach ($errors->all() as $error)
                    <li class="my-2 text-red-500">
                        {{ $error }}
                    </li>
                @endforeach
            </ul>
        @endif

        <h3>No account? <a href="{{ route('user.register') }}" class="underline">Sign up here</a></h3>
    </div>
</x-form>
