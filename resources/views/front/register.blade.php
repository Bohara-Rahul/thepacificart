<div class="container font-extrabold">

</div>

<x-form>
    <a href="/" class="underline"><i class="fa-solid fa-arrow-left"></i> Go Home</a>
    <h2>Register an account</h2>
    <form action="{{ route('user.register_submit') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div>
            <label for="photo">Photo:</label>
            <input type="file" name="photo" id="photo" value="{{ old('photo') }}" />
        </div>
        <div>
            <label for="name">Name:</label>
            <input type="text" name="name" id="name" value="{{ old('name') }}" />
        </div>
        <div>
            <label for="email">Email:</label>
            <input type="text" name="email" id="email" value="{{ old('email') }}" />
        </div>
        <div>
            <label for="password">Password:</label>
            <input type="password" name="password" id="password" value="{{ old('password') }}" />
        </div>
        <div>
            <label for="confirm_password">Confirm Password:</label>
            <input type="password" name="password_confirmation" id="confirm_password" />
        </div>
        <button type="submit" class="btn btn-primary">Sign up</button>
    </form>

    <!-- validation errors -->
    @if ($errors->any())
        <ul class="px-4 py-2 bg-red-100">
            @foreach ($errors->all() as $error)
                <li class="my-2 text-red-500">
                    {{ $error }}
                </li>
            @endforeach
        </ul>
    @endif

    <h3>Already have an account?
        <a class="underline" href="{{ route('user.login') }}">Login</a>
    </h3>

</x-form>
