<?php

namespace App\Http\Controllers;

use App\News;
use App\NewsCategory;
use Illuminate\Http\Request;

class NewsController extends SiteController
{
    /**
     * NewsController constructor.
     */
    public function __construct()
    {
        $this->template = 'news';
    }


    /**
     * @return $this
     * @throws \Throwable
     */
    public function index($category_alias = NULL)
    {
        $this->vars['title'] = 'Новости';

        $news = News::orderBy('created_at', 'DESC');

        $category = NewsCategory::where('alias', $category_alias)->first();
        if($category_alias !== NULL){
            if(isset($category->id)) {
                $this->vars['title'] = $category->name.' - Новости';
                $news->where('category_id', $category->id);
            }else{
                return abort(404);
            }
        }

        $news = $news->paginate(5);

        $categories = NewsCategory::all();

        $this->vars['content'] = view('news_content')->with(['news' => $news, 'categories'=>$categories])->render();
        return $this->renderOutput();
    }


    /**
     * @param $alias
     * @return $this
     * @throws \Throwable
     */
    public function show($alias)
    {
        $news = News::where('alias', $alias)->firstOrFail();

        $recent_news = News::where('id', '!=', $news->id)->orderBy('id', 'DESC')->take(5)->get();

        $this->vars['title'] = $news->title.' - Новости';
        $this->vars['meta_description'] = $news->description;
        $this->vars['meta_keywords'] = $news->keywords;

        $categories = NewsCategory::all();
        $this->vars['content'] = view('news_show_content')->with(['news' => $news, 'recent_news'=>$recent_news, 'categories'=>$categories])->render();

        return $this->renderOutput();
    }
}
