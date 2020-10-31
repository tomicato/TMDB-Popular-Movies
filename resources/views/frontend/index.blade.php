@extends('layouts.app')



@section('content')
    <div class="block md:flex md:flex-col md:max-w-2xl m-auto items-center my-16 text-justify">
        <div class="text-2xl lg:text-4xl font-bold text-blue-400 text-center border-b-2 border-blue-700 ">@livewire('student')</div>

        <div class="text-gray-500 sm:text-sm  md:text-base  lg:text-xl my-6 px-4">
            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquid amet animi architecto corporis
            cupiditate
            dicta doloremque doloribus explicabo incidunt inventore officia pariatur, perferendis provident tempora
            tempore
            tenetur vel veniam, veritatis.

        </div>


    </div>
    <div class=" text-gray-500 sm:text-sm  md:text-base lg:text-lg my-6 px-4 block col-md-12 m-auto lg:max-w-5xl items-center text-gray-500 sm:text-sm  md:text-base  lg:text-base my-6 px-4 ">
        @livewire('posts')
    </div>
@endsection

{{--@section('content1')
    @component('components.students')
        @slot('color')
            red
        @endslot

        @slot('title2')
            <p>Danger! Error!</p>
        @endslot

        @slot('content')
            <p>Something not ideal might be happening.</p>
        @endslot
    @endcomponent
@endsection

@section('content2')
    @component('components.alert')
        @slot('color2')
            green
        @endslot

        @slot('title3')
            <p>Предупреждение!</p>
        @endslot

        @slot('content2')
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Architecto, eum!</p>
        @endslot
    @endcomponent
@endsection--}}
