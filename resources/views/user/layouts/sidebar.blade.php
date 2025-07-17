{{-- Sidebar --}}
<aside class="w-64 bg-white border-r shadow-sm p-6 space-y-4">
    <div class="text-center">
        <img class="w-20 h-20 rounded-full mx-auto"
            src="{{ asset('storage/' . (auth()->user()->profile_image ?? 'profile_images/default.png')) }}">
        <h2 class="text-xl font-bold mt-2">{{ auth()->user()->name }}</h2>
        <p class="text-sm text-gray-500">{{ auth()->user()->email }}</p>
    </div>
    <nav class="space-y-2">
        <a href="{{ route('user.dashboard') }}"
            class="block px-4 py-2 rounded hover:bg-gray-100 {{ request()->routeIs('user.dashboard') ? 'bg-blue-100 font-semibold' : '' }}">🏠
            Dashboard</a>
        <a href="{{ route('profile.edit') }}"
            class="block px-4 py-2 rounded hover:bg-gray-100 {{ request()->routeIs('profile.edit') ? 'bg-blue-100 font-semibold' : '' }}">✏️
            Edit Profile</a>
        <a href="{{ route('profile.password') }}"
            class="block px-4 py-2 rounded hover:bg-gray-100 {{ request()->routeIs('profile.password') ? 'bg-blue-100 font-semibold' : '' }}">🔐
            Change Password</a>
        <form method="POST" action="{{ route('user.logout') }}">
            @csrf
            <button type="submit" class="w-full text-left px-4 py-2 hover:bg-gray-100">🚪 Logout</button>
        </form>
    </nav>
</aside>
