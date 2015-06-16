<?php 

require_once '/path/to/snappy/src/autoload.php';

use Knp\Snappy\Pdf;

class PrintController extends BaseController 
{
    public function index()
    {
		$snappy = new Pdf('/usr/local/bin/wkhtmltopdf');
		header('Content-Type: application/pdf');
		header('Content-Disposition: attachment; filename="file.pdf"');
		echo $snappy->getOutput( public_path(). 'app/views/admin/categories/index.blade.php');
    }
}