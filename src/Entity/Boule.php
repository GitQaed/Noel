<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use App\Repository\BouleRepository;
use Symfony\Component\Validator\Constraints as Assert;

#[ORM\Entity(repositoryClass: BouleRepository::class)]
class Boule
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 255)]
    #[Assert\NotBlank([ "message" =>"Veuillez renseigner un titre" ] )]
    #[Assert\Length(['min' => 3, 'max' => 30, "minMessage" => "3 caracteres minimum", "maxMessage" => "30 caracteres maximum"])]
    private $titre;

    #[ORM\Column(type: 'text')]
    #[Assert\NotBlank([ "message" =>"Veuillez renseigner une description" ] )]
    private $description;

    #[ORM\Column(type: 'integer')]
    #[Assert\NotBlank([ "message" =>"Veuillez renseigner un prix" ] )]
    private $prix;

    #[ORM\Column(type: 'integer', nullable: true)]
    private $promotion;

    #[ORM\Column(type: 'string', length: 255)]
    #[Assert\NotBlank([ "message" =>"Veuillez renseigner le chemin d'une photo" ] )]
    private $photo;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitre(): ?string
    {
        return $this->titre;
    }

    public function setTitre(?string $titre): self
    {
        $this->titre = $titre;

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

    public function getPrix(): ?int
    {
        return $this->prix;
    }

    public function setPrix(?int $prix): self
    {
        $this->prix = $prix;

        return $this;
    }

    public function getPromotion(): ?int
    {
        return $this->promotion;
    }

    public function setPromotion(?int $promotion): self
    {
        $this->promotion = $promotion;

        return $this;
    }

    public function getPhoto(): ?string
    {
        return $this->photo;
    }

    public function setPhoto(?string $photo): self
    {
        $this->photo = $photo;

        return $this;
    }
}