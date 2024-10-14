<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;

    protected $table = 'services';


    public function employer(){
        return $this->belongsTo(User::class,'employer_id','id');
    }

    public function interests(){
        return $this->hasMany(SpecService::class,'service_id');
    }

    public function category(){
        return $this->hasOne(LeadCentreCategory::class,'id','category_id');
    }

    public function documents(){
        return $this->hasMany(ServiceDocument::class,'service_id');
    }
}
