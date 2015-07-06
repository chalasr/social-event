<?php

class PrintController extends BaseController
{
    public function htmlToPdf($id)
    {
        $request = Request::create('/candidate/export'.$id, 'GET', array());
        $content = Route::dispatch($request)->getContent();
        $pdf = PDF::loadHTML($content);

        return $pdf->stream('candidat-'.$id.'.pdf');
    }
}
