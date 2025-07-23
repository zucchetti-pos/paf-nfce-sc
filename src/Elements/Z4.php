<?php

namespace PAFNFCe\Elements;

use PAFNFCe\Common\Element;
use \stdClass;

class Z4 extends Element
{
    const REGISTRO = 'Z4';
    const LEVEL = 0;
    const PARENT = '';

    protected $parameters = [
        'CNPJ' => [
            'type' => 'string',
            'regex' => '^[0-9]{11,14}$',
            'required' => true,
            'info' => 'CNPJ d do cliente da NFCe.',
            'format' => '',
            'length' => 14
        ],
        'TOTALIZACAO' => [
            'type' => 'numeric',
            'regex' => '^\d+(\.\d*)?|\.\d+$',
            'required' => true,
            'info' => 'Total de vendas no mês, com duas casas decimais, ao CPF/CNPJ indicado no campo 02.',
            'format' => 'totalNumber',
            'length' => 14
        ],
        'TOTALIZACAO_VENDAS' => [
            'type' => 'numeric',
            'regex' => '^\d+(\.\d*)?|\.\d+$',
            'required' => true,
            'info' => 'Total de vendas no mês, com duas casas decimais, ao CPF/CNPJ indicado no campo 02',
            'format' => 'totalNumber',
            'length' => 14
        ],
        'TOTALIZACAO_OUTRAS' => [
            'type' => 'numeric',
            'regex' => '^\d+(\.\d*)?|\.\d+$',
            'required' => true,
            'info' => 'Total de saídas diversas das vendas no mês, tais como “bonificações”, “brindes”, “prêmio” etc, com duas casas decimais, ao CPF/CNPJ indicado no campo 02',
            'format' => 'totalNumber',
            'length' => 14
        ],
        'DATA_INICIAL' => [
            'type' => 'string',
            'regex' => '^([12]\d{3})(0[1-9]|1[0-2])(0[1-9]|[1-2][0-9]|31(?!(?:0[2469]|11))|30(?!02))$',
            'required' => true,
            'info' => 'Primeiro dia do mês a que se refere o relatório de Vendas ao CPF/CNPJ identificado no campo 02',
            'format' => '',
            'length' => 8
        ],
        'DATA_FINAL' => [
            'type' => 'string',
            'regex' => '^([12]\d{3})(0[1-9]|1[0-2])(0[1-9]|[1-2][0-9]|31(?!(?:0[2469]|11))|30(?!02))$',
            'required' => true,
            'info' => 'Último dia do mês a que se refere o relatório de Vendas ao CPF/CNPJ identificado no campo 02',
            'format' => '',
            'length' => 8
        ],
        'DATA_GERACAO' => [
            'type' => 'string',
            'regex' => '^([12]\d{3})(0[1-9]|1[0-2])(0[1-9]|[1-2][0-9]|31(?!(?:0[2469]|11))|30(?!02))$',
            'required' => true,
            'info' => 'Data que o relatório foi gerado pelo PAF-NFC-e',
            'format' => '',
            'length' => 8
        ],
        'HORA_GERACAO' => [
            'type' => 'string',
            'regex' => '^.{6,6}$',
            'required' => true,
            'info' => 'Hora que o relatório foi gerado pelo PAF-NFC-e',
            'format' => '',
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
