<?php

namespace PAFNFCe;

use PAFNFCe\Blocks\BlockA2;
use PAFNFCe\Blocks\BlockU1;
use PAFNFCe\Blocks\BlockP2;
use PAFNFCe\Blocks\BlockE2;
use PAFNFCe\Blocks\BlockD2;
use PAFNFCe\Blocks\BlockD3;
use PAFNFCe\Blocks\BlockD4;
use PAFNFCe\Blocks\BlockEAD;
use PAFNFCe\Blocks\BlockJ1;
use PAFNFCe\Blocks\BlockJ2;
use PAFNFCe\Blocks\BlockZ1;
use PAFNFCe\Blocks\BlockZ2;
use PAFNFCe\Blocks\BlockZ3;
use PAFNFCe\Blocks\BlockZ4;
use PAFNFCe\Blocks\BlockZ9;
use PAFNFCe\Blocks\BlockV1;
use PAFNFCe\Blocks\BlockV2;
use PAFNFCe\Blocks\BlockV3;
use PAFNFCe\Blocks\BlockV4;
use PAFNFCe\PAFNFCe;

final class PAFNFCeBuilder extends PAFNFCe
{
    protected $possibles = [
        'blocku1' => ['class' => BlockU1::class, 'order' => 1],
        'blocka2' => ['class' => BlockA2::class, 'order' => 2],
        'blockp2' => ['class' => BlockP2::class, 'order' => 3],
        'blocke2' => ['class' => BlockE2::class, 'order' => 4],
        'blockd2' => ['class' => BlockD2::class, 'order' => 5],
        'blockd3' => ['class' => BlockD3::class, 'order' => 6],
        'blockd4' => ['class' => BlockD4::class, 'order' => 7],
        'blockj1' => ['class' => BlockJ1::class, 'order' => 8],
        'blockj2' => ['class' => BlockJ2::class, 'order' => 9],
        'blockz1' => ['class' => BlockZ1::class, 'order' => 10],
        'blockz2' => ['class' => BlockZ2::class, 'order' => 11],
        'blockz3' => ['class' => BlockZ3::class, 'order' => 12],
        'blockz4' => ['class' => BlockZ4::class, 'order' => 13],
        'blockz9' => ['class' => BlockZ9::class, 'order' => 14],
        'blockv1' => ['class' => BlockV1::class, 'order' => 15],
        'blockv2' => ['class' => BlockV2::class, 'order' => 16],
        'blockv3' => ['class' => BlockV3::class, 'order' => 17],
        'blockv4' => ['class' => BlockV4::class, 'order' => 18],
        'blockead' => ['class' => BlockEAD::class, 'order' => 19],
    ];
}
