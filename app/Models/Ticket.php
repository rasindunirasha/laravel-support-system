<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory; 

class Ticket extends Model
{
    use HasFactory;

    protected $fillable = [
        'customer_name',
        'email',
        'phone',
        'description',
        'ref',
        'status',
    ];
    protected $with = ['comments', 'comments.user'];
    public function comments()
    {
        return $this->hasMany(\App\Models\Comment::class);
    }

   
    public function getLastCommentedAgentAttribute()
    {
        return $this->comments->sortByDesc('created_at')
            ->whereNotNull('user')->pluck('user')->first();
    }
    
   
}