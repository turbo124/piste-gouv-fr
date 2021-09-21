<?php

namespace PhpChorusPiste\Retour;


/**
 * @property int                                               pageCourante
 * @property int                                               pages
 * @property int                                               nbResultatsParPage
 * @property int                                               total
 * @property \PhpChorusPiste\Retour\RecupererStructureOutput[] listeStructures
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


























































