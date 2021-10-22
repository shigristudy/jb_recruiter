<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Recruiter extends Model
{
    use HasFactory;

    protected $table = 'Franchise';

    public function employers(): HasMany
    {
        return $this->hasMany(RecruiterEmployer::class,'franchise_id','franchise_id');
    }
}
