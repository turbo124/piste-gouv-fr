<?php

namespace PisteGouvFr\Api\ChorusPro\Parameter;


class SoumettreFactureCadreDeFacturation implements \JsonSerializable {

    /** @var string */
    private $codeCadreFacturation;
    /** @var string */
    private $codeStructureValideur;
    /** @var string */
    private $codeServiceValideur;

    /**
     * @param string $codeCadreFacturation @see ICodeCadreFacturation
     * @param string|null $codeStructureValideur
     * @param string|null $codeServiceValideur
     */
    public function __construct(string $codeCadreFacturation, string $codeStructureValideur = null, string $codeServiceValideur = null) {
        $this->codeCadreFacturation  = $codeCadreFacturation;
        $this->codeStructureValideur = $codeStructureValideur;
        $this->codeServiceValideur   = $codeServiceValideur;
    }

    public function jsonSerialize(): array {
        return [
            'codeCadreFacturation'  => $this->codeCadreFacturation,
            'codeStructureValideur' => $this->codeStructureValideur,
            'codeServiceValideur'   => $this->codeServiceValideur,
        ];
    }


}
