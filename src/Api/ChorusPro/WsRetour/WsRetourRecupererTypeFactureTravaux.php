<?php

namespace PisteGouvFr\Api\ChorusPro\WsRetour;


/**
 * @property \PisteGouvFr\Api\ChorusPro\WsRetour\RecupererTypeFactureTravauxOutput[] listeTypeFactureTravaux
 */
class WsRetourRecupererTypeFactureTravaux extends WsRetour {

    protected static function getFieldDefinitions(): FieldDefinitionCollection {
        return new FieldDefinitionCollection(
            new FieldDefinition( 'listeTypeFactureTravaux', FieldDefinition::TYPE_OBJECT_ARRAY, true, null, RecupererTypeFactureTravauxOutput::class )
        );
    }
}


























































