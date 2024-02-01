<?php

namespace PisteGouvFr\Api\ChorusPro\Parameter\ReferentielDesOrganisations;

class RechercheFieldBoolean extends RechercheField {

    public function __construct( string $operateur, bool $valeur ) {
        parent::__construct( $operateur, $valeur );
    }
}