<?php

namespace PisteGouvFr\Api\ChorusPro\Parameter\Collection;


use PisteGouvFr\Api\ChorusPro\Parameter\SoumettreFacturePieceJointePrincipale;

class SoumettreFacturePieceJointePrincipaleCollection implements \JsonSerializable {

    private array $SoumettreFacturePieceJointePrincipale_a;

    public function __construct(SoumettreFacturePieceJointePrincipale ...$SoumettreFacturePieceJointePrincipale_a) {
        $this->SoumettreFacturePieceJointePrincipale_a = $SoumettreFacturePieceJointePrincipale_a;
    }


    public function jsonSerialize():mixed {
        return $this->SoumettreFacturePieceJointePrincipale_a;
    }
}
