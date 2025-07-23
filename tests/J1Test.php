<?php

namespace PAFNFCe\Tests;

use PAFNFCe\Elements\J1;
use PHPUnit\Framework\TestCase;
use stdClass;

class J1Test extends TestCase
{
    public function testJ1()
    {
        $std = new stdClass();
        $std->CNPJ = '23379897000101';
        $std->DATA_EMISSAO = '03022021';
        $std->VALOR_TOTAL = 10000;
        $std->DESCONTO_TOTAL = 0;
        $std->INDICADOR_DESCONTO = 'V';
        $std->ACRESCIMO_TOTAL = 0;
        $std->INDICADOR_ACRESCIMO = 'V';
        $std->VALOR_TOTAL_LIQUIDO = 10000;
        $std->TIPO_EMISSAO = '3';
        $std->CHAVE_NFCE = '42210223379897000101650990000000031845990763';
        $std->NUMERO_NFCE = 3;
        $std->SERIE_NFCE = '99';
        $std->CNPJ_CLIENTE = '00000000000000';
        $b1 = new J1($std);
        $resp = "{$b1}";

        $expected = 'J12337989700010103022021000000000100000000000000000V0000000000000V00000000010000342210223379897000101650990000000031845990763000000000399 00000000000000';

        $this->assertEquals($expected, $resp);
    }
}
