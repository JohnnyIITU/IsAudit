<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Result extends Model
{
    public function getTest(){
        return Test::where('id', $this->test_id)->first()->fullname;
    }

    public function getUser(){
        return User::where('id', $this->user_id)->first()->name;
    }
}
