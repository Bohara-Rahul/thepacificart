<div id="filterBar"
     x-data="{ open: false }"
     class="sticky top-[40px] w-full z-40 shadow transition-all duration-300"
     style="background-image: linear-gradient(to right, #1c2b38, #2e3e4f);">

  <!-- Mobile Toggle -->
  <div class="flex md:hidden justify-between items-center px-4 py-2">
    <h2 class="text-white text-lg font-semibold">Filters</h2>
    <button @click="open = !open"
            class="text-white focus:outline-none bg-[#3d6571] px-3 py-1 rounded">
      <span x-show="!open">Show</span>
      <span x-show="open">Hide</span>
    </button>
  </div>

  <!-- Filter Form -->
  <div :class="{'block': open, 'hidden': !open}" class="md:block">
    <div class="flex overflow-x-visible mx-auto px-4 py-2 gap-3">

      <!-- Category -->
      <select wire:model="category" class="min-w-[120px] p-2 border rounded bg-white text-black">
        <option value="">All Categories</option>
        @foreach($categories as $id => $name)
          <option value="{{ $id }}">{{ $name }}</option>
        @endforeach
      </select>

      <!-- Price -->
      <!--<select wire:model="priceRange" class="min-w-[120px] p-2 border rounded bg-white text-black">-->
      <!--  <option value="">All Prices</option>-->
      <!--  <option value="0-100">$0 - $100</option>-->
      <!--  <option value="100-500">$100 - $500</option>-->
      <!--  <option value="500-1000">$500 - $1000</option>-->
      <!--</select>-->

      <!-- Artist -->
      <select wire:model="artist" class="min-w-[120px] p-2 border rounded bg-white text-black">
        <option value="">All Artists</option>
        @foreach($artists as $id => $name)
          <option value="{{ $id }}">{{ $name }}</option>
        @endforeach
      </select>

      <!-- Location -->
      <select wire:model="location" class="min-w-[120px] p-2 border rounded bg-white text-black">
        <option value="">All Locations</option>
        @foreach($locations as $loc)
          <option value="{{ $loc }}">{{ $loc }}</option>
        @endforeach
      </select>

      <!-- Orientation -->
      <select wire:model="orientation" class="min-w-[120px] p-2 border rounded bg-white text-black">
        <option value="">Any Orientation</option>
        <option value="landscape">Landscape</option>
        <option value="portrait">Portrait</option>
        <option value="square">Square</option>
      </select>

      <!-- Apply Button -->
      <button
        type="button"
        wire:click="apply"
        class="bg-blue-600 hover:bg-blue-700 text-white font-semibold px-4 py-1 rounded transition-all duration-200"
      >
        Apply
      </button>

      <!-- Reset Button -->
      <button
        type="button"
        wire:click="resetFilters"
        class="bg-red-600 hover:bg-red-700 text-white font-semibold px-4 py-1 rounded transition-all duration-200">
        Reset
      </button>
     
    </div>
  </div>
</div>
