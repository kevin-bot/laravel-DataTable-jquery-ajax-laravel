<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Estudiante extends Model
{
    //
    protected $guarded=['id'];

    protected $appends=['matriculated'];

    public function getMatriculatedAttribute(){
    	return Carbon::createFromTimeStamp(strtotime($this->attributes['created_at']))->diffforHumans();
    }
}
