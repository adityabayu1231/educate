<div class="min-w-fit">
    <!-- Sidebar backdrop (mobile only) -->
    <div class="fixed inset-0 bg-gray-900 bg-opacity-30 z-40 lg:hidden lg:z-auto transition-opacity duration-200"
        :class="sidebarOpen ? 'opacity-100' : 'opacity-0 pointer-events-none'" aria-hidden="true" x-cloak></div>

    <!-- Sidebar -->
    <div id="sidebar"
        class="flex lg:!flex flex-col absolute z-40 left-0 top-0 lg:static lg:left-auto lg:top-auto lg:translate-x-0 h-[100dvh] overflow-y-scroll lg:overflow-y-auto no-scrollbar w-64 lg:w-20 lg:sidebar-expanded:!w-64 2xl:!w-64 shrink-0 bg-gray-900 p-4 transition-all duration-200 ease-in-out"
        :class="sidebarOpen ? 'max-lg:translate-x-0' : 'max-lg:-translate-x-64'" @click.outside="sidebarOpen = false"
        @keydown.escape.window="sidebarOpen = false">

        <!-- Sidebar header -->
        <div class="flex justify-between mb-10 pr-3 sm:px-2">
            <!-- Close button -->
            <button class="lg:hidden text-gray-500 hover:text-gray-400" @click.stop="sidebarOpen = !sidebarOpen"
                aria-controls="sidebar" :aria-expanded="sidebarOpen">
                <span class="sr-only">Close sidebar</span>
                <svg class="w-6 h-6 fill-current" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path d="M10.7 18.7l1.4-1.4L7.8 13H20v-2H7.8l4.3-4.3-1.4-1.4L4 12z" />
                </svg>
            </button>
            <!-- Logo -->
            <a class="block" href="{{ route('dashboard') }}">
                <img src="{{ asset('frontend/images/logo/eduline.png') }}" alt="logoEduline" width="52px"
                    height="52px">
            </a>
        </div>

        <!-- Links -->
        <div class="space-y-8">
            <!-- Pages group -->
            <div>
                <h3 class="text-xs uppercase text-gray-400 font-semibold pl-3">
                    <span class="hidden lg:block lg:sidebar-expanded:hidden 2xl:hidden text-center w-6"
                        aria-hidden="true">•••</span>
                    <span class="lg:hidden lg:sidebar-expanded:block 2xl:block">Pages</span>
                </h3>
                <ul class="mt-3">
                    <!-- Dashboard -->
                    <li class="pl-4 pr-3 py-2 mb-0.5 last:mb-0"
                        :class="{ 'bg-[linear-gradient(135deg,var(--tw-gradient-stops))] from-violet-500/[0.24] to-violet-500/[0.04]': {{ Request::is('admin') || Request::is('admin/dashboard') ? 'true' : 'false' }} }"
                        x-data="{ open: {{ Request::is('admin') || Request::is('admin/dashboard') ? 'true' : 'false' }} }">
                        <a class="block text-gray-100 truncate transition @if (!Request::is('admin') && !Request::is('admin/dashboard')) hover:text-white @endif"
                            href="#0" @click.prevent="open = !open; sidebarExpanded = true">
                            <div class="flex items-center justify-between">
                                <div class="flex items-center">
                                    <svg class="shrink-0 fill-current  @if (Request::is('admin/dashboard*')) hover:text-white text-violet-500 @endif"
                                        xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                        viewBox="0 0 16 16">
                                        <path
                                            d="M5.936.278A7.983 7.983 0 0 1 8 0a8 8 0 1 1-8 8c0-.722.104-1.413.278-2.064a1 1 0 1 1 1.932.516A5.99 5.99 0 0 0 2 8a6 6 0 1 0 6-6c-.53 0-1.045.076-1.548.21A1 1 0 1 1 5.936.278Z" />
                                        <path
                                            d="M6.068 7.482A2.003 2.003 0 0 0 8 10a2 2 0 1 0-.518-3.932L3.707 2.293a1 1 0 0 0-1.414 1.414l3.775 3.775Z" />
                                    </svg>
                                    <span
                                        class="text-sm font-medium ml-4 lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">Dashboard</span>
                                </div>
                                <!-- Icon -->
                                <div
                                    class="flex shrink-0 ml-2 lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">
                                    <svg class="w-3 h-3 shrink-0 ml-1 fill-current text-gray-400 dark:text-gray-500"
                                        :class="open ? 'rotate-180' : 'rotate-0'" viewBox="0 0 12 12">
                                        <path d="M5.9 11.4L.5 6l1.4-1.4 4 4 4-4L11.3 6z" />
                                    </svg>
                                </div>
                            </div>
                        </a>
                        <div class="lg:hidden lg:sidebar-expanded:block 2xl:block">
                            <ul class="pl-8 mt-1" :class="open ? '!block' : 'hidden'">
                                <li class="mb-1 last:mb-0">
                                    <a class="block hover:text-gray-200 transition truncate @if (Request::is('admin') || Request::is('admin/dashboard')) text-violet-500 @endif"
                                        href="{{ route('admin.index') }}">
                                        <span
                                            class="text-sm font-medium lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">Main</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li>

                    <li class="pl-4 pr-3 py-2 mb-0.5 last:mb-0"
                        :class="{ 'bg-[linear-gradient(135deg,var(--tw-gradient-stops))] from-violet-500/[0.24] to-violet-500/[0.04]': {{ Request::is('admin') || Request::is('admin/master*') ? 'true' : 'false' }} }"
                        x-data="{ open: {{ Request::is('admin') || Request::is('admin/master*') ? 'true' : 'false' }} }">
                        <a class="block text-gray-100 truncate transition @if (!Request::is('admin') && !Request::is('admin/dashboard')) hover:text-white @endif"
                            href="#0" @click.prevent="open = !open; sidebarExpanded = true">
                            <div class="flex items-center justify-between">
                                <div class="flex items-center">
                                    <!-- Icon FontAwesome untuk Pengaturan -->
                                    <i
                                        class="fas fa-tools shrink-0 @if (Request::is('admin/master*')) text-violet-500 @else 'text-gray-500' @endif"></i>
                                    <span
                                        class="text-sm font-medium ml-4 lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">
                                        Master
                                    </span>
                                </div>
                                <!-- Toggle Icon -->
                                <div
                                    class="flex shrink-0 ml-2 lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">
                                    <i class="fas fa-chevron-down text-gray-500 @if (Request::is('admin/master*')) rotate-180 @endif"
                                        :class="open ? 'rotate-180' : 'rotate-0'"></i>
                                </div>
                            </div>
                        </a>
                        <div class="lg:hidden lg:sidebar-expanded:block 2xl:block">
                            <ul class="pl-8 mt-1 " :class="open ? '!block' : 'hidden'">
                                <li class="mb-1 last:mb-0">
                                    <a class="block hover:text-gray-200 transition truncate @if (Request::is('admin/master/brands')) text-violet-500 @else{{ 'text-gray-500' }} @endif"
                                        href="{{ route('admin.brands.index') }}">
                                        <span
                                            class="text-sm font-medium lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">Brand</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <div class="lg:hidden lg:sidebar-expanded:block 2xl:block">
                            <ul class="pl-8 mt-1 " :class="open ? '!block' : 'hidden'">
                                <li class="mb-1 last:mb-0">
                                    <a class="block hover:text-gray-200 transition truncate @if (Request::is('admin/master/programs')) text-violet-500 @else{{ 'text-gray-500' }} @endif"
                                        href="{{ route('admin.programs.index') }}">
                                        <span
                                            class="text-sm font-medium lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">Program</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <div class="lg:hidden lg:sidebar-expanded:block 2xl:block">
                            <ul class="pl-8 mt-1 " :class="open ? '!block' : 'hidden'">
                                <li class="mb-1 last:mb-0">
                                    <a class="block hover:text-gray-200 transition truncate @if (Request::is('admin/master/subprograms')) text-violet-500 @else{{ 'text-gray-500' }} @endif"
                                        href="{{ route('admin.subprograms.index') }}">
                                        <span
                                            class="text-sm font-medium lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">Sub
                                            Program</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <div class="lg:hidden lg:sidebar-expanded:block 2xl:block">
                            <ul class="pl-8 mt-1 " :class="open ? '!block' : 'hidden'">
                                <li class="mb-1 last:mb-0">
                                    <a class="block hover:text-gray-200 transition truncate @if (Request::is('admin/master/levels')) text-violet-500 @else{{ 'text-gray-500' }} @endif"
                                        href="{{ route('admin.levels.index') }}">
                                        <span
                                            class="text-sm font-medium lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">Jenjang</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <div class="lg:hidden lg:sidebar-expanded:block 2xl:block">
                            <ul class="pl-8 mt-1 " :class="open ? '!block' : 'hidden'">
                                <li class="mb-1 last:mb-0">
                                    <a class="block hover:text-gray-200 transition truncate @if (Request::is('admin/master/tingkat')) text-violet-500 @else{{ 'text-gray-500' }} @endif"
                                        href="{{ route('admin.tingkat.index') }}">
                                        <span
                                            class="text-sm font-medium lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">Tingkat</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <div class="lg:hidden lg:sidebar-expanded:block 2xl:block">
                            <ul class="pl-8 mt-1 " :class="open ? '!block' : 'hidden'">
                                <li class="mb-1 last:mb-0">
                                    <a class="block hover:text-gray-200 transition truncate @if (Request::is('admin/master/programs')) text-violet-500 @else{{ 'text-gray-500' }} @endif"
                                        href="{{ route('admin.programs.index') }}">
                                        <span
                                            class="text-sm font-medium lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">SLA</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <div class="lg:hidden lg:sidebar-expanded:block 2xl:block">
                            <ul class="pl-8 mt-1 " :class="open ? '!block' : 'hidden'">
                                <li class="mb-1 last:mb-0">
                                    <a class="block hover:text-gray-200 transition truncate @if (Request::is('admin/master/users')) text-violet-500 @else{{ 'text-gray-500' }} @endif"
                                        href="{{ route('admin.users.index') }}">
                                        <span
                                            class="text-sm font-medium lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">User</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <div class="lg:hidden lg:sidebar-expanded:block 2xl:block">
                            <ul class="pl-8 mt-1 " :class="open ? '!block' : 'hidden'">
                                <li class="mb-1 last:mb-0">
                                    <a class="block hover:text-gray-200 transition truncate @if (Request::is('admin/master/teachers')) text-violet-500 @else{{ 'text-gray-500' }} @endif"
                                        href="{{ route('admin.teachers.index') }}">
                                        <span
                                            class="text-sm font-medium lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">Guru</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <div class="lg:hidden lg:sidebar-expanded:block 2xl:block">
                            <ul class="pl-8 mt-1 " :class="open ? '!block' : 'hidden'">
                                <li class="mb-1 last:mb-0">
                                    <a class="block hover:text-gray-200 transition truncate @if (Request::is('admin/master/students')) text-violet-500 @else{{ 'text-gray-500' }} @endif"
                                        href="{{ route('admin.students.index') }}">
                                        <span
                                            class="text-sm font-medium lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">Siswa</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <div class="lg:hidden lg:sidebar-expanded:block 2xl:block">
                            <ul class="pl-8 mt-1 " :class="open ? '!block' : 'hidden'">
                                <li class="mb-1 last:mb-0">
                                    <a class="block hover:text-gray-200 transition truncate @if (Request::is('admin/master/kelas')) text-violet-500 @else{{ 'text-gray-500' }} @endif"
                                        href="{{ route('admin.kelas.index') }}">
                                        <span
                                            class="text-sm font-medium lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">Kelas</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <div class="lg:hidden lg:sidebar-expanded:block 2xl:block">
                            <ul class="pl-8 mt-1 " :class="open ? '!block' : 'hidden'">
                                <li class="mb-1 last:mb-0">
                                    <a class="block hover:text-gray-200 transition truncate @if (Request::is('admin/master/mapel')) text-violet-500 @else{{ 'text-gray-500' }} @endif"
                                        href="{{ route('admin.mapel.index') }}">
                                        <span
                                            class="text-sm font-medium lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">Mata
                                            Pelajaran</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <div class="lg:hidden lg:sidebar-expanded:block 2xl:block">
                            <ul class="pl-8 mt-1 " :class="open ? '!block' : 'hidden'">
                                <li class="mb-1 last:mb-0">
                                    <a class="block hover:text-gray-200 transition truncate @if (Request::is('admin/master/programs')) text-violet-500 @else{{ 'text-gray-500' }} @endif"
                                        href="{{ route('admin.programs.index') }}">
                                        <span
                                            class="text-sm font-medium lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">Materi</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <div class="lg:hidden lg:sidebar-expanded:block 2xl:block">
                            <ul class="pl-8 mt-1 " :class="open ? '!block' : 'hidden'">
                                <li class="mb-1 last:mb-0">
                                    <a class="block hover:text-gray-200 transition truncate @if (Request::is('admin/master/programs')) text-violet-500 @else{{ 'text-gray-500' }} @endif"
                                        href="{{ route('admin.programs.index') }}">
                                        <span
                                            class="text-sm font-medium lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">Tahun
                                            Ajaran</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <div class="lg:hidden lg:sidebar-expanded:block 2xl:block">
                            <ul class="pl-8 mt-1 " :class="open ? '!block' : 'hidden'">
                                <li class="mb-1 last:mb-0">
                                    <a class="block hover:text-gray-200 transition truncate @if (Request::is('admin/master/programs')) text-violet-500 @else{{ 'text-gray-500' }} @endif"
                                        href="{{ route('admin.programs.index') }}">
                                        <span
                                            class="text-sm font-medium lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">Data
                                            Program Siswa</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li>

                    <li
                        class="pl-4 pr-3 py-2 rounded-lg mb-0.5 last:mb-0 bg-[linear-gradient(135deg,var(--tw-gradient-stops))] @if (in_array(Request::segment(1), ['messages'])) {{ 'from-violet-500/[0.24] to-violet-500/[0.04]' }} @endif">
                        <a class="block text-gray-100 truncate transition @if (!in_array(Request::segment(1), ['messages'])) {{ 'hover:text-white' }} @endif"
                            href="#">
                            <div class="flex items-center justify-between">
                                <div class="grow flex items-center">
                                    <i
                                        class="fas fa-calendar-alt shrink-0 @if (in_array(Request::segment(1), ['messages'])) text-violet-500 @else 'text-gray-500' @endif"></i>
                                    <span
                                        class="text-sm font-medium ml-4 lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">My
                                        Schedule</span>
                                </div>
                                <div class="flex flex-shrink-0 ml-2">
                                    <span
                                        class="inline-flex items-center justify-center h-5 text-xs font-medium text-white bg-violet-400 px-2 rounded">4</span>
                                </div>
                            </div>
                        </a>
                    </li>

                    <li
                        class="pl-4 pr-3 py-2 rounded-lg mb-0.5 last:mb-0 bg-[linear-gradient(135deg,var(--tw-gradient-stops))] @if (in_array(Request::segment(1), ['inbox'])) {{ 'from-violet-500/[0.24] to-violet-500/[0.04]' }} @endif">
                        <a class="block text-gray-100 truncate transition @if (!in_array(Request::segment(1), ['inbox'])) {{ 'hover:text-white' }} @endif"
                            href="#">
                            <div class="flex items-center">
                                <i
                                    class="fas fa-envelope shrink-0 @if (in_array(Request::segment(1), ['inbox'])) text-violet-500 @else 'text-gray-500' @endif"></i>
                                <span
                                    class="text-sm font-medium ml-4 lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">Edu
                                    Center</span>
                            </div>
                        </a>
                    </li>

                    <li
                        class="pl-4 pr-3 py-2 rounded-lg mb-0.5 last:mb-0 bg-[linear-gradient(135deg,var(--tw-gradient-stops))] @if (in_array(Request::segment(1), ['inbox'])) {{ 'from-violet-500/[0.24] to-violet-500/[0.04]' }} @endif">
                        <a class="block text-gray-100 truncate transition @if (!in_array(Request::segment(1), ['inbox'])) {{ 'hover:text-white' }} @endif"
                            href="#">
                            <div class="flex items-center">
                                <i
                                    class="fas fa-chart-line shrink-0 @if (in_array(Request::segment(1), ['inbox'])) text-violet-500 @else 'text-gray-500' @endif"></i>
                                <span
                                    class="text-sm font-medium ml-4 lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">Learning
                                    Report</span>
                            </div>
                        </a>
                    </li>

                    <li
                        class="pl-4 pr-3 py-2 rounded-lg mb-0.5 last:mb-0 bg-[linear-gradient(135deg,var(--tw-gradient-stops))] @if (in_array(Request::segment(1), ['inbox'])) {{ 'from-violet-500/[0.24] to-violet-500/[0.04]' }} @endif">
                        <a class="block text-gray-100 truncate transition @if (!in_array(Request::segment(1), ['inbox'])) {{ 'hover:text-white' }} @endif"
                            href="#">
                            <div class="flex items-center">
                                <i
                                    class="fas fa-file-alt shrink-0 @if (in_array(Request::segment(1), ['inbox'])) text-violet-500 @else 'text-gray-500' @endif"></i>
                                <span
                                    class="text-sm font-medium ml-4 lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">Teaching
                                    Report</span>
                            </div>
                        </a>
                    </li>
                </ul>
            </div>
        </div>

        <!-- Expand / collapse button -->
        <div class="pt-3 hidden lg:inline-flex 2xl:hidden justify-end mt-auto">
            <div class="w-12 pl-4 pr-3 py-2">
                <button class="text-gray-500 hover:text-gray-400 transition-colors"
                    @click="sidebarExpanded = !sidebarExpanded">
                    <span class="sr-only">Expand / collapse sidebar</span>
                    <svg class="shrink-0 fill-current text-gray-500 sidebar-expanded:rotate-180"
                        xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16">
                        <path
                            d="M15 16a1 1 0 0 1-1-1V1a1 1 0 1 1 2 0v14a1 1 0 0 1-1 1ZM8.586 7H1a1 1 0 1 0 0 2h7.586l-2.793 2.793a1 1 0 1 0 1.414 1.414l4.5-4.5A.997.997 0 0 0 12 8.01M11.924 7.617a.997.997 0 0 0-.217-.324l-4.5-4.5a1 1 0 0 0-1.414 1.414L8.586 7M12 7.99a.996.996 0 0 0-.076-.373Z" />
                    </svg>
                </button>
            </div>
        </div>
    </div>
</div>
