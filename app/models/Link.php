<?php
class Link extends Eloquent {

    protected $fillable = array('link');

    public static $rules = array(
      'link'=>'required|active_url',
    );

    protected $table = 'links';
}
