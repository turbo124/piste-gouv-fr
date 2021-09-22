<?php

namespace PisteGouvFr\Api\ChorusPro\WsRetour;


/**
 * @property int                                                       pageCouranteEvenement
 * @property int                                                       pagesEvenement
 * @property int                                                       nbResultatsParPageEvenement
 * @property int                                                       totalEvenement
 * @property \PisteGouvFr\Api\ChorusPro\WsRetour\HistoriqueEvenement[] evenement
 */
class HistoriquesEvenements extends WsRetour {

    protected static function getFieldDefinitions(): FieldDefinitionCollection {
        return new FieldDefinitionCollection(
            new FieldDefinition('pageCouranteEvenement', FieldDefinition::TYPE_INT_64BIT),
            new FieldDefinition('pagesEvenement', FieldDefinition::TYPE_INT_64BIT),
            new FieldDefinition('nbResultatsParPageEvenement', FieldDefinition::TYPE_INT_64BIT),
            new FieldDefinition('totalEvenement', FieldDefinition::TYPE_INT_64BIT),
            new FieldDefinition('evenement', FieldDefinition::TYPE_OBJECT_ARRAY, false, null, HistoriqueEvenement::class)
        );
    }
}


























































