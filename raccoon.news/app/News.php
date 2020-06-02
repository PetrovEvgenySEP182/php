<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class News
 * @package App
 *
 * @property-read $id
 * @property $title
 * @property $text
 * @property $image_url
 * @property $user_id
 * @property $category_id
 * @property-read $created_at
 * @property-read $updated_at
 * @property User $user
 * @property Category $category
 */
class News extends Model
{
    protected $fillable = [
        'title', 'text', 'image_url', 'user_id', 'category_id'
    ];

    function category(){
        return $this->belongsTo(Category::class);
    }

    function user(){
       return $this->belongsTo(User::class);
    }

    function getTextPreview(int $size = 200){
        return substr($this->text, 0, $size) . (($size < strlen($this->text)) ? "..." : "");
    }
}
