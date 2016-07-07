<html>
<head>
    <title>Task Management</title>
</head>
<body>

<h1>Task Management</h1>

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
        <td>Action</td>
    </tr>
    @endforeach
    </tbody>
</table>

</body>
</html>