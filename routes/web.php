<?php

use App\Http\Requests\TaskRequest;
use App\Models\Task;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

// views 
Route::get('/', function () {
  return view('welcome');
});

Route::get("/taskList", function() {
  return view("tasks", [
      "tasks" => Task::latest()->paginate(2)
  ]);
})->name("tasks.list");


Route::view("tasks/create", "createTask")->name("tasks.create.view");

Route::get("tasks/edit/{task}", function(Task $task) {
  return view("updateTask", ["task"=> $task]);
})->name("tasks.update.view");

Route::get("/task/{task}", function(Task $task) {
  return view("task", ["task" => $task]);
})->name("tasks.show");



Route::fallback(function () {
  return "Something was Wrong";
});

// routes
Route::post("tasks/save", function(TaskRequest $request) {
  // $data = $request->validated();
  // $task = new Task();
  // $task->title = $data["title"];
  // $task->description = $data["description"];
  // $task->long_description = $data["long_description"];
  // $task->save();

  $task = Task::create($request->validated());
  return redirect()->route("tasks.show", $task->id)->with( "success","Task Created Successfully");

})->name("tasks.create");


Route::put("tasks/update/{task}", function(Task $task, TaskRequest $request) {
  // $data = $request->validated();
  // $task->title = $data["title"];
  // $task->description = $data["description"];
  // $task->long_description = $data["long_description"];
  // $task->save();

  $task->update($request->validated());
  return redirect()->route("tasks.show", $task->id)->with( "success","Task Updated Successfully");

})->name("tasks.update");


Route::put("tasks/toggle-completed/{task}", function(Task $task) {
  $task->toggleCompleted();
  return redirect()->back()->with("success", "Task Updated Successfully");
})->name("tasks.toggle-completed");


Route::delete("/task/delete/{task}", function(Task $task) {
  $task->delete();
  return redirect()->route("tasks.list")->with("success", "Task Deleted Successfully");
})->name("tasks.destroy");
