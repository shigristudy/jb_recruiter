<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SpecService extends Eloquent
{
    protected $table = "spec_services";

    public function employer(){
        return $this->belongsTo(User::class,'employer_id','id');
    }

    public function recruiter(){
        return $this->belongsTo(User::class,'recruiter_id','id');
    }

    public function cvs(){
        return $this->hasMany(SpecServiceCV::class,'spec_id','id');
    }

    public function service(){
        return $this->belongsTo(Service::class,'service_id','id');
    }
}
