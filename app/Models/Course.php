<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;
    protected $fillable = ['course_name','course_code','description','regular_price','discount_price','who_is_it_for','what_you_will_learn','what_it_prepare_you_for','category_id','online_self_palced','course_time_need','hands_on_lab_assignment','video_content','course_timelimit_after_enroll','Digital_badge','discussion_forum'];
    public function category(){
        return $this->hasOne(Category::class,'id','category_id');
    }

    public function setCategoryAttribute($value)
    {
        $this->attributes['course_outline_content'] = json_encode($value);
    }

    public function getCategoryAttribute($value)
    {
        return $this->attributes['course_outline_content'] = json_decode($value);
    }
}
