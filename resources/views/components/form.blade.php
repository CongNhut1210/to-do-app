@extends('layouts.app')
@section('title', 'Create Task')
@section('style')
    .alert-danger {
        color:red;
    }
@endsection
<!-- -->
@section('title', isset($task)?'Update Task':'Create Task')
@section('content')

    <form class="w-full max-w-sm" action="{{isset($task)? route('tasks.update',['id'=>$task->id]):route('tasks.store')}}" method="POST">
        @csrf
        @if (isset($task))
            @method('PUT')
        @endif
        <div class="md:flex md:items-center mb-6">
            <div class="md:w-1/3">
                <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4" for="title">Title</label>
            </div>
                <div class="md:w-2/3">
                    <input type="text" class="btn" name="title" id="title" value="{{old('title', $task->title??'')}}">
        @error('title')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
            </div>
        </div>
        <div class="md:flex md:items-center mb-6">
            <div class="md:w-1/3">
            <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4"  for="description">Description</label>
            </div>
                        <div class="md:w-2/3">
                <input type="text" class="btn" name="description" id="description" value="{{old('description', $task->description??'')}}">
        @error('description')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
            </div>
        </div>
        <div class="md:flex md:items-center mb-6">
            <div class="md:w-1/3">
            <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4" for="long_description">Long Description</label>
            </div>
            <div class="md:w-2/3">
                 <input type="text" class="btn" name="long_description" id="long_description" value="{{old('long_description', $task->long_description??'')}}">
        @error('long_description')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
            </div>
        </div>
        <div class="md:flex md:items-center">
            <div class="md:w-1/3"></div>
            <div class="md:w-2/3">
        <button type="submit" class="bg-blue-300 hover:bg-gray-400 text-gray-800 font-bold py-2 px-4 rounded-l">{{isset($task)?'Update':'Create'}}</button>
            </div>
        </div>
            </div>
        </div>
    </form>
@endsection