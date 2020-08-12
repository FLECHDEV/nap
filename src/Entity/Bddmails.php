<?php

namespace App\Entity;

use App\Repository\BddmailsRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=BddmailsRepository::class)
 */
class Bddmails
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
    private $mails;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getMails(): ?string
    {
        return $this->mails;
    }

    public function setMails(string $mails): self
    {
        $this->mails = $mails;

        return $this;
    }
}
