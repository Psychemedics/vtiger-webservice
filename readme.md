# Vtiger Webservice

### versão _1.0_

Pacote de comunicação com o webservice do Vtiger

```
composer require psychemedics/gerador-response
```

## Exemplo

### Laravel:
```
use GeradorResponse\PsyAPI;

public function getDados(Request $request)
{

    $retorno = PsyAPI::gerar($request->all(), 'Retornando request', 200, true);

    return response()->json($retorno);
} 
```