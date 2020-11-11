<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class RentedBook extends Model
{
    protected $guarded = ['id'];

    protected $with = ['book'];

    protected $appends = ['one_week'];

    public function user(){
        return $this->belongsTo('App\User');
    }

    public function getOneWeekAttribute()
    {
        $created_at = $this->created_at;
        $created_at = strtotime($this->created_at);
        return Carbon::parse($created_at)->addWeeks(1)->format('Y-m-d');
    }


    public function book(){
        return $this->belongsTo('App\Book', 'book_id');
    }


    public function getCreatedAtAttribute($value){
        return Carbon::parse($value)->format('Y-m-d');
    }
}
