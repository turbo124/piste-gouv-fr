<?php

namespace PisteGouvFr\Api\ChorusPro\Parameter\Collection;


use PisteGouvFr\Api\ChorusPro\Parameter\PieceJointeComplentaireSoumettreInput;

class PieceJointeComplentaireSoumettreInputCollection implements \JsonSerializable {

    private array $PieceJointeComplentaireSoumettreInput_a;

    public function __construct(PieceJointeComplentaireSoumettreInput ...$PieceJointeComplentaireSoumettreInput_a) {
        $this->PieceJointeComplentaireSoumettreInput_a = $PieceJointeComplentaireSoumettreInput_a;
    }


    public function jsonSerialize():mixed {
        return $this->PieceJointeComplentaireSoumettreInput_a;
    }
}
