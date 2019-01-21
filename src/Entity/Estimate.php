<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Estimate
 *
 * @ORM\Table(name="estimate", indexes={@ORM\Index(name="fk_estimate_visitors_is", columns={"visitors_id"}), @ORM\Index(name="fk_estimate_service_description", columns={"service_description_id"})})
 * @ORM\Entity
 */
class Estimate
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
     * @var string|null
     *
     * @ORM\Column(name="client_name", type="string", length=255, nullable=true)
     */
    private $clientName;

    /**
     * @var string|null
     *
     * @ORM\Column(name="client_email", type="string", length=255, nullable=true)
     */
    private $clientEmail;

    /**
     * @var string|null
     *
     * @ORM\Column(name="client_phone", type="string", length=255, nullable=true)
     */
    private $clientPhone;

    /**
     * @var string|null
     *
     * @ORM\Column(name="location", type="string", length=255, nullable=true)
     */
    private $location;

    /**
     * @var string|null
     *
     * @ORM\Column(name="comments", type="text", length=65535, nullable=true)
     */
    private $comments;

    /**
     * @var string|null
     *
     * @ORM\Column(name="pdf", type="string", length=255, nullable=true)
     */
    private $pdf;

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

    public function getClientName(): ?string
    {
        return $this->clientName;
    }

    public function setClientName(?string $clientName): self
    {
        $this->clientName = $clientName;

        return $this;
    }

    public function getClientEmail(): ?string
    {
        return $this->clientEmail;
    }

    public function setClientEmail(?string $clientEmail): self
    {
        $this->clientEmail = $clientEmail;

        return $this;
    }

    public function getClientPhone(): ?string
    {
        return $this->clientPhone;
    }

    public function setClientPhone(?string $clientPhone): self
    {
        $this->clientPhone = $clientPhone;

        return $this;
    }

    public function getLocation(): ?string
    {
        return $this->location;
    }

    public function setLocation(?string $location): self
    {
        $this->location = $location;

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

    public function getPdf(): ?string
    {
        return $this->pdf;
    }

    public function setPdf(?string $pdf): self
    {
        $this->pdf = $pdf;

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
