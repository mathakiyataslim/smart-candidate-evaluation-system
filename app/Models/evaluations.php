<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class evaluations extends Model
{
    protected $table = 'evaluations';

    protected $fillable = ['candidate_id','round_type','feedback','score'];

    public function candidate(){
        return $this->belongsTo(candidates::class);
    }
}
