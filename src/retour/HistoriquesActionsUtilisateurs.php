<?php

namespace PhpChorusPiste\Retour;


/**
 * @property int                                                  pageCouranteHistoAction
 * @property int                                                  pagesHistoAction
 * @property int                                                  nbResultatsParPageHistoAction
 * @property int                                                  totalHistoAction
 * @property \PhpChorusPiste\Retour\HistoriqueActionUtilisateur[] histoAction
 */
class HistoriquesActionsUtilisateurs extends WsRetour {

    protected static function getFieldDefinitions(): FieldDefinitionCollection {
        return new FieldDefinitionCollection(
            new FieldDefinition('pageCouranteHistoAction', FieldDefinition::TYPE_INT_64BIT),
            new FieldDefinition('pagesHistoAction', FieldDefinition::TYPE_INT_64BIT),
            new FieldDefinition('nbResultatsParPageHistoAction', FieldDefinition::TYPE_INT_64BIT),
            new FieldDefinition('totalHistoAction', FieldDefinition::TYPE_INT_64BIT),
            new FieldDefinition('histoAction', FieldDefinition::TYPE_OBJECT_ARRAY, false, null, HistoriqueActionUtilisateur::class)
        );
    }
}


























































