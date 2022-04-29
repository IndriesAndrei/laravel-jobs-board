{{-- props - this component will take a prop --}}
@props(['listing'])

<x-card>
    <img class="w-48" src="{{ $listing->logo ? asset('storage/' . $listing->logo) : asset('/images/no-image.png') }}">
    <a href="/listings/{{ $listing->id }}"><h3 class="text-3xl my-5">{{  $listing->title  }}</h3></a>
    <p class="text-blue-500 my-3">{{ $listing->description }}</p>
    <div>
        <i class="fa fa-map-marker" aria-hidden="true"></i> Location: {{ $listing->location }}
    </div>
    {{-- passing tagsCsv variable --}}
    Tags: <x-listing-tags :tagsCsv="$listing->tags" />
</x-card>
<hr>