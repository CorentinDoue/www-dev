<?php

declare(strict_types=1);

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Describes a reservation of a room.
 *
 * @ORM\Entity
 * @ApiResource(
 *     collectionOperations={
 *         "get",
 *         "post"={"access_control"="(is_granted('ROLE_USER') and object.user == user) or is_granted('ROLE_ADMIN')"}
 *     },
 *     itemOperations={
 *          "get",
 *          "delete"={"access_control"="(is_granted('ROLE_USER') and object.user == user) or is_granted('ROLE_ADMIN')"},
 *          "put"={"access_control"="(is_granted('ROLE_USER') and object.user == user) or is_granted('ROLE_ADMIN')"}
 *     }
 * )
 */
class Reservation
{
    /**
     * @var int|null
     *
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @var User The user who book this reservation.
     *
     * @ORM\ManyToOne(targetEntity="User", inversedBy="reservations")
     * @Assert\NotNull
     */
    public $user;

    /**
     * @var Room The room which is booked by this reservation.
     *
     * @ORM\ManyToOne(targetEntity="Room", inversedBy="reservations")
     * @Assert\NotNull
     */
    public $room;

    /**
     * @var \DateTimeInterface The date of the beginning of this reservation.
     *
     * @ORM\Column(name="start_time", type="datetime")
     * @Assert\NotNull
     */
    public $startTime;

    /**
     * @var \DateTimeInterface The date of the end of this reservation.
     *
     * @ORM\Column(name="end_time", type="datetime")
     * @Assert\NotNull
     */
    public $endTime;

    /**
     * @var \DateTimeInterface The creation date of this reservation.
     *
     * @ORM\Column(name="created_at", type="datetime")
     */
    private $createdAt;

    /**
     * @var \DateTimeInterface The last update date of this reservation.
     *
     * @ORM\Column(name="updated_at", type="datetime", nullable=true)
     */
    private $updatedAt;

    public function __construct()
    {
        $this->createdAt = new \DateTime();
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

    /**
     * @return User
     */
    public function getUser(): User
    {
        return $this->user;
    }

    /**
     * @param User $user
     */
    public function setUser(User $user): void
    {
        $this->user = $user;
    }

    /**
     * @return Room
     */
    public function getRoom(): Room
    {
        return $this->room;
    }

    /**
     * @param Room $room
     */
    public function setRoom(Room $room): void
    {
        $this->room = $room;
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
