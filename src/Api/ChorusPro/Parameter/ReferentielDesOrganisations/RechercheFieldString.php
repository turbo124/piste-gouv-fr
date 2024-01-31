<?php

namespace PisteGouvFr\Api\ChorusPro\Parameter\ReferentielDesOrganisations;

class RechercheFieldString extends RechercheField {

    public function __construct( string $operateur, string $valeur ) {
        parent::__construct( $operateur, $valeur );
    }
}