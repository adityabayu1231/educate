<div class="min-w-fit">
    <!-- Sidebar backdrop (mobile only) -->
    <div class="fixed inset-0 bg-gray-900 bg-opacity-30 z-40 lg:hidden lg:z-auto transition-opacity duration-200"
        :class="sidebarOpen ? 'opacity-100' : 'opacity-0 pointer-events-none'" aria-hidden="true" x-cloak></div>

    <!-- Sidebar -->
    <div id="sidebar"
        class="flex lg:!flex flex-col absolute z-40 left-0 top-0 lg:static lg:left-auto lg:top-auto lg:translate-x-0 h-[100dvh] overflow-y-scroll lg:overflow-y-auto no-scrollbar w-64 lg:w-20 lg:sidebar-expanded:!w-64 2xl:!w-64 shrink-0 bg-gradient-to-b from-blue-900 to-blue-500 p-4 transition-all duration-200 ease-in-out"
        :class="sidebarOpen ? 'max-lg:translate-x-0' : 'max-lg:-translate-x-64'" @click.outside="sidebarOpen = false"
        @keydown.escape.window="sidebarOpen = false">

        <!-- Sidebar header -->
        <div class="flex justify-between mb-10 pr-3 sm:px-2">
            <!-- Close button -->
            <button class="lg:hidden text-white hover:text-gray-400" @click.stop="sidebarOpen = !sidebarOpen"
                aria-controls="sidebar" :aria-expanded="sidebarOpen">
                <span class="sr-only">Close sidebar</span>
                <svg class="w-6 h-6 fill-current" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path d="M10.7 18.7l1.4-1.4L7.8 13H20v-2H7.8l4.3-4.3-1.4-1.4L4 12z" />
                </svg>
            </button>
            <!-- Logo -->
            <a class="block" href="{{ route('dashboard') }}">
                <img src="{{ asset('frontend/images/logo/eduline.png') }}" alt="eduline" width="38px" height="38px"
                    class="filter invert brightness-0">
            </a>
        </div>

        <!-- Links -->
        <div class="space-y-8">
            <!-- Pages group -->
            <div>
                <h3 class="text-xs uppercase text-white font-semibold pl-3">
                    <span class="hidden lg:block lg:sidebar-expanded:hidden 2xl:hidden text-center w-6"
                        aria-hidden="true">•••</span>
                    <span class="lg:hidden lg:sidebar-expanded:block 2xl:block">Page</span>
                </h3>
                <ul class="mt-3">
                    <!-- Dashboard -->
                    @if (Auth::user()->role_id == 1)
                        <!-- My Profile -->
                        <li
                            class="pl-4 pr-3 py-2 mb-0.5 last:mb-0 @if (Request::is('dashboard')) bg-amber-500 text-white @endif">
                            <a class="block text-white truncate transition hover:text-gray-200"
                                href="{{ route('dashboard') }}">
                                <div class="flex items-center">
                                    <i
                                        class="fas fa-user-circle {{ Request::is('dashboard') ? 'text-white' : 'text-amber-500' }}"></i>
                                    <span
                                        class="text-sm font-medium ml-4 lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">My
                                        Profile</span>
                                </div>
                            </a>
                        </li>

                        <!-- My Target -->
                        {{-- <li
                            class="pl-4 pr-3 py-2 rounded-lg mb-0.5 last:mb-0 @if (Request::is('user-target')) bg-amber-500 text-white @endif">
                            <a class="block text-gray-100 truncate transition hover:text-white"
                                href="{{ route('user.target') }}">
                                <div class="flex items-center justify-between">
                                    <div class="grow flex items-center">
                                        <i
                                            class="fa-solid fa-clipboard-check {{ Request::is('user-target') ? 'text-white' : 'text-amber-500' }}"></i>
                                        <span
                                            class="text-sm font-medium ml-4 lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200 text-white">My
                                            Target</span>
                                    </div>
                                </div>
                            </a>
                        </li> --}}

                        <!-- Edu Center -->
                        <li
                            class="pl-4 pr-3 py-2 rounded-lg mb-0.5 last:mb-0 @if (Request::is('edu-center')) bg-amber-500 text-white @endif">
                            <a class="block text-gray-100 truncate transition hover:text-white"
                                href="{{ route('user.ec') }}">
                                <div class="flex items-center">
                                    <i
                                        class="fa-solid fa-bars-progress {{ Request::is('edu-center') ? 'text-white' : 'text-amber-500' }}"></i>
                                    <span
                                        class="text-sm font-medium ml-4 lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200 text-white">Edu
                                        Center</span>
                                </div>
                            </a>
                        </li>

                        <!-- My Schedule -->
                        {{-- <li
                            class="pl-4 pr-3 py-2 rounded-lg mb-0.5 last:mb-0 @if (Request::is('edu-schedule')) bg-amber-500 text-white @endif">
                            <a class="block text-gray-100 truncate transition hover:text-white"
                                href="{{ route('user.schd') }}">
                                <div class="flex items-center">
                                    <i
                                        class="fa-solid fa-clipboard-list {{ Request::is('edu-schedule') ? 'text-white' : 'text-amber-500' }}"></i>
                                    <span
                                        class="text-sm font-medium ml-4 lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">My
                                        Schedule</span>
                                </div>
                            </a>
                        </li> --}}

                        <!-- Teacher Profile -->
                        {{-- <li
                            class="pl-4 pr-3 py-2 rounded-lg mb-0.5 last:mb-0 @if (Request::is('edu-teacher')) bg-amber-500 text-white @endif">
                            <a class="block text-gray-100 truncate transition hover:text-white"
                                href="{{ route('user.teach') }}">
                                <div class="flex items-center">
                                    <i
                                        class="fas fa-user-tie {{ Request::is('edu-teacher') ? 'text-white' : 'text-amber-500' }}"></i>
                                    <span
                                        class="text-sm font-medium ml-4 lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">Teacher
                                        Profile</span>
                                </div>
                            </a>
                        </li> --}}

                        <!-- Learning Report -->
                        {{-- <li
                            class="pl-4 pr-3 py-2 rounded-lg mb-0.5 last:mb-0 @if (Request::is('edu-learning-report')) bg-amber-500 text-white @endif">
                            <a class="block text-gray-100 truncate transition hover:text-white"
                                href="{{ route('user.lernport') }}">
                                <div class="flex items-center">
                                    <i
                                        class="fas fa-book-open {{ Request::is('edu-learning-report') ? 'text-white' : 'text-amber-500' }}"></i>
                                    <span
                                        class="text-sm font-medium ml-4 lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">Learning
                                        Report</span>
                                </div>
                            </a>
                        </li> --}}
                    @elseif (Auth::user()->role_id == 2)
                        <!-- My Profile -->
                        <li
                            class="pl-4 pr-3 py-2 mb-0.5 last:mb-0 @if (Request::is('dashboard')) bg-amber-500 text-white @endif">
                            <a class="block text-white truncate transition hover:text-gray-200"
                                href="{{ route('dashboard') }}">
                                <div class="flex items-center">
                                    <i
                                        class="fas fa-user-circle {{ Request::is('dashboard') ? 'text-white' : 'text-amber-500' }}"></i>
                                    <span
                                        class="text-sm font-medium ml-4 lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">My
                                        Profile</span>
                                </div>
                            </a>
                        </li>

                        <!-- Edu Center -->
                        {{-- <li
                            class="pl-4 pr-3 py-2 rounded-lg mb-0.5 last:mb-0 @if (Request::is('teacher/edu-center')) bg-amber-500 text-white @endif">
                            <a class="block text-gray-100 truncate transition hover:text-white"
                                href="{{ route('teacher.center') }}">
                                <div class="flex items-center">
                                    <i
                                        class="fa-solid fa-bars-progress {{ Request::is('teacher/edu-center') ? 'text-white' : 'text-amber-500' }}"></i>
                                    <span
                                        class="text-sm font-medium ml-4 lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200 text-white">Edu
                                        Center</span>
                                </div>
                            </a>
                        </li> --}}

                        <!-- My Schedule -->
                        <li
                            class="pl-4 pr-3 py-2 rounded-lg mb-0.5 last:mb-0 @if (Request::is('teacher/schedule')) bg-amber-500 text-white @endif">
                            <a class="block text-gray-100 truncate transition hover:text-white"
                                href="{{ route('teacher.schedule') }}">
                                <div class="flex items-center">
                                    <i
                                        class="fa-solid fa-clipboard-list {{ Request::is('teacher/schedule') ? 'text-white' : 'text-amber-500' }}"></i>
                                    <span
                                        class="text-sm font-medium ml-4 lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200 text-white">My
                                        Schedule</span>
                                </div>
                            </a>
                        </li>

                        <!-- Biodata Siswa -->
                        {{-- <li
                            class="pl-4 pr-3 py-2 rounded-lg mb-0.5 last:mb-0 @if (Request::is('teacher/bio-siswa')) bg-amber-500 text-white @endif">
                            <a class="block text-gray-100 truncate transition hover:text-white"
                                href="{{ route('teacher.biosiswa') }}">
                                <div class="flex items-center">
                                    <i
                                        class="fas fa-book {{ Request::is('teacher/bio-siswa') ? 'text-white' : 'text-amber-500' }}"></i>
                                    <span
                                        class="text-sm font-medium ml-4 lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200 text-white">Biodata
                                        Siswa</span>
                                </div>
                            </a>
                        </li> --}}

                        <!-- Teaching Report -->
                        <li
                            class="pl-4 pr-3 py-2 rounded-lg mb-0.5 last:mb-0 @if (Request::is('teacher/report')) bg-amber-500 text-white @endif">
                            <a class="block text-gray-100 truncate transition hover:text-white"
                                href="{{ route('teacher.report') }}">
                                <div class="flex items-center">
                                    <i
                                        class="fas fa-book-open {{ Request::is('teacher/report') ? 'text-white' : 'text-amber-500' }}"></i>
                                    <span
                                        class="text-sm font-medium ml-4 lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200 text-white">Teaching
                                        Report</span>
                                </div>
                            </a>
                        </li>
                    @else
                        <!-- My Profile -->
                        <li
                            class="pl-4 pr-3 py-2 mb-0.5 last:mb-0 @if (Request::is('dashboard')) bg-amber-500 text-white @endif">
                            <a class="block text-white truncate transition hover:text-gray-200"
                                href="{{ route('dashboard') }}">
                                <div class="flex items-center">
                                    <i
                                        class="fas fa-user-circle {{ Request::is('dashboard') ? 'text-white' : 'text-amber-500' }}"></i>
                                    <span
                                        class="text-sm font-medium ml-4 lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">My
                                        Profile</span>
                                </div>
                            </a>
                        </li>
                    @endif
                </ul>
            </div>
        </div>

        <!-- Expand / collapse button -->
        <div class="pt-3 hidden lg:inline-flex 2xl:hidden justify-end mt-auto">
            <div class="w-12 pl-4 pr-3 py-2">
                <button class="text-white hover:text-gray-400 transition-colors"
                    @click="sidebarExpanded = !sidebarExpanded">
                    <span class="sr-only">Expand / collapse sidebar</span>
                    <svg class="shrink-0 fill-current text-white sidebar-expanded:rotate-180"
                        xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16">
                        <path
                            d="M15 16a1 1 0 0 1-1-1V1a1 1 0 1 1 2 0v14a1 1 0 0 1-1 1ZM8.586 7H1a1 1 0 1 0 0 2h7.586l-2.793 2.793a1 1 0 1 0 1.414 1.414l4.5-4.5A.997.997 0 0 0 12 8.01M11.924 7.617a.997.997 0 0 0-.217-.324l-4.5-4.5a1 1 0 0 0-1.414 1.414L8.586 7M12 7.99a.996.996 0 0 0-.076-.373Z" />
                    </svg>
                </button>
            </div>
        </div>
    </div>
</div>
