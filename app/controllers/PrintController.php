<?php

class PrintController extends BaseController
{
    public function htmlToPdf($id)
    {
        $request = Request::create('/admin/candidates/'.$id, 'GET', array());
        $content = Route::dispatch($request)->getContent();
        $pdf = PDF::loadHTML($content);

        return $pdf->download('candidat-'.$id.'.pdf');
    }
}
