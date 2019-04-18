@extends('layout')
@section('content')
<div class="content">
    <div class="title m-b-md">
        <div class="row">
        <form action="{{route('todo.save',['id'=>$todo->id])}}" method="post">
        {{csrf_field()}}
			<input type="text" name="todo" class="form-control input-lg" value="{{$todo->todo}}" placeholder="Masukkan TODO">
        </form>
        </div>
    </div>
</div>
@endsection
