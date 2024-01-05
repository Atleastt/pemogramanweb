@extends('layouts.app')

@section('content')
    <div class="m-auto w-4/5 py-24">
        <div class="text-center">
            <h1 class="text-5xl uppercase bold">
                {{ $car[0]->model }}
            </h1>
        </div>

        <div class="py-10 text-center">
            <div class="m-auto">
                <span class="uppercase text-blue-500 font-bold text-xs italic">
                    Founded: {{ $car[0]->year }}
                </span>

                <p class="text-lg text-gray-700 py-6">
                    {{ $car[0]->vclass }}
                </p>

                <hr class="mt-4 mb-8">
            </div>
        </div>
        <div class="pt-10">
            <a href="/cars" class="border-b-2 pb-2 border-dotted italic text-gray-500">
                back;
            </a>
        </div> 
    </div>
    
@endsection