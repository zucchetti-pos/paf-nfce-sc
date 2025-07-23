<?php

namespace PAFNFCe\Tests;

use PAFNFCe\Elements\E2;
use PHPUnit\Framework\TestCase;
use stdClass;

class E2Test extends TestCase
{
    public function testE2()
    {
        $std = new stdClass();
        $std->CNPJ = '23379897000101';
        $std->CODIGO = 1;
        $std->CEST = '';
        $std->NCM = '19059090';
        $std->DESCRICAO = 'Produto 1';
        $std->UNIDADE = 'KG';
        $std->MENSURACAO = '+';
        $std->QUANTIDADE = 100000;
        $std->DATA_EMISSAO = '01032021';
        $std->DATA_ESTOQUE = '01032021';
        $b1 = new E2($std);
        $resp = "{$b1}";

        $expected = 'E22337989700010100000000000001       19059090Produto 1                                         KG    +0001000000103202101032021';

        $this->assertEquals($expected, $resp);
    }
}
