<?php

namespace PAFNFCe\Elements;

use PAFNFCe\Common\Element;
use \stdClass;

class Z9 extends Element
{
    const REGISTRO = 'Z9';
    const LEVEL = 0;
    const PARENT = '';

    protected $parameters = [
        'CNPJ' => [
            'type' => 'string',
            'regex' => '^[A-Z0-9]{14}$',
            'required' => true,
            'info' => 'CNPJ da empresa desenvolvedora do PAFNFC-e',
            'format' => '',
            'length' => 14
        ],
        'IE' => [
            'type' => 'string',
            'regex' => '^[0-9]{2,14}$',
            'required' => true,
            'info' => 'Número de inscrição do estudal.',
            'format' => '',
            'length' => 14
        ],
        'TOTALIZACAO' => [
            'type' => 'numeric',
            'regex' => '^\d+(\.\d*)?|\.\d+$',
            'required' => true,
            'info' => 'Quantidade de Registros tipo Z4 informados no arquivo',
            'format' => 'totalNumber',
            'length' => 6
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
