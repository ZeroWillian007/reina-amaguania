<?php

namespace RAA\UserBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Publicacion
 *
 * @ORM\Table(name="publicacion", indexes={@ORM\Index(name="fk_Publicacion_Usuario_idx", columns={"Usuario_id_usuario"})})
 * @ORM\Entity
 * @ORM\HasLifecycleCallbacks()
 */
class Publicacion
{
    /**
     * @var string
     *
     * @ORM\Column(name="titulo", type="string", length=100, nullable=true)
     */
    private $titulo;

    /**
     * @var string
     *
     * @ORM\Column(name="texto", type="string", length=3000, nullable=true)
     */
    private $texto;
    
    
    
    
     /**
     * @var string
     *
     * @ORM\Column(name="facebook", type="string", length=2000)
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
     * @var \DateTime
     *
     * @ORM\Column(name="fecha", type="date", nullable=true)
     */
    private $fecha;

    /**
     * @var string
     *
     * @ORM\Column(name="foto", type="string", length=45, nullable=true)
     */
    private $foto;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fecha_borrado", type="date", nullable=true)
     */
    private $fechaBorrado;

    /**
     * @var boolean
     *
     * @ORM\Column(name="activo", type="boolean", nullable=true)
     */
    private $activo;

    /**
     * @var string
     *
     * @ORM\Column(name="adicional", type="string", length=255, nullable=true)
     */
    private $adicional;

    /**
     * @var integer
     *
     * @ORM\Column(name="tipo", type="integer", nullable=true)
     */
    private $tipo;

    /**
     * @var integer
     *
     * @ORM\Column(name="id_publicaion", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idPublicaion;

    /**
     * @var \RAA\UserBundle\Entity\Usuario
     *
     * @ORM\ManyToOne(targetEntity="RAA\UserBundle\Entity\Usuario")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="Usuario_id_usuario", referencedColumnName="id_usuario")
     * })
     */
    private $usuarioUsuario;
    
    
    /**
     * Set titulo
     *
     * @param string $titulo
     * @return Publicacion
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
     * @return Publicacion
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
     * Set fecha
     *
     * @param date $fecha
     * @return Publicacion
     */
    public function setFecha($fecha)
    {
        $this->fecha = $fecha;

        return $this;
    }

    /**
     * Get fecha
     *
     * @return date
     */
    public function getFecha()
    {
        return $this->fecha;
    }
    
    
     /**
     * Set foto
     *
     * @param string $foto
     * @return Publicacion
     */
    public function setFoto($foto)
    {
        $this->foto = $foto;

        return $this;
    }

    /**
     * Get foto
     *
     * @return string
     */
    public function getFoto()
    {
        return $this->foto;
    }
    
    
    /**
     * Set foto
     *
     * @param date $fechaBorrado
     * @return Publicacion
     */
    public function setFechaBorrado($fechaBorrado)
    {
        $this->fechaBorrado = $fechaBorrado;

        return $this;
    }

    /**
     * Get fechaBorrado
     *
     * @return date
     */
    public function getFechaBorrado()
    {
        return $this->fechaBorrado;
    }
    
     /**
     * Set activo
     *
     * @param boolean $activo
     * @return Publicacion
     */
    public function setActivo($activo)
    {
        $this->activo = $activo;

        return $this;
    }

    /**
     * Get activo
     *
     * @return boolean
     */
    public function getActivo()
    {
        return $this->activo;
    }
    
     /**
     * Set adicional
     *
     * @param string $adicional
     * @return Publicacion
     */
    public function setAdicional($adicional)
    {
        $this->adicional = $adicional;

        return $this;
    }

    /**
     * Get adicional
     *
     * @return string
     */
    public function getAdicional()
    {
        return $this->adicional;
    }
    
    
    /**
     * Set tipo
     *
     * @param integer $tipo
     * @return Publicacion
     */
    public function setTipo($tipo)
    {
        $this->tipo = $tipo;

        return $this;
    }

    /**
     * Get tipo
     *
     * @return integer
     */
    public function getTipo()
    {
        return $this->tipo;
    }
    
    
    /**
     * Set idPublicaion
     *
     * @param integer $idPublicaion
     * @return Publicacion
     */
    public function setIdPublicaion($idPublicaion)
    {
        $this->idPublicaion = $idPublicaion;

        return $this;
    }

    /**
     * Get idPublicaion
     *
     * @return integer
     */
    public function getIdPublicaion()
    {
        return $this->idPublicaion;
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
    
   
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    


}
