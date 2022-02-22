<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;

    protected $table = 'courses';

    protected $fillable = [
        'title',
        'description',
        'category',
        'author',
        'price',
        'photo',
        'level',
        'lectures',
        'language',
        'duration',
    ];

    public function category() {
        return $this->belongsTo(CourseCategory::class);
    }

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function qualifications() {
        return $this->hasManyThrough(Qualification::class, QualificationCourse::class, 'course_id', 'id', null, 'qualification_id');
    }

    public function stages() {
        return $this->hasMany(CourseStage::class)->orderBy('order', 'asc');
    }
}
