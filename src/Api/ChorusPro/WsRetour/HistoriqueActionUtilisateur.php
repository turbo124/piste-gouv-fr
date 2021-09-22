<?php

namespace PisteGouvFr\Api\ChorusPro\WsRetour;


use PisteGouvFr\Api\ChorusPro\Type\IHistoActionCode;

/**
 * @property int       histoActionId
 * @property string    histoActionCode
 * @property \DateTime histoActionDateHeure
 * @property string    histoActionUtilisateurPrenom
 * @property string    histoActionUtilisateurNom
 * @property string    histoActionUtilisateurEmail
 * @property string    histoActionUtilisateurTelephone
 */
class HistoriqueActionUtilisateur extends WsRetour {

    protected static function getFieldDefinitions(): FieldDefinitionCollection {
        return new FieldDefinitionCollection(
            new FieldDefinition('histoActionId', FieldDefinition::TYPE_INT_64BIT),
            new FieldDefinition('histoActionCode', FieldDefinition::TYPE_STRING, false, [
                IHistoActionCode::TELECHARGEMENT_FACTURE,
                IHistoActionCode::ACQUITTEMENT_REJET,
                IHistoActionCode::ACQUITTEMENT_SUSPENSION,
                IHistoActionCode::TRAITEMENT_REJET,
            ]),
            new FieldDefinition('histoActionDateHeure', FieldDefinition::TYPE_STRING_DATETIME),
            new FieldDefinition('histoActionUtilisateurPrenom', FieldDefinition::TYPE_STRING),
            new FieldDefinition('histoActionUtilisateurNom', FieldDefinition::TYPE_STRING),
            new FieldDefinition('histoActionUtilisateurEmail', FieldDefinition::TYPE_STRING),
            new FieldDefinition('histoActionUtilisateurTelephone', FieldDefinition::TYPE_STRING)
        );
    }
}


























































