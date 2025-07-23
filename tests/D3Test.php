<?php

namespace PAFNFCe\Tests;

use PAFNFCe\Elements\D3;
use PHPUnit\Framework\TestCase;
use stdClass;

class D3Test extends TestCase
{
    public function testD3()
    {
        $std = new stdClass();
        $std->NUMERO = '0000000002';
        $std->DATA_INCLUSAO = '03022021';
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
        $b1 = new D3($std);
        $resp = "{$b1}";

        $expected = 'D30000000002   0302202100100000000000001Produto 1                                                                                           0000100KG 00010000000000000000000000000000010000T0700N22';

        $this->assertEquals($expected, $resp);
    }
}
