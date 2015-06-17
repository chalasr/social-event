<?php
class Upload extends Eloquent {

    protected $fillable = array('name', 'path');

    public static $rules = array(
      'name'=>'required',
    );

    protected $table = 'files';
}
