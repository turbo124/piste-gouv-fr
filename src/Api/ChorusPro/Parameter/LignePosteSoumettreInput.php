<?php

namespace PisteGouvFr\Api\ChorusPro\Parameter;


class LignePosteSoumettreInput implements \JsonSerializable {

    /** @var int */
    private int $lignePosteNumero;
    /** @var string */
    private string $lignePosteReference;
    /** @var string */
    private string $lignePosteDenomination;
    /** @var float */
    private float $lignePosteQuantite;
    /** @var string */
    private string $lignePosteUnite;
    /** @var float */
    private float $lignePosteMontantUnitaireHT;
    /** @var float|null */
    private ?float $lignePosteMontantRemiseHT;
    /** @var string|null */
    private ?string $lignePosteTauxTva;
    /** @var float|null */
    private ?float $lignePosteTauxTvaManuel;

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


    public function jsonSerialize(): mixed {
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
