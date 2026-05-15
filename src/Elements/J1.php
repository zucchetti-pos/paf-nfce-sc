<?php

namespace PAFNFCe\Elements;

use PAFNFCe\Common\Element;
use PAFNFCe\Common\ElementInterface;
use \stdClass;

class J1 extends Element implements ElementInterface
{
    const REGISTRO = 'J1';

    protected $parameters = [
        'CNPJ' => [
            'type' => 'string',
            'regex' => '^[A-Z0-9]{14}$',
            'required' => true,
            'info' => 'CNPJ do estabelecimento usuário do PAF- NFC-e',
            'format' => '',
            'length' => 14
        ],
        'DATA_EMISSAO' => [
            'type' => 'string',
            'regex' => '^([12]\d{3})(0[1-9]|1[0-2])(0[1-9]|[1-2][0-9]|31(?!(?:0[2469]|11))|30(?!02))$',
            'required' => true,
            'info' => 'Data de emissão da NFC-e',
            'format' => '',
            'length' => 8
        ],
        'VALOR_TOTAL' => [
            'type' => 'numeric',
            'regex' => '^\d+(\.\d*)?|\.\d+$',
            'required' => true,
            'info' => 'Valor total do documento, com duas casas decimais',
            'format' => 'totalNumber',
            'length' => 14
        ],
        'DESCONTO_TOTAL' => [
            'type' => 'numeric',
            'regex' => '^\d+(\.\d*)?|\.\d+$',
            'required' => true,
            'info' => 'Valor do desconto ou percentual aplicado sobre o valor do subtotal do documento, com duas casas decimais',
            'format' => 'totalNumber',
            'length' => 13
        ],
        'INDICADOR_DESCONTO' => [
            'type' => 'string',
            'regex' => '^.{1,1}$',
            'required' => true,
            'info' => 'Informar ‘V” para valor monetário ou “P” para percentual',
            'format' => '',
            'length' => 1
        ],
        'ACRESCIMO_TOTAL' => [
            'type' => 'numeric',
            'regex' => '^\d+(\.\d*)?|\.\d+$',
            'required' => false,
            'info' => 'Valor do acréscimo incidente sobre o valor do total, com duas casas decimais.',
            'format' => 'totalNumber',
            'length' => 13
        ],
        'INDICADOR_ACRESCIMO' => [
            'type' => 'string',
            'regex' => '^.{1,1}$',
            'required' => true,
            'info' => 'Informar ‘V” para valor monetário ou “P” para percentual',
            'format' => '',
            'length' => 1
        ],
        'VALOR_TOTAL_LIQUIDO' => [
            'type' => 'numeric',
            'regex' => '^\d+(\.\d*)?|\.\d+$',
            'required' => true,
            'info' => 'Valor total da NFC-e após desconto/acréscimo, com duas casas decimais',
            'format' => 'totalNumber',
            'length' => 14
        ],
        'TIPO_EMISSAO' => [
            'type' => 'string',
            'regex' => '^.{1,1}$',
            'required' => true,
            'info' => 'Informar o tipo de emissão da NFC-e, nos termos do Manual de orientações da NFC-e – utilizar os códigos tpEmis',
            'format' => '',
            'length' => 1
        ],
        'CHAVE_NFCE' => [
            'type' => 'string',
            'regex' => '^.{44,44}$',
            'required' => true,
            'info' => 'Chave de acesso da NFC-e',
            'format' => '',
            'length' => 44
        ],
        'NUMERO_NFCE' => [
            'type' => 'numeric',
            'regex' => '^\d+(\.\d*)?|\.\d+$',
            'required' => true,
            'info' => 'Número da NFce',
            'format' => 'totalNumber',
            'length' => 10
        ],
        'SERIE_NFCE' => [
            'type' => 'string',
            'regex' => '^.{1,3}$',
            'required' => true,
            'info' => 'Série da NFce',
            'format' => '',
            'length' => 3
        ],
        'CNPJ_CLIENTE' => [
            'type' => 'string',
            'regex' => '^[A-Z0-9]{11,14}$',
            'required' => false,
            'info' => 'CNPJ d do cliente da NFCe.',
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
