# Vtiger Webservice

### versão _3.0_

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

### Create Account:
```
use VtigerWS\PsyVtiger;

public function getDados(Request $request)
{

    $vtiger = new PsyVtiger('https://meudominio.com', 'usuario', 'chave', 'id');
    $insertArray = [];
    $account = $vtiger->create($insertArray, 'moduleName');

    ...
} 
```

### Update Account:
```
use VtigerWS\PsyVtiger;

public function getDados(Request $request)
{

    $vtiger = new PsyVtiger('https://meudominio.com', 'usuario', 'chave', 'id');
    $updateArray = [];
    $account = $vtiger->update($updateArray);

    ...
} 
```