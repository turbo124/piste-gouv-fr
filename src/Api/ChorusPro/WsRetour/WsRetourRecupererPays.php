<?php

namespace PisteGouvFr\Api\ChorusPro\WsRetour;


/**
 * @property \PisteGouvFr\Api\ChorusPro\WsRetour\RecupererPaysOutput[] listePays
 */
class WsRetourRecupererPays extends WsRetour {

    protected static function getFieldDefinitions(): FieldDefinitionCollection {
        return new FieldDefinitionCollection(
            new FieldDefinition( 'listePays', FieldDefinition::TYPE_OBJECT_ARRAY, true, null,RecupererPaysOutput::class )
        );
    }
}


























































