@extends('layouts.other-page-layout')
@section('title', 'Create your unique art - The Pacific Art Marketplace')
@section('main_content')
    <section class="container p-5 mt-16">
        <h2 class="section-heading text-center">Welcome to the Custom Art Page</h2>
        <article class="flex gap-10 mt-20">
            <img src="{{ asset('customart01.jpg') }}" alt="custom art 1" class="h-[700px] rounded-md" />
            <aside class="flex flex-col justify-center items-center p-20">
                <h3 class="text-2xl">Bring Your Vision to Life with Custom Art</h3>
                <p class="text-center">At <strong>The Pacific Art</strong>, we believe that art should be as unique as your
                    space. Whether you’re looking to add a personal touch to your home, office, or any special setting, our
                    team is dedicated to creating bespoke pieces that perfectly complement your environment.</p>
            </aside>

        </article>


        <article class="flex gap-10 mt-10">
            <aside class="flex flex-col justify-center  p-20">
                <h3 class="text-2xl">Why Choose Custom Art?</h3>

                <ul>
                    <li>
                        <p><span class="text-lg">Personalized Designs:</span> Our artists work closely with you to
                            understand your style,
                            preferences, and the atmosphere you want to create.
                    </li>
                    </p><br />
                    <li><span class="text-lg">Perfect Fit:</span> No matter the size, color palette, or theme, we design art
                        that fits
                        your
                        space seamlessly.</li><br />
                    <li><span class="text-lg">Quality Craftsmanship:</span> We pride ourselves on using premium materials
                        and techniques
                        to
                        deliver exceptional, one-of-a-kind artwork that elevates your space.</li><br />
                    <li><span class="text-lg">Global Inspiration:</span> With artists from around the world, we bring
                        diverse cultural
                        influences and fresh perspectives to every custom piece.</li>
                </ul>
            </aside>
            <img src="{{ asset('customart02.png') }}" alt="custom art 1" class="h-[700px] rounded-md" />

        </article>

        <section>
            <h2 class="text-2xl text-center mt-10 mb-10">How It Works:</h2>
            <div class="grid grid-cols-1 md:grid-cols-4 place-content-center gap-5">
                <div class="card-container">
                    <div class="card">
                        <span>
                            <p><span class="text-3xl">1.</span> <strong class="font-mono text-2xl">Consultation:</strong>
                            </p>
                            <p>
                                Share your ideas, inspirations, and the specifics of your space (dimensions, colors, and
                                mood).
                            </p>
                        </span>
                    </div>
                </div>

                <div class="card-container">
                    <div class="card">
                        <span>
                            <p><span class="text-3xl">2.</span> <strong class="font-mono text-2xl">Design &
                                    Concept:</strong></p>
                            <p>
                                Our artists will create a draft based on your input and send it for your approval.
                            </p>
                        </span>
                    </div>
                </div>


                <div class="card-container">
                    <div class="card">
                        <span>
                            <p><span class="text-3xl">3.</span> <strong
                                    class="font-mono text-2xl">Creation:</strong></p>
                            <p>
                                Once you’re happy with the design, we begin crafting your custom piece.
                            </p>
                        </span>
                    </div>

                </div>
                <div class="card-container">
                    <div class="card">
                        <span>
                            <p><span class="text-3xl">4.</span> <strong
                                    class="font-mono text-2xl">Delivery:</strong></p>
                            <p>
                                Your custom artwork will be carefully packaged and delivered to your doorstep.
                            </p>
                        </span>
                    </div>
                </div>
            </div>
        </section>


        <p class="text-xl font-semibold mt-10">Let us help you create the perfect piece of art that tells your unique story.
            Get in touch with us today to start your custom art journey.
        </p>
    </section>
@endsection
