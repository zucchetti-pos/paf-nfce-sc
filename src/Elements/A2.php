<?php

namespace PAFNFCe\Elements;

use PAFNFCe\Common\Element;
use PAFNFCe\Common\ElementInterface;
use \stdClass;

class A2 extends Element implements ElementInterface
{
    const REGISTRO = 'A2';

    protected $parameters = [
        'DATA' => [
            'type' => 'string',
            'regex' => '^([12]\d{3})(0[1-9]|1[0-2])(0[1-9]|[1-2][0-9]|31(?!(?:0[2469]|11))|30(?!02))$',
            'required' => true,
            'info' => 'Data do movimento',
            'format' => '',
            'length' => 8
        ],
        'MEIO_PAGAMENTO' => [
            'type' => 'string',
            'regex' => '^.{1,25}$',
            'required' => true,
            'info' => 'Meio de pagamento registrado nos documentos emitidos (Dinheiro, Cheque, Cartão de Crédito, Cartão, etc)',
            'format' => '',
            'length' => 25
        ],
        'CODIGO_DOCUMENTO' => [
            'type' => 'string',
            'regex' => '^.{1,1}$',
            'required' => true,
            'info' => 'Código do tipo, com as seguintes opções: 1-NFC-e 2-NF-e 3-Operação não tributável, identificando o CPF ou CNPJ do cliente.',
            'format' => 'empty',
            'length' => 1
        ],
        'VALOR' => [
            'type' => 'numeric',
            'regex' => '^\d+(\.\d*)?|\.\d+$',
            'required' => true,
            'info' => 'Valor total, com duas casas decimais, do dia informado no campo 02 correspondente ao meio de pagamento informado no campo 03 e ao tipo de Documento informado no campo 04',
            'format' => 'totalNumber',
            'length' => 12
        ],
        'CNPJ' => [
            'type' => 'string',
            'regex' => '^[A-Z0-9]{11,14}$',
            'required' => false,
            'info' => 'CNPJ do cliente da NFCe.',
            'format' => 'totalNumber',
            'length' => 14
        ],
        'NUMERO_DOCUMENTO' => [
            'type' => 'numeric',
            'regex' => '^\d+(\.\d*)?|\.\d+$',
            'required' => false,
            'info' => 'Nº do Documento emitido quando da realização da operação não tributável, código tipo “3”, se for o caso',
            'format' => 'totalNumber',
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
