<?php

namespace PisteGouvFr\Api\ChorusPro\WsRetour;


/**
 * @property \PisteGouvFr\Api\ChorusPro\WsRetour\RecupererModeDepotOutput[] listeModeDepot
 * @property int                                                            nbResultatsParPage
 * @property int                                                            pageCourante
 * @property int                                                            pages
 * @property int                                                            total
 */
class WsRetourRecupererModeDepot extends WsRetour {

    protected static function getFieldDefinitions(): FieldDefinitionCollection {
        return new FieldDefinitionCollection(
            new FieldDefinition( 'listeModeDepot', FieldDefinition::TYPE_OBJECT_ARRAY, true, null, RecupererModeDepotOutput::class ),
            new FieldDefinition( 'nbResultatsParPage', FieldDefinition::TYPE_INT_64BIT, true ),
            new FieldDefinition( 'pageCourante', FieldDefinition::TYPE_INT_64BIT, true ),
            new FieldDefinition( 'pages', FieldDefinition::TYPE_INT_64BIT, true ),
            new FieldDefinition( 'total', FieldDefinition::TYPE_INT_64BIT, true ),
        );
    }
}


























































