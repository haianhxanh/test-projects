<?php

namespace App\Models;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Applicant;

class JobPosition extends Model
{
    use HasFactory;

    public function applicant()
    {
        return $this->belongsTo(Applicant::class);
    }
}
