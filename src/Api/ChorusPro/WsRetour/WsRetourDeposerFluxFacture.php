<?php

namespace PisteGouvFr\Api\ChorusPro\WsRetour;


use PisteGouvFr\Api\ChorusPro\Type\ISyntaxeFlux;

/**
 * @property string                                              numeroFluxDepot
 * @property \DateTime                                           dateDepot
 * @property string|\PisteGouvFr\Api\ChorusPro\Type\ISyntaxeFlux syntaxeFlux
 */
class WsRetourDeposerFluxFacture extends WsRetour {

    protected static function getFieldDefinitions(): FieldDefinitionCollection {
        return new FieldDefinitionCollection(
            new FieldDefinition('numeroFluxDepot', FieldDefinition::TYPE_STRING),
            new FieldDefinition('dateDepot', FieldDefinition::TYPE_STRING_DATETIME),
            new FieldDefinition('syntaxeFlux', FieldDefinition::TYPE_STRING, false, [
                ISyntaxeFlux::IN_DP_E1_UBL_INVOICE,
                ISyntaxeFlux::IN_DP_E1_CII,
                ISyntaxeFlux::IN_DP_E1_PES_FACTURE,
                ISyntaxeFlux::IN_DP_E1_XCBL,
                ISyntaxeFlux::IN_DP_E1_CII_16B,
                ISyntaxeFlux::IN_DP_E2_UBL_INVOICE_MIN,
                ISyntaxeFlux::IN_DP_E2_CII_MIN,
                ISyntaxeFlux::IN_DP_E2_PES_FACTURE_MIN,
                ISyntaxeFlux::IN_DP_E2_CPP_FACTURE_MIN,
                ISyntaxeFlux::IN_DP_E2_CII_FACTURX,
                ISyntaxeFlux::IN_DP_E2_CII_MIN_16B,
            ])
        );
    }
}






































































