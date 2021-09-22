<?php

namespace PisteGouvFr\Api\ChorusPro\WsRetour;


use PisteGouvFr\Api\ChorusPro\Type\IStatutFacture;

/**
 * @property int|null                                                   identifiantFactureCPP
 * @property string|null                                                numeroFacture
 * @property string|null                                                identifiantStructure
 * @property string|null                                                empreinteCertificatDepot
 * @property \DateTime|null                                             dateDepot
 * @property string|null|\PisteGouvFr\Api\ChorusPro\Type\IStatutFacture statutFacture
 */
class WsRetourSoumettreFacture extends WsRetour {

    protected static function getFieldDefinitions(): FieldDefinitionCollection {
        return new FieldDefinitionCollection(
            new FieldDefinition('identifiantFactureCPP', FieldDefinition::TYPE_INT_64BIT),
            new FieldDefinition('numeroFacture', FieldDefinition::TYPE_STRING),
            new FieldDefinition('identifiantStructure', FieldDefinition::TYPE_STRING),
            new FieldDefinition('empreinteCertificatDepot', FieldDefinition::TYPE_STRING),
            new FieldDefinition('dateDepot', FieldDefinition::TYPE_STRING_DATETIME),
            new FieldDefinition('statutFacture', FieldDefinition::TYPE_STRING, false, [
                IStatutFacture::BROUILLON,
                IStatutFacture::A_VALIDER_1,
                IStatutFacture::ERREUR_FOURNISSEUR_SUR_VALIDEUR,
                IStatutFacture::REFUSEE_1,
                IStatutFacture::VALIDEE_1,
                IStatutFacture::ABSENCE_VALIDATION_1_HORS_DELAI,
                IStatutFacture::A_VALIDER_2,
                IStatutFacture::ERREUR_COTRAITANT_SUR_VALIDEUR,
                IStatutFacture::REFUSEE_2,
                IStatutFacture::VALIDEE_2,
                IStatutFacture::ABSENCE_VALIDATION_2_HORS_DELAI,
                IStatutFacture::DEPOSEE,
                IStatutFacture::ERREUR_FOURNISSEUR_SUR_MOE,
                IStatutFacture::EN_COURS_ACHEMINEMENT,
                IStatutFacture::MISE_A_DISPOSITION,
                IStatutFacture::A_RECYCLER,
                IStatutFacture::SUSPENDUE,
                IStatutFacture::REJETEE,
                IStatutFacture::MANDATEE,
                IStatutFacture::MISE_EN_PAIEMENT,
                IStatutFacture::COMPTABILISEE,
                IStatutFacture::MISE_A_DISPOSITION_COMPTABLE,
                IStatutFacture::ABANDONNEE,
                IStatutFacture::SUPPRIMEE,
                IStatutFacture::ASSOCIEE,
                IStatutFacture::EN_COURS_TRAITEMENT_PIVOT_S,
                IStatutFacture::A_VALIDER_MOE,
                IStatutFacture::REFUSEE_MOE,
                IStatutFacture::EN_ATTENTE_RECYCLAGE_FOURNISSEUR,
                IStatutFacture::ERREUR_MOE_SUR_FOURNISSEUR,
                IStatutFacture::ERREUR_MOA_SUR_FOURNISSEUR,
                IStatutFacture::INTERPRETEE_OCR,
                IStatutFacture::COMPLETEE,
                IStatutFacture::ERREUR_FOURNISSEUR_SUR_MOA,
                IStatutFacture::ERREUR_MOE_SUR_MOA,
                IStatutFacture::ERREUR_DESTINATAIRE_PD,
                IStatutFacture::ERREUR_DESTINATAIRE_EA,
                IStatutFacture::SERVICE_FAIT,
                IStatutFacture::NON_CONFORME,
                IStatutFacture::A_ASSOCIER_MOE,
                IStatutFacture::ERREUR_DE_MOE,
                IStatutFacture::MISE_A_DISPOSITION_MOE,
                IStatutFacture::PRISE_EN_COMPTE_MOE,
                IStatutFacture::A_ASSOCIER_MOA,
                IStatutFacture::ERREUR_DE_MOA,
                IStatutFacture::REFUSEE_MOA,
                IStatutFacture::A_ASSOCIER_FOURNISSEUR,
                IStatutFacture::REFUSEE_FOURNISSEUR,
                IStatutFacture::A_COMPLETER,
                IStatutFacture::TRANSMISE_MOA,
                IStatutFacture::PRISE_EN_COMPTE_DESTINATAIRE,
                IStatutFacture::REMPLACEE_PAR_A22,
                IStatutFacture::DUPLIQUE_APRES_REFUS,
                IStatutFacture::MISE_A_DISPOSITION_MOA,
                IStatutFacture::PRISE_EN_COMPTE_MOA,
                IStatutFacture::ABSENCE_VALIDATION_MOE_DELAI_REGLEMENTAIRE,
                IStatutFacture::TECHNIQUE_INCONNU,
            ])
        );
    }
}


























































