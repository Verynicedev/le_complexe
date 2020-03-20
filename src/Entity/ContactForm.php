<?php

namespace App\Entity;

use Symfony\Component\Validator\Constraints as Assert;

class ContactForm
{
    /**
     * @Assert\Length(
     *      min = 2,
     *      max = 50,
     *      minMessage = "'{{ limit }}' caractères minimum.",
     *      maxMessage = "'{{ limit }}' caractères maximum.")
     * @Assert\NotBlank
     */
    private $name;

    /**
     * @Assert\Email(
     *     message = "'{{ value }}' vôtre email n'est pas valide")
     */
    private $email;

    /**
     * @Assert\Length(
     *      min = 6,
     *      max = 50,
     *      minMessage = "'{{ limit }}' caractères minimum.",
     *      maxMessage = "'{{ limit }}' caractères maximum.")
     * @Assert\NotBlank
     */
    private $subject;

    /**
     * @Assert\Length(
     *      min = 10,
     *      minMessage = "'{{ limit }}' caractères minimum.")
     * @Assert\NotBlank(message="Ne doit pas être vide")
     */
    private $message;

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    public function getSubject(): ?string
    {
        return $this->subject;
    }

    public function setSubject(string $subject): self
    {
        $this->subject = $subject;

        return $this;
    }

    public function getMessage(): ?string
    {
        return $this->message;
    }

    public function setMessage(string $message): self
    {
        $this->message = $message;

        return $this;
    }
}