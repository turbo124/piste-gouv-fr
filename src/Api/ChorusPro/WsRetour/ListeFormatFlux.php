<?php

namespace PisteGouvFr\Api\ChorusPro\WsRetour;


use PisteGouvFr\Api\ChorusPro\Type\IFormatFlux;

/**
 * @property string formatFlux
 */
class ListeFormatFlux extends WsRetour {

    protected static function getFieldDefinitions(): FieldDefinitionCollection {
        return new FieldDefinitionCollection(
        // Enum : IN_DP_E1_STRUCT, IN_DP_E2_MIXTE, IN_DP_E2_FACTURX
            new FieldDefinition( 'formatFlux', FieldDefinition::TYPE_STRING, true, [
                IFormatFlux::IN_DP_E1_STRUCT,
                IFormatFlux::IN_DP_E2_FACTURX,
                IFormatFlux::IN_DP_E2_MIXTE,
            ] ),
        );
    }
}


























































