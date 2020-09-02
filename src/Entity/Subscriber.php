<?php

namespace App\Entity;

use App\Repository\SubscriberRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass=SubscriberRepository::class)
 */
class Subscriber
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=100)
     * @Assert\Email(
     *     message = "Cette adresse: '{{ value }}' n'est pas valide.")
     */
    private $mail;

    /**
     * @ORM\ManyToMany(targetEntity=Groupe::class, inversedBy="subscribers")
     */
    private $bands;

    public function __construct()
    {
        $this->bands = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getMail(): ?string
    {
        return $this->mail;
    }

    public function setMail(string $mail): self
    {
        $this->mail = $mail;

        return $this;
    }

    /**
     * @return Collection|Groupe[]
     */
    public function getBands(): Collection
    {
        return $this->bands;
    }

    public function addBand(Groupe $band): self
    {
        if (!$this->bands->contains($band)) {
            $this->bands[] = $band;
        }

        return $this;
    }

    public function removeBand(Groupe $band): self
    {
        if ($this->bands->contains($band)) {
            $this->bands->removeElement($band);
        }

        return $this;
    }
}
