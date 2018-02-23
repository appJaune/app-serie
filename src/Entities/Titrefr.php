<?php

namespace Tvtruc\Entities;
//use Doctrine\ORM\Annotation as ORM;
use Doctrine\ORM\Mapping AS ORM;
use Tvtruc\Entities\Serie;
/**
 * @ORM\Entity @ORM\Table(name="translation_seriesname")
 **/
class Titrefr {
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */

    public $id;
    /**
     * @ORM\Column(type="string")
     * @var string
     */
    public $seriesid;

    /**
     * @ORM\Column(type="string")
     * @var string
     */
    public $languageid;

    /**
     * @ORM\Column(type="string")
     * @var string
     */
    public $translation;


    /**
     * Les episodes sont liés a une serie
     * Le serie est en private parce que je veux n'y acceder qu'au travers des getters/setters
     * @ORM\ManyToOne(targetEntity="Serie", inversedBy="titrefr", fetch="LAZY")
     * @ORM\JoinColumn(nullable=false, name="seriesid", referencedColumnName="id")
     */
    public $serie;

    // getters et setters
    // ensembles de fonctions/methodes publiques permettant de modifier/acceder aux propriétés private

    /**
     * @param $name
     */
    public function setName($name)
    {
        $this->seriesid = $name;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return($this->seriesid);
    }




    /**
     * @param $name
     */
    public function setLanguageid($name)
    {
        $this->languageid = $name;
    }

    /**
     * @return string
     */
    public function getLanguageid()
    {
        return($this->languageid);
    }



    /**
     * @param $name
     */
    public function setTranslation($name)
    {
        $this->translation = $name;
    }

    /**
     * @return string
     */
    public function getTranslation()
    {
        return($this->translation);
    }





    /**
     * @param $serie
     */
    public function setSerie($serie) {
        if ($serie){
            $this->serie = $serie;
        }
    }

    /**
     * @return mixed
     */
    public function getSerie() {
        return($this->serie);
    }

    /**
     * Episode constructor.
     * Est appelle en faisant $machin = new Tvtruc/Entities/Episode($serie)
     * @param $serie
     */
    public function __construct($serie) {
        if ($serie){
            $this->serie = $serie;
        }
    }

}
