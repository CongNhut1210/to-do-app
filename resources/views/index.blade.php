@extends('layouts.app')
@section('title', 'To Do App')
@section('content')
    <div class="mb-4">
        <a class="font-medium text-gray-700 underline decoration-blue-500 "
         href="{{ route('tasks.create')}}">+ Create Task</a>
    </div>
    <table class='"border-separate border-spacing-2 border border-gray-400 dark:border-gray-500"'>

        <tr>
            <th>ID</th>
            <th>Title</th>
            {{-- <th>Description</th>
            <th>Long Description</th> --}}
            <th>Status</th>
            <th>Action</th>
        </tr>
            @if (count($tasks)>0)
                @foreach ($tasks as $task )
                <tr>
                    <td>{{$task->id}}</td>
                    <td>{{$task->title}}</td>
                    <td>{{$task->completed==true?"Completed":"Uncompleted"}}</td>
                    <td>
                    <div class="inline-flex">
                        <form action="{{route('tasks.toggle-completed', ['id'=>$task->id])}}" method="POST">
                            @csrf
                            @method('PUT')
                            <button type="submit" class="bg-gray-300 hover:bg-gray-400 text-gray-800 font-bold py-2 px-4 rounded-l" >{{$task->completed!=true?'Completed':'Uncompleted'}}</button>
                        </form>
                        <a href="{{route('tasks.detail',['id'=>$task->id])}}" class="bg-gray-300 hover:bg-gray-400 text-gray-800 font-bold py-2 px-4 rounded-l">Detail</a>
                        <a href="{{route('tasks.edit',['id'=>$task->id])}}" class="bg-gray-300 hover:bg-gray-400 text-gray-800 font-bold py-2 px-4 rounded-l">Edit</a>
                        <form action="{{route('tasks.delete',['id'=>$task->id])}}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="bg-red-300 hover:bg-blue-400 text-gray-900000 font-bold py-2 px-4 rounded-l">Delete</button>
                        </form>
                    </div>
                </td>
                </tr>
                @endforeach
            @else
                <tr>
                    <td colspan="5">No task found</td>
                </tr>
            @endif
    </table>
    @if ($tasks->count())
    <nav>{{$tasks->links()}}</nav>
    @endif
@endsection