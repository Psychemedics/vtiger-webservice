<?php

namespace Tests;

use PHPUnit\Framework\TestCase;

class PsyVtigerTest extends TestCase
{

    public function testGetAccountByID()
    {

        $argumentos = [
            'https://localhost',
            'user',
            'secret',
        ];

        $classVtigerLogin = $this->getMockForAbstractClass('VtigerWS\PsyVtiger', $argumentos);

        $accaount = $classVtigerLogin->getAccountByID('11x404');

        $this->assertObjectHasAttribute('account_no', $accaount);
    }
}
