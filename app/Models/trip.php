<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class trip extends Model
{
    public $timestamps = false;
    use HasFactory;

    public static function search($search, $category){
        // Trip will check if input is empty, if not will retrieve in the category where the input appears.
        return empty($search) ? static::query()
        : static::query()->where($category, 'like', '%'.$search.'%');
    }
}
