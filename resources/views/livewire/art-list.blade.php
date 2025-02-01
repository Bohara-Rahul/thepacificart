<section class="container">
    <h2 class="section-heading mb-10">Arts List</h2>
    <div class="flex gap-2">
        <aside>
            <form>
                <input type="text" placeholder="Search arts here...." class="border border-gray-100"
                    wire:model.live.debounce.300ms="searchTerm" />
            </form>
            <h3>Filters</h3>
            <p>Select Caetgory</p>
            @foreach ($categories as $category)
                <label>
                    <input wire:model="selectedCategories" type="checkbox" value="{{ $category->id }}" />
                    {{ $category->title }}
                </label>
            @endforeach
            <button wire:click="$refresh" class="btn">Apply Filter</button>

        </aside>
        <section class="flex-1 overflow-auto">
            <article class="grid grid-cols-1 md:grid-cols-3 lg:grid-cols-3 gap-2">
                @foreach ($arts as $art)
                    <x-card>
                        <section class="flex flex-col justify-start text-black p-5">
                            <header class="flex justify-between items-center">
                                <h3 class="text-2xl text-[#13292a] capitalize font-bold">
                                    {{ $art->title }}
                                </h3>
                                <span class="text-xl">by {{ $art->artist->name }}</span>
                            </header>

                            @if ($art->photos)
                                <article class="shadow-lg">
                                    <img src="{{ asset('uploads/' . $art->photos[0]->name) }}" alt="art image"
                                        class="product-image rounded-md" />
                                </article>
                            @endif

                            <p>{{ substr($art->description, 0, 150) }}</p>

                            <article class="flex justify-between items-center mt-5">
                                <a href="#">
                                    <p>ADD TO WISHLIST</p>
                                </a>
                                <a href="#">
                                    <p>ADD TO CART</p>
                                </a>
                            </article>


                            <a class="btn text-center" href="{{ route('product_detail', $art->slug) }}">
                                Learn More
                            </a>

                        </section>
                    </x-card>
                @endforeach

        </section>
    </div>

</section>
