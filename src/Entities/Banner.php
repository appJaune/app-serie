<?php

namespace Tvtruc\Entities;
//use Doctrine\ORM\Annotation as ORM;
use Doctrine\ORM\Mapping AS ORM;
use Tvtruc\Entities\Banner;
/**
 * @ORM\Entity @ORM\Table(name="banners")
 **/
class Banner {
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
    public $filename;

    /**
     * @ORM\Column(type="string")
     * @var string
     */
    public $subkey;

    /**
     * Les banner sont liés a une serie
     * @ORM\ManyToOne(targetEntity="Serie", inversedBy="banner", fetch="LAZY")
     * @ORM\JoinColumn(nullable=false, name="keyvalue", referencedColumnName="id")
     */
    public $serie;

    // getters et setters
    // ensembles de fonctions/methodes publiques permettant de modifier/acceder aux propriétés private

    /**
     * @param $name
     */
    public function setSubkey($name)
    {
        $this->subkey = $name;
    }

    /**
     * @return string
     */
    public function getSubkey()
    {
        return($this->subkey);
    }


    /**
     * @param $name
     */
    public function setName($name)
    {
        $this->filename = $name;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return($this->filename);
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
