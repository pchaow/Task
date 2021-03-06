<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="/favicon.ico">

    <title>Task Management</title>

    <!-- Bootstrap core CSS -->
    <link href="/bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="/css/dashboard.css" rel="stylesheet">

</head>

<body>

<nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar"
                    aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">Task Management</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
            <ul class="nav navbar-nav navbar-right">
                <li><a href="#">Dashboard</a></li>
                <li><a href="#">Settings</a></li>
                <li><a href="#">Profile</a></li>
                <li><a href="#">Help</a></li>
            </ul>
            <form class="navbar-form navbar-right">
                <input type="text" class="form-control" placeholder="Search...">
            </form>
        </div>
    </div>
</nav>

<div class="container-fluid">
    <div class="row">
        <div class="col-sm-3 col-md-2 sidebar">
            <ul class="nav nav-sidebar">
                <li class="active"><a href="#">Task <span class="sr-only">(current)</span></a></li>
            </ul>
        </div>
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
            <h1 class="page-header">Task Management</h1>

            <div class="row">
                <div class="col-lg-12">
                    <button type="button" class="btn btn-primary"
                            data-toggle="modal" data-target="#addModal">
                        Add New Task
                    </button>
                </div>

                <div class="col-lg-12">
                    <input type="text" v-model="searchForm.keyword"/>
                    <button type="button" v-on:click="refreshTable()">ค้นหา</button>
                </div>

            </div>

            <div class="row">
                <div class="col-lg-12">
                    <table class="table table-bordered">
                        <thead>
                        <tr>
                            <td>ID</td>
                            <td>Name</td>
                            <td>Action</td>
                        </tr>
                        </thead>
                        <tbody>
                        <tr v-for="t in tasks">
                            <td>@{{ t.id }}</td>
                            <td>@{{ t.name }}</td>
                            <td>
                                <button type="button" v-on:click="delTask(t.id)">
                                    ลบ
                                </button>
                                <button data-toggle="modal" data-target="#myModal" type="button"
                                        v-on:click="taskEdit(t)">
                                    แก้ไข
                                </button>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-12">
                    <!-- Modal -->
                    <div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                                aria-hidden="true">&times;</span></button>
                                    <h4 class="modal-title" id="myModalLabel">Add New Task</h4>
                                </div>
                                <div class="modal-body">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <form class="form">
                                                <div class="form-group">
                                                    <label>Task Name : </label>
                                                    <input type="text" class="form-control" v-model="form.name"/>
                                                </div>


                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">

                                    <button v-on:click="addTask()"
                                            data-dismiss="modal"
                                            type="button" class="btn btn-primary">Add
                                    </button>

                                    <button type="button"
                                            data-dismiss="modal"
                                            class="btn btn-default">
                                        Cancel
                                    </button>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-12">
                    <!-- Modal -->
                    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                                aria-hidden="true">&times;</span></button>
                                    <h4 class="modal-title" id="myModalLabel">Edit Task</h4>
                                </div>
                                <div class="modal-body">
                                    <div class="row" v-show="editForm.id">
                                        <div class="col-lg-12">
                                            <form class="form">
                                                <div class="form-group">
                                                    <label>Task Name : </label>
                                                    <input type="text" class="form-control" v-model="editForm.name"/>
                                                </div>
                                            </form>
                                        </div>
                                    </div>

                                </div>
                                <div class="modal-footer">

                                    <button v-on:click="editTask(editForm.id)" type="button"
                                            data-dismiss="modal"
                                            class="btn btn-primary">
                                        Save
                                    </button>

                                    <button v-on:click="taskEditCancel()" type="button"
                                            data-dismiss="modal"
                                            class="btn btn-default">
                                        Cancel
                                    </button>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="/bower_components/jquery/dist/jquery.min.js"></script>

<script src="/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- Just to make our placeholder images work. Don't actually copy the next line! -->
<script src="/bower_components/holderjs/holder.min.js"></script>

<script src="/bower_components/vue/dist/vue.min.js"></script>
<script src="/bower_components/vue-resource/dist/vue-resource.min.js"></script>

<script type="text/javascript">
    var app = new Vue({
        el: "body",
        data: {
            tasks: [],
            form: {},
            editForm: {},
            searchForm: {
                keyword: ""
            },
        },
        methods: {
            taskEditCancel: function () {
                this.editForm = {}
            },
            taskEdit: function (task) {
                //deep copy
                this.editForm = JSON.parse(JSON.stringify(task));
            },
            editTask: function (id) {
                this.$http.post(
                        '/task/' + id,
                        this.editForm
                ).then(function (result) {
                    this.editForm = {};
                    this.refreshTable();
                })
            },
            delTask: function (id) {
                this.$http.post(
                        '/task/' + id + '/delete'
                ).then(function (result) {
                    this.refreshTable();
                })
            },
            addTask: function () {
                this.$http.post(
                        '/task',
                        this.form
                ).then(function (result) {
                    this.form = {};
                    this.refreshTable();
                })
            },
            refreshTable: function () {

                this.$http.get('/task',{params : this.searchForm}).then(function (result) {
                    this.tasks = result.data;
                    console.log(result);
                });
            }
        },
        ready: function () {
            this.refreshTable();


        }
    })
</script>

</body>
</html>
