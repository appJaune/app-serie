<?php

namespace Tvtruc\Entities;
//use Doctrine\ORM\Annotation as ORM;
use Doctrine\ORM\Mapping AS ORM;
use Doctrine\Common\Collections\ArrayCollection;

use Tvtruc\Entities\Episode;

/**
 * @ORM\Entity @ORM\Table(name="tvseries")
 **/
class Serie {
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
    public $seriesName;

    /**
     * Une serie a un episodes
     * La propriété est definie en public, parce que pour l'utiliser c'est peut-etre aussi simple si j'en ai besoin depuis un autre namespace
     * Si je ne l'utilise que via *Serie*, donc pas directement je pourrais tout mettre en protected.
     * @ORM\OneToMany(targetEntity="Titrefr", mappedBy="serie", cascade={"all"}, fetch="LAZY")
     */
    public $titrefr;

    /**
     * Une serie a plusieurs banners
     * La propriété est definie en public, parce que pour l'utiliser c'est peut-etre aussi simple si j'en ai besoin depuis un autre namespace
     * Si je ne l'utilise que via *Serie*, donc pas directement je pourrais tout mettre en protected.
     * @ORM\OneToMany(targetEntity="Banner", mappedBy="serie", cascade={"all"}, fetch="LAZY")
     */
    public $banner;




    /**
     * Une serie a plusieurs episodes
     * La propriété est definie en public, parce que pour l'utiliser c'est peut-etre aussi simple si j'en ai besoin depuis un autre namespace
     * Si je ne l'utilise que via *Serie*, donc pas directement je pourrais tout mettre en protected.
     * @ORM\OneToMany(targetEntity="Episode", mappedBy="serie", cascade={"all"}, fetch="LAZY")
     */
    public $episodes;




    public function __construct() {
        $this->banner = new ArrayCollection();
        $this->episodes = new ArrayCollection();
    }

    public function setBanner($banner) {
        $this->banner = $banner;
    }

    public function getBanner() {
        global $entityManager;
        $repository = $entityManager->getRepository('tvtruc\Entities\Banner');
        $banner = $repository->findOneBy(array(
            'keytype' => 'series',
            'subkey'=>'graphical',
            'keyvalue' => $this->id
        ));
        return (is_null($banner) ? 'lol' : $banner->getfileName() );
    }

    public function addBanner($banner) {
        $this->banner->add($banner);
    }




    // getters et setters
    public function setName($name) {
        $this->seriesName = $name;
    }

    public function getName() {
        return($this->seriesName);
    }


    public function setEpisode($episodes) {
        $this->episodes = $episodes;
    }

    public function getEpisodes() {
        return($this->episodes);
    }



    public function addEpisode($episode) {
        $this->episodes->add($episode);
    }




}
