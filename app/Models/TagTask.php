<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TagTask extends Model
{
    protected $guarded = ['id'];
    use HasFactory;

    public function getTagName(){
        return $this->belongsTo(Tag::class, 'tag_id', 'id');
    }
}
