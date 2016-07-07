<?php


/**
 * Show Task Dashboard
 */
Route::get('/', function () {
    $tasks = \App\Task::all();

    return view('tasks')
        ->with("taskLists",$tasks);
});
