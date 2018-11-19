<?php

namespace Tests;

use PHPUnit\Framework\TestCase;
use VtigerWS\VtigerLogin;

class VtigerLoginTest extends TestCase
{

    public function testGetTokenSession()
    {

        $argumentos = [
            'https://localhost',
            'user',
            'secret',
        ];

        $classVtigerLogin = $this->getMockForAbstractClass('VtigerWS\VtigerLogin', $argumentos);

        $this->assertRegExp('/[a-zA-Z]/', $classVtigerLogin->getTokenSession());
    }
}