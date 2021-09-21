<?php

namespace PhpChorusPiste\Retour;


/**
 * @property string|null    numeroFacture
 * @property \DateTime|null dateFacture
 * @property string|null    codeDestinataire
 * @property string|null    codeServiceExecutant
 * @property string|null    codeFournisseur
 * @property string|null    codeDeviseFacture
 * @property string|null    typeFacture
 * @property string|null    typeTva
 * @property string|null    numeroBonCommande
 * @property float|null     montantTtcAvantRemiseGlobalTTC
 * @property float|null     montantAPayer
 * @property float|null     montantHtTotal
 * @property float|null     montantTVA
 * @property int|null       pieceJointeId
 */
class WsRetourDeposerPdfFacture extends WsRetour {

    protected static function getFieldDefinitions(): FieldDefinitionCollection {
        // Ne pas mettre les champs requis a true. Car leur presence depent de l'efficacité de l'OCR coté PISTE/Chorus, ou de la présence de l'information dans le fichier PDF.
        return new FieldDefinitionCollection(
            new FieldDefinition('numeroFacture', FieldDefinition::TYPE_STRING),
            new FieldDefinition('dateFacture', FieldDefinition::TYPE_STRING_DATETIME),
            new FieldDefinition('codeDestinataire', FieldDefinition::TYPE_STRING),
            new FieldDefinition('codeServiceExecutant', FieldDefinition::TYPE_STRING),
            new FieldDefinition('codeFournisseur', FieldDefinition::TYPE_STRING),
            new FieldDefinition('codeDeviseFacture', FieldDefinition::TYPE_STRING),
            new FieldDefinition('typeFacture', FieldDefinition::TYPE_STRING, false, [
                'AVOIR',
                'FACTURE',
            ]),
            new FieldDefinition('typeTva', FieldDefinition::TYPE_STRING, false, [
                'TVA_SUR_DEBIT',
                'TVA_SUR_ENCAISSEMENT',
                'EXONERATION',
                'SANS_TVA',
            ]),
            new FieldDefinition('numeroBonCommande', FieldDefinition::TYPE_STRING),
            new FieldDefinition('montantTtcAvantRemiseGlobalTTC', FieldDefinition::TYPE_NUMBER),
            new FieldDefinition('montantAPayer', FieldDefinition::TYPE_NUMBER),
            new FieldDefinition('montantHtTotal', FieldDefinition::TYPE_NUMBER),
            new FieldDefinition('montantTVA', FieldDefinition::TYPE_NUMBER),
            new FieldDefinition('pieceJointeId', FieldDefinition::TYPE_INT_64BIT)
        );
    }
}


























































