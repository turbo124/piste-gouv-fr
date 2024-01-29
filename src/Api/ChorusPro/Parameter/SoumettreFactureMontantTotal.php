<?php

namespace PisteGouvFr\Api\ChorusPro\Parameter;


class SoumettreFactureMontantTotal implements \JsonSerializable {

    /** @var    float */
    private float $montantHtTotal;
    /** @var    float */
    private float $montantTVA;
    /** @var    float */
    private float $montantTtcTotal;
    /** @var    float|null */
    private ?float $montantRemiseGlobaleTTC;
    /** @var    string|null */
    private ?string $motifRemiseGlobaleTTC;
    /** @var    float */
    private float $montantAPayer;

    /**
     * @param float       $montantHtTotal
     * @param float       $montantTVA
     * @param float       $montantTtcTotal
     * @param float|null  $montantRemiseGlobaleTTC
     * @param string|null $motifRemiseGlobaleTTC
     * @param float       $montantAPayer
     */
    public function __construct( float $montantHtTotal, float $montantTVA, float $montantTtcTotal, float $montantRemiseGlobaleTTC = null, string $motifRemiseGlobaleTTC = null, float $montantAPayer ) {
        $this->montantHtTotal          = $montantHtTotal;
        $this->montantTVA              = $montantTVA;
        $this->montantTtcTotal         = $montantTtcTotal;
        $this->montantRemiseGlobaleTTC = $montantRemiseGlobaleTTC;
        $this->motifRemiseGlobaleTTC   = $motifRemiseGlobaleTTC;
        $this->montantAPayer           = $montantAPayer;
    }


    public function jsonSerialize(): mixed {
        return [
            'montantHtTotal'          => $this->montantHtTotal,
            'montantTVA'              => $this->montantTVA,
            'montantTtcTotal'         => $this->montantTtcTotal,
            'montantRemiseGlobaleTTC' => $this->montantRemiseGlobaleTTC,
            'motifRemiseGlobaleTTC'   => $this->motifRemiseGlobaleTTC,
            'montantAPayer'           => $this->montantAPayer,
        ];
    }
}
