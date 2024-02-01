<?php

namespace PisteGouvFr\Api\ChorusPro\WsRetour;


/**
 * @property string                                                                                nomFichier
 * @property \DateTime|null                                                                        dateDepotFlux
 * @property string
 *           codeInterfaceDepotFlux
 * @property string                                                                                etatCourantDepotFlux
 * @property \DateTime|null
 *           dateHeureEtatCourantFlux
 * @property \PisteGouvFr\Api\ChorusPro\WsRetour\WsRetourConsulterCRDetailleErreurDP[]|null        listeErreurDP
 * @property \PisteGouvFr\Api\ChorusPro\WsRetour\WsRetourConsulterCRDetailleErreurTechnique[]|null listeErreurTechnique
 */
class WsRetourConsulterCRDetaille extends WsRetour {

    protected static function getFieldDefinitions(): FieldDefinitionCollection {
        return new FieldDefinitionCollection(
            new FieldDefinition( 'codeInterfaceDepotFlux', FieldDefinition::TYPE_STRING ),
            new FieldDefinition( 'dateDepotFlux', FieldDefinition::TYPE_STRING_DATETIME ),
            new FieldDefinition( 'dateHeureEtatCourantFlux', FieldDefinition::TYPE_STRING_DATETIME ),
            new FieldDefinition( 'etatCourantDepotFlux', FieldDefinition::TYPE_STRING ),
            new FieldDefinition( 'nomFichier', FieldDefinition::TYPE_STRING ),
            new FieldDefinition( 'listeErreurDP', FieldDefinition::TYPE_OBJECT_ARRAY, false, null, WsRetourConsulterCRDetailleErreurDP::class ),
            new FieldDefinition( 'listeErreurTechnique', FieldDefinition::TYPE_OBJECT_ARRAY, false, null, WsRetourConsulterCRDetailleErreurTechnique::class )
        );
    }
}


























































