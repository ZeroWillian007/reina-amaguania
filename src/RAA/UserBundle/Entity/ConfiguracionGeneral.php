<?php

namespace RAA\UserBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ConfiguracionGeneral
 *
 * @ORM\Table(name="General")
 * @ORM\Entity
 */
class ConfiguracionGeneral
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;
    
    
    
     /**
     * @var string
     *
     * @ORM\Column(name="titulo", type="string", length=255)
     */
    private $titulo;
    
    /**
     * @var string
     *
     * @ORM\Column(name="texto", type="string", length=3000)
     */
    private $texto;
    
    /**
     * @var string
     *
     * @ORM\Column(name="facebook", type="string", length=255)
     */
    private $facebook;
    
    /**
     * @var string
     *
     * @ORM\Column(name="twitter", type="string", length=255)
     */
    private $twitter;
    
    /**
     * @var string
     *
     * @ORM\Column(name="Instagram", type="string", length=255)
     */
    private $Instagram;
    
    /**
     * @var string
     *
     * @ORM\Column(name="youtube", type="string", length=255)
     */
    private $youtube;
    
    

    /**
     * @var string
     *
     * @ORM\Column(name="slide1", type="string", length=100)
     */
    private $slide1;

    /**
     * @var string
     *
     * @ORM\Column(name="slide2", type="string", length=100)
     */
    private $slide2;

    /**
     * @var string
     *
     * @ORM\Column(name="slide3", type="string", length=100)
     */
    private $slide3;

    /**
     * @var string
     *
     * @ORM\Column(name="slide4", type="string", length=100)
     */
    private $slide4;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="modificacion_at", type="datetime")
     */
    private $modificacionAt;


    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set slide1
     *
     * @param string $slide1
     * @return ConfiguracionGeneral
     */
    public function setSlide1($slide1)
    {
        $this->slide1 = $slide1;

        return $this;
    }

    /**
     * Get slide1
     *
     * @return string 
     */
    public function getSlide1()
    {
        return $this->slide1;
    }

    /**
     * Set slide2
     *
     * @param string $slide2
     * @return ConfiguracionGeneral
     */
    public function setSlide2($slide2)
    {
        $this->slide2 = $slide2;

        return $this;
    }

    /**
     * Get slide2
     *
     * @return string 
     */
    public function getSlide2()
    {
        return $this->slide2;
    }

    /**
     * Set slide3
     *
     * @param string $slide3
     * @return ConfiguracionGeneral
     */
    public function setSlide3($slide3)
    {
        $this->slide3 = $slide3;

        return $this;
    }

    /**
     * Get slide3
     *
     * @return string 
     */
    public function getSlide3()
    {
        return $this->slide3;
    }

    /**
     * Set slide4
     *
     * @param string $slide4
     * @return ConfiguracionGeneral
     */
    public function setSlide4($slide4)
    {
        $this->slide4 = $slide4;

        return $this;
    }

    /**
     * Get slide4
     *
     * @return string 
     */
    public function getSlide4()
    {
        return $this->slide4;
    }
    
    
    /**
     * Set titulo
     *
     * @param string $titulo
     * @return ConfiguracionGeneral
     */
    public function setTitulo($titulo)
    {
        $this->titulo = $titulo;

        return $this;
    }

    /**
     * Get titulo
     *
     * @return string 
     */
    public function getTitulo()
    {
        return $this->titulo;
    }
    
    
     /**
     * Set texto
     *
     * @param string $texto
     * @return ConfiguracionGeneral
     */
    public function setTexto($texto)
    {
        $this->texto = $texto;

        return $this;
    }

    /**
     * Get texto
     *
     * @return string 
     */
    public function getTexto()
    {
        return $this->texto;
    }
    
    
     /**
     * Set facebook
     *
     * @param string $facebook
     * @return ConfiguracionGeneral
     */
    public function setFaceBook($facebook)
    {
        $this->facebook = $facebook;

        return $this;
    }

    /**
     * Get facebook
     *
     * @return string 
     */
    public function getFaceBook()
    {
        return $this->facebook;
    }
    
    
    /**
     * Set twitter
     *
     * @param string $twitter
     * @return ConfiguracionGeneral
     */
    public function setTwitter($twitter)
    {
        $this->twitter = $twitter;

        return $this;
    }

    /**
     * Get twitter
     *
     * @return string 
     */
    public function getTwitter()
    {
        return $this->twitter;
    }
    
    
    /**
     * Set Instagram
     *
     * @param string $Instagram
     * @return ConfiguracionGeneral
     */
    public function setInstagram($Instagram)
    {
        $this->Instagram = $Instagram;

        return $this;
    }

    /**
     * Get Instagram
     *
     * @return string 
     */
    public function getInstagram()
    {
        return $this->Instagram;
    }
    
    
    /**
     * Set youtube
     *
     * @param string $youtube
     * @return ConfiguracionGeneral
     */
    public function setYoutube($youtube)
    {
        $this->youtube = $youtube;

        return $this;
    }

    /**
     * Get youtube
     *
     * @return string 
     */
    public function getYoutube()
    {
        return $this->youtube;
    }
    
    

    /**
     * Set modificacionAt
     *
     * @param \DateTime $modificacionAt
     * @return ConfiguracionGeneral
     */
    public function setModificacionAt($modificacionAt)
    {
        $this->modificacionAt = $modificacionAt;

        return $this;
    }

    /**
     * Get modificacionAt
     *
     * @return \DateTime 
     */
    public function getModificacionAt()
    {
        return $this->modificacionAt;
    }
}







