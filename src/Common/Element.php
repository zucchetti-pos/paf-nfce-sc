<?php

namespace PAFNFCe\Common;

use \stdClass;
use NFePHP\Common\Strings;
use PAFNFCe\Common\ElementInterface;
use Exception;

abstract class Element implements ElementInterface
{
    public $std;
    public $values;
    protected $parameters;
    private $reg;


    public function __construct($reg)
    {
        $this->reg = $reg;
        $this->values = new stdClass();
    }

    public function postValidation()
    {
        return true;
    }

    protected function standarize(\stdClass $std)
    {
        if (empty($this->parameters)) {
            throw new Exception('Parâmetros não estabelecidos na classe');
        }
        $errors = [];
        $arr = array_change_key_case(get_object_vars($std), CASE_LOWER);
        $std = json_decode(json_encode($arr));
        $stdParam = json_decode(json_encode($this->parameters));
        $this->parameters = array_change_key_case(get_object_vars($stdParam), CASE_LOWER);
        $paramKeys = array_keys($this->parameters);
        if (!$json = json_encode($this->parameters)) {
            throw new \RuntimeException("Falta definir os parametros ou existe erro no array");
        }
        $stdParam = json_decode($json);
        if ($stdParam === null) {
            throw new \RuntimeException("Houve uma falha na conversão para stdClass");
        }
        foreach ($std as $key => $value) {
            if (!isset($stdParam->$key)) {
                continue;
            }
            if ($stdParam->$key->required && $std->$key === null) {
                $errors[] = "$key é requerido.";
            }
        }
        $newstd = new \stdClass();
        foreach ($paramKeys as $key) {
            if (!key_exists($key, $arr)) {
                $newstd->$key = null;
            } else {
                if ($std->$key === null) {
                    $newstd->$key = null;
                    continue;
                }

                $resp = $this->isFieldInError(
                    $std->$key,
                    $stdParam->$key,
                    strtoupper($key),
                    $this->reg,
                    $stdParam->$key->required
                );
                if ($resp) {
                    $errors[] = $resp;
                }

                $formated = $this->formater(
                    $std->$key,
                    $stdParam->$key->format,
                    strtoupper($key),
                    $stdParam->$key->length
                );

                $newValue = $this->formatString(
                    $formated,
                    $stdParam->$key
                );

                $newstd->$key = $newValue;
            }
        }
        if (!empty($errors)) {
            throw new \InvalidArgumentException(implode("\n", $errors));
        }
        return $newstd;
    }

    protected function isFieldInError($input, $param, $fieldname, $element, $required)
    {
        $type = $param->type;
        $regex = $param->regex;
        if (empty($regex)) {
            return false;
        }
        if (($input === null || $input === '') && !$required) {
            return false;
        }
        switch ($type) {
            case 'integer':
                if (!is_numeric($input)) {
                    return "[$this->reg] $element campo: $fieldname deve ser um valor numérico inteiro.";
                }
                break;
            case 'numeric':
                if (!is_numeric($input)) {
                    return "[$this->reg] $element campo: $fieldname deve ser um número.";
                }
                break;
            case 'string':
                if (!is_string($input)) {
                    return "[$this->reg] $element campo: $fieldname deve ser uma string.";
                }
                break;
        }
        $input = (string) $input;
        if ($regex === 'email') {
            if (!filter_var($input, FILTER_VALIDATE_EMAIL)) {
                return "[$this->reg] $element campo: $fieldname Esse email [$input] está incorreto.";
            }
            return false;
        }
        if (!preg_match("/$regex/", $input)) {
            return "[$this->reg] $element campo: $fieldname valor incorreto [$input]. (validação: $regex)";
        }
        return false;
    }

    protected function formater($value, $format, $fieldname, $length)
    {
        if ($value === null) {
            return $value;
        }
        if (!is_numeric($value)) {
            $value = Strings::toASCII($value);
        }
        if (empty($format)) {
            return $value;
        }

        $name = strtolower($fieldname);
        if ($value === '' && $format !== 'empty') {
            $value = 0;
        }

        if ($format == 'totalNumber') {
            return $this->numberTotalFormat(floatval($value), $length);
        }

        if ($format == 'aliquota') {
            return $this->numberFormatAliquota($value, $length);
        }

        if ($format == 'empty') {
            return $this->formatFieldEmpty($value, $length);
        }

        $this->values->$name = (float) $value;
        return $this->numberFormat(floatval($value), $format, $fieldname);
    }

    private function numberFormat($value, $format, $fieldname)
    {
        $n = explode('v', $format);
        $mdec = strpos($n[1], '-');
        $p = explode('.', "{$value}");
        $ndec = !empty($p[1]) ? strlen($p[1]) : 0;
        $nint = strlen($p[0]);
        $intdig = (int) $n[0];
        if ($nint > $intdig) {
            throw new \InvalidArgumentException("[$this->reg] O [$fieldname] é maior "
                . "que o permitido [$format].");
        }
        if ($mdec !== false) {
            $mm = explode('-', $n[1]);
            $decmin = (int) $mm[0];
            $decmax = (int) $mm[1];

            if ($ndec >= $decmin && $ndec <= $decmax) {
                return number_format($value, $ndec, ',', '');
            }

            if ($ndec < $decmin) {
                return number_format($value, $decmin, ',', '');
            }

            if ($ndec > $decmax) {
                return number_format($value, $decmax, ',', '');
            }
        }
        $decplaces = (int) $n[1];
        return number_format($value, $decplaces, ',', '');
    }

    private function numberTotalFormat($value, $length)
    {
        return str_pad($value, $length, "0", STR_PAD_LEFT);
    }

    private function numberFormatAliquota($value, $length)
    {
        return str_pad($value, $length, "0", STR_PAD_LEFT);
    }

    private function formatFieldEmpty($value, $length)
    {
        return str_pad($value, $length, " ", STR_PAD_RIGHT);
    }

    protected function formatString($value, $param)
    {
        $length = $param->length;

        if (!$value) {
            return;
        }
        $newValue = str_pad($value, $length, " ", STR_PAD_RIGHT);

        return $newValue;
    }

    protected function build()
    {
        $register = '';
        foreach ($this->parameters as $key => $params) {
            $register .= $this->std->$key;
        }
        return $register;
    }

    public function __toString()
    {
        return  $this->reg . $this->build();
    }
}
