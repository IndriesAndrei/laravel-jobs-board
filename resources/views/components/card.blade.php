{{-- we can use some classes by default but we can add dynamically any other classes which will be merged here --}}
<div {{ $attributes->merge(['class' => 'bg-gray-50 border border-gray-200 rounded mb-10 p-6']) }}>
    {{-- if we want to use <x-card> and <x-card> we need to use slots and wverything will be outoput here --}}
    {{  $slot }}
</div>