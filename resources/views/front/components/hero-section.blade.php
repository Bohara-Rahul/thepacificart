<section class="container hero" id="hero-section">
    <aside class="left-side">
        <h1 class="font-bold text-4xl tracking-wide sm:text-6xl">Art that travels, Elegance that stays</h1>
        <p class="mt-8 text-lg leading-8">Welcome to a world where art transcends borders. We specialize in curating
            exquisite oil paintings that bring timeless elegance to your space, no matter where you are.<br /> Our
            carefully crafted collections are designed to inspire, elevate, and create lasting impressions. Explore our
            gallery and find the perfect masterpiece to make your home or office truly unforgettable</p>
        <a href="{{ route('front.about-us') }}" class="btn btn-primary mt-8 w-[150px] text-center">More Info</a>
    </aside>


    <div class="slider-container mt-0 flex-1">
        <div class="slider">
            <div class="slide"><img src="{{ asset('slider_1.jpg') }}" alt="slider image 1" class="slide-img"/></div>
            <div class="slide"><img src="{{ asset('slider_2.jpg') }}" alt="slider image 2" class="slide-img"/></div>
            <div class="slide"><img src="{{ asset('slider_4.jpg') }}" alt="slider image 4" class="slide-img"/></div>
            <!-- <div class="slide"><img src="{{ asset('slider_2.jpg') }}" alt="slider image 2" class="slide-img" /></div> -->
            <div class="slide"><img src="{{ asset('slider_3.jpg') }}" alt="slider image 3" class="slide-img" /></div>
            <div class="slide"><img src="{{ asset('slider_5.jpg') }}" alt="slider image 5" class="slide-img" /></div>
        </div>
        <button class="prev">&#10094;</button>
        <button class="next">&#10095;</button>
    </div>

</section>

<!-- w-[640px] h-[780px] -->