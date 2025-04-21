@extends('layouts.other-page-layout')
@section('title', "What's New - The Pacific Art Marketplace")
@section('main_content')
    <section class="container p-5 mt-16">
        <h2 class="section-heading">Our Upcoming Events</h2>
        <!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>What's New | The Pacific Art</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-50 text-gray-800">
  <div class="max-w-6xl mx-auto p-6">
    <h1 class="text-4xl font-bold text-center mb-10">What's New at The Pacific Art</h1>

    <!-- Upcoming Artworks -->
    <section class="mb-12">
      <h2 class="text-2xl font-semibold mb-4">🌊 Upcoming Artworks</h2>
      <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6">
        <div class="bg-white p-4 rounded-2xl shadow-md">
          <img src="artwork1.jpg" alt="New Artwork" class="rounded-xl mb-3">
          <h3 class="text-xl font-bold">Echoes of the Horizon</h3>
          <p class="text-sm text-gray-600">By Sophia Marin – A seascape capturing the ethereal calm of dawn light on water. Coming May 2025.</p>
        </div>
      </div>
    </section>

    <!-- Upcoming Events -->
    <section class="mb-12">
      <h2 class="text-2xl font-semibold mb-4">🎨 Upcoming Events</h2>
      <ul class="space-y-4">
        <li class="bg-white p-4 rounded-2xl shadow-md">
          <div class="flex flex-col md:flex-row md:items-center md:justify-between">
            <div>
              <h3 class="text-lg font-bold">Spring Gallery Night</h3>
              <p class="text-sm text-gray-600">April 27, 2025 – Join us for a live exhibition featuring local artists and live music.</p>
            </div>
            <button class="mt-3 md:mt-0 bg-indigo-600 text-white px-4 py-2 rounded-xl hover:bg-indigo-700 transition">Book Now</button>
          </div>
        </li>
      </ul>
    </section>

    <!-- Announcements -->
    <section class="mb-12">
      <h2 class="text-2xl font-semibold mb-4">📣 Announcements</h2>
      <div class="bg-white p-4 rounded-2xl shadow-md">
        <p class="text-sm text-gray-600">We've just launched our new artist spotlight series. Follow us on Instagram to see behind-the-scenes stories and studio visits!</p>
      </div>
    </section>

    <!-- Newsletter Signup -->
    <section class="mb-12">
      <h2 class="text-2xl font-semibold mb-4">📬 Subscribe to Our Newsletter</h2>
      <form class="bg-white p-6 rounded-2xl shadow-md flex flex-col md:flex-row md:items-center gap-4">
        <input type="email" placeholder="Enter your email" class="flex-1 border border-gray-300 p-3 rounded-xl" required />
        <button type="submit" class="bg-indigo-600 text-white px-6 py-3 rounded-xl hover:bg-indigo-700 transition">Subscribe</button>
      </form>
    </section>

    <!-- Social Media Links -->
    <footer class="text-center text-sm text-gray-500 pt-6">
      <p>Follow us on
        <a href="#" class="text-indigo-600 hover:underline">Instagram</a>,
        <a href="#" class="text-indigo-600 hover:underline">Facebook</a>, and
        <a href="#" class="text-indigo-600 hover:underline">Twitter</a>
      </p>
    </footer>
  </div>
</body>
</html>

    </section>
@endsection
