{{--表单验证信息错误提示--}}
{{--判断any是不是有值--}}
@if($errors->any())
    <div class="alert alert-danger" role="alert">
        <ul>
            {{--获取all所有的错误并且便利--}}
            @foreach($errors->all() as $error)
                <li>
                    {{$error}}}
                </li>
            @endforeach
        </ul>
    </div>
@endif
{{--失败提示--}}
@if(session()->has('error'))
    <div class="alert alert-danger" role="alert">
        {{session('error')}}
    </div>
    @endif
{{--成功提示--}}
@if(session()->has('success'))
    <div class="alert alert-danger" role="alert">
        {{session('success')}}
    </div>
@endif