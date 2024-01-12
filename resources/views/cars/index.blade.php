@extends('layouts.app')

@section('content')
    <div class="m-auto w-4/5 py-24">
        <div class="text-center">
            {{-- Bagian Jumbotron --}}
        <div class="jumbotron">
            <div class="container">
                <h1 class="display-4">Selamat Datang di Jual Beli Mobil</h1>
                <p class="lead">Temukan mobil impian Anda di sini. Kami menawarkan berbagai pilihan mobil berkualitas dengan harga terbaik.</p>
                <a class="btn btn-primary btn-lg" href="#" role="button">Lihat Mobil Pilihan</a>
            </div>
        </div>
        </div>

        @if (Auth::user())
            <div class="pt-10">
                <a href="cars/create" class="border-b-2 pb-2 border-dotted italic text-gray-500">
                    Add a new car &rarr;
                </a>
            </div>            
        @endif

        <div class="w-5/6 py-10">
            @foreach ($cars as $car)
                <div class="m-auto">
                    @if (isset(Auth::user()->id) && Auth::user()->id == $car->user_id)
                        <div class="float-right">
                            <a href="cars/{{ $car->id }}/edit" class="border-b-2 pb-2 border-dotted italic text-green-500">Edit &rarr;</a>
                            <form action="cars/{{ $car->id }}" method="POST" class="pt-3">
                                @csrf
                                @method('delete')
                                <button type="submit" class="border-b-2 pb-2 border-dotted italic text-red-500">Delete &rarr;</button>
                            </form>
                        </div>                        
                    @endif
                    <span class="uppercase text-blue-500 font-bold text-xs italic">
                        Founded: {{ $car->year }}
                    </span>

                    <a href="cars/{{ $car->id }}">
                        <h2 class="text-gray-700 text-5xl hover:text-gray-500">
                            {{ $car->model }}
                        </h2>
                    </a>
                
                    <p class="text-lg text-gray-700 py-6">
                        {{ $car->vclass }}
                    </p>

                    <hr class="mt-4 mb-8">
                </div>
            @endforeach
        </div>
    </div>
@endsection