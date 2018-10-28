<?php

namespace RAA\UserBundle\Entity;


use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Usuario
 *
 * @ORM\Table(name="usuario", uniqueConstraints={@ORM\UniqueConstraint(name="nombre_UNIQUE", columns={"nombre"}), @ORM\UniqueConstraint(name="apellido_UNIQUE", columns={"apellido"})}, indexes={@ORM\Index(name="fk_Usuario_Configuracion1_idx", columns={"Configuracion_id_configuracion"})})
 * @ORM\Entity
 * @ORM\HasLifecycleCallbacks()
 */
class Usuario
{
    /**
     * @var string
     *
     * @ORM\Column(name="ci", type="string", length=45, nullable=true)
     */
    private $ci;

    /**
     * @var string
     *
     * @ORM\Column(name="nombre", type="string", length=45, nullable=true)
     */
    private $nombre;

    /**
     * @var string
     *
     * @ORM\Column(name="apellido", type="string", length=45, nullable=true)
     */
    private $apellido;

    /**
     * @var string
     *
     * @ORM\Column(name="nick", type="string", length=45, nullable=true)
     */
    private $nick;

    /**
     * @var string
     *
     * @ORM\Column(name="pass", type="string", length=45, nullable=true)
     */
    private $pass;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fecha_nacimiento", type="date", nullable=true)
     */
    private $fechaNacimiento;

    /**
     * @var boolean
     *
     * @ORM\Column(name="activo", type="boolean", nullable=true)
     */
    private $activo;

    /**
     * @var string
     *
     * @ORM\Column(name="avatar", type="string", length=45, nullable=true)
     */
    private $avatar;

    /**
     * @var integer
     *
     * @ORM\Column(name="tipo", type="integer", nullable=true)
     */
    private $tipo;

    /**
     * @var integer
     *
     * @ORM\Column(name="id_usuario", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idUsuario;

   /**
     * @var integer
     *
     * @ORM\Column(name="Configuracion_id_configuracion", type="integer", nullable=true)
     */
    private $configuracionConfiguracion;
    
    
     /**
     * Set tipo
     *
     * @param integer $tipo
     * @return Usuario
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
     * Set ci
     *
     * @param string $ci
     * @return Usuario
     */
    public function setCi($ci)
    {
        $this->ci = $ci;

        return $this;
    }

    /**
     * Get ci
     *
     * @return string 
     */
    public function getCi()
    {
        return $this->ci;
    }
    
    
     /**
     * Set nombre
     *
     * @param string $nombre
     * @return Usuario
     */
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;

        return $this;
    }

    /**
     * Get nombre
     *
     * @return string 
     */
    public function getNombre()
    {
        return $this->nombre;
    }
    
     /**
     * Set apellido
     *
     * @param string $apellido
     * @return Usuario
     */
    public function setApellido($apellido)
    {
        $this->apellido = $apellido;

        return $this;
    }

    /**
     * Get apellido
     *
     * @return string 
     */
    public function getApellido()
    {
        return $this->apellido;
    }

     /**
     * Set nick
     *
     * @param string $nick
     * @return Usuario
     */
    public function setNick($nick)
    {
        $this->nick = $nick;

        return $this;
    }

    /**
     * Get nick
     *
     * @return string 
     */
    public function getNick()
    {
        return $this->nick;
    }
    
     /**
     * Set pass
     *
     * @param string $pass
     * @return Usuario
     */
    public function setPass($pass)
    {
        $this->pass = $pass;

        return $this;
    }

    /**
     * Get pass
     *
     * @return string 
     */
    public function getPass()
    {
        return $this->pass;
    }
    
    
    
    
    /**
     * Set idUsuario
     *
     * @param integer $idUsuario
     * @return Usuario
     */
    public function setIdUsuario($idUsuario)
    {
        $this->idUsuario = $idUsuario;

        return $this;
    }

    /**
     * Get idUsuario
     *
     * @return integer 
     */
    public function getIdUsuario()
    {
        return $this->idUsuario;
    }
    
    
    
    
    
   
    
   /**
     * Set configuracionConfiguracion
     *
     * @param integer $configuracionConfiguracion
     * @return Usuario
     */
    public function setConfiguracionConfiguracion($configuracionConfiguracion)
    {
        $this->configuracionConfiguracion = $configuracionConfiguracion;

        return $this;
    }

    /**
     * Get configuracionConfiguracion
     *
     * @return integer 
     */
    public function getConfiguracionConfiguracion()
    {
        return $this->configuracionConfiguracion;
    }
    
    

}
