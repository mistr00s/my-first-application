<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JobListing extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'salary', 'employer_id'];

    public function employer()
    {
        return $this->belongsTo(\App\Models\Employer::class);
    }

    // 🔹 Add this method
    public function tags()
    {
        return $this->belongsToMany(\App\Models\Tag::class);
    }
}
