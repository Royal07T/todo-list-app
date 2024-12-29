<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-sm dark:bg-gray-800 sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <!-- Profile Section -->
                    <div class="mb-6">
                        <h3 class="text-lg font-semibold">Profile Information</h3>
                        <p>Name: {{ Auth::user()->name }}</p>
                        <p>Email: {{ Auth::user()->email }}</p>
                        <div class="mt-2">
                            <a href="{{ route('profile.edit') }}" class="text-blue-600 hover:text-blue-800">Edit Profile</a>
                        </div>
                    </div>

                    <!-- Change Password and Delete Account -->
                    <div class="mt-4">
                        <a href="{{ route('profile.updatePassword') }}" class="text-blue-600 hover:text-blue-800">Change Password</a>
                    </div>
                    <div class="mt-2">
                        <form method="POST" action="{{ route('profile.destroy') }}" onsubmit="return confirm('Are you sure you want to delete your account?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-600 hover:text-red-800">Delete Account</button>
                        </form>
                    </div>

                    <!-- Tasks Section -->
                    <h3 class="mt-8">Your Tasks:</h3>
                    @if($tasks->count())  <!-- Check if tasks exist -->
                        <ul>
                            @foreach($tasks as $task)
                                <li>{{ $task->title }} - {{ $task->completed ? 'Completed' : 'Pending' }}</li>
                            @endforeach
                        </ul>
                    @else
                        <p>No tasks found.</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
