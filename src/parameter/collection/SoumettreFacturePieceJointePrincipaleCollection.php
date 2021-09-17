<?php

namespace PhpChorusPiste\ParameterCollection;


use PhpChorusPiste\Parameter\SoumettreFacturePieceJointePrincipale;

class SoumettreFacturePieceJointePrincipaleCollection implements \JsonSerializable {

    private $SoumettreFacturePieceJointePrincipale_a = [];

    public function __construct(SoumettreFacturePieceJointePrincipale ...$SoumettreFacturePieceJointePrincipale_a) {
        $this->SoumettreFacturePieceJointePrincipale_a = $SoumettreFacturePieceJointePrincipale_a;
    }


    public function jsonSerialize() {
        return $this->SoumettreFacturePieceJointePrincipale_a;
    }
}
