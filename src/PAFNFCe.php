<?php

namespace PAFNFCe;

use PAFNFCe\Common\BlockInterface;

abstract class PAFNFCe
{
    protected $possibles = [];

    public function add(BlockInterface $block = null)
    {
        if (empty($block)) {
            return;
        }
        $name = strtolower((new \ReflectionClass($block))->getShortName());
        if (key_exists($name, $this->possibles)) {
            $this->{$name} = $block->get();
        }
    }

    public function get()
    {
        $pafNFce = '';
        $keys = array_keys($this->possibles);
        foreach ($keys as $key) {
            if (isset($this->$key)) {
                $pafNFce .= $this->$key;

            }
        }

        return $pafNFce;
    }

    private function generateEAD($pafNFce)
    {
        $md5FileContent = md5($pafNFce);
        $signature = '';
        $new_key_pair = openssl_pkey_new(array(
            "private_key_bits" => 1024,
            "private_key_type" => OPENSSL_KEYTYPE_RSA,
        ));

        openssl_pkey_export($new_key_pair, $private_key_pem);

        $details = openssl_pkey_get_details($new_key_pair);
        $public_key_pem = $details['key'];

        openssl_sign($md5FileContent, $signature, $private_key_pem, OPENSSL_ALGO_SHA1);

        if (openssl_verify($md5FileContent, $signature, $public_key_pem, "RSA-SHA256")) {
            throw new \Exception("Não foi possível assinar o arquivo PAF NFC-e");
        }

        return bin2hex($details['rsa']['n']);
    }
}
