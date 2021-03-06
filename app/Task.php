<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{

    protected $guarded = ['id'];

    protected $fillable = [

        'name',
        'description',
        'priority',
        'completed',
        'user_id'
    ];

    public function user() {
    	return $this->belongsTo(User::class);
    }
}
