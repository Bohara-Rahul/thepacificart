@extends('layouts.other-page-layout')
@section('main_content')
    <section class="container p-5 mt-20">
        <h2 class="section-heading text-center">Welcome to the Custom Art Page</h2>
        <article class="flex gap-10"> 
            <img 
                src="{{ asset('customart01.jpg') }}" 
                alt="custom art 1"
                class="h-[700px] rounded-md" 
            />
            <aside class="flex flex-col justify-center items-center p-20">
                <h3>Bring Your Vision to Life with Custom Art</h3>
                <p class="text-center">At <strong>The Pacific Art</strong>, we believe that art should be as unique as your space. Whether you’re looking to add a personal touch to your home, office, or any special setting, our team is dedicated to creating bespoke pieces that perfectly complement your environment.</p>
            </aside>
            
        </article>
       

        <article class="flex gap-10 mt-10"> 
            <aside class="flex flex-col justify-center items-center p-20">
                <h3>Why Choose Custom Art?</h3>
                <ul>
                    <li><strong>Personalized Designs:</strong> Our artists work closely with you to understand your style,
                        preferences, and the atmosphere you want to create.</li>
                    <li><strong>Perfect Fit:</strong> No matter the size, color palette, or theme, we design art that fits your
                        space seamlessly.</li>
                    <li><strong>Quality Craftsmanship:</strong> We pride ourselves on using premium materials and techniques to
                        deliver exceptional, one-of-a-kind artwork that elevates your space.</li>
                    <li><strong>Global Inspiration:</strong> With artists from around the world, we bring diverse cultural
                        influences and fresh perspectives to every custom piece.</li>
                </ul>
            </aside>
            <img 
                src="{{ asset('customart02.png') }}" 
                alt="custom art 1"
                class="h-[700px] rounded-md" 
            />
            
        </article>

        <h2>How It Works:</h2>
        <ol class="steps">
            <li><strong>Consultation:</strong> Share your ideas, inspirations, and the specifics of your space (dimensions, colors, and mood).</li>
            <li><strong>Design & Concept:</strong> Our artists will create a draft based on your input and send it for your approval.</li>
            <li><strong>Creation:</strong> Once you’re happy with the design, we begin crafting your custom piece.</li>
            <li><strong>Delivery:</strong> Your custom artwork will be carefully packaged and delivered to your doorstep.
            </li>
        </ol>

        <p class="contact">Let us help you create the perfect piece of art that tells your unique story.Get in touch with us today to start your custom art journey.
        </p>
    </section>
@endsection
