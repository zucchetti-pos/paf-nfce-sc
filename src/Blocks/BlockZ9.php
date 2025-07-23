<?php

namespace PAFNFCe\Blocks;

use PAFNFCe\Elements;
use PAFNFCe\Common\Block;

final class BlockZ9 extends Block
{
    public $elements = [
        'z9' => ['class' => Elements\Z9::class, 'level' => 0, 'type' => 'single'],
    ];
}
