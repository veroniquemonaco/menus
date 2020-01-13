<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\MenuRepository")
 * @ORM\HasLifecycleCallbacks()
 */
class Menu
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
    private $entree;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $plat;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $dessert;

    /**
     * @ORM\Column(type="date")
     */
    private $date;

    /**
     * @ORM\Column(type="integer")
     */
    private $weekDate;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $numberDay;

    /**
     * @return mixed
     */
    public function getWeekDate()
    {
        return $this->weekDate;
    }

    /**
     * @param mixed $weekDate
     */
    public function setWeekDate($weekDate): void
    {
        $this->weekDate = $weekDate;
    }

    /**
     * @return mixed
     */
    public function getNumberDay()
    {
        return $this->numberDay;
    }

    /**
     * @param mixed $numberDay
     */
    public function setNumberDay($numberDay): void
    {
        $this->numberDay = $numberDay;
    }

    /**
     * Permet d'initialiser la semaine du menu
     *
     * @ORM\PrePersist()
     * @ORM\PreUpdate()
     *
     * @return void
     *
     */
    public function prePersist()
    {
        if(empty($this->weekDate)) {
            $timestamp = $this->date->getTimestamp();
            $this->weekDate = date('W',$timestamp);
            $this->numberDay = date('w',$timestamp);
        }
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getEntree(): ?string
    {
        return $this->entree;
    }

    public function setEntree(string $entree): self
    {
        $this->entree = $entree;

        return $this;
    }

    public function getPlat(): ?string
    {
        return $this->plat;
    }

    public function setPlat(string $plat): self
    {
        $this->plat = $plat;

        return $this;
    }

    public function getDessert(): ?string
    {
        return $this->dessert;
    }

    public function setDessert(string $dessert): self
    {
        $this->dessert = $dessert;

        return $this;
    }

    public function getDate(): ?\DateTimeInterface
    {
        return $this->date;
    }

    public function setDate(\DateTimeInterface $date): self
    {
        $this->date = $date;

        return $this;
    }
}
