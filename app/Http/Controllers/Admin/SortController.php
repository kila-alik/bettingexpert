<?php

namespace Bett\Http\Controllers\Admin;

use Bett\Http\Controllers\SiteController;
use Bett\Sort;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Spatie\LaravelImageOptimizer\Facades\ImageOptimizer;

class SortController extends SiteController
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
        $sorts = Sort::all();
        $this->vars['content'] = view('admin.sorts.create')->with('sorts', $sorts)->render();

        return $this->renderOutput();
    }

    public function getSorts() {
        return response()->json(Sort::all());
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
            'icon' => 'required|image'
        ], $data);

        if($validator->fails())
        {
            return redirect()->back()->withErrors($validator);
        }


        if($request->hasFile('icon')) {
            $image_name = str_random(24) . 'v.jpg';
            $image = $request->file('icon');
            $image = \Intervention\Image\Facades\Image::make($image);
            $image->save(public_path() . '/images/' . $image_name);
            ImageOptimizer::optimize(public_path() . '/images/' . $image_name);
            $data['icon'] = $image_name;
        }

        $sort = new Sort($data);
        if($sort->save($data)){
            return redirect()->back()->with('status', 'Вид спорта успешно добавлена');
        }

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Sort $sort)
    {
        $sorts = Sort::all();
        $this->vars['content'] = view('admin.sorts.edit')->with(['sort' => $sort, 'sorts'=>$sorts])->render();

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

        $sort = Sort::find($id);
        if($request->hasFile('icon')) {
            $image_name = str_random(24) . 'v.'.$request->file('icon')->clientExtension();
            $image = $request->file('icon');
            $image = \Intervention\Image\Facades\Image::make($image);
            $image->save(public_path() . '/images/' . $image_name);
            $data['icon'] = $image_name;
            ImageOptimizer::optimize(public_path() . '/images/' . $image_name);
            \File::delete(public_path().'/images/'.$sort->icon);
        }


        if($sort->update($data)){
            return redirect()->back()->with('status', 'Вид спорта успешно обновлена!');
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
        $sort = Sort::find($id);

        \File::delete(public_path().'/images/'.$sort->icon);
        $sort->forecasts()->delete();
        if($sort->delete()){
            return redirect()->back()->with('status', 'Вид спорта успешно удален');
        }

    }
}
