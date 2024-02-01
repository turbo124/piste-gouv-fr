<?php

namespace PisteGouvFr\Api\ChorusPro;

abstract class TechnicalAccountCredential {

    /**
     * Couple compte:motDePass encodée en Base64
     *
     * @var string
     */
    protected string $_cpro_account_base64;

    public function __construct(string $cpro_account_base64) {
        $this->_cpro_account_base64 = $cpro_account_base64;
    }

    /**
     * Retourne la string en base
     *
     * @return string
     */
    public final function __toString(): string {
        return $this->_cpro_account_base64;
    }
}