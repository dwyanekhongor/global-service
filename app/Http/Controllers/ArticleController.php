<?php

namespace App\Http\Controllers;

use App\Article;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Mockery\Exception;

class ArticleController extends Controller
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

            $articles = Article::skip($request['page'])->take($this->data_size)->get();
            $total = Article::count();

            return response(['articles' => $articles, 'total' => $total], 200);
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

            $article = Article::find($request['id']);

            return response($article, 200);
        }catch (exception $e){
            return response($e->getMessage(), 401);
        }
    }

    public function store(Request $request)
    {
        try{
            $validator = Validator::make($request->all(),[
                'title' => 'required|max:500',
                'content' => 'required',
                'categoryid' => 'required|numeric'
            ],[
                'title.required' => 'Гарчиг'.$this->validator_required,
                'title.max' => 'Гарчиг'.$this->validator_max,
                'content.required' => 'Агуулга'.$this->validator_required,
                'categoryid.required' => 'Бүлэг'.$this->validator_required,
                'categoryid.numeric' => 'Бүлэг'.$this->validator_numeric
            ]);

            if ($validator->fails()) {
                return response($validator->errors(), 400);
            }

            $image = uniqid();

            $article = new Article;

            $article->title = $request['title'];
            $article->image = $image;
            $article->content = $request['content'];
            $article->created_date = Carbon::now();
            $article->categoryid = $request['categoryid'];

            $article->save();

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