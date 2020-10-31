@extends('layouts.app')

@section('content2')
    <div class="alert block md:flex md:flex-col md:max-w-2xl m-auto items-center my-16">
        <div role="alert" class="w-full px-4">
            <div class="bg-{{$color2 ?? 'teal'}}-500 text-white font-bold rounded-sm mx-0">
                @if(isset($title3))
                    <h2 class="p-2">{{ $title3 }}</h2>
                @else
                    <h2 class="p-2">Внимание, Внимание!</h2>
                @endif


                <div class="border border-t-0 border-red-400 rounded-b bg-red-100 px-4 py-3 text-red-700">
                    @if(isset($content2))
                        {{ $content2 }}
                    @else
                        <p>Опасно для жизни!</p>
                    @endif
                </div>
            </div>

        </div>
    </div>
@endsection
