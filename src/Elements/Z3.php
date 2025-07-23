<?php

namespace PAFNFCe\Elements;

use PAFNFCe\Common\Element;
use \stdClass;

class Z3 extends Element
{
    const REGISTRO = 'Z3';
    const LEVEL = 0;
    const PARENT = '';

    protected $parameters = [
        'NOME_APLICATIVO' => [
            'type' => 'string',
            'regex' => '^.{1,50}$',
            'required' => true,
            'info' => 'Nome do aplicativo.',
            'format' => 'empty',
            'length' => 50
        ],
        'VERSAO' => [
            'type' => 'string',
            'regex' => '^.{1,10}$',
            'required' => true,
            'info' => 'Versão do aplicativo do NFC-e',
            'format' => 'empty',
            'length' => 10
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
