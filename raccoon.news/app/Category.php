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
}
