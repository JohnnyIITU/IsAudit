<?php

namespace App\Http\Controllers;

use App\Company;
use App\Question;
use App\Result;
use App\Review;
use App\Test;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class AdminController extends Controller
{
    public function index(){
        if(Auth::check()){
            return view('admin.index');
        }else{
            return redirect('/login');
        }
    }

    public function getLogin(){
        return view('admin.login');
    }
    public function postLogin(Request $request){
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

    public function getUsers(){
        if(User::checkRootAccess()){
            $users = User::all();
        }else{
            $users = User::where('company_id', Auth::user()->company_id)->get();
        }
        return view('admin.user.list', [
            'users' => $users
        ]);
    }
    public function getAddUser(){
        $companyList = [];
        if(Auth::user()->checkRootAccess()){
            foreach (Company::all() as $company){
                array_push($companyList, [
                    'id' => $company->id,
                    'name' => $company->fullname
                ]);
            }
        }else{
            $company = Company::where('id', Auth::user()->company_id)->first();
            array_push($companyList, [
                'id' => $company->id,
                'name' => $company->fullname
            ]);
        }
        return view('admin.user.add', compact('companyList'));
    }
    public function getEditUser(User $user){
        $companyList = [];
        if(Auth::user()->checkRootAccess()){
            foreach (Company::all() as $company){
                array_push($companyList, [
                    'id' => $company->id,
                    'name' => $company->fullname
                ]);
            }
        }else{
            $company = Company::where('id', Auth::user()->company_id)->first();
            array_push($companyList, [
                'id' => $company->id,
                'name' => $company->fullname
            ]);
        }
        return view('admin.user.edit', [
            'user' => $user,
            'companyList' => $companyList
        ]);
    }
    public function postAddUser(Request $request){
        $user = new User();
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->name = $request->fullname;
        $user->role = $request->role;
        $user->company_id = $request->company_id;
        $user->save();
        return redirect('/');
    }
    public function postEditUser(User $user, Request $request){
        $user->email = $request->email;
        if($request->password !== null && $request->password !== ""){
            $user->password = Hash::make($request->password);
        }
        $user->name = $request->fullname;
        $user->role = $request->role;
        $user->company_id = $request->company_id;
        $user->save();
        return redirect('/');
    }
    public function deleteUser(User $user){
        DB::beginTransaction();
        try {
            $u_id = $user->id;
            $user->delete();
            foreach (Result::where('user_id', $u_id)->get() as $result) {
                $result->delete();
            }
            DB::commit();
        }catch (\Exception $exception){
            DB::rollBack();
            echo (string)$exception->getMessage();
        }
        return redirect('/');
    }

    public function getCompany(){
        $companyList = Company::all();
        return view('admin.company.list', compact('companyList'));
    }
    public function getAddCompany(){
        return view('admin.company.add');
    }
    public function getEditCompany(Company $company){
        return view('admin.company.add', compact($company));
    }
    public function postAddCompany(Request $request){
        $company = new Company();
        $company->fullname = $request->fullname;
        $company->save();
        return redirect('/');
    }
    public function postEditCompany(Company $company, Request $request){
        $company->fullname = $request->fullname;
        $company->save();
        return redirect('/');
    }
    public function deleteCompany(Company $company){
        DB::beginTransaction();
        try {
            $c_id = $company->id;
            foreach (User::where('company_id', $c_id)->get() as $user) {
                $this->deleteUser($user);
            }
            foreach (Test::where('company_id', $c_id)->get() as $test) {
                $test->deleteQuestions();
                $test->delete();
            }
            $company->delete();
            DB::commit();
            return redirect('/');
        }catch (\Exception $exception){
            DB::rollBack();
            echo $exception->getMessage();
        }
    }

    public function getTest(){
        if(Auth::user()->checkRootAccess()){
            $tests = Test::all();
        }else{
            $tests = Test::where('company_id', Auth::user()->company_id)->get();
        }

        return view('admin.test.list', compact('tests'));
    }
    public function getAddTest(){
        return view('admin.test.add');
    }
    public function postAddTest(Request $request){
        DB::beginTransaction();
        try {
            $test = new Test();
            $test->fullname = $request->fullname;
            $test->company_id = $request->company;
            $file = $request->image;
            $filename = 'test_images/' . md5(time()) . "." . $file->getClientOriginalExtension();
            $fileContent = file_get_contents($file->getRealPath());;
            Storage::disk('public')->put($filename, $fileContent);
            $test->img_url = "/$filename";
            $test->save();
            foreach ($request->questions as $question) {
                $q = new Question();
                $q->test_id = $test->id;
                $q->question = $question['question'];
                $q->a1 = $question['a1'];
                $q->a2 = $question['a2'];
                $q->a3 = $question['a3'];
                $q->a4 = $question['a4'];
                $q->correct = $question['correct'];
                $q->save();
            }
            DB::commit();
            return response()->json([
                'success' => true,
            ]);
        }catch (\Exception $exception){
            DB::rollBack();
            return response()->json([
                'success' => false,
                'errorText' => (string)$exception->getMessage()
            ]);

        }
    }
    public function deleteTest(Test $test){
        $test->deleteQuestions();
        $test->delete();
    }

    public function getComment(){
        $comments = Review::all();
        return view('admin.comment', compact('comments'));
    }
    public function deleteComment(Review $review){
        $review->delete();
        return redirect('/');
    }
    public function getRequest(){
        $requests = \App\Request::all();
        return view('admin.request', compact('requests'));
    }
    public function getResult(){
        $results = Result::all();
        return view('admin.result', compact('results'));
    }

    public function companyList(Request $request){
        $companyList = [];
        if(Auth::user()->checkRootAccess()){
            foreach (Company::all() as $company){
                array_push($companyList, [
                    'id' => $company->id,
                    'name' => $company->fullname
                ]);
            }
        }else{
            $company = Company::where('id', Auth::user()->company_id)->first();
            array_push($companyList, [
                'id' => $company->id,
                'name' => $company->fullname
            ]);
        }
        return response()->json([
            'success' => true,
            'company' => $companyList
        ]);
    }
}
