@extends('layouts.front')
@include('front.components.HeaderVideo')
@section('main_content')
    @include('front.components.hero-section')

    <section class="mt-32 bg-slate-100 text-black p-5">
        <h3 class="section-heading">
            Why Choose Us?
        </h3>
        <ul class="flex flex-wrap place-content-center text-xl text-gray-900 font-bold gap-10">
            <li>
                <i class="fa-solid fa-star"></i>
                Premium Arts
            </li>
            <li>
                <i class="fa-solid fa-truck"></i>
                Faster Delivery
            </li>
            <li>
                <i class="fa-solid fa-phone"></i>
                24x7 support
            </li>
        </ul>
    </section>

    <section class="container mt-28">
        <h2 class="section-heading mb-10">Best Sellers</h2>
        <article class="grid grid-cols-1 md:grid-cols-3 xl:grid-cols-3 gap-2">
            @foreach ($products as $product)
                <x-card>
                    <section class="flex flex-col justify-start text-black p-5">
                        <header class="flex justify-between items-center">
                            <h3 class="text-2xl text-[#13292a] capitalize font-bold">
                                {{ $product->title }}
                            </h3>
                            <span class="text-xl">by {{ $product->artist->name }}</span>
                        </header>

                        @if ($product->photos)
                            <article class="shadow-lg">
                                <img src="{{ asset('uploads/' . $product->photos[0]->name) }}" alt="product image"
                                    class="product-image rounded-md" />
                            </article>
                        @endif

                        <p>{{ substr($product->description, 0, 150) }}</p>

                        <article class="flex justify-between items-center mt-5">
                            <a href="#">
                                <p>ADD TO WISHLIST</p>
                            </a>
                            <a href="#">
                                <p>ADD TO CART</p>
                            </a>
                        </article>


                        <a class="btn text-center" href="{{ route('product_detail', $product->slug) }}">
                            Learn More
                        </a>

                    </section>
                </x-card>
            @endforeach
        </article>
    </section>

    <section class="mt-20 bg-slate-100 text-black p-5">
        <h3 class="section-heading">
            Our Collections
        </h3>

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

    <section class="container grid grid-cols-1 lg:grid-cols-2 gap-20 items-center mt-28" id="hero-section">
        <div class="overflow-hidden rounded-md" style="width: 640px; height: 780px;">
            <img src="{{ asset('Portrait02.png') }}" alt="portrait image" class="object-contain" />
        </div>
        <aside class="flex flex-col max-w-xl justify-center text-2xl">
            <h1 class="font-bold text-4xl tracking-tight sm:text-6xl">Art by Gabo</h1>
            <p class="mt-8 text-lg leading-8">The painting by Gabo depicts a powerful horse galloping through a river, its
                muscles and motion captured in dynamic detail. The water splashes around the horse’s legs, reflecting its
                energy and freedom. <br /> <br /> The surrounding landscape is lush and vibrant, blending harmoniously with
                the subject. The scene conveys a sense of strength and vitality, with the horse moving fluidly through the
                river’s current. Rich tones of brown, white, blue, and green dominate the composition, enhancing the natural
                beauty and intensity of the moment.</p>
            <a class="btn mt-8 w-[150px] text-center">Learn More</a>
        </aside>


    </section>

    @include('front.components.testimonials')

    <section class="container grid grid-cols-1 lg:grid-cols-2 gap-20 items-center mt-28" id="hero-section">

        <aside class="flex flex-col max-w-xl justify-center text-2xl">
            <h1 class="font-bold text-4xl tracking-tight sm:text-6xl">Art by Miguel G</h1>
            <p class="mt-8 text-lg leading-8">This painting of María, Madre de Jesús Crying captures a powerful moment of
                sorrow, depicting Mary’s profound grief as the mother of Christ. Her tear-streaked face, framed by a flowing
                mantle of deep blue and white, reflects her purity and divine connection. Her eyes, filled with anguish and
                compassion, gaze downward, mourning her son’s suffering. <br /> <br /> The subtle background and soft
                lighting highlight her emotional strength and vulnerability, evoking themes of love, loss, and resilience.
                This evocative piece offers a timeless portrayal of Mary as both a mother and a symbol of enduring faith.
            </p>
            <a class="btn mt-8 w-[150px] text-center">Learn More</a>
        </aside>

        <div class="overflow-hidden rounded-md" style="width: 640px; height: 780px;">
            <img src="{{ asset('Portrait01.png') }}" alt="portrait image" class="object-contain" />
        </div>

    </section>

    <section class="bg-gray-50 text-center mt-20 p-20">
        <article class="container">
            <h3 class="section-heading">
                Want to bring Your Vision to Life with Custom Art?
            </h3>

            <a href="{{ route('front.custom_art') }}" class="text-lg">
                Click here for more information
            </a>
        </article>
    </section>

    <section class="container flex flex-col justify-center items-center p-20">
        <h3 class="section-heading">Are you an artist?</h3>
        <p class="max-w-xl text-lg text-center mb-10 tracking-wider">We present top emerging and mid-career artists from
            around the world. We're passionate about our collection and our artists, and we are always looking for talented
            artists with positive attitudes to join our community.</p>
        <a href="{{ route('front.artist_application') }}" class="btn text-xl tracking-wide">Artist Application</a>
    </section>
@endsection
