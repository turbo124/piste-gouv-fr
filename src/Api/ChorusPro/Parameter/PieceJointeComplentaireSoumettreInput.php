<?php

namespace PisteGouvFr\Api\ChorusPro\Parameter;


class PieceJointeComplentaireSoumettreInput implements \JsonSerializable {

    /** @var    string */
    private string $pieceJointeComplementaireDesignation;
    /** @var    string */
    private string $pieceJointeComplementaireType;
    /** @var    int */
    private int $pieceJointeComplementaireNumeroLigneFacture;
    /** @var    int */
    private int $pieceJointeComplementaireId;
    /** @var    int */
    private int $pieceJointeComplementaireIdLiaison;

    /**
     * @param string $pieceJointeComplementaireDesignation
     * @param string $pieceJointeComplementaireType
     * @param int    $pieceJointeComplementaireNumeroLigneFacture
     * @param int    $pieceJointeComplementaireId
     * @param int    $pieceJointeComplementaireIdLiaison
     */
    public function __construct(string $pieceJointeComplementaireDesignation, string $pieceJointeComplementaireType, int $pieceJointeComplementaireNumeroLigneFacture, int $pieceJointeComplementaireId, int $pieceJointeComplementaireIdLiaison) {
        $this->pieceJointeComplementaireDesignation        = $pieceJointeComplementaireDesignation;
        $this->pieceJointeComplementaireType               = $pieceJointeComplementaireType;
        $this->pieceJointeComplementaireNumeroLigneFacture = $pieceJointeComplementaireNumeroLigneFacture;
        $this->pieceJointeComplementaireId                 = $pieceJointeComplementaireId;
        $this->pieceJointeComplementaireIdLiaison          = $pieceJointeComplementaireIdLiaison;
    }


    public function jsonSerialize(): mixed {
        return [
            'pieceJointeComplementaireDesignation'        => $this->pieceJointeComplementaireDesignation,
            'pieceJointeComplementaireType'               => $this->pieceJointeComplementaireType,
            'pieceJointeComplementaireNumeroLigneFacture' => $this->pieceJointeComplementaireNumeroLigneFacture,
            'pieceJointeComplementaireId'                 => $this->pieceJointeComplementaireId,
            'pieceJointeComplementaireIdLiaison'          => $this->pieceJointeComplementaireIdLiaison,
        ];
    }
}
