<?php

namespace PAFNFCe\Blocks;

use PAFNFCe\Elements;
use PAFNFCe\Common\Block;

final class BlockP2 extends Block
{
    public $elements = [
        'p2' => ['class' => Elements\P2::class, 'level' => 0, 'type' => 'single'],
    ];
}
