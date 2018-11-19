<?php

namespace Tests;

use PHPUnit\Framework\TestCase;

class PsyVtigerTest extends TestCase
{

    public function testGetTokenSession()
    {

        $argumentos = [
            'https://crm.exametoxicologico.com.br',
            'adminpsy',
            'lZm9M6uubiNRkspv',
        ];

        $classVtigerLogin = $this->getMockForAbstractClass('VtigerWS\VtigerLogin', $argumentos);

        $this->assertRegExp('/[a-zA-Z]/', $classVtigerLogin->getTokenSession());
    }
}
