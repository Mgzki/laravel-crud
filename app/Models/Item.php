<?php

namespace App\Models;

use App\Models\TodoList;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Item extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function list(){
        return $this->belongsTo(TodoList::class, 'list_id');
    }
}
