<?php

namespace PAFNFCe\Blocks;

use PAFNFCe\Elements;
use PAFNFCe\Common\Block;

final class BlockV4 extends Block
{
    public $elements = [
        'v4' => ['class' => Elements\V4::class, 'level' => 0, 'type' => 'single'],
    ];
}
