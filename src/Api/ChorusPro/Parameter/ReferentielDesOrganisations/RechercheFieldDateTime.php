<?php

namespace PisteGouvFr\Api\ChorusPro\Parameter\ReferentielDesOrganisations;

class RechercheFieldDateTime extends RechercheField {

    public function __construct( string $operateur, \DateTime $valeur ) {
        parent::__construct( $operateur, $valeur->format('Y-m-d\TH:i:sO') );
    }
}