<?php

namespace PAFNFCe\Elements;

use PAFNFCe\Common\Element;
use PAFNFCe\Common\ElementInterface;
use \stdClass;

class V1 extends Element implements ElementInterface
{
    const REGISTRO = 'V1';

    protected $parameters = [
        'CNPJ' => [
            'type' => 'string',
            'regex' => '^[A-Z0-9]{14}$',
            'required' => true,
            'info' => 'CNPJ do estabelecimento usuário do PAF- NFC-e',
            'format' => '',
            'length' => 14
        ],
        'IE' => [
            'type' => 'string',
            'regex' => '^(\s*|\d+)$',
            'required' => true,
            'info' => 'Inscrição Estadual do estabelecimento',
            'format' => '',
            'length' => 14
        ],
        'IM' => [
            'type' => 'string',
            'regex' => '^[0-9]{2,14}$',
            'required' => false,
            'info' => 'Inscrição Municipal do estabelecimento',
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
