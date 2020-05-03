<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SearchHistory extends Model
{
    protected $fillable = ['keyword', 'debayashi_id', 'comedian_group_id', 'user_agent', 'ip_address', 'searched_at'];
}
