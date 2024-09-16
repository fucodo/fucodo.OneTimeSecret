<?php
namespace fucodo\OneTimeSecret\Domain\Model;

/*
 * This file is part of the fucodo.OneTimeSecret package.
 */

use fucodo\OneTimeSecret\Service\SpeakingNamesService;
use Neos\Flow\Annotations as Flow;
use Doctrine\ORM\Mapping as ORM;

/**
 * @Flow\Entity
 */
class Secret
{
    /**
     * @Flow\Validate(type="NotEmpty")
     * @var string
     */
    protected string $name = '';

    /**
     * @Flow\Validate(type="NotEmpty")
     * @var \DateTimeImmutable
     */
    protected \DateTimeImmutable $created;

    /**
     * @Flow\Validate(type="NotEmpty")
     * @var \DateTimeImmutable
     */
    protected \DateTimeImmutable $expires;

    /**
     * @ORM\Column(nullable=true)
     * @var \DateTimeImmutable|null
     */
    protected ?\DateTimeImmutable $seen = null;
    /**
     * @Flow\Validate(type="NotEmpty", validationGroups={"Create"})
     * @ORM\Column(type="text")
     * @var string
     */
    protected string $secret = '';

    /**
     * @var string
     */
    protected string $recipients = '';

    /**
     * @ORM\Column(type="text")
     * @var string
     */
    protected string $informMailWhenSeen = '';

    /**
     * @param string $secret
     * @param ?\DateTimeImmutable $created
     * @param ?\DateTimeImmutable $expires
     */
    public function __construct(string $secret, \DateTimeImmutable $created = null, \DateTimeImmutable $expires = null)
    {
        $this->secret = $secret;
        $this->created = $created ?? new \DateTimeImmutable();
        $this->expires = $expires ?? new \DateTimeImmutable('+7 days');
        $this->name = SpeakingNamesService::getName(3);
    }

    public function getCreated(): \DateTimeImmutable
    {
        return $this->created;
    }

    public function getExpires(): \DateTimeImmutable
    {
        return $this->expires;
    }

    public function setExpires(\DateTimeImmutable $expires): static
    {
        $this->expires = $expires;
        return $this;
    }

    public function getSeen(): ?\DateTimeImmutable
    {
        return $this->seen;
    }

    public function getSecretAndSetSeen(): string
    {
        if ($this->seen instanceof \DateTimeImmutable) {
            throw new \LogicException('Secret can not be seen twice');
        }
        $secret = $this->secret;
        $this->secret = '';
        $this->seen = new \DateTimeImmutable('now');
        return $secret;
    }

    public function getInformMailWhenSeen(): string
    {
        return $this->informMailWhenSeen;
    }

    public function setInformMailWhenSeen(string $informMailWhenSeen): static
    {
        $this->informMailWhenSeen = $informMailWhenSeen;
        return $this;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): static
    {
        $this->name = $name;
        return $this;
    }

    public function getRecipients(): string
    {
        return $this->recipients;
    }

    public function setRecipients(string $recipients): void
    {
        $this->recipients = $recipients;
    }
}
