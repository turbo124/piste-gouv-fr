<?php

namespace PhpChorusPiste\Retour;


/**
 * @property int                                                                 pageCourante
 * @property int                                                                 pages
 * @property int                                                                 nbResultatsParPage
 * @property int                                                                 total
 * @property \PhpChorusPiste\Retour\RecupererCoordonneesBancairesValidesOutput[] listeCoordonneeBancaire
 */
class WsRetourRecupererCoordonneesBancairesValides extends WsRetour {

    protected static function getFieldDefinitions(): FieldDefinitionCollection {
        return new FieldDefinitionCollection(
            new FieldDefinition('pageCourante', FieldDefinition::TYPE_INT_64BIT),
            new FieldDefinition('pages', FieldDefinition::TYPE_INT_64BIT),
            new FieldDefinition('nbResultatsParPage', FieldDefinition::TYPE_INT_64BIT),
            new FieldDefinition('total', FieldDefinition::TYPE_INT_64BIT),
            new FieldDefinition('listeCoordonneeBancaire', FieldDefinition::TYPE_OBJECT_ARRAY, true, null, RecupererCoordonneesBancairesValidesOutput::class)
        );
    }
}


























































