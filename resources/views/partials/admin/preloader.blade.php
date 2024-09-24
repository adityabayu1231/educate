<!-- ===== Preloader Start ===== -->
<div x-data="{ loaded: true }" x-show="loaded" x-init="window.addEventListener('DOMContentLoaded', () => { setTimeout(() => loaded = false, 800) })"
    class="fixed inset-0 z-50 flex items-center justify-center bg-white dark:bg-gray-900">
    <!-- Spinner -->
    <div class="h-16 w-16 border-4 border-solid border-blue-500 border-t-transparent rounded-full animate-spin"></div>
</div>
