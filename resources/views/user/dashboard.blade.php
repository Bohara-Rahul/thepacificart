<section>
    <img src="{{ asset('public/uploads/' . Auth::user()->photo) }}" alt="{{ auth()->user()->name }}"
        class="w-5 h-5 rounded" />
    <h2 class="font-lato">{{ Auth::user()->name }}</h2>

    <h3>WISHLIST</h3>
    <ul>
        @foreach ($wishlists as $wishlist)
            <li>
                <p>{{ $wishlist->product->title }}</p>
            </li>
        @endforeach
    </ul>

</section>

<form action="{{ route('user.logout') }}" method="POST">
    @csrf
    <button type="submit">Logout</button>
</form>
