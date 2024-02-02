<?php

namespace PisteGouvFr\Api\ChorusPro\Parameter\ReferentielDesOrganisations;

/**
 * @method ServiceRechercheRequete filtrerParRattachementOrganisation( RechercheFieldString $fieldRule )
 */
class ServiceRechercheRequete extends RechercheRequete {

    protected static function rechercheFieldsDefinition(): RechercheFieldsDefinition {
        return ( new RechercheFieldsDefinition() )
            ->addDef( 'rattachementOrganisation', RechercheFieldString::class )
            ->addDef( 'libelle' )
            ->addDef( 'description' )
            ->addDef( 'codeService' )
            ->addDef( 'dateCreation' )
            ->addDef( 'dateDebutActivation' )
            ->addDef( 'dateFinActivation' )
            ->addDef( 'dateModification' )
            ->addDef( 'dateSuppression' )
            ->addDef( 'etatService' )
            ->addDef( 'adresse' )
            ->addDef( 'complementAdresse1' )
            ->addDef( 'complementAdresse2' )
            ->addDef( 'codePostal' )
            ->addDef( 'ville' )
            ->addDef( 'pays' )
            ->addDef( 'telephone' )
            ->addDef( 'numeroEj' )
            ->addDef( 'derniereMaj' )
            ->addDef( 'uuid' );
    }

}