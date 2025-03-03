@extends('layouts.other-page-layout')
@section('main_content')
    <section>
        <div class="text-center container mt-20">
            <h3 class="section-heading">Our Mission</h3>
            <p class="max-xl">
                The Pacific Art is dedicated to bringing exceptional art from around the world to your home. We believe that
                art
                has the power to transform spaces and evoke emotions, which is why we work closely with talented artists to
                curate pieces that speak to the heart. We strive to offer unique, high-quality artwork created by artists
                from
                diverse cultures, showcasing the richness and variety of global artistic traditions. Whether you're a
                seasoned
                art collector with an eye for rare pieces or a first-time buyer looking to start your art journey, we
                provide an
                ever-evolving collection that reflects creativity, passion, and cultural richness. Our goal is to make
                beautiful
                art accessible to everyone and inspire individuals to connect with art in a meaningful way.
            </p>
        </div>

        <div class="container mt-20">
            <h3 class="text-center section-heading">Connecting the World Through Art</h3>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-5 mb-5">
                <img src="{{ asset('aboutus01.jpg') }}" style="height: 650px;" />
                <div class="desc flex flex-col justify-center items-center">

                    <p class="about-text">
                        At <strong>The Pacific Art</strong>, Founded in Brisbane, Australia, The Pacific Art emerged from a
                        deep passion for connecting the world through art.
                        During their travels through South America, the founders met local artists in Colombia and were
                        mesmerized by
                        the handcrafted art they encountered. The unique creations were not just visually stunning—they had
                        the power to
                        transport you to another place. Inspired by this experience, the founders decided to bring together
                        artists from
                        around the world to showcase their works on a global stage. From the rest of the world, The Pacific
                        Art
                        celebrates diverse styles, including <b>Abstract, Colonial, Modern, Contemporary, and Nature,</b>
                        offering a platform
                        where art connects, inspires, and transcends borders
                    </p>
                    <p class="font-bold text-2xl">Discover different categories or Art</p>
                    <a href="#" class="btn btn-primary">See More Categories</a>
                </div>
            </div>
        </div>
        <div class="container mt-20">
            <h3 class="text-center section-heading">Why Art Matters</h3>
            <div class="grid grid-cols-1 md:grid-cols-2 mb-5">
                <div class="desc flex flex-col justify-center items-center">

                    <p>
                    <p>Art has the power to transcend language, culture, and time, connecting people in ways words cannot.
                        It reflects emotions, tells stories, and challenges perceptions. At <strong>The Pacific
                            Art</strong>, we believe that art enriches our lives, brings beauty, and fosters a deeper
                        understanding of the world. Through our collections, we make art accessible, allowing you to connect
                        with diverse cultures and perspectives. Art transforms spaces, sparks creativity, and reminds us of
                        our shared humanity.</p>
                    </p>
                    <p class="font-bold text-2xl">Find the perfect masterpiece for your collection</p>
                    <a href="#" class="btn btn-primary">Explore Our Gallery</a>
                </div>
                <img src="{{ asset('aboutus03.jpg') }}" style="height: 650px;" />
            </div>
        </div>

        <div class="bg-[#f0ecec] mt-20">
            <div class="container p-10">
                <h3 class="section-heading">Meet our artists</h3>
                <div class="flex space-x-20 justify-center items-center flex-wrap">
                    <article class="text-center">
                        <img src="{{ asset('user_pic.jpg') }}" class="w-[200px] h-[200px] rounded-full" />
                        <p>Proficient in nude arts</p>
                        <a href="#">Learn More about Artist</a>
                    </article>
                    <article>
                        <img src="{{ asset('user_pic.jpg') }}" class="w-[200px] h-[200px] rounded-full" />
                        <p>Proficient in nude arts</p>
                    </article>
                    <article>
                        <img src="{{ asset('user_pic.jpg') }}" class="w-[200px] h-[200px] rounded-full" />
                        <p>Proficient in nude arts</p>
                    </article>
                    <article>
                        <img src="{{ asset('user_pic.jpg') }}" class="w-[200px] h-[200px] rounded-full" />
                        <p>Proficient in nude arts</p>
                    </article>

                </div>
            </div>
        </div>
        <section>



            <!-- <aside>
                                                    <h3>Our Story</h3>
                                                    <img src="{{ asset('Maria.png') }}" />
                                                </aside>

                                                <p>Founded in Brisbane, Australia, The Pacific Art emerged from a deep passion for connecting the world through art.
                                                During their travels through South America, the founders met local artists in Colombia and were mesmerized by
                                                the handcrafted art they encountered. The unique creations were not just visually stunning—they had the power to
                                                transport you to another place. Inspired by this experience, the founders decided to bring together artists from
                                                around the world to showcase their works on a global stage. From the rest of the world, The Pacific Art
                                                celebrates diverse styles, including Abstract, Colonial, Modern, Contemporary, and Nature, offering a platform
                                                where art connects, inspires, and transcends borders.
                                                </p> -->
        </section>


        <div class="container mt-20 mb-20">
            <h3 class="section-heading">Why Choose Us?</h3>
            <section class="grid grid-cols-1 md:grid-cols-6 gap-2">
                <div class="border p-10">
                    <p><strong>Global Artistry:</strong> </p>
                    <p>We feature exceptional artists from around the world, representing
                        a
                        wide
                        array of cultural backgrounds and artistic traditions. Our collection showcases art that celebrates
                        the
                        diverse beauty of our planet.
                    </p>
                </div>
                <div class="border p-10">
                    <p><strong>Curated Collection:</strong></p>
                    <p>Each artwork in our collection is carefully selected by our team of art experts, ensuring that it
                        meets our high standards for quality, originality, and artistic expression. We offer a diverse range
                        of styles to suit all tastes, from timeless classics to contemporary masterpieces.
                    </p>
                </div>
                <div class="border p-10">
                    <p><strong>Seamless Shopping Experience:</strong></p>
                    <p>We provide a user-friendly, online shopping experience that
                        brings high-quality art directly to your doorstep. Our website is designed to make
                        browsing,purchasing,and shipping as simple and secure as possible, ensuring your art arrives safely
                        and on time.
                    </p>
                </div>
                <div class="border p-10">
                    <p><strong>Authenticity and Quality:</strong></p>
                    <p>At The Pacific Art, we are committed to offering only the
                        most
                        authentic, high-quality pieces. Each artwork is handpicked for its artistic merit, craftsmanship,
                        and
                        cultural significance. Our artists take pride in creating pieces that are both visually striking and
                        meaningful.
                    </p>
                </div>
                <div class="border p-10">
                    <p><strong>Supporting Artists:</strong></p>
                    <p>We are deeply committed to supporting the global art community. By purchasing artwork from The Pacific Art, you’re directly supporting artists from around the world.We aim to create sustainable opportunities for artists while sharing their incredible work with a global audience.
                    </p>
                </div>
                <div class="border p-10">
                    <p><strong>Personalized Service:</strong></p>
                    <p>Our team is here to guide you through every step of your
                        art-buying
                        journey. Whether you need help choosing the perfect piece for your home, assistance with framing
                        options, or
                        advice on art investment, we offer personalized customer support to ensure your complete
                        satisfaction.
                    </p>
                </div>
        </div>
    </section>

    </section>
@endsection
