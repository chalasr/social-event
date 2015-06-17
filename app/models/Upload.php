<?php
class Upload extends Eloquent {

    public function enterprise()
    {
        return $this->hasOne('Enterprise', 'enterprise_id');
    }

    protected $fillable = array('name', 'path');

    public static $rules = array(
      'name'=>'required',
      //'type'=>'required',
      // 'path'=>'required',
      // 'enterprise_id' => 'required'
    );



    protected $table = 'files';

}
