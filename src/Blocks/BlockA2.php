<?php

namespace PAFNFCe\Blocks;

use PAFNFCe\Elements;
use PAFNFCe\Common\Block;
use PAFNFCe\Common\BlockInterface;

final class BlockA2 extends Block implements BlockInterface
{
    public $elements = [
        'a2' => ['class' => Elements\A2::class, 'level' => 0, 'type' => 'single'],
    ];
}
