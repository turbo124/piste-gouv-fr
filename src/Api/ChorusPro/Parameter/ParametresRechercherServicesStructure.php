<?php

namespace PisteGouvFr\Api\ChorusPro\Parameter;


class ParametresRechercherServicesStructure implements \JsonSerializable {

    const TRISENS_ASC  = 'Ascendant';
    const TRISENS_DESC = 'Descendant';
    //    const TRISENS      = [
    //        self::TRISENS_ASC,
    //        self::TRISENS_DESC,
    //    ];


    const TRICOLONNE_CODESERVICE    = 'CodeService';
    const TRICOLONNE_LIBELLESERVICE = 'LibelleService';
    const TRICOLONNE_DATEDBTSERVICE = 'DateDbtService';
    const TRICOLONNE_DATEFINSERVICE = 'DateFinService';
    const TRICOLONNE_ESTACTIF       = 'EstActif';

    //    const TRICOLONNE = [
    //        self::TRICOLONNE_CODESERVICE,
    //        self::TRICOLONNE_LIBELLESERVICE,
    //        self::TRICOLONNE_DATEDBTSERVICE,
    //        self::TRICOLONNE_DATEFINSERVICE,
    //        self::TRICOLONNE_ESTACTIF,
    //    ];


    /** @car int */
    private int $pageResultatDemandee;
    /** @car int */
    private int $nbResultatsParPage;
    /** @car string|null */
    private ?string $triSens;
    /** @car string|null */
    private ?string $triColonne;
    /** @car  array|null */
    private ?array $champsDeTri;
    /** @car string|null */
    private ?string $ordreTriGenerique;
    /** @car int|null */
    private ?int $taillePageGenerique;
    /** @car int|null */
    private ?int $indexPageGenerique;

    /**
     * @param int         $pageResultatDemandee
     * @param int         $nbResultatsParPage
     * @param string|null $triSens
     * @param string|null $triColonne
     * @param array|null  $champsDeTri
     * @param string|null $ordreTriGenerique
     * @param int|null    $taillePageGenerique
     * @param int|null    $indexPageGenerique
     */
    public function __construct(int $pageResultatDemandee = 0, int $nbResultatsParPage = 0, string $triSens = null, string $triColonne = null, array $champsDeTri = null, string $ordreTriGenerique = null, int $taillePageGenerique = null, int $indexPageGenerique = null) {
        $this->pageResultatDemandee = $pageResultatDemandee;
        $this->nbResultatsParPage   = $nbResultatsParPage;
        $this->triSens              = $triSens;
        $this->triColonne           = $triColonne;
        $this->champsDeTri          = $champsDeTri;
        $this->ordreTriGenerique    = $ordreTriGenerique;
        $this->taillePageGenerique  = $taillePageGenerique;
        $this->indexPageGenerique   = $indexPageGenerique;
    }


    public function jsonSerialize(): mixed {
        return array_filter([
                                'pageResultatDemandee' => $this->pageResultatDemandee,
                                'nbResultatsParPage'   => $this->nbResultatsParPage,
                                'triSens'              => $this->triSens,
                                'triColonne'           => $this->triColonne,
                                'champsDeTri'          => $this->champsDeTri,
                                'ordreTriGenerique'    => $this->ordreTriGenerique,
                                'taillePageGenerique'  => $this->taillePageGenerique,
                                'indexPageGenerique'   => $this->indexPageGenerique,
                            ], function($v) { return !is_null($v); });
    }
}
