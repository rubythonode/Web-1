<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Notice extends Model
{
    protected $table = 'notices';
    protected $fillable = [ 'user_id', 'sender_id','title','message', 'source_id', 'status', 'type' ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
