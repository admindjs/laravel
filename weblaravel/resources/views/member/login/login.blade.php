@extends('member.layouts.admin')
@section('title','用户登录')
@section('cnt')
    <form method="post" action="{{route('admin.login')}}">
        @csrf
        <div class="form-group">
            <label for="exampleInputEmail1">username</label>
            <input type="text" class="form-control" autocomplete="off" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="name" name="username">
            <small id="emailHelp" class="form-text text-muted"></small>
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">Password</label>
            <input type="password" class="form-control" autocomplete="off" id="exampleInputPassword1" placeholder="Password" name="password">
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>

@endsection
