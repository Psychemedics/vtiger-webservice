<?php

namespace VtigerWS;

use GeradorResponse\PsyAPI;
use Exception;


class ExecutaCURL
{

    public static function get($url)
    {

        $header = [
            'Accept: */*',
            'Content-Type: application/json',
        ];

        $opcoes = [
            CURLOPT_RETURNTRANSFER => 1,
            CURLOPT_HEADER => 1,
            CURLOPT_URL => $url,
            CURLOPT_HTTPHEADER => $header,
        ];

        try {

            $curl = curl_init();
            curl_setopt_array($curl, $opcoes);
            $response = curl_exec($curl);
        } catch (Exception $exception) {

            return PsyAPI::gerar([], 'Erro ao executar o CURL', 500, false);
        }

        $tamanhoHeader = curl_getinfo($curl, CURLINFO_HEADER_SIZE);
        $dados = substr($response, $tamanhoHeader);
        $statusCode = curl_getinfo($curl, CURLINFO_HTTP_CODE);

        curl_close($curl);

        $success = ($statusCode >= 200 && $statusCode < 300) ? true : false;

        $retorno = PsyAPI::gerar($dados, 'Retornando CURL', $statusCode, $success);

        return $retorno;
    }

    public static function post($url, $dados)
    {

        $header = [
            'Accept: */*',
            'Content-Type' => 'application/json',
        ];

        $opcoes = [
            CURLOPT_POST => 1,
            CURLOPT_HEADER => 1,
            CURLOPT_RETURNTRANSFER => 1,
            CURLOPT_ENCODING => "",
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_URL => $url,
            CURLOPT_HTTPHEADER => $header,
            CURLOPT_POSTFIELDS => $dados,
        ];

        try {

            $curl = curl_init();
            curl_setopt_array($curl, $opcoes);
            $response = curl_exec($curl);
        } catch (Exception $exception) {

            return PsyAPI::gerar([], 'Erro ao executar o CURL', 500, false);
        }

        $tamanhoHeader = curl_getinfo($curl, CURLINFO_HEADER_SIZE);
        $dados = substr($response, $tamanhoHeader);
        $statusCode = curl_getinfo($curl, CURLINFO_HTTP_CODE);

        curl_close($curl);

        $success = ($statusCode >= 200 && $statusCode < 300) ? true : false;

        $retorno = PsyAPI::gerar($dados, 'Retornando CURL', $statusCode, $success);

        return $retorno;
    }
}