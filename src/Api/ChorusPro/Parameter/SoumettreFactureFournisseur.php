<?php

namespace PisteGouvFr\Api\ChorusPro\Parameter;


class SoumettreFactureFournisseur implements \JsonSerializable {

    /** @var int */
    private int $idFournisseur;
    /** @var int */
    private int $idServiceFournisseur;
    /** @var int */
    private int $codeCoordonneesBancairesFournisseur;

    /**
     * @param int $idFournisseur
     * @param int $idServiceFournisseur
     * @param int $codeCoordonneesBancairesFournisseur
     */
    public function __construct(int $idFournisseur, int $idServiceFournisseur, int $codeCoordonneesBancairesFournisseur) {
        $this->idFournisseur                       = $idFournisseur;
        $this->idServiceFournisseur                = $idServiceFournisseur;
        $this->codeCoordonneesBancairesFournisseur = $codeCoordonneesBancairesFournisseur;
    }


    public function jsonSerialize(): mixed {
        return [
            'idFournisseur'                       => $this->idFournisseur,
            'idServiceFournisseur'                => $this->idServiceFournisseur,
            'codeCoordonneesBancairesFournisseur' => $this->codeCoordonneesBancairesFournisseur,
        ];
    }
}
