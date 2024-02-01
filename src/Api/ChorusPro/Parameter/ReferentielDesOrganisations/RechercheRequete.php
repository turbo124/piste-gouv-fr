<?php

namespace PisteGouvFr\Api\ChorusPro\Parameter\ReferentielDesOrganisations;

abstract class RechercheRequete implements \JsonSerializable {

    protected ?RechercheFieldString $categorieEntreprise;


    protected array $_filters = [];
    protected array $_sorts   = [];
    protected array $_descs   = [];
    protected array $_fields  = [];

    public final function jsonSerialize() {
        return array_merge( $this->_filters, [ '_sort'   => $this->_sorts,
                                               '_desc'   => $this->_descs,
                                               '_fields' => $this->_fields ] );
    }

    private function addFilter( string $field, RechercheField $RechercheField ): void {
        $this->_filters[ $field ] = $RechercheField;
    }

    abstract protected static function rechercheFieldsDefinition(): RechercheFieldsDefinition;

    public static function availableFields(): array {
        return static::rechercheFieldsDefinition()->fields();
    }

    public function __call( string $name, array $arguments ): static {
        if ( str_starts_with( $name, 'filtrerPar' ) ) {
            $field = lcfirst( substr( $name, strlen( 'filtrerPar' ) ) );
            $class = static::rechercheFieldsDefinition()->classOf( $field );
            if ( get_class( $arguments[ 0 ] ) !== $class ) {
                throw new \Exception( 'Mauvaise classe pour le filtre ' . $name . '(Classe attendue : ' . $class . ') (Classe passé : ' . get_class( $arguments[ 0 ] ) );
            }
            $this->addFilter( $field, $arguments[ 0 ] );
            return $this;
        }
        throw new \Exception( 'Methode inconnu !' );
    }

    private function validateField( string $from_fn, array $field_to_test ): void {
        $diff = array_diff( $field_to_test, static::availableFields() );
        if ( !empty( $diff ) ) {
            throw new \Exception( 'Les champs [' . implode( ',', $diff ) . '] ne sont pas disponible pour la methode ' . $from_fn . ' de la class ' . static::class );
        }
    }

    /**
     * Definir les champs sur lequelles ordonnées les données retournées
     *
     * @param string ...$fields
     *
     * @return $this
     * @throws \Exception
     */
    public function setSort( string ...$fields ): static {
        $this->validateField( __FUNCTION__, $fields );
        $this->_sorts = $fields;
        return $this;
    }

    /**
     * Definir les champs sur lequelles les données ordonnées seront retournées dans l'ordre descendant
     *
     * @param string ...$fields
     *
     * @return $this
     * @throws \Exception
     */
    public function setDesc( string ...$fields ): static {
        $this->validateField( __FUNCTION__, $fields );
        $this->_descs = $fields;
        return $this;
    }

    /**
     * Definir le schamps que l'on veut voir en sortie
     *
     * @param string ...$fields
     *
     * @return $this
     * @throws \Exception
     */
    public function setFields( string ...$fields ): static {
        $this->validateField( __FUNCTION__, $fields );
        $this->_fields = $fields;
        return $this;
    }


}