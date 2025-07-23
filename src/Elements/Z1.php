<?php

namespace PAFNFCe\Elements;

use PAFNFCe\Common\Element;
use \stdClass;

class Z1 extends Element
{
    const REGISTRO = 'Z1';
    const LEVEL = 0;
    const PARENT = '';

    protected $parameters = [
        'CNPJ' => [
            'type' => 'string',
            'regex' => '^[0-9]{14}$',
            'required' => true,
            'info' => 'Número de inscrição do estabelecimento matriz da pessoa jurídica no CNPJ.',
            'format' => '',
            'length' => 14
        ],
        'IE' => [
            'type' => 'string',
            'regex' => '^(\s*|\d+)$',
            'required' => true,
            'info' => 'Número de inscrição do estudal.',
            'format' => '',
            'length' => 14
        ],
        'IM' => [
            'type' => 'string',
            'regex' => '^[0-9]{2,14}$',
            'required' => false,
            'info' => 'Número de inscrição municipal.',
            'format' => 'empty',
            'length' => 14
        ],
        'RAZAO_SOCIAL' => [
            'type' => 'string',
            'regex' => '^.{1,50}$',
            'required' => true,
            'info' => 'Razão Social do estabelecimento',
            'format' => '',
            'length' => 50
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
