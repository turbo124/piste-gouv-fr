<?php

namespace PhpChorusPiste;


interface IStatutFacture  {

    const BROUILLON                                  = 'BROUILLON';
    const A_VALIDER_1                                = 'A_VALIDER_1';
    const ERREUR_FOURNISSEUR_SUR_VALIDEUR            = 'ERREUR_FOURNISSEUR_SUR_VALIDEUR';
    const REFUSEE_1                                  = 'REFUSEE_1';
    const VALIDEE_1                                  = 'VALIDEE_1';
    const ABSENCE_VALIDATION_1_HORS_DELAI            = 'ABSENCE_VALIDATION_1_HORS_DELAI';
    const A_VALIDER_2                                = 'A_VALIDER_2';
    const ERREUR_COTRAITANT_SUR_VALIDEUR             = 'ERREUR_COTRAITANT_SUR_VALIDEUR';
    const REFUSEE_2                                  = 'REFUSEE_2';
    const VALIDEE_2                                  = 'VALIDEE_2';
    const ABSENCE_VALIDATION_2_HORS_DELAI            = 'ABSENCE_VALIDATION_2_HORS_DELAI';
    const DEPOSEE                                    = 'DEPOSEE';
    const ERREUR_FOURNISSEUR_SUR_MOE                 = 'ERREUR_FOURNISSEUR_SUR_MOE';
    const EN_COURS_ACHEMINEMENT                      = 'EN_COURS_ACHEMINEMENT';
    const MISE_A_DISPOSITION                         = 'MISE_A_DISPOSITION';
    const A_RECYCLER                                 = 'A_RECYCLER';
    const SUSPENDUE                                  = 'SUSPENDUE';
    const REJETEE                                    = 'REJETEE';
    const MANDATEE                                   = 'MANDATEE';
    const MISE_EN_PAIEMENT                           = 'MISE_EN_PAIEMENT';
    const COMPTABILISEE                              = 'COMPTABILISEE';
    const MISE_A_DISPOSITION_COMPTABLE               = 'MISE_A_DISPOSITION_COMPTABLE';
    const ABANDONNEE                                 = 'ABANDONNEE';
    const SUPPRIMEE                                  = 'SUPPRIMEE';
    const ASSOCIEE                                   = 'ASSOCIEE';
    const EN_COURS_TRAITEMENT_PIVOT_S                = 'EN_COURS_TRAITEMENT_PIVOT_S';
    const A_VALIDER_MOE                              = 'A_VALIDER_MOE';
    const REFUSEE_MOE                                = 'REFUSEE_MOE';
    const EN_ATTENTE_RECYCLAGE_FOURNISSEUR           = 'EN_ATTENTE_RECYCLAGE_FOURNISSEUR';
    const ERREUR_MOE_SUR_FOURNISSEUR                 = 'ERREUR_MOE_SUR_FOURNISSEUR';
    const ERREUR_MOA_SUR_FOURNISSEUR                 = 'ERREUR_MOA_SUR_FOURNISSEUR';
    const INTERPRETEE_OCR                            = 'INTERPRETEE_OCR';
    const COMPLETEE                                  = 'COMPLETEE';
    const ERREUR_FOURNISSEUR_SUR_MOA                 = 'ERREUR_FOURNISSEUR_SUR_MOA';
    const ERREUR_MOE_SUR_MOA                         = 'ERREUR_MOE_SUR_MOA';
    const ERREUR_DESTINATAIRE_PD                     = 'ERREUR_DESTINATAIRE_PD';
    const ERREUR_DESTINATAIRE_EA                     = 'ERREUR_DESTINATAIRE_EA';
    const SERVICE_FAIT                               = 'SERVICE_FAIT';
    const NON_CONFORME                               = 'NON_CONFORME';
    const A_ASSOCIER_MOE                             = 'A_ASSOCIER_MOE';
    const ERREUR_DE_MOE                              = 'ERREUR_DE_MOE';
    const MISE_A_DISPOSITION_MOE                     = 'MISE_A_DISPOSITION_MOE';
    const PRISE_EN_COMPTE_MOE                        = 'PRISE_EN_COMPTE_MOE';
    const A_ASSOCIER_MOA                             = 'A_ASSOCIER_MOA';
    const ERREUR_DE_MOA                              = 'ERREUR_DE_MOA';
    const REFUSEE_MOA                                = 'REFUSEE_MOA';
    const A_ASSOCIER_FOURNISSEUR                     = 'A_ASSOCIER_FOURNISSEUR';
    const REFUSEE_FOURNISSEUR                        = 'REFUSEE_FOURNISSEUR';
    const A_COMPLETER                                = 'A_COMPLETER';
    const TRANSMISE_MOA                              = 'TRANSMISE_MOA';
    const PRISE_EN_COMPTE_DESTINATAIRE               = 'PRISE_EN_COMPTE_DESTINATAIRE';
    const REMPLACEE_PAR_A22                          = 'REMPLACEE_PAR_A22';
    const DUPLIQUE_APRES_REFUS                       = 'DUPLIQUE_APRES_REFUS';
    const MISE_A_DISPOSITION_MOA                     = 'MISE_A_DISPOSITION_MOA';
    const PRISE_EN_COMPTE_MOA                        = 'PRISE_EN_COMPTE_MOA';
    const ABSENCE_VALIDATION_MOE_DELAI_REGLEMENTAIRE = 'ABSENCE_VALIDATION_MOE_DELAI_REGLEMENTAIRE';
    const TECHNIQUE_INCONNU                          = 'TECHNIQUE_INCONNU';
}
