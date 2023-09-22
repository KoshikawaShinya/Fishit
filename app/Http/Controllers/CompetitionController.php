<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Competition;

class CompetitionController extends Controller
{
    public function index(Competition $competition)//インポートしたPostをインスタンス化して$postとして使用。
    {
        //blade内で使う変数'posts'と設定。'posts'の中身にgetを使い、インスタンス化した$postを代入。
        return view('competitions.index')->with(['competitions' => $competition->getPaginateByLimit()]);  
    }
    
    public function show(Competition $competition){
        //'post'はbladeファイルで使う変数。中身は$postはid=1のPostインスタンス。
        return view('competitions.show')->with(['competition' => $competition]);
    }
    
    
    public function create()
    {
        return view('competitions.create');
    }
    
    public function store(Request $request, Post $post)
    {
        # 画像のため
        $now = time();
        $file_name = $request->file('image')->getClientOriginalName();
        $request->file('image')->storeAs('public/imgs/', $now . "_" . $file_name);


        $input = $request['post'];
        $post->species = $input["species"];
        $post->size = $input["size"];
        $post->place = $input["place"];
        $post->image_path = 'storage/imgs/'. $now . "_" . $file_name;
        $post->user_id = $request->user()->id;

        $post->save();
        return redirect('/catches/posts/' . $post->id);
    }
}
