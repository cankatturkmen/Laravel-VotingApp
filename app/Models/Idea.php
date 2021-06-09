<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Idea extends Model
{
    use HasFactory,Sluggable;

    protected $guarded =[];

    public function sluggable(): array
    {
        return [
            'slug'=> [
                'source' => 'title'
            ]
        ];
    }

    public function user(){
        return $this-> belongsTo(User::class);
    }

    public function category(){
        return $this-> belongsTo(Category::class);
    }
    public function status(){
        return $this-> belongsTo(Status::class);
    }
    public function votes(){
        return $this->belongsToMany(User::class,'votes');
    }
    public function isVotedByUser(?User $user){

        if(!$user){
            return false;
        }

        return Vote::where('user_id' , $user->id)
        ->where('user_id',$this->id)
        ->exists();
    }

    public function vote(User $user){

        Vote::create([
            'idea_id'=> $this->id,
            'user_id'=> $user->id,
        ]);

    }// vote function thats creates  a vote that voted by user in the parameters
    public function removeVote(User $user){

        Vote::where('idea_id',$this->id)
        ->where('user_id',$user->id)
        ->first()
        ->delete();

    }// vote function thats deletes  a vote that voted by user in the parameters


}
