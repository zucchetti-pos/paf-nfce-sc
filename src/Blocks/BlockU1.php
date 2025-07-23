<?php

namespace PAFNFCe\Blocks;

use PAFNFCe\Elements;
use PAFNFCe\Common\Block;

final class BlockU1 extends Block
{
    public $elements = [
        'u1' => ['class' => Elements\U1::class, 'level' => 0, 'type' => 'single'],
    ];
}
