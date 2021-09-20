<?php

namespace PhpChorusPiste\Parameter;


use PhpChorusPiste\PisteException;

class LignePosteSoumettreInput implements \JsonSerializable {

    /** @var int */
    private $lignePosteNumero;
    /** @var string */
    private $lignePosteReference;
    /** @var string */
    private $lignePosteDenomination;
    /** @var float */
    private $lignePosteQuantite;
    /** @var string */
    private $lignePosteUnite;
    /** @var float */
    private $lignePosteMontantUnitaireHT;
    /** @var float */
    private $lignePosteMontantRemiseHT;
    /** @var string */
    private $lignePosteTauxTva;
    /** @var float */
    private $lignePosteTauxTvaManuel;

    /**
     * @param int    $lignePosteNumero
     * @param string $lignePosteReference
     * @param string $lignePosteDenomination
     * @param float  $lignePosteQuantite
     * @param string $lignePosteUnite
     * @param float  $lignePosteMontantUnitaireHT
     * @param float|null  $lignePosteMontantRemiseHT
     * @param string|null $lignePosteTauxTva
     * @param float|null  $lignePosteTauxTvaManuel
     */
    public function __construct(int $lignePosteNumero, string $lignePosteReference, string $lignePosteDenomination, float $lignePosteQuantite, string $lignePosteUnite, float $lignePosteMontantUnitaireHT, float $lignePosteMontantRemiseHT = null, string $lignePosteTauxTva = null, float $lignePosteTauxTvaManuel = null) {
        $this->lignePosteNumero            = $lignePosteNumero;
        $this->lignePosteReference         = $lignePosteReference;
        $this->lignePosteDenomination      = $lignePosteDenomination;
        $this->lignePosteQuantite          = $lignePosteQuantite;
        $this->lignePosteUnite             = $lignePosteUnite;
        $this->lignePosteMontantUnitaireHT = $lignePosteMontantUnitaireHT;
        $this->lignePosteMontantRemiseHT   = $lignePosteMontantRemiseHT;
        $this->lignePosteTauxTva           = $lignePosteTauxTva;
        $this->lignePosteTauxTvaManuel     = $lignePosteTauxTvaManuel;
    }


    public function jsonSerialize() {
        return [
            'lignePosteNumero'            => $this->lignePosteNumero,
            'lignePosteReference'         => $this->lignePosteReference,
            'lignePosteDenomination'      => $this->lignePosteDenomination,
            'lignePosteQuantite'          => $this->lignePosteQuantite,
            'lignePosteUnite'             => $this->lignePosteUnite,
            'lignePosteMontantUnitaireHT' => $this->lignePosteMontantUnitaireHT,
            'lignePosteMontantRemiseHT'   => $this->lignePosteMontantRemiseHT,
            'lignePosteTauxTva'           => $this->lignePosteTauxTva,
            'lignePosteTauxTvaManuel'     => $this->lignePosteTauxTvaManuel,
        ];
    }
}
