<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    public function getTest(){
        return Test::where('id', $this->id)->first()->fullname ?? 'DELETED';
    }

    public function getUser(){
        return User::where('id', $this->id)->first()->name ?? 'DELETED';
    }
}
