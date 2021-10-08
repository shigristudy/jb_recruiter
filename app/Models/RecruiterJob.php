<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RecruiterJob extends Model
{
    use HasFactory;

    protected $table = 'jobs';

    protected $dates = [
        'created_at',
        'updated_at',
        'date_posted'
    ];

    public function employer(){
        return $this->belongsTo(RecruiterEmployer::class,'employer_id','id');
    }
}
