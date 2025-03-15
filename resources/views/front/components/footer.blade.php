<footer class="footer p-5">
    <div class="container grid grid-cols-1 md:grid-cols-4">
        <ul class="flex flex-col gap-2">
            <p class="text-xl">About</p>
            <li class="hover:underline">
                <a href="{{ route('front.about-us') }}">About Us</a>
            </li>
        </ul>

        <ul class="flex flex-col gap-2">
            <p class="text-xl">Contact Us</p>
            <li><i class="fa-solid fa-phone mr-2"></i>
                <a href="tel:+61494381041">+61 494 381 041</a>
            </li>
            <li><i class="fa-solid fa-envelope mr-2"></i>
                <a href="mailto:info@thepacificart.com">info@thepacificart.com</a>
            </li>
        </ul>

        <ul class="flex flex-col space-x-2">
            <p class="text-xl">Social Media</p>
            <div class="flex gap-5">
                <a href="https://www.facebook.com/profile.php?id=61571620204348" target="_blank">
                    <li>
                        <i class="fa-brands fa-facebook text-lg"></i>
                    </li>
                </a>

                <a href="https://www.instagram.com" target="_blank">
                    <li href="#">
                        <i class="fa-brands fa-instagram text-lg"></i>
                    </li>
                </a>
            </div>

        </ul>

        <ul>
            <p class="text-xl">Legal & Privacy</p>
            <li>Terms and Conditions</li>
            <li><a href="{{ route('front.refund_policy') }}">Refund Policy</a></li>
        </ul>
    </div>
    <div class="text-center mb-10">
        <h2 class="text-2xl">Cultural Acknowledgement</h2>

        <p style="font-size: 16px; max-width: 800px; margin: 0 auto;">
            We acknowledge the Traditional Custodians of the land on which we operate,
            the Aboriginal and Torres Strait Islander peoples. We pay our respects to their Elders
            past, present, and emerging and recognize their deep and ongoing connection to the land,
            waters, and communities. Their legacy continues to inspire and guide us toward a better Queensland.
        </p>
    </div>    <p class="text-center">
        All rights reserved with <strong>thepacificart</strong> &copy; {{ date('Y') }}
    </p>

</footer>
   oih'''