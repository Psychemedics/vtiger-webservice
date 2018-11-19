<?php

namespace VtigerWS;


class PsyVtiger extends VtigerLogin
{

    public function __construct(string $urlBase, string $usuario, string $key)
    {

        parent::__construct($urlBase, $usuario, $key);
    }

    public function getAccountByID($id)
    {

        $query = "select * from Accounts where id = '{$id}';";

        $url = $this->urlBase . '/webservice.php?operation=query&sessionName=' . $this->tokenSession . '&query=' . urlencode($query);

        $retorno = ExecutaCURL::get($url);

        $data = RetornoVtiger::valida($retorno);

        return $data->result[0];
    }
}