<?php


namespace App;


use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $fillable = [
        'surname', 'name', 'patronymic', 'age', 'group_name'
    ];
}
