<?php

namespace PisteGouvFr\Api\ChorusPro\Parameter;


class ParametresRechercherServiceExecutant implements \JsonSerializable {

    const TRISENS_ASC  = 'Ascendant';
    const TRISENS_DESC = 'Descendant';


    const TRICOLONNE_CODESERVICEEXECUTANT = 'CodeServiceExecutant';
    const TRICOLONNE_NOMSERVICEEXECUTANT  = 'NomServiceExecutant';


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
    public function __construct(int $pageResultatDemandee = 0, int $nbResultatsParPage = 1, string $triSens = null, string $triColonne = null, array $champsDeTri = null, string $ordreTriGenerique = null, int $taillePageGenerique = null, int $indexPageGenerique = null) {
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
