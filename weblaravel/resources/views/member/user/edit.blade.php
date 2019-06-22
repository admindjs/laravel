<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
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

    <form method="post" action="{{route('member.user.update',['id'=>$data->id])}}">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="exampleInputEmail1">添加用户</label>
            姓名<input type="text" class="form-control" name="username" value="{{ $data->username}}">

            密码<input type="text" class="form-control" name="password" value="{{ $data->password}}">


            邮箱<input type="email" class="form-control" name="user_email" value="{{ $data->user_email}}">

        </div>


        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
</body>
</html>
