<?php

namespace PisteGouvFr\Api\ChorusPro\Parameter;


class SoumettreFactureCadreDeFacturation implements \JsonSerializable {

    /** @var string */
    private string $codeCadreFacturation;
    /** @var string|null */
    private ?string $codeStructureValideur;
    /** @var string|null */
    private ?string $codeServiceValideur;

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

    public function jsonSerialize(): mixed {
        return [
            'codeCadreFacturation'  => $this->codeCadreFacturation,
            'codeStructureValideur' => $this->codeStructureValideur,
            'codeServiceValideur'   => $this->codeServiceValideur,
        ];
    }


}
