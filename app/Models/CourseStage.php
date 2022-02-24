<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class CourseStage extends Model
{
    use HasFactory;

    public function getSlugAttribute() {
        return Str::slug($this->name);
    }
}
