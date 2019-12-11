<?php

namespace App\Http\Controllers;

use App\Category;
use App\Post;
use Illuminate\Http\Request;

class AdminCategoriesController extends Controller
{

    public function index()
    {
        $categories = Category::all();
        return view('admin.categories.index')->with([
            'categories' => $categories
        ]);
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        Category::create($request->all());
        return redirect('/admin/categories')->with('success', 'Category successfully added');
    }

    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        $category = Category::findOrFail($id);
        return view('admin.categories.edit')->with([
            'category' => $category,
        ]);
    }

    public function update(Request $request, $id)
    {
       $category = Category::findOrFail($id);
       $category->update($request->all());

        return redirect('/admin/categories')->with('success', 'Category successfully updated');
    }

    public function destroy($id)
    {
        Category::findOrFail($id)->delete();

        return redirect('/admin/categories')->with('deleted', 'The category successfully has been deleted');
    }
}
