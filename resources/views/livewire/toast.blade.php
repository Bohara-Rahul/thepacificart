<div x-data="{ show: @entangle('visible') }"
    x-show="show"
    x-transition
    @hide-toast.window="setTimeout(() => show = false, 3000)"
    class="fixed bottom-5 right-5 px-4 py-2 rounded-lg shadow-lg flex items-center justify-between w-72"
    :class="{ 'bg-green-500 text-white': @js($type) === 'success', 'bg-red-500 text-white': @js($type) === 'error' }">
    
    <span class="flex-grow">{{ $message }}</span>

    <!-- Close Button -->
    <button @click="show = false" class="ml-4 bg-gray-200 text-gray-800 px-2 py-1 rounded-full hover:bg-gray-300">
        ×
    </button>
</div>