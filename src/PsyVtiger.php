<?php

namespace VtigerWS;


class PsyVtiger extends VtigerLogin
{

    public function __construct(string $urlBase, string $usuario, string $key)
    {
        parent::__construct($urlBase, $usuario, $key);
    }
}