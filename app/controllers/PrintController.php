<?php

use JonnyW\PhantomJs\Client;

class PrintController extends BaseController
{
    public function htmlToPdf($id)
    {

        $client = Client::getInstance();

        /**
         * @see JonnyW\PhantomJs\Message\Request
         **/
        $request = $client->getMessageFactory()->createRequest('http://bref.dev5.sutunam.com/admin/candidates/'.$id, 'GET');

        /**
         * @see JonnyW\PhantomJs\Message\Response
         **/
        $response = $client->getMessageFactory()->createResponse();

        // Send the request
        $client->send($request, $response);


            // Dump the requested page content
            return $response->getContent();
    }
}
