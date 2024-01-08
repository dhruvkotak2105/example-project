<?php

namespace App\Test;

use Illuminate\Support\Facades\Facade;

class TestFacade extends Facade
{
    public function testMethod()
    {
        return 'Hello from TestFacade!';
    }
}
