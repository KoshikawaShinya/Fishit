<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Competition;
use App\Http\Requests\PostRequest;

class PostController extends Controller
{
    
    public function index(Post $post)//インポートしたPostをインスタンス化して$postとして使用。
    {
        //blade内で使う変数'posts'と設定。'posts'の中身にgetを使い、インスタンス化した$postを代入。
        return view('posts.index')->with(['posts' => $post->getPaginateByLimit()]);  
    }
    
    public function show(Post $post){
        //'post'はbladeファイルで使う変数。中身は$postはid=1のPostインスタンス。
        return view('posts.show')->with(['post' => $post]);
    }
    
    public function create()
    {
        return view('posts.create');
    }
    
    public function create_in_competition(Competition $competition)
    {
        return view('competitions.create_post')->with(['competition' => $competition]);
    }
    // 編集用
    public function edit(Post $post)
    {
        return view('posts.edit')->with(['post' => $post]);
    }
    // 更新用
    public function update(PostRequest $request, Post $post)
    {
        $now = time();
        
        $input_post = $request['post'];
        
        
        $post->species = $input_post["species"];
        $post->size = $input_post["size"];
        $post->place = $input_post["place"];
        
        # 画像
        if(is_null($request->file('image'))){
            
        }else{
            $file_name = $request->file('image')->getClientOriginalName();
            $request->file('image')->storeAs('public/imgs/', $now . "_" . $file_name);
            $post->image_path = 'public/imgs/'. $now . "_" . $file_name;
        }
        
        $post->user_id = $request->user()->id;
        
        $post->save();
    
        return redirect('/catches/posts/' . $post->id);
    }
    
    public function store(PostRequest $request, Post $post)
    {
        # 画像のため
        $now = time();

        $input = $request['post'];
        $post->species = $input["species"];
        $post->size = $input["size"];
        $post->place = $input["place"];
        $file_name = $request->file('image')->getClientOriginalName();
        $request->file('image')->storeAs('public/imgs/', $now . "_" . $file_name);
        $post->image_path = 'public/imgs/'. $now . "_" . $file_name;
        $post->user_id = $request->user()->id;

        $post->save();
        return redirect('/catches/posts/' . $post->id);
    }
    
    public function store_in_competition(PostRequest $request, Post $post, Competition $competition)
    {
        # 画像のため
        $now = time();

        $input = $request['post'];
        $post->species = $input["species"];
        $post->size = $input["size"];
        $post->place = $input["place"];
        $file_name = $request->file('image')->getClientOriginalName();
        $request->file('image')->storeAs('public/imgs/', $now . "_" . $file_name);
        $post->image_path = 'public/imgs/'. $now . "_" . $file_name;
        $post->competition_id = $competition->id;
        $post->user_id = $request->user()->id;

        $post->save();
        return redirect('/catches/posts/' . $post->id);
    }
    
    public function delete(Post $post)
    {
        $post->delete();
        return redirect('/catches');
    }
}
