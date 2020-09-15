<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\SiteController;
use App\NewsCategory;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class NewsCategoryController extends SiteController
{
    public function __construct()
    {
        $this->template = 'admin.admin';
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = NewsCategory::all();
        $this->vars['content'] = view('admin.news-category.create')->with('categories', $categories)->render();

        return $this->renderOutput();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->except('_token');

        $validator = Validator::make($data, [
            'name' => 'required',
            'alias' => 'required',
        ], $data);

        if($validator->fails())
        {
            return redirect()->back()->withErrors($validator);
        }

        $category = new NewsCategory($data);
        if($category->save($data)){
            return redirect()->back()->with('status', 'Категория успешно добавлена');
        }

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(NewsCategory $newsCategory)
    {
        $categories = NewsCategory::all();
        $this->vars['content'] = view('admin.news-category.edit')->with(['categories'=> $categories, 'category' => $newsCategory])->render();

        return $this->renderOutput();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = $request->except('_token');

        $validator = Validator::make($data, [
            'name' => 'required',
            'alias' => 'required',
            'icon' => 'image'
        ], $data);

        if($validator->fails())
        {
            return redirect()->back()->withErrors($validator);
        }

        $sort = NewsCategory::find($id);

        if($sort->update($data)){
            return redirect()->back()->with('status', 'Категория успешно обновлена!');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $sort = NewsCategory::find($id);

        if($sort->delete()){
            return redirect()->back()->with('status', 'Категория успешно удален');
        }

    }
}
