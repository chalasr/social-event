<?php
class Link extends Eloquent {

    protected $fillable = array('link');

    public static $rules = array(
      'link'=>'required',
    );

    protected $table = 'links';
}
