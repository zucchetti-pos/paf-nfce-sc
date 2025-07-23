<?php

namespace PAFNFCe\Tests;

use PAFNFCe\Elements\P2;
use PHPUnit\Framework\TestCase;
use stdClass;

class P2Test extends TestCase
{
    public function testP2()
    {
        $std = new stdClass();
        $std->CNPJ = '23379897000101';
        $std->CODIGO = 1;
        $std->CEST = '';
        $std->NCM = '19059090';
        $std->DESCRICAO = 'Produto 1';
        $std->UNIDADE = 'KG';
        $std->IAT = 'A';
        $std->IPPT = 'T';
        $std->ST = 'T';
        $std->ALIQUOTA = '07';
        $std->VALOR_UNITARIO = 10000;
        $b1 = new P2($std);
        $resp = "{$b1}";

        $expected = 'P22337989700010100000000000001       19059090Produto 1                                         KG    ATT0700000000010000';

        $this->assertEquals($expected, $resp);
    }
}
