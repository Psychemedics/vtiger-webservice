<?php

namespace VtigerWS;

use VtigerWS\Exceptions\VtigerWSException;
use Exception;

class RetornoVtiger
{

    public static function valida($retorno)
    {
        $data = json_decode($retorno['data']);

        if (!$retorno['success']) {

            throw new VtigerWSException('Erro não mapeado ao se comunicar com o Vtiger', 500);
        }

        if (empty($data)) {

            throw new VtigerWSException('O retorno do Vtiger está vazio', 500);
        }

        if( !$data->success ) {

            try {

                $code = $data->error->code;
                $message = $data->error->message;
            } catch (Exception $exception) {

                throw new VtigerWSException('O retorno do Vtiger está vazio', 500);
            }

            throw new VtigerWSException('Retorno do Vtiger: ' . $code . ' (' . $message . ')', 500);
        }

        return $data;
    }
}