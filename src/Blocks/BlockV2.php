<?php

namespace PAFNFCe\Blocks;

use PAFNFCe\Elements;
use PAFNFCe\Common\Block;

final class BlockV2 extends Block
{
    public $elements = [
        'v2' => ['class' => Elements\V2::class, 'level' => 0, 'type' => 'single'],
    ];
}
