<?php

namespace App\Http\Controllers\Member;
//use validate;
use App\models\user;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Mail;
class UserController extends Controller
{
    //显示列表
    public function index(Request $request)
    {
        $kw = $request->get('lw');

        $data = user::when($kw, function ($query) use ($kw) {
            $query->where('username', 'like', "%{$kw}%");
        })->paginate(2);

  if(count($data)>0){
      for ($i = 0; $i < count($data); $i++) {
          $time = $data[$i]->create_time;
          $create_time = date('Y-m-d H:i:s', $time);
          $data[$i]->create_time = $create_time;
      }
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
        user::insert($post);
        // 发送邮件
//        Mail::raw('开通账号成功，请速联系管理员',function($message){
//            $message->to('1344557966@qq.com');
//            $message->subject('开通账号提示');
//        });
        return redirect(route('member.user.index'));
    }

    //修改显示
    public function update(int $id)
    {

        $data = user::where('id', $id)->first();
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
        user::where('id', $id)->update($post);
        return redirect(route('member.user.index'));

    }

    //删除信息
    public function del(Request $request,int $id = 0)
    {
         $ids=$request->get('ids');
         if($ids!=''){
             $data = user::whereIn('id',$ids)->delete();
         }else{
             $data = user::where('id',$id)->delete();
         }

        if ($data) {
            return ['status' => '0', 'msg' => '删除成功'];
        }

    }

    public function delall(Request $request)
    {
        $ids=$request->get();
        var_dump($ids);
        $data = user::delete();
        if ($data) {
            return ['status' => '0', 'msg' => '删除成功'];
        }


    }
    public function recover(int $id){
//        return 11324;

//        恢复成功
        $ref=user::onlyTrashed()->where('id',$id)->restore();
  if($ref){
      $data=user::onlyTrashed()->get();

      return view('member.user.recycle',compact('data'));
  }
    }
    public function show(){
        $data=user::onlyTrashed()->get();

        return view('member.user.recycle',compact('data'));
    }
    public function really(int $id){
//        return $id;
        $ret=user::where('id',$id)->forceDelete();
        if($ret){
            return ['status' => '0', 'msg' => '彻底删除成功'];
        }

//        return view('member.user.recycle',compact('data'));
    }
}
