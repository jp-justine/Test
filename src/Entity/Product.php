<?php

namespace App\Entity;

use App\Repository\ProductRepository;
use DateTime;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ProductRepository::class)
 */
class Product
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $name;

    /**
     * @ORM\Column(type="float")
     */
    private $priceHT;

    /**
     * @ORM\Column(type="datetime")
     */
    private $creationDate;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $dateUpdate;

    public function getId(): ?string
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getPriceHT(): ?float
    {
        return $this->priceHT;
    }

    public function setPriceHT(float $priceHt): self 
    {
        $this->priceHt = $priceHt;

        return $this;
    }
    
    public function getcreationDate(): ?datetime
    {
        return $this->creationDate;
    }

    public function setcreationDate(datetime $creationDate): self 
    {
        $this->creationDate = $creationDate;

        return $this;
    }
    
    public function getdateUpdate(): ?dateTime
    {
        return $this->dateUpdate;
    }

    public function setdateUpdate(?dateTime $dateUpdate): self
    {
        $this->dateUpdate = $dateUpdate;

        return $this;
    }
}