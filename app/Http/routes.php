<?php



/**
 * Show Task Dashboard
 */
Route::get('/', function () {
    $tasks = \App\Task::all();

    return view('tasks')
        ->with("taskLists", $tasks);
});


Route::post('/add-task', function (\Illuminate\Http\Request $request) {
    $form = $request->get('task');

    $task = new \App\Task();
    $task->name = $form['name'];
    $task->save();

    return redirect('/');
});








