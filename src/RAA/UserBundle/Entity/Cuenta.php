<?php

namespace RAA\UserBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Cuenta
 *
 * @ORM\Table(name="cuenta")
 * @ORM\Entity
 */
class Cuenta
{
    /**
     * @var string
     *
     * @ORM\Column(name="descripcion", type="string", length=255, nullable=true)
     */
    private $descripcion;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fecha_ingeso", type="date", nullable=true)
     */
    private $fechaIngeso;

    /**
     * @var string
     *
     * @ORM\Column(name="Cuentacol", type="string", length=45, nullable=true)
     */
    private $cuentacol;

    /**
     * @var integer
     *
     * @ORM\Column(name="id_cuenta", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idCuenta;


}
