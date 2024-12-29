<nav class="bg-gray-900 shadow">
    <div class="container px-4 mx-auto">
        <div class="flex items-center justify-between py-4">
            <!-- Task Manager Logo -->
            <a href="{{ url('/') }}" class="text-lg font-semibold text-white">TASK MANAGER</a>

            <!-- Navigation Links -->
            <div>
                <ul class="flex items-center space-x-4">
                    @auth
                        <!-- Tasks Link -->
                        {{--  <li><a href="{{ route('tasks.index') }}" class="text-gray-300 hover:text-white">Tasks</a></li>  --}}

                        <!-- Profile Dropdown -->
                        <li class="relative group">
                            <a href="{{ route('profile.settings') }}" class="text-gray-300 hover:text-white">Profile</a>
                            <div class="absolute hidden mt-2 bg-gray-800 border border-gray-700 rounded shadow-lg group-hover:block">
                                <a href="{{ route('profile.edit') }}" class="block px-4 py-2 text-gray-300 hover:bg-gray-700">Settings</a>
                                <a href="{{ route('profile.edit-password') }}" class="block px-4 py-2 text-gray-300 hover:bg-gray-700">Change Password</a>

                            </div>
                        </li>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="block">
                            @csrf
                            <button type="submit" class="w-full px-4 py-2 text-left text-gray-300 hover:bg-gray-700">Logout</button>
                        </form>
                    @else
                        <!-- Login & Register Links -->
                        <li><a href="{{ route('login') }}" class="text-gray-300 hover:text-white">Login</a></li>
                        <li><a href="{{ route('register') }}" class="text-gray-300 hover:text-white">Register</a></li>
                    @endauth
                </ul>
            </div>
        </div>
    </div>
</nav>
