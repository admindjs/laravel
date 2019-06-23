<?php

namespace App\Http\Controllers\Member;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\models\user;
class LoginController extends Controller
{
    public function index(){
        return view('member.login.login');
    }
    public function login(Request $request){

        //定义一个判断规则
        $msg=[
            'username'=>'required',
            'password'=>'required',
        ];
        //$this是可以直接用的返回判断完成的数组
       $newdata=$this->validate($request,$msg);
//            $ret=user::get();
        $ret = User::where('username',$newdata['username'])->first();
//var_dump($ret);die;
        if(!$ret){
            return redirect()->back()->with('error','账号或者密码错误');
        }
        if($ret->password != $newdata['password']){
            return redirect()->back()->with('error','账号或者密码错误');
        }
        session(['admin.user'=>$ret]);

        return redirect(route('member.user.index'))->with('success','用户登录成功');
    }
}
