<?php

namespace PhpChorusPiste\Retour;


use PhpChorusPiste\IHistoStatutCode;

/**
 * @property int       evenementId
 * @property string    evenementLibelle
 * @property string    evenementQui
 * @property \DateTime evenementDateHeure
 */
class HistoriqueEvenement extends WsRetour {

    protected static function getFieldDefinitions(): FieldDefinitionCollection {
        return new FieldDefinitionCollection(
            new FieldDefinition('evenementId', FieldDefinition::TYPE_INT_64BIT),
            new FieldDefinition('evenementLibelle', FieldDefinition::TYPE_STRING),
            new FieldDefinition('evenementQui', FieldDefinition::TYPE_STRING),
            new FieldDefinition('evenementDateHeure', FieldDefinition::TYPE_STRING_DATETIME)
        );
    }
}


























































