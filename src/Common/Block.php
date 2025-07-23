<?php
namespace PAFNFCe\Common;

use PAFNFCe\Common\BlockInterface;

abstract class Block implements BlockInterface
{
    public $elements = [];
    protected $bloco = '';
    protected $elementTotal;

    public function __call($name, $arguments)
    {
        $name = str_replace('-', '', strtolower($name));
        $realname = $name;
        if (!array_key_exists($realname, $this->elements)) {
            throw new \Exception("Não encontrada referencia ao método $name.");
        }
        $className = $this->elements[$realname]['class'];
        if (empty($arguments[0])) {
            throw new \Exception("Sem dados passados para o método [$name].");
        }

        $elclass = new $className($arguments[0]);

        $this->bloco .= "{$elclass}\n";
    }

    public function get()
    {
        return $this->bloco;
    }
}
