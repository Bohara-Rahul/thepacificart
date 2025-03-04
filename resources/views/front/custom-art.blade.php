@extends('layouts.other-page-layout')
@section('main_content')
    <section class="container p-5 mt-20">
        <h2 class="section-heading text-center">Welcome to the Custom Art Page</h2>
        <article class="flex gap-10">
            <img src="{{ asset('customart01.jpg') }}" alt="custom art 1" class="h-[700px] rounded-md" />
            <aside class="flex flex-col justify-center items-center p-20">
                <h3 class="text-xl">Bring Your Vision to Life with Custom Art</h3>
                <p class="text-center">At <strong>The Pacific Art</strong>, we believe that art should be as unique as your space. Whether you’re looking to add a personal touch to your home, office, or any special setting, our team is dedicated to creating bespoke pieces that perfectly complement your environment.</p>
            </aside>

        </article>


        <article class="flex gap-10 mt-10">
            <aside class="flex flex-col justify-center items-center p-20">
                <h3 class="text-xl">Why Choose Custom Art?</h3>
                <ul>
                    <li><strong>Personalized Designs:</strong> Our artists work closely with you to understand your style,
                        preferences, and the atmosphere you want to create.</li>
                    <li><strong>Perfect Fit:</strong> No matter the size, color palette, or theme, we design art that fits
                        your
                        space seamlessly.</li>
                    <li><strong>Quality Craftsmanship:</strong> We pride ourselves on using premium materials and techniques
                        to
                        deliver exceptional, one-of-a-kind artwork that elevates your space.</li>
                    <li><strong>Global Inspiration:</strong> With artists from around the world, we bring diverse cultural
                        influences and fresh perspectives to every custom piece.</li>
                </ul>
            </aside>
            <img src="{{ asset('customart02.png') }}" alt="custom art 1" class="h-[700px] rounded-md" />

        </article>

        <section>
            <h2 class="text-2xl text-center mt-10 mb-10">How It Works:</h2>
            <div class="grid grid-cols-1 md:grid-cols-4 place-content-center gap-5">
                <article class="bg-gray-100 shadow-md p-5">
                    <p class="text-[#3d6571]"><span class="text-3xl">1.</span> <strong class="font-mono text-xl">Consultation:</strong></p>
                    <p>
                        Share your ideas, inspirations, and the specifics of your space (dimensions, colors, and mood).
                    </p>
                </article>
                <article class="bg-gray-100 shadow-md p-5">
                    <p class="text-[#3d6571]"><span class="text-3xl">2.</span> <strong class="font-mono text-xl">Design & Concept:</strong></p>
                    <p>
                        Our artists will create a draft based on your input and send it for your approval.
                    </p>
                </article>
                <article class="bg-gray-100 shadow-md p-5">
                    <p class="text-[#3d6571]"><span class="text-3xl">3.</span> <strong class="font-mono text-xl">Creation:</strong></p>
                    <p>
                        Once you’re happy with the design, we begin crafting your custom piece.
                    </p>
                </article>
                <article class="bg-gray-100 shadow-md p-5">
                    <p class="text-[#3d6571]"><span class="text-3xl">4.</span> <strong class="font-mono text-xl">Delivery:</strong></p>
                    <p>
                        Your custom artwork will be carefully packaged and delivered to your doorstep.
                    </p>
                </article>
            </div>
        </section>


        <p class="text-xl font-semibold mt-10">Let us help you create the perfect piece of art that tells your unique story. Get in touch with us today to start your custom art journey.
        </p>
    </section>
@endsection
