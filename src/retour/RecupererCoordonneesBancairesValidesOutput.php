<?php

namespace PhpChorusPiste\Retour;


/**
 * @property int    idCoordonneeBancaire
 * @property string nomCoordonneeBancaire
 */
class RecupererCoordonneesBancairesValidesOutput extends WsRetour {

    protected static function getFieldDefinitions(): FieldDefinitionCollection {
        return new FieldDefinitionCollection(
            new FieldDefinition('idCoordonneeBancaire', FieldDefinition::TYPE_INT_64BIT),
            new FieldDefinition('nomCoordonneeBancaire', FieldDefinition::TYPE_STRING)
        );
    }
}


























































