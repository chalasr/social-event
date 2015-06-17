<?php 


class PrintController extends BaseController 
{
    public function index()
    {
    	return PDF::loadFile('http://bref.dev5.sutunam.com')->stream('category.pdf');
    }
}