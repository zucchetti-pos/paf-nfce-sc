<?php

namespace PAFNFCe\Blocks;

use PAFNFCe\Elements;
use PAFNFCe\Common\Block;

final class BlockZ2 extends Block
{
    public $elements = [
        'z2' => ['class' => Elements\Z2::class, 'level' => 0, 'type' => 'single'],
    ];
}
