<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/css/app.css">
    <title>Document</title>
</head>
<body>
<div class="container">
    <div>

    </div>
    <div class="input-group mb-3">
        <form action="{{route('member.user.index')}}" method="get">
            <input type="text" class="form-control" placeholder="搜索" aria-label="Recipient's username"
                   aria-describedby="basic-addon2" name="lw">

            <input type="submit" class="btn btn-outline-secondary" value="提交">

        </form>
    </div>
    <div>

        <a href="#" class="btn btn-danger" id="delall">全部删除</a>
        <input type="button" value="删除" onclick="jqchk()" class="btn btn-danger">
        <a href="{{route('member.user.index')}}" class="btn btn-danger" >返回</a>
    </div>
    <table class="table table-bordered table-dark">
        <thead>
        <tr>


            <th scope="col">id</th>
            <th scope="col">name</th>
            <th scope="col">email</th>
            <th scope="col">create_time</th>
            <th scope="col">操作</th>
        </tr>
        </thead>
        <tbody>
        @forelse($data as $item)
            <tr>
                <th>
                    <input name="aihao" type="checkbox" value="{{$item->id}}" />

                </th>
                <th scope="row">{{$item->id}}</th>
                <td>{{$item->username}}</td>
                <td>{{$item->user_email}}</td>
                <td>{{$item->create_time}}</td>
                <td>

                    <a href="{{route('member.user.really',['id'=>$item->id])}}" class="btn btn-danger" id="cli">删除</a>
                    <a href="{{route('member.user.recover',['id'=>$item->id])}}" class="btn btn-danger" id="demo22">恢复</a>

                </td>
            </tr>
        @empty
            <tr>
                <td colspan="5">这是一个空的数据库</td>
            </tr>
        @endforelse
        </tbody>
    </table>

</div>
<script src="/js/app.js"></script>
<script>
    $('#cli').click(function (event) {

        event.preventDefault();
        let url = $('#cli').attr('href');
        console.log(url);
        if (confirm('你真的要删除么')) {
            $.ajax({
                url,
                data: {
                    _token: "{{csrf_token()}}"
                },
                type: 'DELETE',
                dataType: 'json'
            }).then(ret => {
                if (ret.status == 0) {
                    $('#cli').parent().parent().remove();
                }
            })
        }
    })
    $('#delall').click(function (event) {

        event.preventDefault();
        let url = $('#delall').attr('href');

        if (confirm('你真的要删除么')) {
            $.ajax({
                url,
                data: {
                    _token: "{{csrf_token()}}"
                },
                type: 'DELETE',
                dataType: 'json'
            }).then(ret => {
                if (ret.status == 0) {
                    $('#delall').parent().parent().remove();
                }
            })
        }
        ;
    })
    function jqchk() {

        var s = [];
        $('input[name="aihao"]:checked').each(function () {
            s.push($(this).val());
        });
        if(s.length>0){
            if (confirm('你真的要删除么')) {
                $.ajax({
                    url:"{{route('member.user.del')}}",
                    data: {
                        _token: "{{csrf_token()}}",
                        ids:s,
                    },
                    type: 'DELETE',
                    dataType: 'json'
                }).then(ret => {
                    if (ret.status == 0) {
                        location.href="{{route('member.user.index')}}";
                    }
                })
            }
        } else{
            alert('还咩有选中啊');
        }


    }


</script>
</body>
</html>
