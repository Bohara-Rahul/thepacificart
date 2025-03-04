<footer class="footer p-5">
    <div class="container grid grid-cols-1 md:grid-cols-4">
        <ul class="flex flex-col gap-2">
            <p class="text-xl">About</p>
            <li class="hover:underline"><a href="{{ route('front.about-us') }}">About Us</a></li>
        </ul>

        <ul class="flex flex-col gap-2">
            <p class="text-xl">Contact Us</p>
            <li><i class="fa-solid fa-phone mr-2"></i> +61 494 381 041</li>
            <li><i class="fa-solid fa-envelope mr-2"></i> info@thepacificart.com.au</li>
        </ul>

        <ul class="flex flex-col space-x-2">
            <p class="text-xl">Social Media</p>
            <div class="flex gap-5">
                <a href="https://www.facebook.com/profile.php?id=61571620204348" target="_blank">
                    <li>
                        <i class="fa-brands fa-facebook text-lg"></i>
                    </li>
                </a>

                <li href="#">
                    <i class="fa-brands fa-instagram text-lg"></i>
                </li>
            </div>

        </ul>

        <ul>
            <p class="text-xl">Legal & Privacy</p>
            <li>Terms and Conditions</li>
            <li>Return Policy</li>
        </ul>
    </div>

    <p class="text-center">
        All rights reserved with <strong>thepacificart</strong> &copy; {{ date('Y') }}
    </p>

</footer>
