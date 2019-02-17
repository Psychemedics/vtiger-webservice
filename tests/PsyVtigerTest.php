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

        $account = $classVtigerLogin->getAccountByID('11x404');

        $this->assertObjectHasAttribute('account_no', $account[0]);
    }

    public function testGetAccountByKeyValue()
    {

        $argumentos = [
            'https://localhost',
            'user',
            'secret',
        ];

        $classVtigerLogin = $this->getMockForAbstractClass('VtigerWS\PsyVtiger', $argumentos);

        $account = $classVtigerLogin->getAccountByKeyValue('key', 'value');

        $this->assertObjectHasAttribute('account_no', $account[0]);
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

        $id = $classVtigerLogin->create($array, 'Accounts');
        $this->assertTrue(!empty($id));
    }

    public function testUpdateAccount()
    {
        $argumentos = [
            'https://localhost',
            'user',
            'secret',
            'id'
        ];

        $classVtigerLogin = $this->getMockForAbstractClass('VtigerWS\PsyVtiger', $argumentos);

        $array = [];

        $id = $classVtigerLogin->update($array);
        $this->assertTrue(!empty($id));
    }
}
