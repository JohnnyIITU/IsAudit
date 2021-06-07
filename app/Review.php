<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    public static function getReviews(){
        $reviews = [];
        $data = self::all();
        foreach ($data as $review){
            array_push($reviews, [
                'fullname' => $review->fullname,
                'email' => $review->email,
                'message' => $review->message
            ]);
        }

        return array_reverse($reviews);
    }}
