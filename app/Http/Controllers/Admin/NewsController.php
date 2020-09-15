<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\SiteController;
use App\News;
use App\NewsCategory;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Spatie\LaravelImageOptimizer\Facades\ImageOptimizer;
use Yangqi\Htmldom\Htmldom;

class NewsController extends SiteController
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

        $news = News::orderBY('id', 'DESC')->paginate(15);
        $this->vars['content'] = view('admin.news.index')->with('news', $news)->render();

        return $this->renderOutput();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = NewsCategory::all();
        $this->vars['content'] = view('admin.news.create')->with('categories', $categories)->render();

        return $this->renderOutput();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->except('_token');

        if (empty($data['alias'])) {
            $data['alias'] = $this->transliterate($data['title']);
        }

        $validator = Validator::make($data, [
            'title' => 'required',
            'alias' => 'unique:news',
            'text' => 'required',
            'keywords' => 'required',
            'description' => 'required',
            'image' => 'required|image',
            'category_id' => 'required'
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput($data);
        }

        if ($request->hasFile('image')) {
            $image_name = str_random(24) . '25.jpg';
            $image = $request->file('image');
            $image = \Intervention\Image\Facades\Image::make($image);
            $image->save(public_path() . '/images/' . $image_name);
            ImageOptimizer::optimize(public_path() . '/images/' . $image_name);
            $data['image'] = $image_name;
        }

        $news = new News($data);
        if ($news->save($data)) {
            $this->sitemapGenerate();
            return redirect()->back()->with('status', 'Новость успешно добавлена');
        }

    }

    public function parserNews($token)
    {
        if ($token !== '253510') {
            return abort(404);
        }

        $offset = 0;
        $limit = 3;
        $categories = [
            10 => 'worldcup2018', 1 => 'football', 2 => 'hockey', 5 => 'biathlon',
            6 => 'boxing', 7 => 'tennis', 8 => 'formula1', 9 => 'other'
        ];

        foreach ($categories as $category_id => $category) {

            $parser = new Htmldom('https://sportrbc.ru/filter/ajax/?category=' . $category . '&offset=' . $offset . '&limit=' . $limit . '');

            $html = json_decode($parser->innertext)->html;
            $html = $parser->load($html);

            foreach ($html->find('.js-item-sport') as $result) {

                if (!isset($result->find('.item-sport_medium__link')[0]) || !isset($result->find('.item-sport_medium__title')[0])) {
                    dump('Empty');
                } else {
                    $link = $result->find('.item-sport_medium__link')[0]->href;
                    $title = $result->find('.item-sport_medium__title')[0]->plaintext;


                    $parser = new Htmldom($link);
                    $keywords = $parser->find('meta[name="Keywords"]')[0]->content;
                    $description = $parser->find('meta[name="Description"]')[0]->content;
                    $text = $parser->find('.article__fix-width .article__content .article__text p');
                    if (isset($parser->find('.article__fix-width .article__content .article__text .article__main-image__link .article__main-image__image')[0]->src)) {
                        $image_link = $parser->find('.article__fix-width .article__content .article__text .article__main-image__link .article__main-image__image')[0]->src;

                        $data['title'] = $title;
                        $data['keywords'] = $keywords;
                        $data['description'] = $description;
                        $data['alias'] = $this->transliterate($title);
                        $data['category_id'] = $category_id;

                        $checkNews = News::where('title', 'like', '%' . $data['title'] . '%')
                            ->orWhere('description', 'like', '%' . $data['description'] . '%')
                            ->count();

                        if ($checkNews < 1) {
                            $final_text = '';
                            foreach ($text as $item) {
                                $final_text .= $item->plaintext . '<br /><br />';
                            }

                            $data['text'] = $final_text;

                            $image_name = str_random(24) . '45.jpg';
                            $image = \Intervention\Image\Facades\Image::make($image_link);
                            $image->save(public_path() . '/images/' . $image_name);
                            ImageOptimizer::optimize(public_path() . '/images/' . $image_name);
                            $data['image'] = $image_name;

                            $news = new News($data);
                            if ($news->save($data)) {
                                $this->sitemapGenerate();
                            }
                        }
                    }
                }
            }
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit(News $news)
    {
        $this->vars['content'] = view('admin.news.edit')->with('news', $news)->render();

        return $this->renderOutput();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, News $news)
    {
        $data = $request->except('_token');

        if (empty($data['alias'])) {
            $data['alias'] = $this->transliterate($data['title']);
        }

        $validator = Validator::make($data, [
            'title' => 'required',
            'text' => 'required',
            'keywords' => 'required',
            'description' => 'required',
            'image' => 'image',
            'category_id' => 'required'
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator);
        }

        $result = News::where('alias', $data['alias'])->first();
        if (isset($result->id) && ($result->id != $news->id)) {
            return redirect()->back()->withErrors(['error' => 'Данный URL уже используется']);
        }

        if ($request->hasFile('image')) {
            $image_name = str_random(24) . '25.jpg';
            $image = $request->file('image');
            $image = \Intervention\Image\Facades\Image::make($image);
            $image->save(public_path() . '/images/' . $image_name);
            $data['image'] = $image_name;
            ImageOptimizer::optimize(public_path() . '/images/' . $image_name);
            \File::delete(public_path() . '/images/' . $news->image);
        }

        if ($news->update($data)) {
            $this->sitemapGenerate();
            return redirect()->back()->with('status', 'Новость успешно обновлена');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $news = News::find($id);

        \File::delete(public_path() . '/images/' . $news->image);
        if ($news->delete()) {
            $this->sitemapGenerate();
            return redirect()->back()->with('status', 'Новость успешно удален');
        }
    }
}
