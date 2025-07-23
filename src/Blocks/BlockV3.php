<?php

namespace PAFNFCe\Blocks;

use PAFNFCe\Elements;
use PAFNFCe\Common\Block;

final class BlockV3 extends Block
{
    public $elements = [
        'v3' => ['class' => Elements\V3::class, 'level' => 0, 'type' => 'single'],
    ];
}
