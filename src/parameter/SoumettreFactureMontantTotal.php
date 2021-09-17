<?php

namespace PhpChorusPiste\Parameter;


class SoumettreFactureMontantTotal implements \JsonSerializable {

    /** @var    float */
    private $montantHtTotal;
    /** @var    float */
    private $montantTVA;
    /** @var    float */
    private $montantTtcTotal;
    /** @var    float */
    private $montantRemiseGlobaleTTC;
    /** @var    string */
    private $motifRemiseGlobaleTTC;
    /** @var    float */
    private $montantAPayer;

    /**
     * @param float  $montantHtTotal
     * @param float  $montantTVA
     * @param float  $montantTtcTotal
     * @param float|null  $montantRemiseGlobaleTTC
     * @param string|null $motifRemiseGlobaleTTC
     * @param float  $montantAPayer
     */
    public function __construct(float $montantHtTotal, float $montantTVA, float $montantTtcTotal, float $montantRemiseGlobaleTTC = null, string $motifRemiseGlobaleTTC = null, float $montantAPayer) {
        $this->montantHtTotal          = $montantHtTotal;
        $this->montantTVA              = $montantTVA;
        $this->montantTtcTotal         = $montantTtcTotal;
        $this->montantRemiseGlobaleTTC = $montantRemiseGlobaleTTC;
        $this->motifRemiseGlobaleTTC   = $motifRemiseGlobaleTTC;
        $this->montantAPayer           = $montantAPayer;
    }


    public function jsonSerialize() {
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
