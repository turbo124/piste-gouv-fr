<?php

namespace PisteGouvFr\Api\ChorusPro\Parameter\Collection;


use PisteGouvFr\Api\ChorusPro\Parameter\LigneTvaSoumettreInput;

class LigneTvaSoumettreInputCollection implements \JsonSerializable {

    private $LigneTvaSoumettreInput_a;

    public function __construct(LigneTvaSoumettreInput ...$LigneTvaSoumettreInput_a) {
        $this->LigneTvaSoumettreInput_a = $LigneTvaSoumettreInput_a;
    }


    public function jsonSerialize() {
        return $this->LigneTvaSoumettreInput_a;
    }
}
