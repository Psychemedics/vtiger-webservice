# Vtiger Webservice

### versão _1.0_

Pacote de comunicação com o webservice do Vtiger

## Instalação

```
composer require psychemedics/vtiger-webservice
```

## Exemplo

### Get Account By ID:
```
use VtigerWS\PsyVtiger;

public function getDados(Request $request)
{

    $vtiger = new PsyVtiger('https://meudominio.com', 'usuario', 'chave');
    $account = $vtiger->getAccountByID('11x400');

    ...
} 
```