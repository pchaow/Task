<html>
<head>
    <title>Task Management</title>
</head>
<body>

<h1>Edit Task</h1>

<form method="post" action="/task/{{$task->id}}/edit">
    {{csrf_field()}}
    <label>Name : </label>
    <input type="text" name="task[name]" value="{{$task->name}}"/>
    <button type="submit">Add</button>
</form>
</body>
</html>