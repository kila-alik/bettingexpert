<?php

namespace App\Http\Controllers;

use App\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Spatie\LaravelImageOptimizer\Facades\ImageOptimizer;

class ReviewController extends SiteController
{
    /**
     * ReviewController constructor.
     */
    public function __construct()
    {
        $this->template = 'review';
    }

    /**
     * @return $this
     * @throws \Throwable
     */
    public function index()
    {
        $this->vars['title'] = 'Отзывы наших клиентов - SportPrognoz.pw';

        $reviews = Review::with('user')->confirmeds()->orderBy('id', 'desc')->paginate(8);

        $this->vars['content'] = view('review_index')->with('reviews', $reviews)->render();

        return $this->renderOutput();
    }

    /**
     * @param Request $request
     * @return $this|\Illuminate\Http\RedirectResponse
     */
    public function addReview(Request $request)
    {

        $data = $request->except('_token');

        $validator = Validator::make($data, [
            'screenshot' => 'image|max:2000',
            'review' => 'required|min:10|max:1500|string'
        ]);

        if($validator->fails()){

            return redirect(url()->previous() . '#add-review')->withErrors($validator);
        }

        if($request->hasFile('screenshot')) {

            $image_name = str_random(24) . 'scr.jpg';
            $image = $request->file('screenshot');
            $image = \Intervention\Image\Facades\Image::make($image);
            $image->resize(640, null, function ($constraint) {
                $constraint->aspectRatio();
            });
            $image->save(public_path() . '/images/' . $image_name);
            ImageOptimizer::optimize(public_path() . '/images/' . $image_name);
            $data['screenshot'] = $image_name;
        }


        $user = Auth::user();
        if(isset($user->id)){
            $data['user_id'] = $user->id;
            $review = new Review($data);
            if($user->reviews()->save($review)){
                return redirect(url()->previous() . '#add-review')->with('status', 'Ваш отзыв отправлен на модерацию!');
            }
        }
    }
}