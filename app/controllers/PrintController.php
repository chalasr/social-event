<?php


class PrintController extends BaseController
{
    public function htmlToPdf($id)
    {
    	return PDF::loadFile('http://bref.dev5.sutunam.com')->stream('candidat.pdf');
    }
}
