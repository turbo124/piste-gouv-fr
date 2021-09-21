<?php

namespace PhpChorusPiste\Retour;


use PhpChorusPiste\IHistoStatutCode;

/**
 * @property int                                     histoStatutId
 * @property string|\PhpChorusPiste\IHistoStatutCode histoStatutCode
 * @property \DateTime                               histoStatutDatePassage
 * @property string                                  histoStatutCommentaire
 * @property string                                  histoStatutUtilisateurPrenom
 * @property string                                  histoStatutUtilisateurNom
 * @property string                                  histoStatutUtilisateurEmail
 * @property string                                  histoStatutUtilisateurTelephone
 */
class HistoriqueStatus extends WsRetour {

    protected static function getFieldDefinitions(): FieldDefinitionCollection {
        return new FieldDefinitionCollection(
            new FieldDefinition('histoStatutId', FieldDefinition::TYPE_INT_64BIT),
            new FieldDefinition('histoStatutCode', FieldDefinition::TYPE_STRING, false, [
                IHistoStatutCode::BROUILLON,
                IHistoStatutCode::A_VALIDER_1,
                IHistoStatutCode::ERREUR_FOURNISSEUR_SUR_VALIDEUR,
                IHistoStatutCode::REFUSEE_1,
                IHistoStatutCode::VALIDEE_1,
                IHistoStatutCode::ABSENCE_VALIDATION_1_HORS_DELAI,
                IHistoStatutCode::A_VALIDER_2,
                IHistoStatutCode::ERREUR_COTRAITANT_SUR_VALIDEUR,
                IHistoStatutCode::REFUSEE_2,
                IHistoStatutCode::VALIDEE_2,
                IHistoStatutCode::ABSENCE_VALIDATION_2_HORS_DELAI,
                IHistoStatutCode::DEPOSEE,
                IHistoStatutCode::ERREUR_FOURNISSEUR_SUR_MOE,
                IHistoStatutCode::EN_COURS_ACHEMINEMENT,
                IHistoStatutCode::MISE_A_DISPOSITION,
                IHistoStatutCode::A_RECYCLER,
                IHistoStatutCode::SUSPENDUE,
                IHistoStatutCode::REJETEE,
                IHistoStatutCode::MANDATEE,
                IHistoStatutCode::MISE_EN_PAIEMENT,
                IHistoStatutCode::COMPTABILISEE,
                IHistoStatutCode::MISE_A_DISPOSITION_COMPTABLE,
                IHistoStatutCode::ABANDONNEE,
                IHistoStatutCode::SUPPRIMEE,
                IHistoStatutCode::ASSOCIEE,
                IHistoStatutCode::EN_COURS_TRAITEMENT_PIVOT_S,
                IHistoStatutCode::A_VALIDER_MOE,
                IHistoStatutCode::REFUSEE_MOE,
                IHistoStatutCode::EN_ATTENTE_RECYCLAGE_FOURNISSEUR,
                IHistoStatutCode::ERREUR_MOE_SUR_FOURNISSEUR,
                IHistoStatutCode::ERREUR_MOA_SUR_FOURNISSEUR,
                IHistoStatutCode::INTERPRETEE_OCR,
                IHistoStatutCode::COMPLETEE,
                IHistoStatutCode::ERREUR_FOURNISSEUR_SUR_MOA,
                IHistoStatutCode::ERREUR_MOE_SUR_MOA,
                IHistoStatutCode::ERREUR_DESTINATAIRE_PD,
                IHistoStatutCode::ERREUR_DESTINATAIRE_EA,
                IHistoStatutCode::SERVICE_FAIT,
                IHistoStatutCode::NON_CONFORME,
                IHistoStatutCode::A_ASSOCIER_MOE,
                IHistoStatutCode::ERREUR_DE_MOE,
                IHistoStatutCode::MISE_A_DISPOSITION_MOE,
                IHistoStatutCode::PRISE_EN_COMPTE_MOE,
                IHistoStatutCode::A_ASSOCIER_MOA,
                IHistoStatutCode::ERREUR_DE_MOA,
                IHistoStatutCode::REFUSEE_MOA,
                IHistoStatutCode::A_ASSOCIER_FOURNISSEUR,
                IHistoStatutCode::REFUSEE_FOURNISSEUR,
                IHistoStatutCode::A_COMPLETER,
                IHistoStatutCode::TRANSMISE_MOA,
                IHistoStatutCode::PRISE_EN_COMPTE_DESTINATAIRE,
                IHistoStatutCode::REMPLACEE_PAR_A22,
                IHistoStatutCode::DUPLIQUE_APRES_REFUS,
                IHistoStatutCode::MISE_A_DISPOSITION_MOA,
                IHistoStatutCode::PRISE_EN_COMPTE_MOA,
                IHistoStatutCode::ABSENCE_VALIDATION_MOE_DELAI_REGLEMENTAIRE,
                IHistoStatutCode::TECHNIQUE_INCONNU,
            ]),
            new FieldDefinition('histoStatutDatePassage', FieldDefinition::TYPE_STRING_DATETIME),
            new FieldDefinition('histoStatutCommentaire', FieldDefinition::TYPE_STRING),
            new FieldDefinition('histoStatutUtilisateurPrenom', FieldDefinition::TYPE_STRING),
            new FieldDefinition('histoStatutUtilisateurNom', FieldDefinition::TYPE_STRING),
            new FieldDefinition('histoStatutUtilisateurEmail', FieldDefinition::TYPE_STRING),
            new FieldDefinition('histoStatutUtilisateurTelephone', FieldDefinition::TYPE_STRING)
        );
    }
}


























































