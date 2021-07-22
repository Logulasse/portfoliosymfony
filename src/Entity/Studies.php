<?php

namespace App\Entity;

use App\Repository\StudiesRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=StudiesRepository::class)
 */
class Studies
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $schoolName;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $startYearSchool;

    /**
     * @ORM\Column(type="integer")
     */
    private $endYearSchool;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $description;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getSchoolName(): ?string
    {
        return $this->schoolName;
    }

    public function setSchoolName(?string $schoolName): self
    {
        $this->schoolName = $schoolName;

        return $this;
    }

    public function getStartYearSchool(): ?int
    {
        return $this->startYearSchool;
    }

    public function setStartYearSchool(?int $startYearSchool): self
    {
        $this->startYearSchool = $startYearSchool;

        return $this;
    }

    public function getEndYearSchool(): ?int
    {
        return $this->endYearSchool;
    }

    public function setEndYearSchool(int $endYearSchool): self
    {
        $this->endYearSchool = $endYearSchool;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): self
    {
        $this->description = $description;

        return $this;
    }
}
