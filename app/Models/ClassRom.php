<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ClassRom extends Model
{
    protected $table ='class';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
      protected $primaryKey = 'class_id';
    public $timestamps = false;
    protected $fillable = [
			"class_id",
			"subject_id",
			"room",
			"day",
			"start_class",
			"end_class",
			"teacher_id",
			"max_student" 
    ]; 
   	
}
