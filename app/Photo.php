<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    //
    protected $uploads = ['/images/'];

    protected $fillable = ['photo_id', 'file'];

    public function getPhotoAtrributes($photo) {

    	return $this->uploads . $photo;
    }
}
