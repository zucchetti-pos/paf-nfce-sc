<?php

namespace PAFNFCe\Elements;

use PAFNFCe\Common\Element;
use PAFNFCe\Common\ElementInterface;
use \stdClass;

class P2 extends Element implements ElementInterface
{
    const REGISTRO = 'P2';

    protected $parameters = [
        'CNPJ' => [
            'type' => 'string',
            'regex' => '^[0-9]{14}$',
            'required' => true,
            'info' => 'CNPJ do estabelecimento usuário do PAF- NFC-e',
            'format' => '',
            'length' => 14
        ],
        'CODIGO' => [
            'type' => 'numeric',
            'regex' => '^\d+(\.\d*)?|\.\d+$',
            'required' => true,
            'info' => 'Código da mercadoria ou serviço cadastrado na tabela a que se refere o Requisito XIII deste Anexo',
            'format' => 'totalNumber',
            'length' => 14
        ],
        'CEST' => [
            'type' => 'string',
            'regex' => '^.{1,7}$',
            'required' => false,
            'info' => 'Código Especificador da Substituição Tributária ',
            'format' => 'empty',
            'length' => 7
        ],
        'NCM' => [
            'type' => 'string',
            'regex' => '^.{1,8}$',
            'required' => false,
            'info' => 'Nomenclatura Comum do Mercosul Sistema Harmonizado',
            'format' => 'empty',
            'length' => 8
        ],
        'DESCRICAO' => [
            'type' => 'string',
            'regex' => '^.{1,50}$',
            'required' => true,
            'info' => 'Descrição da Mercadoria ou serviço cadastrado na tabela a que se refere o Requisito XIII deste Anexo',
            'format' => 'empty',
            'length' => 50
        ],
        'UNIDADE' => [
            'type' => 'string',
            'regex' => '^.{1,6}$',
            'required' => false,
            'info' => 'Unidade de medida cadastrada na tabela a que se refere o Requisito XIII deste Anexo',
            'format' => 'empty',
            'length' => 6
        ],
        'IAT' => [
            'type' => 'string',
            'regex' => '^.{1,1}$',
            'required' => false,
            'info' => 'Indicador de Arredondamento ou Truncamento, conforme Item 6.3.1.3',
            'format' => 'empty',
            'length' => 1
        ],
        'IPPT' => [
            'type' => 'string',
            'regex' => '^.{1,1}$',
            'required' => false,
            'info' => 'Indicador de Produção Própria ou de Terceiro, conforme item 6.3.1.4',
            'format' => 'empty',
            'length' => 1
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
        'VALOR_UNITARIO' => [
            'type' => 'numeric',
            'regex' => '^\d+(\.\d*)?|\.\d+$',
            'required' => true,
            'info' => 'Valor unitário com duas casas decimais',
            'format' => 'totalNumber',
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
