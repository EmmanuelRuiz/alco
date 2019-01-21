<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ElectricityData
 *
 * @ORM\Table(name="electricity_data", indexes={@ORM\Index(name="fk_electricity_data_visitors", columns={"visitors_id"}), @ORM\Index(name="fk_electricity_data_service_description", columns={"service_description_id"})})
 * @ORM\Entity
 */
class ElectricityData
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="created_at", type="datetime", nullable=true)
     */
    private $createdAt;

    /**
     * @var \ServiceDescription
     *
     * @ORM\ManyToOne(targetEntity="ServiceDescription")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="service_description_id", referencedColumnName="id")
     * })
     */
    private $serviceDescription;

    /**
     * @var \Visitor
     *
     * @ORM\ManyToOne(targetEntity="Visitor")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="visitors_id", referencedColumnName="id")
     * })
     */
    private $visitor;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCreatedAt(): ?\DateTimeInterface
    {
        return $this->createdAt;
    }

    public function setCreatedAt(?\DateTimeInterface $createdAt): self
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    public function getServiceDescription(): ?ServiceDescription
    {
        return $this->serviceDescription;
    }

    public function setServiceDescription(?ServiceDescription $serviceDescription): self
    {
        $this->serviceDescription = $serviceDescription;

        return $this;
    }

    public function getVisitor(): ?Visitor
    {
        return $this->visitor;
    }

    public function setVisitor(?Visitor $visitor): self
    {
        $this->visitor = $visitor;

        return $this;
    }


}
