<?php

namespace PAFNFCe\Blocks;

use PAFNFCe\Elements;
use PAFNFCe\Common\Block;

final class BlockEAD extends Block
{
    public $elements = [
        'ead' => ['class' => Elements\EAD::class, 'level' => 0, 'type' => 'single'],
    ];
}
