<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Log extends Model
{
    protected $table = 'logs';

    protected $fillable = ['type', 'details', 'source_id', 'user_id'];

    protected $appends = ['source_type', 'action_type'];

    protected $hidden = ['action', 'source'];

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
