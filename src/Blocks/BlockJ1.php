<?php

namespace PAFNFCe\Blocks;

use PAFNFCe\Elements;
use PAFNFCe\Common\Block;

final class BlockJ1 extends Block
{
    public $elements = [
        'j1' => ['class' => Elements\J1::class, 'level' => 0, 'type' => 'single'],
    ];
}
