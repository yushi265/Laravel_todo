<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = ['body'];

    public function task() {
        return $this->belongsTo('App\Task');
    }
}
