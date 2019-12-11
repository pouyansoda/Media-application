<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class photo extends Model
{
    protected $uploads = '/images/';

    protected $fillable = [
        'file',
        ];
    public function getFileAttribute($photo){
        return $this->uploads . $photo;
    }
}
