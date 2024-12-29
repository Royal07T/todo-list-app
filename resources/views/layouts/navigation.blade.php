<nav class="bg-gray-900 shadow">
    <div class="container px-4 mx-auto">
        <div class="flex items-center justify-between py-4">
            <!-- Task Manager Logo -->
            <a href="{{ url('/') }}" class="text-lg font-semibold text-white no-underline">TASK MANAGER</a>

            <!-- Hamburger Menu Button (visible on mobile) -->
            <div class="flex items-center lg:hidden">
                <button id="hamburger-button" class="text-white focus:outline-none">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                    </svg>
                </button>
            </div>

            <!-- Navigation Links (visible on large screens) -->
            <div class="items-center hidden space-x-4 lg:flex">
                @auth
                    <!-- Profile Dropdown -->
                    <li class="relative group">
                        <a href="{{ route('profile.settings') }}" class="text-gray-300 no-underline hover:text-white">Profile</a>
                        <div class="absolute hidden mt-2 bg-gray-800 border border-gray-700 rounded shadow-lg group-hover:block">
                            <a href="{{ route('profile.edit') }}" class="block px-4 py-2 text-gray-300 hover:bg-gray-700">Settings</a>
                            <a href="{{ route('profile.edit-password') }}" class="block px-4 py-2 text-gray-300 hover:bg-gray-700">Change Password</a>
                            <form method="POST" action="{{ route('profile.destroy') }}" onsubmit="return confirm('Are you sure you want to delete your account?')" class="block px-4 py-2">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-600 hover:text-red-800">Delete Account</button>
                            </form>
                        </div>
                    </li>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="block">
                        @csrf
                        <button type="submit" class="w-full px-4 py-2 text-left text-gray-300 hover:bg-gray-700">Logout</button>
                    </form>
                @else
                    <!-- Login & Register Links -->
                    <li><a href="{{ route('login') }}" class="text-gray-300 no-underline hover:text-white">Login</a></li>
                    <li><a href="{{ route('register') }}" class="text-gray-300 no-underline hover:text-white">Register</a></li>
                @endauth
            </div>

            <!-- Dropdown Menu for Mobile -->
            <div id="mobile-menu" class="absolute left-0 hidden w-full bg-gray-800 border border-gray-700 rounded shadow-lg lg:hidden top-16">
                <ul class="p-4 space-y-4">
                    @auth
                        <!-- Profile Dropdown in Mobile -->
                        <li><a href="{{ route('profile.settings') }}" class="text-gray-300 no-underline hover:text-white">Profile</a></li>
                        <li><a href="{{ route('profile.edit') }}" class="text-gray-300 no-underline hover:text-white">Settings</a></li>
                        <li><a href="{{ route('profile.edit-password') }}" class="text-gray-300 no-underline hover:text-white">Change Password</a></li>
                        <form method="POST" action="{{ route('profile.destroy') }}" onsubmit="return confirm('Are you sure you want to delete your account?')" class="block">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="w-full px-4 py-2 text-left text-red-600 hover:text-red-800">Delete Account</button>
                        </form>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="block">
                            @csrf
                            <button type="submit" class="w-full px-4 py-2 text-left text-gray-300 hover:bg-gray-700">Logout</button>
                        </form>
                    @else
                        <li><a href="{{ route('login') }}" class="text-gray-300 no-underline hover:text-white">Login</a></li>
                        <li><a href="{{ route('register') }}" class="text-gray-300 no-underline hover:text-white">Register</a></li>
                    @endauth
                </ul>
            </div>
        </div>
    </div>
</nav>

<script>
    const hamburgerButton = document.getElementById('hamburger-button');
    const mobileMenu = document.getElementById('mobile-menu');

    hamburgerButton.addEventListener('click', () => {
        mobileMenu.classList.toggle('hidden');
    });
</script>
