<?php

namespace PAFNFCe\Blocks;

use PAFNFCe\Elements;
use PAFNFCe\Common\Block;

final class BlockZ3 extends Block
{
    public $elements = [
        'z3' => ['class' => Elements\Z3::class, 'level' => 0, 'type' => 'single'],
    ];
}
