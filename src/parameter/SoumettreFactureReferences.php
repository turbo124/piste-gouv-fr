<?php

namespace PhpChorusPiste\Parameter;


class SoumettreFactureReferences implements \JsonSerializable {

    /** @var string */
    private $deviseFacture;
    /**
     * @var string
     * @see ITypeFacture
     */
    private $typeFacture;
    /**
     * @var string
     * @see ITypeTva
     */
    private $typeTva;
    /** @var string */
    private $motifExonerationTva;
    /** @var string */
    private $numeroMarche;
    /** @var string */
    private $numeroBonCommande;
    /** @var string */
    private $numeroFactureOrigine;
    /**
     * @var string
     * @see \PhpChorusPiste\IModePaiement
     */
    private $modePaiement;

    /**
     * @param string                               $deviseFacture
     * @param string|\PhpChorusPiste\ITypeFacture  $typeFacture
     * @param string|\PhpChorusPiste\ITypeTva      $typeTva
     * @param string|null                          $motifExonerationTva
     * @param string                               $numeroMarche
     * @param string|null                          $numeroBonCommande
     * @param string|null                          $numeroFactureOrigine
     * @param string|\PhpChorusPiste\IModePaiement $modePaiement
     */
    public function __construct(string $deviseFacture, string $typeFacture, string $typeTva, string $motifExonerationTva = null, string $numeroMarche, string $numeroBonCommande = null, string $numeroFactureOrigine = null, string $modePaiement) {
        $this->deviseFacture        = $deviseFacture;
        $this->typeFacture          = $typeFacture;
        $this->typeTva              = $typeTva;
        $this->motifExonerationTva  = $motifExonerationTva;
        $this->numeroMarche         = $numeroMarche;
        $this->numeroBonCommande    = $numeroBonCommande;
        $this->numeroFactureOrigine = $numeroFactureOrigine;
        $this->modePaiement         = $modePaiement;
    }


    public function jsonSerialize() {
        return [
            'deviseFacture'        => $this->deviseFacture,
            'typeFacture'          => $this->typeFacture,
            'typeTva'              => $this->typeTva,
            'motifExonerationTva'  => $this->motifExonerationTva,
            'numeroMarche'         => $this->numeroMarche,
            'numeroBonCommande'    => $this->numeroBonCommande,
            'numeroFactureOrigine' => $this->numeroFactureOrigine,
            'modePaiement'         => $this->modePaiement,
        ];
    }
}
