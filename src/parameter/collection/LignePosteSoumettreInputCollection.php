<?php

namespace PhpChorusPiste\ParameterCollection;


use PhpChorusPiste\Parameter\LignePosteSoumettreInput;

class LignePosteSoumettreInputCollection implements \JsonSerializable {

    private $LignePosteSoumettreInput_a = [];

    public function __construct(LignePosteSoumettreInput ...$LignePosteSoumettreInput_a) {
        $this->LignePosteSoumettreInput_a = $LignePosteSoumettreInput_a;
    }


    public function jsonSerialize() {
        return $this->LignePosteSoumettreInput_a;
    }
}
