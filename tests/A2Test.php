<?php

namespace PAFNFCe\Tests;

use PAFNFCe\Elements\A2;
use PHPUnit\Framework\TestCase;
use stdClass;

class A2Test extends TestCase
{
    public function testA2()
    {
        $std = new stdClass();
        $std->DATA = '27022021';
        $std->MEIO_PAGAMENTO = 'Dinheiro';
        $std->CODIGO_DOCUMENTO = '1';
        $std->VALOR = 31000;
        $std->CNPJ = '';
        $std->NUMERO_DOCUMENTO = 0;
        $b1 = new A2($std);
        $resp = "{$b1}";

        $expected = 'A227022021Dinheiro                 1000000031000              0000000000';

        $this->assertEquals($expected, $resp);
    }
}
