<?php

namespace PisteGouvFr\Api\ChorusPro\WsRetour;


/**
 * @property string fichierResultat
 */
class WsRetourTelechargerAnnuaireDestinataire extends WsRetour {

    protected static function getFieldDefinitions(): FieldDefinitionCollection {
        return new FieldDefinitionCollection(
            new FieldDefinition( 'fichierResultat', FieldDefinition::TYPE_STRING )
        );
    }
}


























































