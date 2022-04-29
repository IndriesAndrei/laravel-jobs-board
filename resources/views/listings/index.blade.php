@extends('layout')

@section('content')
@include('partials._hero')
@include('partials._search')

<div class="container mx-auto">
    <div class="mt-1">
        @unless(count($listings) == 0)
            @foreach ($listings as $listing)
                {{-- pass props as variables :listing="$listing" --}}
                <x-listing-card :listing="$listing" />
            @endforeach
        @endunless
    </div>

    <div class="mt-6 p-4">
        {{-- pagination with links() function --}}
        {{ $listings->links() }}
    </div>
</div>
@endsection