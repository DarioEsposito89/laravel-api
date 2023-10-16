<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Project extends Model
{
    use HasFactory, SoftDeletes;

    protected $casts = [
        "release" => "date"
    ];

    protected $fillable = [
        "title",
        "link",
        "description",
        "thumb",
        "release",
        "slug",
        "type_id",
    ];

    // Relazione al model Type
    public function type(){
        return $this->belongsTo(Type::class);
    }

    // Relazione al model Technology
    public function technologies(){
        return $this->belongsToMany(Technology::class);
    }
}
