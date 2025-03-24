<section class="container mt-40">
    <h2 class="section-heading mb-10">Gallery</h2>
    <div class="flex">
        <aside class="mb-5">
            <input type="text" placeholder="Search arts here...." class="border border-gray-300 rounded-md"
                wire:model.live.debounce.300ms="searchTerm" />
            <h3>Filters</h3>
            <hr />
            <h5 class="font-extrabold mt-2 mb-2">Select Caetgory:</h5>
            @foreach ($categories as $category)
                <div wire:key="{{ $category->id }}" class="grid grid-cols-2 place-content-center place-items-start">
                    <label class="text-left text-gray-800">{{ $category->title }}</label>
                    <input wire:model="selectedCategories" type="checkbox" value="{{ $category->id }}" />
                </div>
            @endforeach
            <h5 class="font-extrabold mb-2">Choose Price:</h5>
            <div class="grid grid-cols-3 place-content-center place-items-start">
                <label class="col-span-2">100$ ≤ Price ≤ 1000$</label>
                <input wire:model="selectedPrice" type="radio" value="price between 100 and 1000" />
            </div>
            <div class="grid grid-cols-3 place-content-center place-items-start">
                <label class="col-span-2">1001$ ≤ Price ≤ 2000$</label>
                <input wire:model="selectedPrice" type="radio" value="price between 1001 and 2000" />
            </div>
            <div class="grid grid-cols-3 place-content-center place-items-start">
                <label class="col-span-2">2001$ ≤ Price ≤ 3000$</label>
                <input wire:model="selectedPrice" type="radio" value="price between 2001 and 3000" />
            </div>
            <div class="grid grid-cols-3 place-content-center place-items-start">
                <label class="col-span-2">3001$ ≤ Price ≤ 4000$</label>
                <input wire:model="selectedPrice" type="radio" value="price between 3001 and 4000" />
            </div>
            <div class="grid grid-cols-3 place-content-center place-items-start">
                <label class="col-span-2">4001$ ≤ Price ≤ 5000$</label>
                <input wire:model="selectedPrice" type="radio" value="price between 4001 and 5000" />
            </div>
            <div class="grid grid-cols-3 place-content-center place-items-start">
                <label class="col-span-2">Price > 5000$</label>
                <input wire:model="selectedPrice" type="radio" value="price above 5000" />
            </div>
            <button wire:click="$refresh" class="btn btn-primary">Apply Filter</button>
            <button wire:click="resetForm" class="text-black hover:underline">Reset Filter</button>
        </aside>
        <section class="flex-1">
            @if (count($arts))
                <article class="grid-container gap-2 justify-center">
                    @foreach ($arts as $art)
                        <x-card>
                            <section class="flex flex-col justify-start text-black p-5 w-[360px] h-[600px]">
                                <a href="{{ route('product_detail', $art->slug) }}">
                                    <header class="flex justify-between items-center">
                                        <h3 class="text-2xl text-[#13292a] capitalize font-bold">
                                            {{ $art->title }}
                                        </h3>
                                    </header>


                                    <article class="shadow-lg w-80 h-[340px]">
                                        <img src="{{ asset('uploads/' . $art->primary_image) }}" alt="art image"
                                            class="product-image rounded-md object-cover" />
                                    </article>
                                    <p>{!! substr($art->description, 0, 150) !!}</p>
                                </a>

                                <article class="flex justify-between items-center mt-5">
                                    @if ($art->wishlist()->where('user_id', Auth::id())->exists())
                                        <a href="{{ route('front.remove_from_wishlist', $art->id) }}">
                                            <i class="fa-solid fa-heart"></i> Remove from Wishlist
                                            {{-- <p><i class="fa-solid fa-heart"></i></p> --}}
                                        </a>
                                    @else
                                        <a href="{{ route('front.add_to_wishlist', $art->id) }}">
                                            <i class="fa-regular fa-heart"></i> Add to Wishlist
                                            {{-- <p><i class="fa-solid fa-heart"></i></p> --}}
                                        </a>
                                    @endif

                                    <a href="#" class="ml-auto">
                                        <p>ADD TO CART</p>
                                    </a>
                                </article>


                                <a class="btn btn-primary text-center" href="{{ route('product_detail', $art->slug) }}">
                                    Explore the Masterpiece
                                </a>

                            </section>

                        </x-card>
                        </a>
                    @endforeach
        </section>
    </div>
    <div class="pagination mt-4">
        @if ($arts->onFirstPage())
            <span class="px-3 py-2 text-gray-400 cursor-not-allowed">
                <i class="fa-solid fa-arrow-left"></i>
            </span>
        @else
            <a href="{{ $arts->previousPageUrl() }}" class="px-3 py-2 text-white rounded"><i
                    class="fa-solid fa-arrow-left"></i></a>
        @endif
        @foreach ($arts->links()->elements[0] as $page => $url)
            @if ($page == $arts->currentPage())
                <span class="active">{{ $page }}</span>
            @else
                <a href="{{ $url }}">{{ $page }}</a>
            @endif
        @endforeach
        @if ($arts->hasMorePages())
            <a href="{{ $arts->nextPageUrl() }}" class="px-3 py-2  text-white rounded"><i
                    class="fa-solid fa-arrow-right"></i></a>
        @else
            <span class="px-3 py-2 text-gray-400 cursor-not-allowed"><i class="fa-solid fa-arrow-right"></i></span>
        @endif

    </div>
@else
    <h2 class="text-center">Your filters do not match any arts</h2>
    @endif


</section>
