<?php

namespace PhpChorusPiste\Parameter;


class SoumettreFactureDestinataire implements \JsonSerializable {

    /** @var string  */
    private $codeDestinataire;
    /** @var string  */
    private $codeServiceExecutant;

    /**
     * @param string $codeDestinataire
     * @param string $codeServiceExecutant
     */
    public function __construct(string $codeDestinataire, string $codeServiceExecutant) {
        $this->codeDestinataire     = $codeDestinataire;
        $this->codeServiceExecutant = $codeServiceExecutant;
    }


    public function jsonSerialize() {
        return [
            'codeDestinataire'     => $this->codeDestinataire,
            'codeServiceExecutant' => $this->codeServiceExecutant,
        ];
    }
}
