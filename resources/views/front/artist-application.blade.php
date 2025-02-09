@extends('layouts.other-page-layout')
@section('main_content')
    <section class="container">
        <h2 class="text-2xl">Join The Pacific Art - Sell Your Paintings Worldwide</h2>

        <h3 class="text-xl">Showcase Your Art to a Global Audience</h3>

        <h4>Are you an artist looking to sell your paintings online?</h4>

        <h5>The Pacific Art connects talented artists with collectors worldwide, helping you showcase and sell your unique
            artwork with ease.</h5> <br />


            <aside>
                <p>Why Sell with Us?</p>
                <ul class="mt-0">
                    <li>✅ Global Exposure – Reach buyers from different parts of the world.</li>
                    <li>✅ No Upfront Costs – List your artwork for free; we only take a small commission on sales.</li>
                    <li>✅ Secure Transactions – Hassle-free payments and order processing.</li>
                    <li>✅ Marketing Support – We promote your work through social media and email campaigns.</li>
                    <li>✅ Dedicated Artist Page – Your own portfolio space to display and sell your paintings.</li>
                </ul>
            </aside>

            <aside>
                <p>How It Works?</p>
                <ul class="mt-0">
                    <li>1️⃣ Apply Online – Fill out the application form below.</li>
                    <li>2️⃣ Get Approved – Our team reviews your work for quality and originality.</li>
                    <li>3️⃣ List Your Art – Upload your paintings with descriptions and pricing.</li>
                    <li>4️⃣ Sell & Earn – We handle payments, customer support, and logistics.</li>
                </ul>
            </aside>



        <p>Artist Success Stories</p>
        <ul class="mt-0">
            <li>
                🎨 "The Pacific Art helped me sell my paintings globally and reach new collectors. The process is smooth,
                and I love how my artwork is getting recognized!" – Maria, Colombia
            </li>
            <li>
                🎨 "Being part of this platform has allowed me to focus on my creativity while they handle the sales and
                shipping. Highly recommended!" – Ali, Iran
            </li>
        </ul>

        <article class="flex justify-between">
            <aside>
                <p class="text-xl">
                    Apply to Become an Artist. <br />
                </p>
                <p>
                    Fill out the form below to join The Pacific Art and start selling your paintings today!
                </p>
                <livewire:artist-application-form />
            </aside>

            <aside>
                <p class="text-xl">Frequently Asked Questions (FAQ)</p>
                <ul class="mt-0">
                    <li>❓ How long does approval take? <br />✅ Applications are reviewed within 5-7 business days.</li>
                    <br />
                    <li>❓ Who sets the pricing?
                        <br /> ✅ You set your own prices; we can provide guidance if needed.
                    </li><br />
                    <li>❓ Who handles shipping?<br />✅ We assist with logistics to ensure safe delivery of your artwork.
                    </li>
                    <br />
                    <li>❓ What commission does The Pacific Art take?<br />✅ We take a small commission to cover operational costs while maximizing your earnings.</li>
                </ul>
            </aside>
        </article>
    </section>
@endsection
