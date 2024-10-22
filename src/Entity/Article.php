<?php
namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ArticleRepository")
 */
#[ORM\Entity(repositoryClass: 'App\Repository\ArticleRepository')]
class Article
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private ?int $id;

    #[ORM\Column(type: 'string', length: 100)]
    private string $libelle;

    #[ORM\Column(type: 'float')]
    private float $prixAppro;

    #[ORM\Column(type: 'integer')]
    private int $qteStock;

    // Getters and Setters

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLibelle(): ?string
    {
        return $this->libelle;
    }

    public function setLibelle(string $libelle): self
    {
        $this->libelle = $libelle;
        return $this;
    }

    public function getPrixAppro(): ?float
    {
        return $this->prixAppro;
    }

    public function setPrixAppro(float $prixAppro): self
    {
        $this->prixAppro = $prixAppro;
        return $this;
    }

    public function getQteStock(): ?int
    {
        return $this->qteStock;
    }

    public function setQteStock(int $qteStock): self
    {
        $this->qteStock = $qteStock;
        return $this;
    }
}
