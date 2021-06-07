<?php

namespace App\Http\Controllers;

use App\Question;
use App\Result;
use App\Review;
use App\Test;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class SiteController extends Controller
{
    public function index(){
        return view('client.index');
    }

    public function contact(){
        return view('client.contact');
    }

    public function about(){
        return view('client.about');
    }

    public function solutions(){
        return view('client.solutions');
    }

    public function test(){
        $data = [];
        if(Auth::user()->checkRootAccess()){
            foreach (Test::all() as $tests){
                array_push($data, [
                    'name' => $tests->fullname,
                    'img' => $tests->img_url,
                    'id' => $tests->id
                ]);
            }
        }else{
            $tests = Test::whereIn('companyId', [0, Auth::user()->company_id])->get();
            foreach ($tests as $test) {
                array_push($data, [
                    'name' => $test->fullname,
                    'img' => $test->img_url,
                    'id' => $test->id
                ]);
            }
        }

        return view('client.test', compact('data'));
    }

    public function testById(Test $test){
        return view('client.testId', compact('test'));
    }

    public function getQuestions(Request $request){
        $tid = $request->tId;
        $questions = [];
        foreach (Question::where('test_id', $tid)->get() as $q){
            array_push($questions,[
                'question' => $q->question,
                'choices' => [
                    $q->a1,
                    $q->a2,
                    $q->a3,
                    $q->a4,
                ],
                'correct' => $q->correct,
                'u_answer' => null
            ]);
        }


        return response()->json([
                'success' => true,
                'questions' => $questions
        ]);
    }

    public function review(Request $request){
        $message = $request->message;
        $name = $request->name;
        $email = $request->email;
        try {
            $review = new Review();
            $review->message = $message;
            $review->fullname = $name;
            $review->email = $email;
            $review->save();
            return response()->json([
                'success' => true
            ]);
        }catch (\Exception $ex){
            $error = $ex->getMessage();
            dd($ex->getMessage());
            return response()->json([
                'success' => false,
                'error' => (string)$error
            ]);
        }
    }

    public function request(Request $request){
        $fullname = $request->fullname;
        $phone = $request->phone;
        $email = $request->email;
        try {
            $review = new Review();
            $review->fullname = $fullname;
            $review->phone = $phone;
            $review->email = $email;
            $review->save();
            return response()->json([
                'success' => true
            ]);
        }catch (\Exception $ex){
            $error = $ex->getMessage();
            dd($ex->getMessage());
            return response()->json([
                'success' => false,
                'error' => (string)$error
            ]);
        }
    }

    public function setResult(Request $request){
        $count = 0;
        foreach($request->questions as $q){
            if($q['correct'] == $q['u_answer']){
                $count++;
            }
        }
        $test = new Result();
        $test->user_id = Auth::id();
        $test->test_id = $request->test;
        $test->result = $count;
        $test->save();
        return response()->json([
            'count' => $count
        ]);
    }

    public function login(Request $request){
        $email = $request->username;
        $password = $request->password;
        if(($user = User::where('email', $email)->first()) === null){
            return response()->json([
                'success' => false,
                'error' => 'Invalid email'
            ]);
        }
        if(Hash::check($password, $user->password)){
            Auth::login($user);
            return response()->json([
                'success' => true,
            ]);
        }else{
            return response()->json([
                'success' => false,
                'error' => 'Invalid password'
            ]);
        }
    }

    public function analyze(){
        $data = [];
        $isRoot = false;
        if(Auth::user()->checkRootAccess()){
            $isRoot = true;
            foreach (Test::all() as $tests){
                array_push($data, [
                    'name' => $tests->fullname,
                    'img' => $tests->img_url,
                    'id' => $tests->id
                ]);
            }
        }else{
            $tests = Test::whereIn('company_id', [0, Auth::user()->company_id])->get();
            foreach ($tests as $test) {
                array_push($data, [
                    'name' => $test->fullname,
                    'img' => $test->img_url,
                    'id' => $test->id
                ]);
            }
        }
        $results = [];
        foreach ($data as $test){
            if($isRoot){
                $avg = (int)Result::where('test_id', $test['id'])->avg('result');
                $count = Question::where('test_id', $test['id'])->count('id');
                array_push($results, [
                        'avg' => $avg,
                        'count' => $count,
                        'percent' => (int)$avg*100/$count,
                        'name' => $test['name']
                    ]);
            }else{
                $avg = (int)DB::table('results')
                        ->leftJoin('users', 'users.id', '=', 'results.user_id')
                        ->where('users.company_id', '-', Auth::user()->company_id)
                        ->where('results.test_id', '=', $test['id'])
                        ->avg('results.result');
                $count = Question::where('test_id', $test['id'])->count('id');
                array_push($results, [
                    'avg' => $avg,
                    'count' => $count,
                    'percent' => (int)$avg*100/$count,
                    'name' => $test['name']
                ]);
            }
        }
        return view('client.analyze', compact('data'), compact('results'));
    }

    public function analyzeById(Test $test){
        $isRoot = false;
        if(Auth::user()->checkRootAccess()) {
            $isRoot = true;
            $results = Result::where('test_id', $test->id)->get();
            $avg = (int)Result::where('test_id', $test['id'])->avg('result');
            $count = Question::where('test_id', $test['id'])->count('id');
        }else{
            $results = (int)DB::table('results')
                ->select('result.*')
                ->leftJoin('users', 'users.id', '=', 'results.user_id')
                ->where('users.company_id', '-', Auth::user()->company_id)
                ->where('results.test_id', '=', $test['id'])
                ->get();
            $avg = (int)DB::table('results')
                ->leftJoin('users', 'users.id', '=', 'results.user_id')
                ->where('users.company_id', '-', Auth::user()->company_id)
                ->where('results.test_id', '=', $test['id'])
                ->avg('results.result');
            $count = Question::where('test_id', $test['id'])->count('id');
        }
        $data = [];
        foreach ($results as $result) {
            array_push($data, [
                'user' => User::getUserName($result->user_id),
                'result' => $result->result
            ]);
        }
        return view('client.analyzeid', [
            'data' => $data,
            'avg' => $avg,
            'count' => $count
        ]);
    }


}

