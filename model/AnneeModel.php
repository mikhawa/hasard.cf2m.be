<?php

namespace App;
class AnneeModel extends AbstractModel
{
    protected int $idannee;
    protected string $section;
    protected string $annee;

    /**
     * @return int
     */
    public function getIdannee(): int
    {
        return $this->idannee;
    }

    /**
     * @param int $idannee
     * @return AnneeModel
     */
    public function setIdannee(int $idannee): AnneeModel
    {
        $this->idannee = $idannee;
        return $this;
    }

    /**
     * @return string
     */
    public function getSection(): string
    {
        return $this->section;
    }

    /**
     * @param string $section
     * @return AnneeModel
     */
    public function setSection(string $section): AnneeModel
    {
        $this->section = $section;
        return $this;
    }

    /**
     * @return string
     */
    public function getAnnee(): string
    {
        return $this->annee;
    }

    /**
     * @param string $annee
     * @return AnneeModel
     */
    public function setAnnee(string $annee): AnneeModel
    {
        $this->annee = $annee;
        return $this;
    }


}