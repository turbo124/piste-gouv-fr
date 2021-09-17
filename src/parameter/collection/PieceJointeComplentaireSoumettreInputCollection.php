<?php

namespace PhpChorusPiste\ParameterCollection;


use PhpChorusPiste\Parameter\PieceJointeComplentaireSoumettreInput;

class PieceJointeComplentaireSoumettreInputCollection implements \JsonSerializable {

    private $PieceJointeComplentaireSoumettreInput_a = [];

    public function __construct(PieceJointeComplentaireSoumettreInput ...$PieceJointeComplentaireSoumettreInput_a) {
        $this->PieceJointeComplentaireSoumettreInput_a = $PieceJointeComplentaireSoumettreInput_a;
    }


    public function jsonSerialize() {
        return $this->PieceJointeComplentaireSoumettreInput_a;
    }
}
