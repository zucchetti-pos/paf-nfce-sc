<?php

namespace PAFNFCe\Blocks;

use PAFNFCe\Elements;
use PAFNFCe\Common\Block;

final class BlockD2 extends Block
{
    public $elements = [
        'd2' => ['class' => Elements\D2::class, 'level' => 0, 'type' => 'single'],
    ];
}
