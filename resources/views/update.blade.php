@extends('layout')

@section('content')

    <div class="row">

        <div class="col-lg-20">

            <form action="{{route('todo.save',['id'=>$todo->id])}}" method="post">

                    {{csrf_field()}}

                    <input type="text" class="form-control" value="{{$todo->todo}}" name="todo">
            </form>

        </div>
    </div>    

@stop