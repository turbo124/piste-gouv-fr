<?php

namespace PisteGouvFr\Api\ChorusPro\Parameter;


class RechercherStructureInput implements \JsonSerializable {

    /** @var    null|string */
    private ?string $raisonSocialeStructure;
    /** @var    null|string */
    private ?string $identifiantStructure;
    /** @var    null|string|\PisteGouvFr\Api\ChorusPro\Type\ITypeIdentifiantStructure */
    private string|null $typeIdentifiantStructure;
    /** @var    null|string */
    private ?string $libelleStructure;
    /** @var    null|string */
    private ?string $nomStructure;
    /** @var    null|string */
    private ?string $prenomStructure;
    /** @var    null|string */
    private ?string $adresseCodePostal;
    /** @var    null|string */
    private ?string $adresseVille;
    /** @var    null|string */
    private ?string $adresseCodePays;
    /** @var    null|string|\PisteGouvFr\Api\ChorusPro\Type\IStatutStructure */
    private string|null $typeStructure;
    /** @var    null|string|\PisteGouvFr\Api\ChorusPro\Type\IStatutStructure */
    private string|null $statutStructure;
    /** @var    null|bool */
    private ?bool $estMOA;
    /** @var    null|bool */
    private ?bool $estMOAUniquement;

    /**
     * @param string                                                           $raisonSocialeStructure
     * @param string                                                           $identifiantStructure
     * @param \PisteGouvFr\Api\ChorusPro\Type\ITypeIdentifiantStructure|string $typeIdentifiantStructure
     * @param string                                                           $libelleStructure
     * @param string                                                           $nomStructure
     * @param string                                                           $prenomStructure
     * @param string                                                           $adresseCodePostal
     * @param string                                                           $adresseVille
     * @param string                                                           $adresseCodePays
     * @param \PisteGouvFr\Api\ChorusPro\Type\IStatutStructure|string          $typeStructure
     * @param \PisteGouvFr\Api\ChorusPro\Type\IStatutStructure|string          $statutStructure
     * @param bool                                                             $estMOA
     * @param bool                                                             $estMOAUniquement
     */
    public function __construct( string $raisonSocialeStructure = null, string $identifiantStructure = null, $typeIdentifiantStructure = null, string $libelleStructure = null, string $nomStructure = null, string $prenomStructure = null, string $adresseCodePostal = null, string $adresseVille = null, string $adresseCodePays = null, $typeStructure = null, $statutStructure = null, bool $estMOA = null, bool $estMOAUniquement = null ) {
        $this->raisonSocialeStructure   = $raisonSocialeStructure;
        $this->identifiantStructure     = $identifiantStructure;
        $this->typeIdentifiantStructure = $typeIdentifiantStructure;
        $this->libelleStructure         = $libelleStructure;
        $this->nomStructure             = $nomStructure;
        $this->prenomStructure          = $prenomStructure;
        $this->adresseCodePostal        = $adresseCodePostal;
        $this->adresseVille             = $adresseVille;
        $this->adresseCodePays          = $adresseCodePays;
        $this->typeStructure            = $typeStructure;
        $this->statutStructure          = $statutStructure;
        $this->estMOA                   = $estMOA;
        $this->estMOAUniquement         = $estMOAUniquement;
    }


    public function jsonSerialize(): mixed {
        return array_filter( [
                                 'raisonSocialeStructure'   => $this->raisonSocialeStructure,
                                 'identifiantStructure'     => $this->identifiantStructure,
                                 'typeIdentifiantStructure' => $this->typeIdentifiantStructure,
                                 'libelleStructure'         => $this->libelleStructure,
                                 'nomStructure'             => $this->nomStructure,
                                 'prenomStructure'          => $this->prenomStructure,
                                 'adresseCodePostal'        => $this->adresseCodePostal,
                                 'adresseVille'             => $this->adresseVille,
                                 'adresseCodePays'          => $this->adresseCodePays,
                                 'typeStructure'            => $this->typeStructure,
                                 'statutStructure'          => $this->statutStructure,
                                 'estMOA'                   => $this->estMOA,
                                 'estMOAUniquement'         => $this->estMOAUniquement,
                             ], function ( $v ) { return !is_null( $v ); } );
    }
}
