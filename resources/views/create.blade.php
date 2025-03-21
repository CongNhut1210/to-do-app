@extends('layouts.app')
@section('title','Create Task')
@section('content')
    <form action="" method="POST">
        @csrf //
        <label for="title">Title</label>
        <input type="text" name="title" id="title">
        <button type="submit">Submit</button>
    </form>
@endsection