<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * WaterproofingData
 *
 * @ORM\Table(name="waterproofing_data", indexes={@ORM\Index(name="fk_waterproofing_data_visitors", columns={"visitors_id"}), @ORM\Index(name="fk_waterproofing_data_service_description", columns={"service_description_id"})})
 * @ORM\Entity
 */
class WaterproofingData
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
     * @var float|null
     *
     * @ORM\Column(name="base", type="float", precision=10, scale=0, nullable=true)
     */
    private $base;

    /**
     * @var float|null
     *
     * @ORM\Column(name="height", type="float", precision=10, scale=0, nullable=true)
     */
    private $height;

    /**
     * @var float|null
     *
     * @ORM\Column(name="square_maters", type="float", precision=10, scale=0, nullable=true)
     */
    private $squareMaters;

    /**
     * @var float|null
     *
     * @ORM\Column(name="price", type="float", precision=10, scale=0, nullable=true)
     */
    private $price;

    /**
     * @var string|null
     *
     * @ORM\Column(name="comments", type="text", length=65535, nullable=true)
     */
    private $comments;

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

    public function getBase(): ?float
    {
        return $this->base;
    }

    public function setBase(?float $base): self
    {
        $this->base = $base;

        return $this;
    }

    public function getHeight(): ?float
    {
        return $this->height;
    }

    public function setHeight(?float $height): self
    {
        $this->height = $height;

        return $this;
    }

    public function getSquareMaters(): ?float
    {
        return $this->squareMaters;
    }

    public function setSquareMaters(?float $squareMaters): self
    {
        $this->squareMaters = $squareMaters;

        return $this;
    }

    public function getPrice(): ?float
    {
        return $this->price;
    }

    public function setPrice(?float $price): self
    {
        $this->price = $price;

        return $this;
    }

    public function getComments(): ?string
    {
        return $this->comments;
    }

    public function setComments(?string $comments): self
    {
        $this->comments = $comments;

        return $this;
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
