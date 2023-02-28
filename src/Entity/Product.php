<?php

namespace App\Entity;

use App\Repository\ProductRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ProductRepository::class)]
class Product
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 75)]
    private ?string $Title = null;

    #[ORM\Column(length: 100)]
    private ?string $MetaTitle = null;

    #[ORM\Column(length: 100)]
    private ?string $Slug = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $Summary = null;

    #[ORM\Column(type: Types::SMALLINT)]
    private ?int $Type = null;

    #[ORM\Column(length: 100, nullable: true)]
    private ?string $SKU = null;

    #[ORM\Column]
    private ?float $Price = null;

    #[ORM\Column(nullable: true)]
    private ?float $Discount = null;

    #[ORM\Column(type: Types::SMALLINT)]
    private ?int $Quantity = null;

    #[ORM\Column(length: 255)]
    private ?string $Shop = null;

    #[ORM\Column]
    private ?\DateTimeImmutable $CreatedAt = null;

    #[ORM\Column]
    private ?\DateTimeImmutable $UpdatedAt = null;

    #[ORM\Column]
    private ?\DateTimeImmutable $PublishedAt = null;

    #[ORM\Column(nullable: true)]
    private ?\DateTimeImmutable $StartsAt = null;

    #[ORM\Column(nullable: true)]
    private ?\DateTimeImmutable $EndAt = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $Content = null;

    #[ORM\ManyToOne(inversedBy: 'Products')]
    #[ORM\JoinColumn(nullable: false)]
    private ?User $UserId = null;

    #[ORM\OneToMany(mappedBy: 'Product', targetEntity: Pictures::class)]
    private Collection $Pictures;


    public function __construct()
    {
        $this->Pictures = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitle(): ?string
    {
        return $this->Title;
    }

    public function setTitle(string $Title): self
    {
        $this->Title = $Title;

        return $this;
    }

    public function getMetaTitle(): ?string
    {
        return $this->MetaTitle;
    }

    public function setMetaTitle(string $MetaTitle): self
    {
        $this->MetaTitle = $MetaTitle;

        return $this;
    }

    public function getSlug(): ?string
    {
        return $this->Slug;
    }

    public function setSlug(string $Slug): self
    {
        $this->Slug = $Slug;

        return $this;
    }

    public function getSummary(): ?string
    {
        return $this->Summary;
    }

    public function setSummary(string $Summary): self
    {
        $this->Summary = $Summary;

        return $this;
    }

    public function getType(): ?int
    {
        return $this->Type;
    }

    public function setType(int $Type): self
    {
        $this->Type = $Type;

        return $this;
    }

    public function getSKU(): ?string
    {
        return $this->SKU;
    }

    public function setSKU(?string $SKU): self
    {
        $this->SKU = $SKU;

        return $this;
    }

    public function getPrice(): ?float
    {
        return $this->Price;
    }

    public function setPrice(float $Price): self
    {
        $this->Price = $Price;

        return $this;
    }

    public function getDiscount(): ?float
    {
        return $this->Discount;
    }

    public function setDiscount(?float $Discount): self
    {
        $this->Discount = $Discount;

        return $this;
    }

    public function getQuantity(): ?int
    {
        return $this->Quantity;
    }

    public function setQuantity(int $Quantity): self
    {
        $this->Quantity = $Quantity;

        return $this;
    }

    public function getShop(): ?string
    {
        return $this->Shop;
    }

    public function setShop(string $Shop): self
    {
        $this->Shop = $Shop;

        return $this;
    }

    public function getCreatedAt(): ?\DateTimeImmutable
    {
        return $this->CreatedAt;
    }

    public function setCreatedAt(\DateTimeImmutable $CreatedAt): self
    {
        $this->CreatedAt = $CreatedAt;

        return $this;
    }

    public function getUpdatedAt(): ?\DateTimeImmutable
    {
        return $this->UpdatedAt;
    }

    public function setUpdatedAt(\DateTimeImmutable $UpdatedAt): self
    {
        $this->UpdatedAt = $UpdatedAt;

        return $this;
    }

    public function getPublishedAt(): ?\DateTimeImmutable
    {
        return $this->PublishedAt;
    }

    public function setPublishedAt(\DateTimeImmutable $PublishedAt): self
    {
        $this->PublishedAt = $PublishedAt;

        return $this;
    }

    public function getStartsAt(): ?\DateTimeImmutable
    {
        return $this->StartsAt;
    }

    public function setStartsAt(?\DateTimeImmutable $StartsAt): self
    {
        $this->StartsAt = $StartsAt;

        return $this;
    }

    public function getEndAt(): ?\DateTimeImmutable
    {
        return $this->EndAt;
    }

    public function setEndAt(?\DateTimeImmutable $EndAt): self
    {
        $this->EndAt = $EndAt;

        return $this;
    }

    public function getContent(): ?string
    {
        return $this->Content;
    }

    public function setContent(?string $Content): self
    {
        $this->Content = $Content;

        return $this;
    }

    public function getUserId(): ?User
    {
        return $this->UserId;
    }

    public function setUserId(?User $UserId): self
    {
        $this->UserId = $UserId;

        return $this;
    }

    /**
     * @return Collection<int, Pictures>
     */
    public function getPictures(): Collection
    {
        return $this->Pictures;
    }

    public function addPicture(Pictures $picture): self
    {
        if (!$this->Pictures->contains($picture)) {
            $this->Pictures->add($picture);
            $picture->setProduct($this);
        }

        return $this;
    }

    public function removePicture(Pictures $picture): self
    {
        if ($this->Pictures->removeElement($picture)) {
            // set the owning side to null (unless already changed)
            if ($picture->getProduct() === $this) {
                $picture->setProduct(null);
            }
        }

        return $this;
    }
}
