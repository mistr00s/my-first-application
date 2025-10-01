<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JobListing extends Model
{
    use HasFactory;

    // Mass assignment protection
    protected $fillable = ['title', 'salary', 'employer_id'];

    // A JobListing belongs to an Employer
    public function employer()
    {
        return $this->belongsTo(Employer::class);
    }

    // A JobListing can have many Tags (many-to-many)
    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }
}
