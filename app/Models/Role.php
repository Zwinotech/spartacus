<?php

namespace App\Models;

use App\Traits\ModelSelectOptionsTrait;
use App\Traits\ModelTableNameTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Role extends Model
{
    use HasFactory;

    use ModelTableNameTrait;
    use ModelSelectOptionsTrait;

    public function getSlugAttribute() {
        return Str::slug($this->name);
    }

    public function user() {
        return $this->belongsTo('App\User');
    }
}
