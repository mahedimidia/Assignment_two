<header class="bg-white shadow-sm sticky top-0 z-50">
    <div class="container mx-auto px-4 flex justify-between items-center py-4">
        <!-- Logo -->
        <a href="{{ route('home.index') }}" class="flex items-center space-x-2">
            <i class="fas fa-blog text-2xl text-blue-600"></i>
            <span class="text-2xl font-bold text-gray-800">I<span class="text-blue-600">Blog</span>
            </span>
        </a>

        <!-- Desktop Navigation -->
        <nav class="hidden md:flex space-x-6 items-center">
            <a href="{{ route('home.index') }}" class="text-gray-700 hover:text-blue-600">Home</a>

            @if (isset($categories))
             <div class="relative desktop-dropdown">
                <button
                    class="text-gray-600 hover:text-blue-600 py-4 transition flex items-center">
                    Categories
                    <i class="fas fa-chevron-down ml-1 text-sm"></i>
                </button>
                <div
                    class="absolute left-0 w-64 bg-white rounded-md shadow-lg hidden z-50 desktop-dropdown-menu">
                    <div class="py-2">
                        <div class="relative desktop-dropdown-sub">
                            <button
                                class="block px-4 py-2 text-gray-700 hover:bg-gray-100 transition flex justify-between items-center w-full text-left">
                                Web Development
                                <i class="fas fa-chevron-right text-xs"></i>
                            </button>
                            <div
                                class="absolute left-full top-0 mt-0 w-64 bg-white rounded-md shadow-lg hidden desktop-dropdown-submenu">
                                <a
                                    href="{{route('home.categories')}}"
                                    class="block px-4 py-2 text-gray-700 hover:bg-gray-100 transition">Frontend</a>
                                <a
                                    href="{{route('home.categories')}}"
                                    class="block px-4 py-2 text-gray-700 hover:bg-gray-100 transition">Backend</a>
                                <a
                                    href="{{route('home.categories')}}"
                                    class="block px-4 py-2 text-gray-700 hover:bg-gray-100 transition">Full Stack</a>
                            </div>
                        </div>
                        <div class="relative desktop-dropdown-sub">
                            <button
                                class="block px-4 py-2 text-gray-700 hover:bg-gray-100 transition flex justify-between items-center w-full text-left">
                                Artificial Intelligence
                                <i class="fas fa-chevron-right text-xs"></i>
                            </button>
                            <div
                                class="absolute left-full top-0 mt-0 w-64 bg-white rounded-md shadow-lg hidden desktop-dropdown-submenu">
                                <a
                                    href="{{route('home.categories')}}"
                                    class="block px-4 py-2 text-gray-700 hover:bg-gray-100 transition">Machine Learning</a>
                                <a
                                    href="{{route('home.categories')}}"
                                    class="block px-4 py-2 text-gray-700 hover:bg-gray-100 transition">Deep Learning</a>
                                <a
                                    href="{{route('home.categories')}}"
                                    class="block px-4 py-2 text-gray-700 hover:bg-gray-100 transition">NLP</a>
                            </div>
                        </div>
                        <a
                            href="{{route('home.categories')}}"
                            class="block px-4 py-2 text-gray-700 hover:bg-gray-100 transition">Cloud Computing</a>
                        <a
                            href="{{route('home.categories')}}"
                            class="block px-4 py-2 text-gray-700 hover:bg-gray-100 transition">Cybersecurity</a>
                        <a
                            href="{{route('home.categories')}}"
                            class="block px-4 py-2 text-gray-700 hover:bg-gray-100 transition">Mobile Development</a>
                        <a
                            href="{{route('home.categories')}}"
                            class="block px-4 py-2 text-gray-700 hover:bg-gray-100 transition">DevOps</a>
                    </div>
                </div>
            </div>
            @else
                <a href="{{ route('home.categories') }}" class="text-gray-700 hover:text-blue-600">Categories</a>
            @endif
            <a href="{{ route('home.about') }}" class="text-gray-700 hover:text-blue-600">About</a>
            <a href="{{ route('home.contact') }}" class="text-gray-700 hover:text-blue-600">Contact</a>
        </nav>

        <!-- Action Buttons -->
        <div class="hidden md:flex space-x-2">
            <a
                href="{{ route('home.login') }}"
                class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 transition">Login</a>
            <a
                href="{{ route('home.registration') }}"
                class="bg-orange-500 text-white px-4 py-2 rounded hover:bg-orange-600 transition">Register</a>
        </div>

        <!-- Mobile Menu Button -->
        <button
            id="mobile-menu-button"
            class="md:hidden text-gray-700 text-2xl focus:outline-none">
            <i class="fas fa-bars"></i>
        </button>
    </div>

    <!-- Mobile Menu -->
    <div
        id="mobile-menu"
        class="hidden md:hidden bg-white border-t border-gray-200">
        <div class="px-4 py-4 space-y-2">
            <a
                href="{{ route('home.index') }}"
                class="block text-gray-700 hover:text-blue-600">Home</a>
            <a
                href="{{ route('home.categories') }}"
                class="block text-gray-700 hover:text-blue-600">Categories</a>
            <a
                href="{{ route('home.about') }}"
                class="block text-gray-700 hover:text-blue-600">About</a>
            <a
                href="{{ route('home.contact') }}"
                class="block text-gray-700 hover:text-blue-600">Contact</a>
            <a
                href="{{ route('home.login') }}"
                class="block bg-blue-600 text-white px-4 py-2 rounded text-center hover:bg-blue-700 transition">Login</a>
            <a
                href="{{ route('home.registration') }}"
                class="block bg-orange-500 text-white px-4 py-2 rounded text-center hover:bg-orange-600 transition">Register</a>
        </div>
    </div>
</header>