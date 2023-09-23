<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Support\Facades\DB;

class Competition extends Model
{
    use HasFactory;
    
    # relation
    public function posts(){
        return $this->hasMany(Post::class);
    }
    
    public function getByLimit(int $limit_count = 10)
    {
        // updated_atで降順に並べたあと、limitで件数制限をかける
        return $this->orderBy('updated_at', 'DESC')->limit($limit_count)->get();
    }
    public function getPaginateByLimit(int $limit_count = 10)
    {   
        // updated_atで降順に並べたあと、limitで件数制限をかける
        return $this->orderBy('updated_at', 'DESC')->paginate($limit_count);
    }
    public function getPaginateByCompetition(int $limit_count = 10)
    {   
        // updated_atで降順に並べたあと、limitで件数制限をかける
        return $this->posts()->with('competition')->orderBy('updated_at', 'DESC')->paginate($limit_count);
    }
    public function getLeaderboardPaginate(int $limit_count = 10)
    {   
        // updated_atで降順に並べたあと、limitで件数制限をかける
        return $this->posts()->join('users', 'posts.user_id', '=', 'users.id')->with('competition')->select(DB::raw('users.name, MAX(posts.size) as max_size'))->groupBy('name')->orderBy('max_size', 'DESC')->paginate($limit_count);
    }
}
