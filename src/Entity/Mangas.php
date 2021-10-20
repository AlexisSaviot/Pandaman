<?php

namespace App\Entity;

use App\Repository\MangasRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=MangasRepository::class)
 */
class Mangas
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
    private $Title;

    /**
     * @ORM\ManyToMany(targetEntity=Author::class, inversedBy="mangas")
     */
    private $AuthorID;

    /**
     * @ORM\ManyToOne(targetEntity=Editors::class, inversedBy="mangas")
     */
    private $EditorID;

    /**
     * @ORM\ManyToMany(targetEntity=Categories::class, inversedBy="mangas")
     */
    private $CategoryID;

    /**
     * @ORM\ManyToMany(targetEntity=Themes::class, inversedBy="mangas")
     */
    private $ThemeID;

    /**
     * @ORM\Column(type="text")
     */
    private $Description;

    /**
     * @ORM\Column(type="integer")
     */
    private $Volumes;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Image;

    /**
     * @ORM\Column(type="date")
     */
    private $FrenchRelease;

    /**
     * @ORM\Column(type="date")
     */
    private $JapanRelease;

    /**
     * @ORM\OneToMany(targetEntity=Comments::class, mappedBy="MangasID")
     */
    private $comments;

    /**
     * @ORM\ManyToMany(targetEntity=User::class, mappedBy="favorites")
     */
    private $users;

    public function __construct()
    {
        $this->AuthorID = new ArrayCollection();
        $this->CategoryID = new ArrayCollection();
        $this->ThemeID = new ArrayCollection();
        $this->comments = new ArrayCollection();
        $this->users = new ArrayCollection();
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

    /**
     * @return Collection|Author[]
     */
    public function getAuthorID(): Collection
    {
        return $this->AuthorID;
    }

    public function addAuthorID(Author $authorID): self
    {
        if (!$this->AuthorID->contains($authorID)) {
            $this->AuthorID[] = $authorID;
        }

        return $this;
    }

    public function removeAuthorID(Author $authorID): self
    {
        $this->AuthorID->removeElement($authorID);

        return $this;
    }

    public function getEditorID(): ?Editors
    {
        return $this->EditorID;
    }

    public function setEditorID(?Editors $EditorID): self
    {
        $this->EditorID = $EditorID;

        return $this;
    }

    /**
     * @return Collection|Categories[]
     */
    public function getCategoryID(): Collection
    {
        return $this->CategoryID;
    }

    public function addCategoryID(Categories $categoryID): self
    {
        if (!$this->CategoryID->contains($categoryID)) {
            $this->CategoryID[] = $categoryID;
        }

        return $this;
    }

    public function removeCategoryID(Categories $categoryID): self
    {
        $this->CategoryID->removeElement($categoryID);

        return $this;
    }

    /**
     * @return Collection|Themes[]
     */
    public function getThemeID(): Collection
    {
        return $this->ThemeID;
    }

    public function addThemeID(Themes $themeID): self
    {
        if (!$this->ThemeID->contains($themeID)) {
            $this->ThemeID[] = $themeID;
        }

        return $this;
    }

    public function removeThemeID(Themes $themeID): self
    {
        $this->ThemeID->removeElement($themeID);

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->Description;
    }

    public function setDescription(string $Description): self
    {
        $this->Description = $Description;

        return $this;
    }

    public function getVolumes(): ?int
    {
        return $this->Volumes;
    }

    public function setVolumes(int $Volumes): self
    {
        $this->Volumes = $Volumes;

        return $this;
    }

    public function getImage(): ?string
    {
        return $this->Image;
    }

    public function setImage(string $Image): self
    {
        $this->Image = $Image;

        return $this;
    }

    public function getFrenchRelease(): ?\DateTimeInterface
    {
        return $this->FrenchRelease;
    }

    public function setFrenchRelease(\DateTimeInterface $FrenchRelease): self
    {
        $this->FrenchRelease = $FrenchRelease;

        return $this;
    }

    public function getJapanRelease(): ?\DateTimeInterface
    {
        return $this->JapanRelease;
    }

    public function setJapanRelease(\DateTimeInterface $JapanRelease): self
    {
        $this->JapanRelease = $JapanRelease;

        return $this;
    }

    public function __toString(){
        return $this->Title;
    }

    /**
     * @return Collection|Comments[]
     */
    public function getComments(): Collection
    {
        return $this->comments;
    }

    public function addComment(Comments $comment): self
    {
        if (!$this->comments->contains($comment)) {
            $this->comments[] = $comment;
            $comment->setMangasID($this);
        }

        return $this;
    }

    public function removeComment(Comments $comment): self
    {
        if ($this->comments->removeElement($comment)) {
            // set the owning side to null (unless already changed)
            if ($comment->getMangasID() === $this) {
                $comment->setMangasID(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|User[]
     */
    public function getUsers(): Collection
    {
        return $this->users;
    }

    public function addUser(User $user): self
    {
        if (!$this->users->contains($user)) {
            $this->users[] = $user;
            $user->addFavorite($this);
        }

        return $this;
    }

    public function removeUser(User $user): self
    {
        if ($this->users->removeElement($user)) {
            $user->removeFavorite($this);
        }

        return $this;
    }
}
