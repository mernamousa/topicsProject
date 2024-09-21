<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Topic extends Model
{
    use HasFactory ;
    protected $fillable = [
        'topicTitle',
        'content',
        'NoOfViews',
        'image',
        'published',
        'trending',
        'category_id',
        
    ];

    public function category(){
        return $this->belongsTo(category::class);
    }

}
