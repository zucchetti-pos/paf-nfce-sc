<?php

namespace PAFNFCe\Blocks;

use PAFNFCe\Elements;
use PAFNFCe\Common\Block;

final class BlockZ1 extends Block
{
    public $elements = [
        'z1' => ['class' => Elements\Z1::class, 'level' => 0, 'type' => 'single'],
    ];
}
