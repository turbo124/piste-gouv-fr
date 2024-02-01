<?php

namespace PisteGouvFr\Api\ChorusPro\WsRetour;


/**
 * @property \PisteGouvFr\Api\ChorusPro\WsRetour\RecupererDevisesOutput[] listeDevises
 */
class WsRetourRecupererDevises extends WsRetour {

    protected static function getFieldDefinitions(): FieldDefinitionCollection {
        return new FieldDefinitionCollection(
            new FieldDefinition( 'listeDevises', FieldDefinition::TYPE_OBJECT_ARRAY, true, null, RecupererDevisesOutput::class )
        );
    }
}


























































