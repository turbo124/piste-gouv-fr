<?php

namespace PisteGouvFr\Api\ChorusPro\Parameter\ReferentielDesOrganisations;

class RechercheFieldInt extends RechercheField {

    public function __construct( string $operateur, int $valeur ) {
        parent::__construct( $operateur, $valeur );
    }
}