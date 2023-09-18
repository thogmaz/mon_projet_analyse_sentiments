<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;


 #[ORM\Entity(repositoryClass:App\Repository\ArticleRepository::class)]
 
class Article
{
    
     #[ORM\Id]
     #[ORM\GeneratedValue]
     #[ORM\Column(type:"integer")]
     
    private $id;

    
     #[ORM\Column(type:"string", length:255)]
     
    private $title;

    
     #[ORM\Column(type:"text")]
     
    private $content;

    
     #[ORM\Column(type:"datetime")]
     
    private $createdAt;

    
     #[ORM\ManyToOne(targetEntity:User::class, inversedBy:"articles")]
     #[ORM\JoinColumn(nullable:false)]
     
    private $user;

    
     #[ORM\ManyToOne(targetEntity:Category::class, inversedBy:"articles")]
     #[ORM\JoinColumn(nullable:false)]
     
    private $category;

    
     #[ORM\ManyToMany(targetEntity:Tag::class, inversedBy:"articles")]
     
    private $tags;

    public function __construct()
    {
        $this->tags = new ArrayCollection();
    }

    // Getters and setters

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): self
    {
        $this->title = $title;

        return $this;
    }

    public function getContent(): ?string
    {
        return $this->content;
    }

    public function setContent(string $content): self
    {
        $this->content = $content;

        return $this;
    }

    public function getCreatedAt(): ?\DateTimeInterface
    {
        return $this->createdAt;
    }

    public function setCreatedAt(\DateTimeInterface $createdAt): self
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    public function getUser(): ?User
    {
        return $this->user;
    }

    public function setUser(?User $user): self
    {
        $this->user = $user;

        return $this;
    }

    public function getCategory(): ?Category
    {
        return $this->category;
    }

    public function setCategory(?Category $category): self
    {
        $this->category = $category;

        return $this;
    }

    /**
     * @return Collection|Tag[]
     */
    public function getTags(): Collection
    {
        return $this->tags;
    }

    public function addTag(Tag $tag): self
    {
        if (!$this->tags->contains($tag)) {
            $this->tags[] = $tag;
        }

        return $this;
    }

    public function removeTag(Tag $tag): self
    {
        $this->tags->removeElement($tag);

        return $this;
    }
}
