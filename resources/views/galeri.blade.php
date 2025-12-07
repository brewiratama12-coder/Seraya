@extends('layouts.main')

@section('title', 'Galeri')

@section('content')

<style>
    /* Masonry Pinterest */
    .masonry {
        column-count: 1;
        column-gap: 1rem;
    }

    @media (min-width: 640px) {
        .masonry {
            column-count: 2;
        }
    }

    @media (min-width: 1024px) {
        .masonry {
            column-count: 3;
        }
    }

    .item {
        break-inside: avoid;
    }

    /* Hover Zoom */
    .zoom:hover {
        transform: scale(1.05);
    }
</style>

<section class="pt-6 pb-10">
    <h1 class="text-3xl font-bold text-center mb-6 text-gray-800 dark:text-white">
        GALERI
    </h1>

    <div class="max-w-6xl mx-auto p-4 masonry">
        @foreach ([
            'bromo1.jpg',
            'bromo2.jpg',
            'bromo3.jpg',
            'bromo4.jpg',
            'bromo5.jpg',
            'bromo2.jpg',
            'bromo3.jpg',
            'bromo1.jpg'
        ] as $img)
            <div class="item mb-4 overflow-hidden rounded-xl shadow-md">
                <img src="{{ asset('image/' . $img) }}"
                     class="zoom transition-all duration-300 w-full object-cover">
            </div>
        @endforeach
    </div>
</section>

@endsection
