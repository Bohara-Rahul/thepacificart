<section class="container grid grid-cols-1 lg:grid-cols-2 gap-20 items-center mt-28" id="hero-section">
    <aside class="flex flex-col max-w-xl justify-center text-2xl">
        <h1 class="font-bold text-4xl tracking-wide sm:text-6xl">Art that travels, Elegance that stays</h1>
        <p class="mt-8 text-lg leading-8">Welcome to a world where art transcends borders. We specialize in curating
            exquisite oil paintings that bring timeless elegance to your space, no matter where you are.<br /> Our
            carefully crafted collections are designed to inspire, elevate, and create lasting impressions. Explore our
            gallery and find the perfect masterpiece to make your home or office truly unforgettable</p>
        <a class="btn mt-8 w-[150px] text-center">Learn More</a>
    </aside>

    <div class="overflow-hidden rounded-md slider" style="width: 640px; height: 780px;">
        <div class="images">
            <img src="{{ asset('hero-img.png') }}" alt="hero image" class="object-fill" />

            <img src="{{ asset('slider_1.jpg') }}" alt="hero image" class="object-fill" />

            <img src="{{ asset('hero-img.png') }}" alt="hero image" class="object-contain" />
        </div>
    </div>
</section>
