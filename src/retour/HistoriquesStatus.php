<?php

namespace PhpChorusPiste\Retour;


/**
 * @property int                                       pageCouranteHistoStatut
 * @property int                                       pagesHistoStatut
 * @property int                                       nbResultatsParPageHistoStatut
 * @property int                                       totalHistoStatut
 * @property \PhpChorusPiste\Retour\HistoriqueStatus[] histoStatut
 */
class HistoriquesStatus extends WsRetour {

    protected static function getFieldDefinitions(): FieldDefinitionCollection {
        return new FieldDefinitionCollection(
            new FieldDefinition('pageCouranteHistoStatut', FieldDefinition::TYPE_INT_64BIT),
            new FieldDefinition('pagesHistoStatut', FieldDefinition::TYPE_INT_64BIT),
            new FieldDefinition('nbResultatsParPageHistoStatut', FieldDefinition::TYPE_INT_64BIT),
            new FieldDefinition('totalHistoStatut', FieldDefinition::TYPE_INT_64BIT),
            new FieldDefinition('histoStatut', FieldDefinition::TYPE_OBJECT_ARRAY, false, null, HistoriqueStatus::class)
        );
    }
}


























































