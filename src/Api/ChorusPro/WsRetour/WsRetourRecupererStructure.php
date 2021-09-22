<?php

namespace PisteGouvFr\Api\ChorusPro\WsRetour;


/**
 * @property int                                                            pageCourante
 * @property int                                                            pages
 * @property int                                                            nbResultatsParPage
 * @property int                                                            total
 * @property \PisteGouvFr\Api\ChorusPro\WsRetour\RecupererStructureOutput[] listeStructures
 */
class WsRetourRecupererStructure extends WsRetour {

    protected static function getFieldDefinitions(): FieldDefinitionCollection {
        return new FieldDefinitionCollection(
            new FieldDefinition('pageCourante', FieldDefinition::TYPE_INT_64BIT),
            new FieldDefinition('pages', FieldDefinition::TYPE_INT_64BIT),
            new FieldDefinition('nbResultatsParPage', FieldDefinition::TYPE_INT_64BIT),
            new FieldDefinition('total', FieldDefinition::TYPE_INT_64BIT),
            new FieldDefinition('listeStructures', FieldDefinition::TYPE_OBJECT_ARRAY, true, null, RecupererStructureOutput::class)
        );
    }
}


























































