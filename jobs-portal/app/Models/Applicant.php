<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Job_Position;

class Applicant extends Model
{
    use HasFactory;

    protected $fillable = ['job_position_id', 'first_name', 'last_name', 'phone', 'email', 'linkedin', 'why_you', 'location'];

    public function applicants()
    {
        return $this->hasMany(JobPosition::class);
    }
}
