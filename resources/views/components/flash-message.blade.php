@if (session()->has('message'))
    {{-- using AlpineJs here with x-data --}}
    <div x-data="{show: true}" 
        x-init="setTimeout(() => show = false, 3000)" 
        x-show="show" 
        class="fixed top-0 left transform -translare-x-1/2 left-1/2 bg-red-300 text-white px-48 py-3">
        <p>{{ session('message') }}</p>
    </div>
@endif