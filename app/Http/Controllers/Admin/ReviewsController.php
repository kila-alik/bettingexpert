<?php

namespace Bett\Http\Controllers\Admin;

use Bett\Http\Controllers\SiteController;
use Bett\Review;
use Illuminate\Http\Request;

class ReviewsController extends SiteController
{
    public function __construct()
    {
        $this->template = 'admin.reviews.frame';
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $reviews = Review::orderBy('id', 'DESC')->paginate(10);

        $this->vars['content'] = view('admin.reviews.index')->with('reviews', $reviews)->render();

        return $this->renderOutput();
    }

    public function confirm(Request $request)
    {
        $data = $request->except('_token');


        $confirm = 1;
        if(isset($data['submit_cancel'])){
            $confirm = 0;
        }

        $review = Review::find($data['id']);
        $review->confirmed = $confirm;

        if($review->update()){
            return redirect()->back()->with('status', 'Отзыв успешно одобрен!');
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $review = Review::find($id);

        if(!empty($review->screenshot)) {
            \File::delete(public_path() . '/images/' . $review->screenshot);
        }

        if($review) {
            if ($review->delete()) {
                return redirect()->back()->with('status', 'Отзыв успешно удален!');
            }
        }
    }
}
