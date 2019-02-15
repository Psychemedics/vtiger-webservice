<?php

namespace VtigerWS;


class PsyVtiger extends VtigerLogin
{

    public function __construct(string $urlBase, string $usuario, string $key, string $idUsuario = "")
    {

        parent::__construct($urlBase, $usuario, $key, $idUsuario);
    }

    public function getAccountByID($id)
    {

        $query = "select * from Accounts where id = '{$id}';";

        $url = $this->urlBase . '/webservice.php?operation=query&sessionName=' . $this->tokenSession . '&query=' . urlencode($query);

        $retorno = ExecutaCURL::get($url);

        $data = RetornoVtiger::valida($retorno);

        return $data->result[0];
    }

    public function getAccountByKeyValue($key, $value) {

        $query = "SELECT * FROM Accounts WHERE {$key} = {$value};";

        $url = $this->urlBase . '/webservice.php?operation=query&sessionName=' . $this->tokenSession . '&query=' . urlencode($query);

        $retorno = ExecutaCURL::get($url);

        $data = RetornoVtiger::valida($retorno);

        return $data->result[0];
    }

    public function createAccount(array $array, string $moduleName)
    {
        $array['assigned_user_id'] = $this->userId;

        $objectJson = json_encode($array);

        $params = array("sessionName" => $this->tokenSession, "operation" => 'create', "element" => $objectJson, "elementType" => $moduleName);
        $url = $this->urlBase . '/webservice.php';

        $retorno = ExecutaCURL::post($url, $params);

        $data = RetornoVtiger::valida($retorno);

        $savedObject = $data->result;

        return $savedObject->id;
    }
}