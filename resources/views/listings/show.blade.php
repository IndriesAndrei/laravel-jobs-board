@extends('layout')

@section('content')
@include('partials._search')
    <a href="/" class="border border-blue-400"><i class="fa fa-arrow-left" aria-hidden="true"></i> Homepage</a>
    <x-card class="p-10">
        <div class="text-center">
            <img class="hidden w-48 mx-auto md:block" src="{{ $listing->logo ? asset('storage/' . $listing->logo) : asset('/images/no-image.png') }}" alt="" />
            <div>
                <h3 class="text-2xl">
                    <a href="/listings/{{$listing->id}}">{{$listing->title}}</a>
                </h3>
                <div class="text-xl font-bold mb-4">{{$listing->company}}</div>
                <div class="text-lg mt-4">
                    <i class="fa-solid fa-location-dot"></i> {{$listing->location}}
                </div>
                <div class="text-lg text-blue-500">
                    {{ $listing->description }}
                </div>
                <x-listing-tags :tagsCsv="$listing->tags" />
    
                <a href="mailto:{{ $listing->email }}" class="block bg-red-500 text-white mt-5 py-2 rounded-xl hover:opacity-80">
                    <i class="fa fa-envelope" aria-hidden="true"></i> Contact Employer
                </a>
                <a href="{{ $listing->website }}" target="_blank" class="block bg-black text-white mt-5 py-2 rounded-xl hover:opacity-80">
                    <i class="fa fa-street-view" aria-hidden="true"></i> Visit Website
                </a>
            </div>
        </div>
    </x-card>

    <x-card class="mt-4 p-2 flex space-x-6">
        <a href="/listings/{{ $listing->id }}/edit">
            Edit
        </a>

        <form method="POST" action="/listings/{{ $listing->id }}">
            @csrf
            @method('DELETE')
            <button class="text-red-500">Delete</button>
        </form>
    </x-card>
@endsection
