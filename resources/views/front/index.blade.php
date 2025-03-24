@extends('layouts.front')
@section('title', 'Homepage - The Pacific Art Marketplace')
@include('front.components.HeaderVideo')
@section('main_content')
    @include('front.components.hero-section')

    <section class="bg-slate-100 text-black p-5">
        <h2 class="section-heading">
            Why Choose Us?
        </h2>
        <ul class="flex flex-wrap place-content-center text-2xl text-gray-900 font-bold gap-20">
            <li>
                <i class="fa-solid fa-star text-[#3d6571]"></i>
                Premium Arts
            </li>
            <li>
                <i class="fa-solid fa-truck text-[#3d6571]"></i>
                Faster Delivery
            </li>
            <li>
                <i class="fa-solid fa-phone text-[#3d6571]"></i>
                24x7 support
            </li>
        </ul>
    </section>

    <section class="container mt-28">
        <h2 class="section-heading mb-10">Best Sellers</h2>
        <article class="grid grid-cols-1 md:grid-cols-3 xl:grid-cols-3 gap-2">
            @foreach ($best_seller_arts as $best_seller_art)
                <x-card>
                    <section class="flex flex-col justify-start text-black p-5">
                        <h3 class="text-2xl text-[#13292a] capitalize font-bold">
                            {{ $best_seller_art->title }}
                        </h3>

                        <article class="shadow-xl w-96 h-80 overflow-hidden">
                            <img src="{{ asset('uploads/' . $best_seller_art->primary_image) }}" alt="best seller art image"
                                class="rounded-md" />
                        </article>

                        <p>{!! substr($best_seller_art->description, 0, 150) !!}</p>

                        <article class="flex justify-between items-center mt-5">
                            @if ($best_seller_art->wishlist()->where('user_id', Auth::id())->exists())
                                <a href="{{ route('front.remove_from_wishlist', $best_seller_art->id) }}">
                                    <i class="fa-solid fa-heart"></i> Remove from Wishlist
                                </a>
                            @else
                                <a href="{{ route('front.add_to_wishlist', $best_seller_art->id) }}">
                                    <i class="fa-regular fa-heart"></i> Add to Wishlist
                                </a>
                            @endif
                            @livewire('add-to-cart', ['product' => $best_seller_art])
                        </article>


                        <a class="btn btn-primary text-center mt-5"
                            href="{{ route('product_detail', $best_seller_art->slug) }}">
                            More Info
                        </a>

                    </section>
                </x-card>
            @endforeach
            @livewire('cart') <!-- Embed Livewire Cart Component -->
        </article>
    </section>

    <section class="mt-20 bg-slate-100 text-black p-5">
        <h2 class="section-heading">
            Our Collections
        </h2>

        <ul class="flex flex-wrap justify-center text-2xl">
            @foreach ($categories as $category)
                <a href="{{ route('category_detail', $category->slug) }}">
                    <li>
                        <p class="collection-item">{{ $category->title }}</p>
                    </li>
                </a>
            @endforeach
        </ul>

    </section>

    <section class="container flex flex-wrap gap-x-10 items-center mt-28" id="hero-section">
        <div class="overflow-hidden rounded-md" style="width: 640px; height: 780px;">
            <img src="{{ asset('Gabo.png') }}" alt="portrait image" class="object-contain" />
        </div>
        <aside class="flex flex-col max-w-xl justify-center text-2xl">
            <h2 class="font-bold text-2xl tracking-tight sm:text-6xl">Art by Gabo</h2>
            <p class="mt-8 text-lg leading-8">The painting by Gabo depicts a powerful horse galloping through a river, its
                muscles and motion captured in dynamic detail. The water splashes around the horse’s legs, reflecting its
                energy and freedom. <br /> <br /> The surrounding landscape is lush and vibrant, blending harmoniously with
                the subject. The scene conveys a sense of strength and vitality, with the horse moving fluidly through the
                river’s current. Rich tones of brown, white, blue, and green dominate the composition, enhancing the natural
                beauty and intensity of the moment.</p>
            <a class="btn btn-primary mt-8 w-[150px] text-center">More Info</a>
        </aside>


    </section>

    @include('front.components.testimonials')

    <section class="container flex flex-wrap gap-20 items-center mt-28" id="hero-section">

        <aside class="flex flex-col max-w-xl justify-center text-2xl">
            <h2 class="font-bold text-4xl tracking-tight sm:text-6xl">Art by Miguel G</h2>
            <p class="mt-8 text-lg leading-8">This painting of María, Madre de Jesús Crying captures a powerful moment of
                sorrow, depicting Mary’s profound grief as the mother of Christ. Her tear-streaked face, framed by a flowing
                mantle of deep blue and white, reflects her purity and divine connection. Her eyes, filled with anguish and
                compassion, gaze downward, mourning her son’s suffering. <br /> <br /> The subtle background and soft
                lighting highlight her emotional strength and vulnerability, evoking themes of love, loss, and resilience.
                This evocative piece offers a timeless portrayal of Mary as both a mother and a symbol of enduring faith.
            </p>
            <a class="btn btn-primary mt-8 w-[150px] text-center">More Info</a>
        </aside>

        <div class="overflow-hidden rounded-md" style="width: 640px; height: 780px;">
            <img src="{{ asset('Maria.png') }}" alt="portrait image" class="object-contain" />
        </div>

    </section>

    <section class="bg-gray-50 text-center mt-20 p-20">
        <article class="container">
            <h2 class="section-heading">
                Want to bring Your Vision to Life with Custom Art?
            </h2>

            <a href="{{ route('front.custom_art') }}" class="text-lg">
                <span class="text-2xl"><i class="fas fa-hand-point-right"></i> Click here for more information</span>
            </a>
        </article>
    </section>

    <section class="container flex flex-col justify-center items-center p-20">
        <h2 class="section-heading">Are you an artist?</h2>
        <p class="max-w-xl text-lg text-center mb-10 tracking-wider">We showcase exceptional emerging and mid-career artists
            from across the globe. With a deep passion for our collection and the incredible talent behind it, we are always
            eager to welcome artists with creativity and a positive spirit into our community.</p>
        <a href="{{ route('front.artist_application') }}" class="btn btn-primary text-xl tracking-wide">Artist
            Application</a>
    </section>
    @livewire('cart')
@endsection
