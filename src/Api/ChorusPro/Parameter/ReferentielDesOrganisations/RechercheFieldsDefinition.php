<?php

namespace PisteGouvFr\Api\ChorusPro\Parameter\ReferentielDesOrganisations;

class RechercheFieldsDefinition {

    protected array $_RechercheField_a = [];

    public function addDef( string $field, ?string $recherche_field_class = null ): static {
        $this->_RechercheField_a[ $field ] = $recherche_field_class;
        return $this;
    }

    public function classOf( string $field ): ?string {
        return array_key_exists( $field, $this->_RechercheField_a ) ? $this->_RechercheField_a[ $field ] : null;
    }

    public function fields() {
        return array_keys( $this->_RechercheField_a );
    }
}