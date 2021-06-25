<?php

namespace App\Models;

use Cviebrock\EloquentTaggable\Taggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Story extends Model
{
    use HasFactory;
    use Taggable;
    protected $fillable=['story_title','story_description','story_section','story_tags','story_image_caption','story_image'];
}
