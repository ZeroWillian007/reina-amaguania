<?php

namespace RAA\UserBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Configuracion
 *
 * @ORM\Table(name="configuracion")
 * @ORM\Entity
 */
class Configuracion
{
    /**
     * @var integer
     *
     * @ORM\Column(name="param1", type="integer", nullable=true)
     */
    private $param1;

    /**
     * @var integer
     *
     * @ORM\Column(name="param2", type="integer", nullable=true)
     */
    private $param2;

    /**
     * @var integer
     *
     * @ORM\Column(name="param3", type="integer", nullable=true)
     */
    private $param3;

    /**
     * @var integer
     *
     * @ORM\Column(name="id_configuracion", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idConfiguracion;


}
