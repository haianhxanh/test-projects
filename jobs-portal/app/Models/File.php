<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class File extends Model
{
    use HasFactory;

    protected $fillable = ['applicant_id', 'name'];

    public function applicant()
    {
        return $this->belongsTo(Applicant::class);
    }
}
