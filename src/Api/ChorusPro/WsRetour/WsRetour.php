<?php

namespace PisteGouvFr\Api\ChorusPro\WsRetour;


/**
 * Heriter de \stdClass est obligatoire pour alouer dynamiquement des attributs sans lever  des warning sur php >=8.1
 */
abstract class WsRetour extends \stdClass {


    protected abstract static function getFieldDefinitions(): FieldDefinitionCollection;

    /**
     * @throws \PisteGouvFr\PisteException
     */
    public final function __construct( array $wsReturnArray ) {
        $Definitions_a = $this::getFieldDefinitions()
                              ->FieldDefinitions_a();

        foreach ( $Definitions_a as $Definitions ) {
            $this->{$Definitions->label()} = $Definitions->castFromWsReturnArray( $wsReturnArray );
        }
    }



}
