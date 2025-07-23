<?php

namespace PAFNFCe\Elements;

use PAFNFCe\Common\Element;
use PAFNFCe\Common\ElementInterface;
use \stdClass;

class EAD extends Element implements ElementInterface
{
    const REGISTRO = 'EAD';

    protected $parameters = [
        'ASSINATURA' => [
            'type' => 'string',
            'regex' => '^.{256,256}$',
            'required' => true,
            'info' => 'Assinatura do Hash ',
            'format' => '',
            'length' => 256
        ],
    ];

    /**
     * Constructor
     * @param \stdClass $std
     */
    public function __construct(\stdClass $std)
    {
        parent::__construct(self::REGISTRO);
        $this->std = $this->standarize($std);
    }
}
