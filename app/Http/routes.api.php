<?php

use Illuminate\Http\Request;

//list all task
// http://localhost:8000/task?keyword=abc
Route::get('task', function (Request $request) {

    $query = \App\Task::query();

    if($request->has('keyword')){
        $keyword = $request->get('keyword');
        $query->where('name','LIKE',"%$keyword%");
    }

    return $query->get();
});

//view one task
Route::get('task/{id}', function (Request $request, $id) {
    return \App\Task::find($id);
});

//update task
Route::post('task/{id}', function (Request $request, $id) {
    $task = \App\Task::find($id);
    $task->name = $request->get('name');
    $task->save();
    return $task;
});

//create new task
Route::post('task', function (Request $request) {
    $task = new \App\Task();
    $task->name = $request->get('name');
    $task->save();
    return $task;
});

//delete task;
Route::post('task/{id}/delete', function (Request $request, $id) {
    $task = \App\Task::find($id);
    /* @var \App\Task $task */
    return [$task->delete()];
});




