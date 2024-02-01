<?php

namespace PisteGouvFr\Api\ChorusPro\WsRetour;


/**
 * @property string                                                                                codeAppliPartenaire
 * @property string                                                                                codeInterfaceFlux
 * @property \DateTime|null                                                                        dateDepotFlux
 * @property \DateTime|null                                                                        dateHeureEtatCourantFlux
 * @property string                                                                                designationPartenaire
 * @property string                                                                                etatCourantFlux
 * @property string                                                                                fichierCR
 * @property string                                                                                nomFichierFlux
 * @property string                                                                                numeroFluxDepot
 */
class WsRetourConsulterCR extends WsRetour {

    protected static function getFieldDefinitions(): FieldDefinitionCollection {
        return new FieldDefinitionCollection(
            new FieldDefinition('codeAppliPartenaire', FieldDefinition::TYPE_STRING),
            new FieldDefinition('codeInterfaceFlux', FieldDefinition::TYPE_STRING),
            new FieldDefinition('dateDepotFlux', FieldDefinition::TYPE_STRING_DATETIME),
            new FieldDefinition('dateHeureEtatCourantFlux', FieldDefinition::TYPE_STRING_DATETIME),
            new FieldDefinition('designationPartenaire', FieldDefinition::TYPE_STRING),
            new FieldDefinition('etatCourantFlux', FieldDefinition::TYPE_STRING),
            new FieldDefinition('fichierCR', FieldDefinition::TYPE_STRING),
            new FieldDefinition('nomFichierFlux', FieldDefinition::TYPE_STRING),
            new FieldDefinition('numeroFluxDepot', FieldDefinition::TYPE_STRING),
        );
    }
}


























































