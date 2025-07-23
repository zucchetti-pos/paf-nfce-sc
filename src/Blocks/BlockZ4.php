<?php

namespace PAFNFCe\Blocks;

use PAFNFCe\Elements;
use PAFNFCe\Common\Block;

final class BlockZ4 extends Block
{
    public $elements = [
        'z4' => ['class' => Elements\Z4::class, 'level' => 0, 'type' => 'single'],
    ];
}
