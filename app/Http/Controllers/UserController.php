<?php

namespace App\Http\Controllers;

use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Mockery\Exception;

class UserController extends Controller
{
    public function index(Request $request){
        try{
            $validator = Validator::make($request->all(),[
                'page' => 'required|numeric'
            ],[
                'page.required' => 'Хуудасны дугаар'.$this->validator_required,
                'page.numeric' => 'Хуудасны дугаар'.$this->validator_numeric
            ]);

            if ($validator->fails()) {
                return response($validator->errors(), 400);
            }

            $users = User::skip($request['page'])->take($this->data_size)->get();
            $total = User::count();

            return response(['articles' => $users, 'total' => $total], 200);
        }catch (exception $e){
            return response($e->getMessage(), 401);
        }
    }

    public function show(Request $request)
    {
        try{
            $validator = Validator::make($request->all(),[
                'id' => 'required|numeric'
            ],[
                'id.required' => 'Дугаар'.$this->validator_required,
                'id.numeric' => 'Дугаар'.$this->validator_numeric
            ]);

            if ($validator->fails()) {
                return response($validator->errors(), 400);
            }

            $user = User::find($request['id']);

            return response($user, 200);
        }catch (exception $e){
            return response($e->getMessage(), 401);
        }
    }

    public function store(Request $request)
    {
        try{
            $validator = Validator::make($request->all(),[
                'firstname' => 'required|max:100',
                'lastname' => 'required|max:100',
                'email' => 'required|email|max:100',
                'phone' => 'required|numeric|digits_between:8,20',
                'password' => 'required|max:100'
            ],[
                'firstname.required' => 'Нэр'.$this->validator_required,
                'firstname.max' => 'Нэр'.$this->validator_max,
                'lastname.required' => 'Овог'.$this->validator_required,
                'lastname.max' => 'Овог'.$this->validator_max,
                'email.required' => 'Имэйл'.$this->validator_required,
                'email.email' => 'Имэйл'.$this->validator_email,
                'email.max' => 'Имэйл'.$this->validator_max,
                'phone.required' => 'Утас'.$this->validator_required,
                'phone.numeric' => 'Утас'.$this->validator_numeric,
                'phone.digits_between' => 'Утас'.$this->validator_digits,
                'password.required' => 'Нууц үг'.$this->validator_required,
                'password.max' => 'Нууц үг'.$this->validator_max
            ]);

            if ($validator->fails()) {
                return response($validator->errors(), 400);
            }

            $user = new User;

            $user->firstname = $request['firstname'];
            $user->lastname = $request['lastname'];
            $user->email = $request['email'];
            $user->phone = $request['phone'];
            $user->password = md5($request['password']);
            $user->created_date = Carbon::now();
            $user->status = 0;

            $user->save();

            return response($this->message_stored, 200);
        }catch (exception $e){
            return response($e->getMessage(), 401);
        }
    }

    public function update(Request $request)
    {
        try{
            $validator = Validator::make($request->all(),[
                'id' => 'required|numeric',
                'title' => 'required|max:500',
                'content' => 'required',
                'categoryid' => 'required|numeric'
            ],[
                'id.required' => 'Дугаар'.$this->validator_required,
                'id.numeric' => 'Дугаар'.$this->validator_numeric,
                'title.required' => 'Гарчиг'.$this->validator_required,
                'title.max' => 'Гарчиг'.$this->validator_max,
                'content.required' => 'Агуулгаа'.$this->validator_required,
                'categoryid.required' => 'Бүлэг'.$this->validator_required,
                'categoryid.numeric' => 'Бүлэг'.$this->validator_numeric
            ]);

            if ($validator->fails()) {
                return response($validator->errors(), 400);
            }

            $article = Article::find($request['id']);

            $article->title = $request['title'];
            $article->content = $request['content'];
            $article->categoryid = $request['categoryid'];

            $article->save();

            return response($this->message_updated, 200);
        }catch (exception $e){
            return response($e->getMessage(), 401);
        }
    }

    public function destroy(Request $request)
    {
        try{
            $validator = Validator::make($request->all(),[
                'id' => 'required|numeric'
            ],[
                'id.required' => 'Дугаар'.$this->validator_required,
                'id.numeric' => 'Дугаар'.$this->validator_numeric
            ]);

            if ($validator->fails()) {
                return response($validator->errors(), 400);
            }

            Article::find($request['id'])->delete();

            return response($this->message_destroyed, 200);
        }catch (exception $e){
            return response($e->getMessage(), 401);
        }
    }
}