<?php

namespace PisteGouvFr\Api\ChorusPro\WsRetour;


use PisteGouvFr\Api\ChorusPro\Type\IModeDepot;
use PisteGouvFr\Api\ChorusPro\Type\IStatutCourantCode;

/**
 * @property int                                                                  idFacture
 * @property string                                                               numeroFacture
 * @property string|\PisteGouvFr\Api\ChorusPro\Type\IModeDepot                    modeDepot
 * @property string|\PisteGouvFr\Api\ChorusPro\Type\IStatutCourantCode            statutCourantCode
 * @property \PisteGouvFr\Api\ChorusPro\WsRetour\HistoriquesStatus[]              historiquesDesStatuts
 * @property \PisteGouvFr\Api\ChorusPro\WsRetour\HistoriquesEvenements[]          historiquesDesEvenementsComplementaires
 * @property \PisteGouvFr\Api\ChorusPro\WsRetour\HistoriquesActionsUtilisateurs[] historiquesDesActionsUtilisateurs
 * @property \PisteGouvFr\Api\ChorusPro\WsRetour\DerniereAction                   derniereAction
 */
class WsRetourConsulterHistoriqueFacture extends WsRetour {

    protected static function getFieldDefinitions(): FieldDefinitionCollection {
        return new FieldDefinitionCollection(
            new FieldDefinition('idFacture', FieldDefinition::TYPE_INT_64BIT),
            new FieldDefinition('numeroFacture', FieldDefinition::TYPE_STRING),
            new FieldDefinition('modeDepot', FieldDefinition::TYPE_STRING, false, [
                IModeDepot::SAISIE_WEB,
                IModeDepot::PORTAIL_PDF,
                IModeDepot::EDI_XML_STRUCT,
                IModeDepot::EDI_MIXTE,
                IModeDepot::EDI_PDF_ARCHIVE,
                IModeDepot::SAISIE_PORTAIL,
                IModeDepot::SAISIE_API,
                IModeDepot::DEPOT_PDF_PORTAIL,
                IModeDepot::DEPOT_PDF_SIGNE_PORTAIL,
                IModeDepot::DEPOT_PDF_API,
                IModeDepot::DEPOT_PDF_SIGNE_API,
                IModeDepot::EDI,
                IModeDepot::UPLOAD_PORTAIL,
                IModeDepot::UPLOAD_API,
                IModeDepot::EDI_NUMERISATION,
            ]),
            new FieldDefinition('statutCourantCode', FieldDefinition::TYPE_STRING, false, [
                IStatutCourantCode::BROUILLON,
                IStatutCourantCode::A_VALIDER_1,
                IStatutCourantCode::ERREUR_FOURNISSEUR_SUR_VALIDEUR,
                IStatutCourantCode::REFUSEE_1,
                IStatutCourantCode::VALIDEE_1,
                IStatutCourantCode::ABSENCE_VALIDATION_1_HORS_DELAI,
                IStatutCourantCode::A_VALIDER_2,
                IStatutCourantCode::ERREUR_COTRAITANT_SUR_VALIDEUR,
                IStatutCourantCode::REFUSEE_2,
                IStatutCourantCode::VALIDEE_2,
                IStatutCourantCode::ABSENCE_VALIDATION_2_HORS_DELAI,
                IStatutCourantCode::DEPOSEE,
                IStatutCourantCode::ERREUR_FOURNISSEUR_SUR_MOE,
                IStatutCourantCode::EN_COURS_ACHEMINEMENT,
                IStatutCourantCode::MISE_A_DISPOSITION,
                IStatutCourantCode::A_RECYCLER,
                IStatutCourantCode::SUSPENDUE,
                IStatutCourantCode::REJETEE,
                IStatutCourantCode::MANDATEE,
                IStatutCourantCode::MISE_EN_PAIEMENT,
                IStatutCourantCode::COMPTABILISEE,
                IStatutCourantCode::MISE_A_DISPOSITION_COMPTABLE,
                IStatutCourantCode::ABANDONNEE,
                IStatutCourantCode::SUPPRIMEE,
                IStatutCourantCode::ASSOCIEE,
                IStatutCourantCode::EN_COURS_TRAITEMENT_PIVOT_S,
                IStatutCourantCode::A_VALIDER_MOE,
                IStatutCourantCode::REFUSEE_MOE,
                IStatutCourantCode::EN_ATTENTE_RECYCLAGE_FOURNISSEUR,
                IStatutCourantCode::ERREUR_MOE_SUR_FOURNISSEUR,
                IStatutCourantCode::ERREUR_MOA_SUR_FOURNISSEUR,
                IStatutCourantCode::INTERPRETEE_OCR,
                IStatutCourantCode::COMPLETEE,
                IStatutCourantCode::ERREUR_FOURNISSEUR_SUR_MOA,
                IStatutCourantCode::ERREUR_MOE_SUR_MOA,
                IStatutCourantCode::ERREUR_DESTINATAIRE_PD,
                IStatutCourantCode::ERREUR_DESTINATAIRE_EA,
                IStatutCourantCode::SERVICE_FAIT,
                IStatutCourantCode::NON_CONFORME,
                IStatutCourantCode::A_ASSOCIER_MOE,
                IStatutCourantCode::ERREUR_DE_MOE,
                IStatutCourantCode::MISE_A_DISPOSITION_MOE,
                IStatutCourantCode::PRISE_EN_COMPTE_MOE,
                IStatutCourantCode::A_ASSOCIER_MOA,
                IStatutCourantCode::ERREUR_DE_MOA,
                IStatutCourantCode::REFUSEE_MOA,
                IStatutCourantCode::A_ASSOCIER_FOURNISSEUR,
                IStatutCourantCode::REFUSEE_FOURNISSEUR,
                IStatutCourantCode::A_COMPLETER,
                IStatutCourantCode::TRANSMISE_MOA,
                IStatutCourantCode::PRISE_EN_COMPTE_DESTINATAIRE,
                IStatutCourantCode::REMPLACEE_PAR_A22,
                IStatutCourantCode::DUPLIQUE_APRES_REFUS,
                IStatutCourantCode::MISE_A_DISPOSITION_MOA,
                IStatutCourantCode::PRISE_EN_COMPTE_MOA,
                IStatutCourantCode::ABSENCE_VALIDATION_MOE_DELAI_REGLEMENTAIRE,
                IStatutCourantCode::TECHNIQUE_INCONNU,
            ]),

            new FieldDefinition('historiquesDesStatuts', FieldDefinition::TYPE_OBJECT, false, null, HistoriquesStatus::class),
            new FieldDefinition('historiquesDesEvenementsComplementaires', FieldDefinition::TYPE_OBJECT, false, null, HistoriquesEvenements::class),
            new FieldDefinition('historiquesDesActionsUtilisateurs', FieldDefinition::TYPE_OBJECT, false, null, HistoriquesActionsUtilisateurs::class),
            new FieldDefinition('derniereAction', FieldDefinition::TYPE_OBJECT, false, null, DerniereAction::class)
        );
    }
}


























































