<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class candidates extends Model
{
    protected $table = 'candidates';

    protected $fillable = ['name','email','phone','resume_path','status'];

    public function evaluations()
    {
        return $this->hasMany(evaluations::class, 'candidate_id');
    }
}
