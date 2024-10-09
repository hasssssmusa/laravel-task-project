@extends("layouts.app")

@section("title", $task->title)

@section("content")
    <p class="mb-10 text-slate-700">{{$task-> description}}</p>
    @if ($task->long_description)
        <p class="mb-10 text-slate-700">{{$task->long_description}}</p>
    @endif
    
    <p class="mb-10 text-sm text-slate-500">Created : {{$task->created_at->diffForHumans()}} . Updated : {{$task->updated_at->diffForHumans()}}</p>
    <div class="flex mb-10 gap-2">
        <form method="POST" action="{{ route('tasks.toggle-completed', ["task" => $task ])}}">
            @csrf
            @method("PUT")
            <button class="btn" type="submit">{{$task->completed ? "Mark as Completed " : "Not Completed"}}</button>
        </form>
        <form method="POST" action="{{ route('tasks.destroy', ["task" => $task ])}}">
            @csrf
            @method("DELETE")
            <button class="btn" type="submit">Delete</button>
        </form>
                
        <a class="btn" href="{{route("tasks.update.view", ["task" => $task ])}}">Edit</a>
        <a  class="btn"  href="{{ route("tasks.list")}}">Go Back</a>
    </div>
@endsection