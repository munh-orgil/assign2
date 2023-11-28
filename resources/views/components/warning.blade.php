@if (session()->has('warning'))
    <div x-data="{ show: true }" x-init="setTimeout(() => show = false, 3000)" x-show="show"
        class="fixed top-8 left-1/2 transform -translate-x-1/2 bg-red-200 text-black border-2 px-48 py-3 rounded-lg p-6 z-50">
        <p>
            {{ session('warning') }}
        </p>
    </div>
@endif
