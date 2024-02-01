<?php

namespace PisteGouvFr\Api\ChorusPro\WsRetour;


/**
 * @property string typeFactureTravaux
 */
class RecupererTypeFactureTravauxOutput extends WsRetour {

    protected static function getFieldDefinitions(): FieldDefinitionCollection {
        return new FieldDefinitionCollection(
            new FieldDefinition( 'typeFactureTravaux', FieldDefinition::TYPE_STRING )
        );
    }
}


























































