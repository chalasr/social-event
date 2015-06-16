<?php 


class PrintController extends BaseController 
{
    public function getpdf()
    {
    	$path = Request::getRequestUri();
    	return PDF::loadFile('http://localhost:8000'. $path)->stream('category.pdf');
    }
}