<footer class="bg-[#1B1B1B] dark:bg-gray-900 text-[#EDEDEC] py-8">
    <div class="max-w-7xl mx-auto px-4 lg:px-8 grid grid-cols-1 md:grid-cols-3 gap-8">

        {{-- Kolom 1: Logo dan Info --}}
        <div class="flex flex-col items-center md:items-start text-center md:text-left">
            <a href="/" class="mb-4">
                {{-- Pastikan path logo sudah benar --}}
                <img src="{{ asset('images/logo.png') }}" alt="Pinterin Logo" class="h-14 w-auto object-contain">
            </a>
            <p class="text-sm text-gray-400 mb-4">
                Pinterin adalah platform edukasi online terkemuka yang menyediakan kursus berkualitas untuk
                meningkatkan keahlian Anda.
            </p>
            <div class="flex space-x-4">
                {{-- Ganti '#' dengan link sosial media Anda --}}
                <a href="#" class="text-gray-400 hover:text-yellow-500 transition-colors duration-200"
                    aria-label="Facebook">
                    <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M22 12c0-5.523-4.477-10-10-10S2 6.477 2 12c0 4.991 3.657 9.128 8.438 9.878v-6.987h-2.54V12h2.54V9.797c0-2.506 1.492-3.89 3.777-3.89 1.094 0 2.238.195 2.238.195v2.46h-1.26c-1.243 0-1.63.771-1.63 1.562V12h2.773l-.443 2.89h-2.33V22H12c5.523 0 10-4.477 10-10z"
                            clip-rule="evenodd" />
                    </svg>
                </a>
                <a href="#" class="text-gray-400 hover:text-yellow-500 transition-colors duration-200"
                    aria-label="Instagram">
                    <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.85s-.011 3.584-.069 4.85c-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07s-3.584-.012-4.85-.07c-3.252-.148-4.771-1.691-4.919-4.919-.058-1.265-.069-1.645-.069-4.85s.011-3.584.069-4.85c.149-3.225 1.664-4.771 4.919-4.919C8.416 2.175 8.796 2.163 12 2.163zm0 1.802c-3.141 0-3.504.012-4.726.068-2.733.125-3.951 1.345-4.075 4.075-.056 1.222-.067 1.585-.067 4.726s.011 3.504.067 4.726c.125 2.733 1.345 3.951 4.075 4.075 1.222.056 1.585.067 4.726.067s3.504-.011 4.726-.067c2.733-.125 3.951-1.345 4.075-4.075.056-1.222.067-1.585.067-4.726s-.011-3.504-.067-4.726c-.125-2.733-1.345-3.951-4.075-4.075-1.222-.056-1.585-.067-4.726-.067zM12 6.837a5.163 5.163 0 100 10.326 5.163 5.163 0 000-10.326zm0 8.528a3.363 3.363 0 110-6.726 3.363 3.363 0 010 6.726zM18.802 6.11a1.44 1.44 0 100-2.88 1.44 1.44 0 000 2.88z">
                        </path>
                    </svg>
                </a>
            </div>
        </div>

        {{-- Kolom 2: Navigasi Cepat --}}
        <div class="text-center md:text-left">
            <h4 class="text-lg font-semibold text-white mb-4">Quick Navigation</h4>
            <ul class="space-y-2 text-gray-400 text-sm">
                {{-- Pastikan nama route sudah sesuai --}}
                <li><a href="{{ route('home') }}" class="hover:text-yellow-500 transition-colors duration-200">Home</a>
                </li>
            </ul>
        </div>

        {{-- Kolom 3: Contact us --}}
        <div class="text-center md:text-left">
            <h4 class="text-lg font-semibold text-white mb-4">Contact Us</h4>
            <address class="space-y-2 text-gray-400 text-sm not-italic">
                <p>Jl. Bumimanti II, Bandar Lampung, Indonesia</p>
                <p>+62 812-3456-7890</p>
                <p>info@pinterin.com</p>
            </address>
        </div>

    </div>

    {{-- Copyright --}}
    <div class="text-center text-gray-500 text-sm border-t border-gray-800 pt-6">
        &copy; {{ date('Y') }} Pinterin. All rights reserved.
    </div>
</footer>
