<?php

namespace PAFNFCe\Tests;

use PAFNFCe\Elements\U1;
use PHPUnit\Framework\TestCase;
use stdClass;

class U1Test extends TestCase
{
    public function testU1()
    {
        $std = new stdClass();
        $std->CNPJ = '26607235000130';
        $std->IE = '1257775242';
        $std->IM = '';
        $std->RAZAO_SOCIAL = 'Teste NFCe SC';
        $b1 = new U1($std);
        $resp = "{$b1}";

        $expected = 'U1266072350001301257775242                  Teste NFCe SC                                     ';

        $this->assertEquals($expected, $resp);
    }
}
