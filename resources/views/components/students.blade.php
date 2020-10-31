@extends('layouts.app')

@section('content1')

    <div class="students block md:flex md:flex-col md:max-w-2xl m-auto items-center my-16">

        <div role="alert" class="w-full px-4">
            <div class="bg-{{$color ?? 'teal'}}-500 text-white font-bold rounded-sm mx-0">
                @if(isset($title2))
                    <h2 class="p-2">{{ $title2 }}</h2>
                @else
                    <h2 class="p-2">Внимание, Внимание!</h2>
                @endif


                <div class="border border-t-0 border-red-400 rounded-b bg-red-100 px-4 py-3 text-red-700">
                    @if(isset($content))
                        {{ $content }}
                    @else
                        <p>Опасно для жизни!</p>
                    @endif
                </div>
            </div>

        </div>

       {{-- <div class="alert alert-{{$color ?? 'success'}}" role="alert">
              @if(isset($title))
                  <h2>{{ $title }}</h2>
              @endif

              {{ $slot }}
          </div>--}}

    </div>

@endsection


