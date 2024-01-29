<?php

namespace PisteGouvFr\Api\ChorusPro\Parameter;


use PisteGouvFr\Api\ChorusPro\Type\ITypeFacture;
use PisteGouvFr\Api\ChorusPro\Type\ITypeIdentifiantStructure;

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
     * @see ITypeIdentifiantStructure
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
     * @see \PisteGouvFr\Api\ChorusPro\Type\IModePaiement
     */
    private $modePaiement;

    /**
     * @param string                                               $deviseFacture
     * @param string|\PisteGouvFr\Api\ChorusPro\Type\ITypeFacture  $typeFacture
     * @param string|\PisteGouvFr\Api\ChorusPro\Type\ITypeTva      $typeTva
     * @param string|null                                          $motifExonerationTva
     * @param string                                               $numeroMarche
     * @param string|null                                          $numeroBonCommande
     * @param string|null                                          $numeroFactureOrigine
     * @param string|\PisteGouvFr\Api\ChorusPro\Type\IModePaiement $modePaiement
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


    public function jsonSerialize(): mixed {
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
