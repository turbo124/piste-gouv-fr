<?php

namespace PisteGouvFr\Api\ChorusPro\Parameter;


class SoumettreFacturePieceJointePrincipale implements \JsonSerializable {

    /** @var    string */
    private string $pieceJointePrincipaleDesignation;
    /** @var    int */
    private int $pieceJointePrincipaleId;

    /**
     * @param string $pieceJointePrincipaleDesignation
     * @param int    $pieceJointePrincipaleId
     */
    public function __construct(string $pieceJointePrincipaleDesignation, int $pieceJointePrincipaleId) {
        $this->pieceJointePrincipaleDesignation = $pieceJointePrincipaleDesignation;
        $this->pieceJointePrincipaleId          = $pieceJointePrincipaleId;
    }


    public function jsonSerialize(): mixed {
        return [
            'pieceJointePrincipaleDesignation' => $this->pieceJointePrincipaleDesignation,
            'pieceJointePrincipaleId'          => $this->pieceJointePrincipaleId,
        ];
    }
}
