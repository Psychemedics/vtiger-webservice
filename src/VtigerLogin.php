<?php


namespace VtigerWS;

use VtigerWS\Exceptions\VtigerWSException;
use Exception;


abstract class VtigerLogin
{


    protected $userId;

    private $tokenChallenge;

    protected $tokenSession;

    protected $urlBase;

    private $usuario;

    private $key;

    public function __construct(string $urlBase, string $usuario, string $key)
    {

        $this->urlBase = $urlBase;
        $this->usuario = $usuario;
        $this->key = $key;

        $this->efetuaLogin();
    }

    private function efetuaLogin()
    {

        $this->setTokenChallenge();
        $this->setTokenSession();
    }

    private function setTokenChallenge()
    {

        $retorno = ExecutaCURL::get($this->urlBase . '/webservice.php?operation=getchallenge&username=' . $this->usuario);

        $data = RetornoVtiger::valida($retorno);

        try {

            $this->tokenChallenge = $data->result->token;
        } catch (Exception $exception) {

            throw new VtigerWSException('O retorno do Vtiger está vazio', 500);
        }

        return $this->tokenChallenge;
    }

    private function setTokenSession()
    {

        $token = $this->tokenChallenge . $this->key;

        $dados =  'operation=login&username=' . $this->usuario . '&accessKey=' . md5($token);

        $retorno = ExecutaCURL::post($this->urlBase . '/webservice.php', $dados);

        $data = RetornoVtiger::valida($retorno);

        try {

            $this->tokenSession = $data->result->sessionName;
            $this->userId = $data->result->userId;
        } catch (Exception $exception) {

            throw new VtigerWSException('O retorno do Vtiger está vazio', 500);
        }

        return $this->tokenSession;
    }

    private function trataRetorno($retorno)
    {

        if (empty($retorno)) {

            throw new VtigerWSException('O retorno do Vtiger está vazio', 500);
        }

        if( !$retorno->success ) {

            try {

                $code = $retorno->error->code;
                $message = $retorno->error->message;
            } catch (Exception $exception) {

                throw new VtigerWSException('O retorno do Vtiger está vazio', 500);
            }

            throw new VtigerWSException('Retorno do Vtiger: ' . $code . ' (' . $message . ')', 500);
        }
    }

    public function getTokenSession()
    {

        return $this->tokenSession;
    }

}

