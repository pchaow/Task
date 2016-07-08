<html>
<head>
    <title>Task Management</title>
</head>
<body>

<h1>Task Management</h1>

<form method="post" action="/add-task">
    {{csrf_field()}}
    <label>Name : </label>
    <input type="text" name="task[name]"/>
    <button type="submit">Add</button>
</form>

<table>
    <thead>
    <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Action</th>
    </tr>
    </thead>
    <tbody>
    @foreach($taskLists as $task)
        <tr>
            <td>{{$task->id}}</td>
            <td>{{$task->name}}</td>
            <td>

                <form method="get"
                      action="/task/{{$task->id}}/edit">
                    {{csrf_field()}}
                    <button type="submit">Edit</button>
                </form>

                <form method="post"
                      action="/task/{{$task->id}}/delete">
                    {{csrf_field()}}
                    <button type="submit">Delete</button>
                </form>

            </td>
        </tr>
    @endforeach
    </tbody>
</table>

</body>
</html>