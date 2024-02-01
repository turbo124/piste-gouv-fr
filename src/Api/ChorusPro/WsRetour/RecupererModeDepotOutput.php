<?php

namespace PisteGouvFr\Api\ChorusPro\WsRetour;


/**
 * @property string modeDepot
 */
class RecupererModeDepotOutput extends WsRetour {

    protected static function getFieldDefinitions(): FieldDefinitionCollection {
        return new FieldDefinitionCollection(
            new FieldDefinition( 'modeDepot', FieldDefinition::TYPE_STRING )
        );
    }
}


























































