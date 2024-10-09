@extends("layouts.app")

@section("title")
List Of Tasks
@endsection

@section("content")
<div class="mb-10">
<a  class="btn" href="{{ route("tasks.create.view")}}">Create Task</a>
</div>
@forelse ($tasks as $task)
    <a href="{{ route("tasks.show", ['task' => $task->id]) }}">{{$task->title}}</a> 
    <br>
@empty        

@endforelse

@if (count($tasks))
    <nav>{{$tasks->links() }}</nav>
@endif
@endsection