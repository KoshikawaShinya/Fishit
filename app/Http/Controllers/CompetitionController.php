<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Competition;
use App\Http\Requests\CompetitionRequest;

class CompetitionController extends Controller
{
    public function index_competition(Competition $competition)//インポートしたPostをインスタンス化して$competitionとして使用。
    {
        //blade内で使う変数'posts'と設定。'posts'の中身にgetを使い、インスタンス化した$competitionを代入。
        return view('competitions.index')->with(['competitions' => $competition->getPaginateByLimit()]);  
    }
    
    public function index_post(Post $post, Competition $competition)//インポートしたPostをインスタンス化して$competitionとして使用。
    {
        //competitionで絞って投稿を表示
        return view('competitions.index_post')->with(['posts' => $competition->getPaginateByCompetition(), 'competition' => $competition]);  
    }
    
    public function show(Competition $competition){
        //'competition'はbladeファイルで使う変数。中身は$competitionはid=1のPostインスタンス。
        return view('competitions.show')->with(['competition' => $competition]);
    }
    
    
    public function create()
    {
        return view('competitions.create');
    }
    
    public function store(CompetitionRequest $request, Competition $competition)
    {
        # 画像のため
        $now = time();
        $file_name = $request->file('image')->getClientOriginalName();
        $request->file('image')->storeAs('public/imgs/', $now . "_" . $file_name);


        $input = $request['competition'];
        $competition->species = $input["species"];
        $competition->description = $input["description"];
        $competition->image_path = 'public/imgs/'. $now . "_" . $file_name;

        $competition->save();
        return redirect('/competitions/' . $competition->id);
    }
    
    public function leaderboard(Post $post, Competition $competition)
    {
        return view('competitions.leaderboard')->with(['posts' => $competition->getLeaderboardPaginate(), 'competition' => $competition]);
    }
}
