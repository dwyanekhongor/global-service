<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function show($id)
    {
        $category = Category::find($id)->with('category')->get();

        return $category;
    }

    public function store(Request $request)
    {
        $category = new Category();

        $category->name = $request['name'];
        $category->status = 0;
        $category->categoryid = $request['categoryid'];

        $category->save();
    }

    public function update(Request $request)
    {
        $category = Category::find($request['id']);

        $category->name = $request['name'];
        $category->status = $request['status'];
        $category->categoryid = $request['categoryid'];

        $category->save();
    }

    public function destroy($id)
    {
        Category::find($id)->delete();
    }
}