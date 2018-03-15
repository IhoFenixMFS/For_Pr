<?php

namespace AudiovisualesBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * DatosFacturacin
 *
 * @ORM\Table(name="datos_facturacin")
 * @ORM\Entity(repositoryClass="AudiovisualesBundle\Repository\DatosFacturacinRepository")
 */
class DatosFacturacin
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

     /**
     * @var int
     *
     * @ORM\Column(name="solicitud", type="integer")
     */
    private $solicitud;

    /**
     * @var string
     *
     * @ORM\Column(name="empresa", type="string", length=100)
     */
    private $empresa;

    /**
     * @var string
     *
     * @ORM\Column(name="cif_nif", type="string", length=15
    private $cifNif;

    /**
     * @var int
     *
     * @ORM\Column(name="telefono", type="integer")
     */
    private $telefono;

    /**
     * @var string
     *
     * @ORM\Column(name="email", type="string", length=50)
     */
    private $email;

    /**
     * @var string
     *
     * @ORM\Column(name="contacto", type="string", length=50)
     */
    private $contacto;


    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set solicitud
     *
     * @param integer $solicitud
     *
     * @return DatosFacturacin
     */
    public function setSolicitud($solicitud)
    {
        $this->solicitud = $solicitud;

        return $this;
    }

    /**
     * Get solicitud
     *
     * @return int
     */
    public function getSolicitud()
    {
        return $this->solicitud;
    }

    /**
     * Set empresa
     *
     * @param string $empresa
     *
     * @return DatosFacturacin
     */
    public function setEmpresa($empresa)
    {
        $this->empresa = $empresa;

        return $this;
    }

    /**
     * Get empresa
     *
     * @return string
     */
    public function getEmpresa()
    {
        return $this->empresa;
    }

    /**
     * Set cifNif
     *
     * @param string $cifNif
     *
     * @return DatosFacturacin
     */
    public function setCifNif($cifNif)
    {
        $this->cifNif = $cifNif;

        return $this;
    }

    /**
     * Get cifNif
     *
     * @return string
     */
    public function getCifNif()
    {
        return $this->cifNif;
    }

    /**
     * Set telefono
     *
     * @param integer $telefono
     *
     * @return DatosFacturacin
     */
    public function setTelefono($telefono)
    {
        $this->telefono = $telefono;

        return $this;
    }

    /**
     * Get telefono
     *
     * @return int
     */
    public function getTelefono()
    {
        return $this->telefono;
    }

    /**
     * Set email
     *
     * @param string $email
     *
     * @return DatosFacturacin
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get email
     *
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set contacto
     *
     * @param string $contacto
     *
     * @return DatosFacturacin
     */
    public function setContacto($contacto)
    {
        $this->contacto = $contacto;

        return $this;
    }

    /**
     * Get contacto
     *
     * @return string
     */
    public function getContacto()
    {
        return $this->contacto;
    }
}

