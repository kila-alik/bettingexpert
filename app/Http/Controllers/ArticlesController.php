<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ArticlesModel;

class ArticlesController extends Controller
{
          public function list() {

              $articles = ArticlesModel::all();

              return view('articles.list', compact('articles'));
          }

          public function detail($id) {
              $articles = ArticlesModel::find($id);
              return view('articles.detail', compact('articles'));
          }
          
           public function edit($id) {
              $articles = ArticlesModel::find($id);
              
              if(empty($articles)) {
                  $articles = new ArticlesModel;
              }
              
              if(request()->isMethod('post')) {
                   $articles->title = request()->input('title');
                   $articles->autor = request()->input('autor');
                   $articles->text = request()->input('text');
                   $articles->save();
                   return redirect('/article/'.$articles->id);
              }
              
              return view('articles.edit_a', compact('articles'));
          }
          
          public function del($id) {
                ArticlesModel::find($id)->delete();
                return redirect('/articles');
    }
}
