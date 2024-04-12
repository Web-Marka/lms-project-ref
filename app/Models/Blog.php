<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function blog(){
        return $this->belongsTo(BlogCategory::class, 'blogcat_id' ,'id');
    }
}
