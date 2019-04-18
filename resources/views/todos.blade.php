@extends('layout')
@section('content')
<div class="content">
    <div class="title m-b-md">
        <div class="row">
        <form action="/create/todo" method="post">
        {{csrf_field()}}
			<input type="text" name="todo" class="form-control" placeholder="Masukkan nama file">
        </form>
            <table id="example2" class="table table-bordered table-hover">
                        <thead>
                            <tr>
                              <th>No</th>
                              <th>To Do</th>
                              <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                        @if (count($todos) > 0)
                            @foreach($todos as $i => $todo)
                                <tr>
                                    <td>{{ ++$i }}</td>
                                    <td>{{ $todo->todo }}</td>
                                    <td>
                                        <a href="{{route('todo.delete',['id'=>$todo->id])}}" class="btn btn-danger">Delete</a>
                                        <a href="{{route('todo.update',['id'=>$todo->id])}}" class="btn btn-primary">Update</a>
                                        @if(!$todo->completed)
                                        <a href="{{route('todo.completed',['id'=>$todo->id])}}" class="btn btn-warning">Mark Completed</a>
                                        @else
                                        <span class="btn btn-success">Completed!</span>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        @else
                            <tr>
                                <td>{{ \App\GeneralFunction::$EMPTY_DATA_MESSAGE }}</td>
                            </tr>
                        @endif
                         </tbody>
                    </table>
        </div>
    </div>
</div>
@endsection
