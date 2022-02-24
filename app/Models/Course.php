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
        'slug',
        'course_category_id',
        'author',
        'price',
        'graphic',
        'video',
        'difficulty',
        'runtime',
        'status',
        'facilitator_id'

    ];

    public function category() {
        return $this->belongsTo(CourseCategory::class);
    }

    public function facilitator() {
        return $this->belongsTo(User::class, 'user_id');
    }

//    public function qualifications() {
//        return $this->hasManyThrough(Qualification::class, QualificationCourse::class, 'course_id', 'id', null, 'qualification_id');
//    }

//    public function stages() {
//        return $this->hasMany(CourseStage::class)->orderBy('order', 'asc');
//    }
}
