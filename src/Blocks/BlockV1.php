<?php

namespace PAFNFCe\Blocks;

use PAFNFCe\Elements;
use PAFNFCe\Common\Block;

final class BlockV1 extends Block
{
    public $elements = [
        'v1' => ['class' => Elements\V1::class, 'level' => 0, 'type' => 'single'],
    ];
}
