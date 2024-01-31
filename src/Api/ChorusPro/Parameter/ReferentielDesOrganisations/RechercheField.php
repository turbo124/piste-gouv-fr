<?php

namespace PisteGouvFr\Api\ChorusPro\Parameter\ReferentielDesOrganisations;

abstract class RechercheField implements \JsonSerializable {

    /**
     * @var string Operateur de recherche
     */
    private string $_op;

    /**
     * @var mixed Valeur de recherche
     */
    private mixed $_val;

    /**
     * @param string $operateur
     * @param string $valeur
     *
     * @throws \Exception
     */
    protected function __construct( string $operateur, mixed $valeur ) {
        if ( !in_array( $operateur, [ '=',
                                      '>',
                                      '<',
                                      '>=',
                                      '<=',
                                      'IN',
                                      'CONTAINS' ] ) ) {
            throw new \Exception( 'Wrong operator' );
        }
        $this->_op  = $operateur;
        $this->_val = $valeur;
    }


    public function jsonSerialize(): mixed {
        return [
            'op'  => $this->_op,
            'val' => $this->_val,
        ];
    }

    public function value() :mixed {
        return $this->_val;
    }
}