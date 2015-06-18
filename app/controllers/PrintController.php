<?php

class PrintController extends BaseController
{
    public function htmlToPdf($id)
    {
      $request = Request::create('/admin/candidates/'.$id, 'GET', array());
      $content = Route::dispatch($request)->getContent();
      $user = User::find($id);
      $email = $user->email;
      // $file = 'candidat.html';
      // $handle = fopen(public_path($file), 'w') or die('Cannot open file:  '.$file);
      // fwrite($handle, $content);

      return PDF::loadHTML($content)->save(public_path('candidat.pdf'));

    }
}
