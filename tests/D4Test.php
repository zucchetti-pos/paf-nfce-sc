<?php

namespace PAFNFCe\Tests;

use PAFNFCe\Elements\D4;
use PHPUnit\Framework\TestCase;
use stdClass;

class D4Test extends TestCase
{
    public function testD4()
    {
        $std = new stdClass();
        $std->NUMERO = 2;
        $std->DATA_ALTERACAO = '03022021';
        $std->HORA_ALTERACAO = '112733';
        $std->NUMERO_ITEM = '1';
        $std->CODIGO_PRODUTO = 1;
        $std->DESCRICAO = 'Produto 1';
        $std->QUANTIDADE = 100;
        $std->UNIDADE = 'KG';
        $std->VALOR_UNITARIO = 10000;
        $std->DESCONTO = 0;
        $std->ACRESCIMO = 0;
        $std->VALOR_TOTAL_LIQUIDO = 10000;
        $std->ST = 'T';
        $std->ALIQUOTA = '07';
        $std->INDICADOR_CANCELAMENTO = 'N';
        $std->CASAS_DECIMAIS_QTD = 2;
        $std->CASAS_DECIMAIS_VLR = 2;
        $std->TIPO_ALTERACAO = 'I';
        $b1 = new D4($std);
        $resp = "{$b1}";

        $expected = 'D400000000000020302202111273300000000000001Produto 1                                                                                           0000100KG 00010000000000000000000000000000010000T0700N22I';

        $this->assertEquals($expected, $resp);
    }
}
