<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmployerJob extends Model
{
    use HasFactory;

    protected $table = 'lg_jobs';

    protected $dates = [
        'created_at',
        'updated_at',
        'date_posted'
    ];

    public function employer(){
        return $this->belongsTo(User::class,'employer_id','id');
    }
}
