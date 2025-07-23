<?php

namespace PAFNFCe\Blocks;

use PAFNFCe\Elements;
use PAFNFCe\Common\Block;

final class BlockJ2 extends Block
{
    public $elements = [
        'j2' => ['class' => Elements\J2::class, 'level' => 0, 'type' => 'single'],
    ];
}
