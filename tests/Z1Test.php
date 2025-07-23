<?php

namespace PAFNFCe\Tests;

use PAFNFCe\Elements\Z1;
use PHPUnit\Framework\TestCase;
use stdClass;

class Z1Test extends TestCase
{
    public function testZ1()
    {
        $std = new stdClass();
        $std->CNPJ = '26607235000130';
        $std->IE = '1257775242';
        $std->IM = '';
        $std->RAZAO_SOCIAL = 'Teste NFCe SC';
        $b1 = new Z1($std);
        $resp = "{$b1}";

        $expected = 'Z1266072350001301257775242                  Teste NFCe SC                                     ';

        $this->assertEquals($expected, $resp);
    }
}
