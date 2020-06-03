<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Category
 * @package App
 *
 * @property-read $id
 * @property $name
 * @property-read $created_at
 * @property-read $updated_at
 *
 */
class Category extends Model
{
    protected $fillable = [
        'name'
    ];

    public function validate($attribute, $value, $parameters, $validator){
        $list = self::on()->where('id', $value)->get();
        return isset($list);
    }

    public static function emptyCategory() : Category{
        $tmp = new Category();
        $tmp->id = 0;
        $tmp->name = "Все категории";
        return $tmp;
    }

}
