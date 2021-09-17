<?php

namespace PhpChorusPiste\ParameterCollection;


use PhpChorusPiste\Parameter\LigneTvaSoumettreInput;

class LigneTvaSoumettreInputCollection implements \JsonSerializable {

    private $LigneTvaSoumettreInput_a = [];

    public function __construct(LigneTvaSoumettreInput ...$LigneTvaSoumettreInput_a) {
        $this->LigneTvaSoumettreInput_a = $LigneTvaSoumettreInput_a;
    }


    public function jsonSerialize() {
        return $this->LigneTvaSoumettreInput_a;
    }
}
