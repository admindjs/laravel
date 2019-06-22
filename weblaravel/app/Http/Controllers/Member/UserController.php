<?php

namespace App\Http\Controllers\Member;
//use validate;
use DB;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    //显示列表
    public function index(Request $request)
    {
        $kw = $request->get('lw');

        $data = DB::table('users')->when($kw, function ($query) use ($kw) {
            $query->where('username', 'like', "%{$kw}%");
        })->get();
//var_dump(count($data));
        for ($i = 0; $i < count($data); $i++) {
            $time = $data[$i]->create_time;
            $create_time = date('Y-m-d H:i:s', $time);
            $data[$i]->create_time = $create_time;
        }


        return view('member.user.index', compact('data'));


    }

    //添加显示
    public function create()
    {
//        return 11;
        return view('member.user.create');
    }

    //添加处理
    public function store(Request $request)
    {

        $rule = [
            'username' => 'required|unique:users',
            'password' => 'required',
            'passwords' => 'required',
            'user_email' => 'nullable|email',
        ];
        $this->validate($request, $rule);
        $post = $request->except(['_token', 'passwords']);
        $post['create_time'] = time();
        DB::table('users')->insert($post);
        return redirect(route('member.user.index'));
    }

    //修改显示
    public function update(int $id)
    {
//        var_dump(24);
        $data = DB::table('users')->where('id', $id)->first();
        return view('member.user.edit', compact('data'));
    }

    //修改处理
    public function edit(Request $request, int $id)
    {

        $rule = [
            'username' => 'required|unique:users',
            'password' => 'required',
            'passwords'=>'required',
            'user_email' => 'nullable|email',
        ];

        $this->validate($request, $rule);
        $post = $request->except(['_token', '_method']);
        DB::table('users')->where('id', $id)->update($post);
        return redirect(route('member.user.index'));

    }

    //删除信息
    public function del(Request $request,int $id = 0)
    {
         $ids=$request->get('ids');
         if($ids!=''){
             $data = DB::table('users')->whereIn('id',$ids)->delete();
         }else{
             $data = DB::table('users')->where('id',$id)->delete();
         }

        if ($data) {
            return ['status' => '0', 'msg' => '删除成功'];
        }

    }

    public function delall(Request $request)
    {
        $ids=$request->get();
        var_dump($ids);
        $data = DB::table('users')->delete();
        if ($data) {
            return ['status' => '0', 'msg' => '删除成功'];
        }


    }
}
