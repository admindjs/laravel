<?php

namespace App\models;



use Illuminate\Database\Eloquent\SoftDeletes;

class User extends Base
{
use SoftDeletes;
protected $datas = ['deleted_at'];
protected $guarded = [];
}
