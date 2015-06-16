<?php 

class PrintController extends BaseController 
{
    public function index()
    {
    	$pdf = PDF::loadView("app/views/admin/categories/index.blade.php");
		return $pdf->download('invoice.pdf');
    }
}
// 'http://local/admin/users/'.$id