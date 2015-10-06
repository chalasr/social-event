<?php
class Link extends Eloquent {

    protected $fillable = array('link');

    public static $rules = array(
      'link'=>'required|active_url',
    );

    protected $table = 'links';

    public static function checkUrl($link) {
        if (!preg_match("~^(?:f|ht)tps?://~i", $link)) {
            $link = "http://" . $link;
        }
        return $link;
    }

}
