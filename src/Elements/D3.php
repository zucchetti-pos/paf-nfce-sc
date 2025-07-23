<?php

namespace PAFNFCe\Elements;

use PAFNFCe\Common\Element;
use PAFNFCe\Common\ElementInterface;
use \stdClass;

class D3 extends Element implements ElementInterface
{
    const REGISTRO = 'D3';

    protected $parameters = [
        'NUMERO' => [
            'type' => 'numeric',
            'regex' => '^\d+(\.\d*)?|\.\d+$',
            'required' => true,
            'info' => 'Número do DAV emitido onde está contido o item',
            'format' => 'totalNumber',
            'length' => 13
        ],
        'DATA_INCLUSAO' => [
            'type' => 'string',
            'regex' => '^([12]\d{3})(0[1-9]|1[0-2])(0[1-9]|[1-2][0-9]|31(?!(?:0[2469]|11))|30(?!02))$',
            'required' => true,
            'info' => 'Data de inclusão do item no DAV',
            'format' => '',
            'length' => 8
        ],
        'NUMERO_ITEM' => [
            'type' => 'numeric',
            'regex' => '^\d+(\.\d*)?|\.\d+$',
            'required' => true,
            'info' => 'Número sequencial do item registrado no documento',
            'format' => 'totalNumber',
            'length' => 3
        ],
        'CODIGO_PRODUTO' => [
            'type' => 'numeric',
            'regex' => '^\d+(\.\d*)?|\.\d+$',
            'required' => true,
            'info' => 'Código do produto ou serviço registrado no documento',
            'format' => 'totalNumber',
            'length' => 14
        ],
        'DESCRICAO' => [
            'type' => 'string',
            'regex' => '^.{1,100}$',
            'required' => true,
            'info' => 'Descrição do produto ou serviço constante no DANFE',
            'format' => '',
            'length' => 100
        ],
        'QUANTIDADE' => [
            'type' => 'numeric',
            'regex' => '^\d+(\.\d*)?|\.\d+$',
            'required' => true,
            'info' => 'Quantidade, sem a separação das casas decimais',
            'format' => 'totalNumber',
            'length' => 7
        ],
        'UNIDADE' => [
            'type' => 'string',
            'regex' => '^.{1,3}$',
            'required' => false,
            'info' => 'Unidade de medida cadastrada',
            'format' => 'empty',
            'length' => 3
        ],
        'VALOR_UNITARIO' => [
            'type' => 'numeric',
            'regex' => '^\d+(\.\d*)?|\.\d+$',
            'required' => true,
            'info' => 'Valor unitário do produto ou serviço, sem a separação da casas decimais',
            'format' => 'totalNumber',
            'length' => 14
        ],
        'ST' => [
            'type' => 'string',
            'regex' => '^.{1,1}$',
            'required' => false,
            'info' => 'Código da Situação Tributaria, conforme tabela constante no item 6.3.1.5',
            'format' => 'empty',
            'length' => 1
        ],
        'ALIQUOTA' => [
            'type' => 'numeric',
            'regex' => '^\d+(\.\d*)?|\.\d+$',
            'required' => true,
            'info' => 'Alíquota, conforme Item 6.3.1.6 ',
            'format' => 'aliquota',
            'length' => 4
        ],
        'INDICADOR_CANCELAMENTO' => [
            'type' => 'string',
            'regex' => '^.{1,1}$',
            'required' => true,
            'info' => 'Informar "S" ou "N", conforme tenha ocorrido ou não, a marcação do cancelamento do item no documento auxiliar de venda',
            'format' => '',
            'length' => 1
        ],
        'CASAS_DECIMAIS_QTD' => [
            'type' => 'numeric',
            'regex' => '^\d+(\.\d*)?|\.\d+$',
            'required' => true,
            'info' => 'Parâmetro de número de casas decimais da quantidade',
            'format' => '',
            'length' => 1
        ],
        'CASAS_DECIMAIS_VLR' => [
            'type' => 'numeric',
            'regex' => '^\d+(\.\d*)?|\.\d+$',
            'required' => true,
            'info' => 'Parâmetro de número de casas decimais de valor unitário',
            'format' => '',
            'length' => 1
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
