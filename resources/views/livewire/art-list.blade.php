<div class="container mx-auto px-4 sm:px-6 lg:px-12">
  <!-- Masonry Grid Container -->
  <div id="arts-masonry" class="masonry-container">
    @foreach ($arts as $art)
    <div class="masonry-item mb-6">
      <a href="{{ route('product_detail', $art->slug) }}">
        <section class="flex flex-col justify-start text-black p-3 border border-gray-300 rounded-xl shadow-sm bg-white w-full transition-all duration-300 transform">
          <!-- Image -->
          <article class="w-full bg-gray-50 rounded-md overflow-hidden">
            <img src="{{ asset('uploads/' . $art->primary_image) }}" alt="art image"
                 class="w-full h-auto object-cover object-center rounded-md transition-transform duration-300 ease-in-out hover:scale-105" />
          </article>

          <!-- Title -->
          <h3 class="text-[#13292a] capitalize font-bold mt-2 mb-0">
              {{ $art->title }}
          </h3>

          <!-- Description -->
          <p class="prose mt-1">{!! Str::words($art->description, 20, '...') !!}</p>

          <!-- Size and Price -->
          <aside class="flex flex-wrap justify-between text-xs mt-2">
            <p>Size: {{ $art->size }}</p>
            <p>Price: ${{ $art->price }}</p>
          </aside>

          <!-- Explore Button -->
          <span class="btn btn-primary text-center block mt-2 text-xs">
            Explore the Masterpiece
          </span>
        </section>
      </a>

      <!-- Wishlist / Cart Buttons BELOW the card -->
      <div class="flex justify-between items-center gap-2 mt-6 px-3">
          @if ($art->wishlist()->where('user_id', Auth::id())->exists())
            <a href="{{ route('front.remove_from_wishlist', $art->id) }}" class="btn btn-accent text-xs w-1/2 text-center">
              <i class="fas fa-trash mr-2"></i>Remove from Wishlist
            </a>
          @else
            <a href="{{ route('front.add_to_wishlist', $art->id) }}" class="btn btn-accent text-xs w-1/2 text-center">
              <i class="far fa-heart mr-2"></i>Add to Wishlist
            </a>
          @endif

        <div class="w-1/2 text-center text-xs">
          @livewire('add-to-cart', ['productId' => $art->id])
        </div>
      </div>
    </div>
    @endforeach
  </div>
</div>

 <!--Macy.js Script -->
<script src="https://cdn.jsdelivr.net/npm/macy@2/dist/macy.min.js"></script>
<script>
  document.addEventListener('DOMContentLoaded', () => {
    Macy({
      container: '#arts-masonry',
      trueOrder: true,
      waitForImages: true,
      margin: 24,
      columns: 4,
      breakAt: {
        1200: 4,
        992: 3,
        768: 2,
        480: 1
      }
    });
  });
</script>