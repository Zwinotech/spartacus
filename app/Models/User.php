<?php

namespace App\Models;

use App\Traits\ModelTableNameTrait;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, ModelTableNameTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'firstname',
        'lastname',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function setRoleAttribute($value) {
        $this->attributes['role_id'] = (int) $value;
    }

    public function getFullNameAttribute() {
        return trim($this->name . ' ' . $this->second_name . ' ' . $this->surname);
    }

    public function role() {
        return $this->belongsTo('App\Role');
    }

    public function scopeLearners($query) {
        return $query->where(['role_id' => 3]);
    }
    public function scopeFacilitator($query) {
        return $query->where(['role_id' => 2]);
    }

    public function scopeStudents($query) {
        return $this->scopeLearners($query);
    }

    public function qualification(){
        return $this->hasOneThrough(Qualification::class, QualificationStudent::class, 'user_id', 'id', null, 'qualification_id');
    }

    public function qualifications(){
        return $this->hasManyThrough(Qualification::class, QualificationStudent::class, 'user_id', 'id', null, 'qualification_id');
    }

    public function facilitating() {
        return $this->hasManyThrough(Qualification::class, QualificationStudent::class, 'facilitator_id', 'id', null, 'qualification_id');
    }
}
