<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Classes\Person;
use App\Classes\SoapDemoServer;

class MySoapController extends \KDuma\SoapServer\AbstractSoapServerController
{
    protected function getService(): string
    {
        return SoapDemoServer::class;
    }

    protected function getEndpoint(): string
    {
        return route('my_soap_server');
    }

    protected function getWsdlUri(): string
    {
        return route('my_soap_server.wsdl');
    }

    protected function getClassmap(): array
    {
        return [
            'SoapPerson' => Person::class,
        ];
    }
}
