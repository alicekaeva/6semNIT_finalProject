<?php

namespace App\Entity;

use App\Repository\ArticleRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ArticleRepository::class)
 */
class Article
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $name;

    /**
     * @ORM\ManyToMany(targetEntity=Author::class, inversedBy="article_id")
     */
    private $author_id;

    /**
     * @ORM\ManyToOne(targetEntity=Issue::class, inversedBy="article_id")
     * @ORM\JoinColumn(nullable=false)
     */
    private $issue_id;

    /**
     * @ORM\ManyToOne(targetEntity=Genre::class, inversedBy="article_id")
     * @ORM\JoinColumn(nullable=false)
     */
    private $genre_id;

    public function __construct()
    {
        $this->author_id = new ArrayCollection();
    }

    public function getId(): ?int
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

    /**
     * @return Collection<int, Author>
     */
    public function getAuthorId(): Collection
    {
        return $this->author_id;
    }

    public function addAuthorId(Author $authorId): self
    {
        if (!$this->author_id->contains($authorId)) {
            $this->author_id[] = $authorId;
        }

        return $this;
    }

    public function removeAuthorId(Author $authorId): self
    {
        $this->author_id->removeElement($authorId);

        return $this;
    }

    public function getIssueId(): ?Issue
    {
        return $this->issue_id;
    }

    public function setIssueId(?Issue $issue_id): self
    {
        $this->issue_id = $issue_id;

        return $this;
    }

    public function getGenreId(): ?Genre
    {
        return $this->genre_id;
    }

    public function setGenreId(?Genre $genre_id): self
    {
        $this->genre_id = $genre_id;

        return $this;
    }

    public function __toString()
    {
        return strval( $this->getName() );
    }
}
