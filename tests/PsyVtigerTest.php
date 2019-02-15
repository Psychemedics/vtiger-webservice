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

    public function testGetAccountByKeyValue()
    {

        $argumentos = [
            'https://localhost',
            'user',
            'secret',
        ];

        $classVtigerLogin = $this->getMockForAbstractClass('VtigerWS\PsyVtiger', $argumentos);

        $accaount = $classVtigerLogin->getAccountByKeyValue('key', 'value');

        $this->assertObjectHasAttribute('account_no', $accaount);
    }


    public function testCreateAccount()
    {
        $argumentos = [
            'https://localhost',
            'user',
            'secret',
            'id'
        ];

        $classVtigerLogin = $this->getMockForAbstractClass('VtigerWS\PsyVtiger', $argumentos);

        $array = [];

        $id = $classVtigerLogin->createAccount($array, 'Accounts');
        $this->assertTrue(!empty($id));
    }
}
