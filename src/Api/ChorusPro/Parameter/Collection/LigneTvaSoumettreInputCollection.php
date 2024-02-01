<?php

namespace PisteGouvFr\Api\ChorusPro\Parameter\Collection;


use PisteGouvFr\Api\ChorusPro\Parameter\LigneTvaSoumettreInput;

class LigneTvaSoumettreInputCollection implements \JsonSerializable {

    private array $LigneTvaSoumettreInput_a;

    public function __construct(LigneTvaSoumettreInput ...$LigneTvaSoumettreInput_a) {
        $this->LigneTvaSoumettreInput_a = $LigneTvaSoumettreInput_a;
    }


    public function jsonSerialize() :mixed {
        return $this->LigneTvaSoumettreInput_a;
    }
}
