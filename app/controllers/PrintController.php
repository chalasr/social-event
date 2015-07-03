<?php

class PrintController extends BaseController
{
    public function htmlToPdf($id)
    {
      $request = Request::create('/admin/candidates/'.$id, 'GET', array());
            $content = Route::dispatch($request)->getContent();
            // $file = 'candidat.html';
            // $handle = fopen(public_path($file), 'w') or die('Cannot open file:  '.$file);
            // fwrite($handle, $content);
            $pdf = PDF::loadHTML($content);

            $pdf->save('candidat-'.$id.'.pdf');

            return $pdf->download('candidat-'.$id.'.pdf');

            // return 'test';
    }
}
