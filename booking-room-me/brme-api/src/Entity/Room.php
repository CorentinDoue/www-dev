<?php

declare(strict_types=1);

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiProperty;
use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Serializer\Annotation\Groups;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;

/**
 * @ORM\Entity
 * @UniqueEntity("name", message="Cette salle existe déjà")
 * @ApiResource(
 *     collectionOperations={
 *         "get"={"groups"={"readRooms"}},
 *         "post"={"access_control"="is_granted('ROLE_ADMIN')"}
 *     },
 *     itemOperations={
 *          "get"={"groups"={"getRoom"}},
 *          "delete"={"access_control"="is_granted('ROLE_ADMIN')"},
 *          "put"={"access_control"="is_granted('ROLE_ADMIN')"}
 *     },
 *     attributes={"pagination_enabled"=false}
 * )
 */
class Room
{
    /**
     * @var int|null
     *
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Column(type="integer")
     * @Groups({"readRooms", "getRoom"})
     */
    private $id;

    /**
     * @var string the name of the room
     *
     * @ORM\Column(type="text")
     * @ApiProperty(iri="http://schema.org/name")
     * @Assert\NotBlank
     * @Groups({"readRooms", "getRoom"})
     */
    private $name;

    /**
     * @var string|null a description of the room
     *
     * @ORM\Column(type="text", nullable=true)
     * @ApiProperty(iri="http://schema.org/description")
     * @Groups({"readRooms", "getRoom"})
     */
    private $description;

    /**
     * @var string|null instructions to use the room
     *
     * @ORM\Column(type="text", nullable=true)
     * @ApiProperty(iri="http://schema.org/description")
     * @Groups({"readRooms", "getRoom"})
     */
    private $instructions;

    /**
     * @var \DateTimeInterface The creation date of this room.
     *
     * @ORM\Column(name="created_at", type="datetime")
     */
    private $createdAt;

    /**
     * @var \DateTimeInterface The last update date of this room.
     *
     * @ORM\Column(name="updated_at", type="datetime", nullable=true)
     */
    private $updatedAt;

    /**
     * @var Reservation[] All reservations of this room.
     *
     * @ORM\OneToMany(targetEntity="Reservation", mappedBy="room")
     * @Groups({"getRoom"})
     */
    public $reservations;

    public function __construct($name) {
        $this->name = $name;
        $this->createdAt = new \DateTime();
        $this->reservations = new ArrayCollection();
    }


    /**
     * @ORM\PreUpdate
     */
    public function updateDate()
    {
        $this->setUpdatedAt(new \Datetime());
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function setName(?string $name): void
    {
        $this->name = $name;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setDescription(?string $description): void
    {
        $this->description = $description;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }



    /**
     * @return null|string
     */
    public function getInstructions(): ?string
    {
        return $this->instructions;
    }

    /**
     * @param null|string $instructions
     */
    public function setInstructions(?string $instructions): void
    {
        $this->instructions = $instructions;
    }

    /**
     * @return mixed
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    /**
     * @param mixed $createdAt
     */
    public function setCreatedAt($createdAt): void
    {
        $this->createdAt = $createdAt;
    }

    /**
     * @return mixed
     */
    public function getUpdatedAt()
    {
        return $this->updatedAt;
    }

    /**
     * @param mixed $updatedAt
     */
    public function setUpdatedAt($updatedAt): void
    {
        $this->updatedAt = $updatedAt;
    }
}
