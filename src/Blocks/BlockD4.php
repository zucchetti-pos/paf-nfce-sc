<?php

namespace PAFNFCe\Blocks;

use PAFNFCe\Elements;
use PAFNFCe\Common\Block;

final class BlockD4 extends Block
{
    public $elements = [
        'd4' => ['class' => Elements\D4::class, 'level' => 0, 'type' => 'single'],
    ];
}
