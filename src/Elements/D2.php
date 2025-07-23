<?php

namespace PAFNFCe\Elements;

use PAFNFCe\Common\Element;
use PAFNFCe\Common\ElementInterface;
use \stdClass;

class D2 extends Element implements ElementInterface
{
    const REGISTRO = 'D2';

    protected $parameters = [
        'CNPJ' => [
            'type' => 'string',
            'regex' => '^[0-9]{14}$',
            'required' => true,
            'info' => 'CNPJ do estabelecimento usuário do PAF- NFC-e',
            'format' => '',
            'length' => 14
        ],
        'NUMERO' => [
            'type' => 'numeric',
            'regex' => '^.{1,13}$',
            'required' => true,
            'info' => 'Número do DAV emitido',
            'format' => 'totalNumber',
            'length' => 13
        ],
        'DATA' => [
            'type' => 'string',
            'regex' => '^([12]\d{3})(0[1-9]|1[0-2])(0[1-9]|[1-2][0-9]|31(?!(?:0[2469]|11))|30(?!02))$',
            'required' => true,
            'info' => 'Data de emissão do DAV',
            'format' => '',
            'length' => 8
        ],
        'TITULO' => [
            'type' => 'string',
            'regex' => '^.{1,30}$',
            'required' => true,
            'info' => 'Título atribuído ao DAV de acordo com sua função (ex: Orçamento, Pedido, etc.)',
            'format' => '',
            'length' => 30
        ],
        'VALOR_TOTAL' => [
            'type' => 'numeric',
            'regex' => '^\d+(\.\d*)?|\.\d+$',
            'required' => true,
            'info' => 'Valor total do DAV emitido, com duas casas decimais',
            'format' => 'totalNumber',
            'length' => 8
        ],
        'CLIENTE' => [
            'type' => 'string',
            'regex' => '^.{0,40}$',
            'required' => true,
            'info' => 'Nome do cliente',
            'format' => 'empty',
            'length' => 40
        ],
        'CNPJ_CLIENTE' => [
            'type' => 'string',
            'regex' => '^\d+(\.\d*)?|\.\d+$',
            'required' => false,
            'info' => 'CPF ou CNPJ do adquirente',
            'format' => '',
            'length' => 14
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
