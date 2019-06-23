<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<div class="container">
    @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{$error}}</li>
                    @endforeach
            </ul>
        </div>
    @endif

    <form method="post" action="{{route('member.user.create')}}">
        @csrf
        <div class="form-group">
            <label for="exampleInputEmail1">添加用户</label>
            姓名<input type="text" class="form-control" name="username" value="{{ old('username') }}">

            密码<input type="text" class="form-control" name="password">
            确认密码<input type="text" class="form-control" name="passwords">

            邮箱<input type="email" class="form-control" name="user_email">

        </div>


        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
</body>
</html>
