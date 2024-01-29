<?php

namespace PisteGouvFr\Api\ChorusPro\Parameter;


class LigneTvaSoumettreInput implements \JsonSerializable {

    /** @var    string|null */
    private ?string $ligneTvaTaux;
    /** @var    float */
    private float $ligneTvaMontantBaseHtParTaux;
    /** @var    float */
    private float $ligneTvaMontantTvaParTaux;
    /** @var    float|null */
    private ?float $ligneTvaTauxManuel;

    /**
     * @param string|null $ligneTvaTaux
     * @param float       $ligneTvaMontantBaseHtParTaux
     * @param float       $ligneTvaMontantTvaParTaux
     * @param float|null  $ligneTvaTauxManuel
     */
    public function __construct( string $ligneTvaTaux = null, float $ligneTvaMontantBaseHtParTaux, float $ligneTvaMontantTvaParTaux, float $ligneTvaTauxManuel = null ) {
        $this->ligneTvaTaux                 = $ligneTvaTaux;
        $this->ligneTvaMontantBaseHtParTaux = $ligneTvaMontantBaseHtParTaux;
        $this->ligneTvaMontantTvaParTaux    = $ligneTvaMontantTvaParTaux;
        $this->ligneTvaTauxManuel           = $ligneTvaTauxManuel;
    }


    public function jsonSerialize(): mixed {
        return [
            'ligneTvaTaux'                 => $this->ligneTvaTaux,
            'ligneTvaMontantBaseHtParTaux' => $this->ligneTvaMontantBaseHtParTaux,
            'ligneTvaMontantTvaParTaux'    => $this->ligneTvaMontantTvaParTaux,
            'ligneTvaTauxManuel'           => $this->ligneTvaTauxManuel,
        ];
    }
}
