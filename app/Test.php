<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Test extends Model
{
    public function deleteQuestions(){
        foreach(Question::where('test_id', $this->id)->get() as $question) {
            $question->delete();
        }
    }

    public function getCompanyLabel(){
        return Company::where('id', $this->company_id)->first()->fullname;
    }
}
