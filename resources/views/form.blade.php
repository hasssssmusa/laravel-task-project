@section("title", isset($task) ? "Edit Task" : "Add Task")

@section('styles')
    <style>
        .required-class {
            color: red;
        }
    </style>
@endsection

@section("content")
    <form method="post" action="{{ isset($task) ? route("tasks.update", ["task" => $task])  : route("tasks.create")}}">
        @csrf
        @isset($task)
            @method("PUT")
        @endisset
        <div>
            <label for="title">Title</label>
            <input id=title name="title" type="text" @class(['border-red-500' => $errors->has('title')]) value="{{ $task->title ?? old("title")}}">
            @error('title')
                <p class="required-class">{{$message}}</p>
            @enderror
        </div>
        <div>
            <labelfor="description">Description</label>
            <textarea rows="5" name="description" @class(['border-red-500' => $errors->has('description')]) id="description">{{ $task->description ?? old("description")}}</textarea>
            @error('description')
                <p class="required-class">{{$message}}</p>
            @enderror
        </div>
        <div>
            <label for="long_description">Long Description</label>
            <textarea rows="10" name="long_description" @class(['border-red-500' => $errors->has('long_description')]) id="long_description">{{ $task->long_description ?? old("long_description")}}</textarea>
            @error('long_description')
                <p class="required-class">{{$message}}</p>
            @enderror
        </div>
        <div class="flex gap-2 ">
            <button class="btn" type="submit">
                @isset($task)
                    Edit Task
                @else
                    create Task 
                @endisset
            </button>
            <a class="btn" href="{{route("tasks.list")}}" >Cancel</a>
        </div>
    </form>
@endsection