<?php

declare(strict_types=1);

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Serializer\Annotation\Groups;
use ApiPlatform\Core\Annotation\ApiFilter;
use App\Filter\GetReservationsFilter;
use ApiPlatform\Core\Bridge\Doctrine\Orm\Filter\SearchFilter;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Doctrine\ORM\Mapping\JoinColumn;

/**
 * Describes a reservation of a room.
 *
 * @ORM\Entity
 * @UniqueEntity("startTime", message="Ce créneau est déjà réservé, rafraichissez la page")
 * @ApiResource(
 *     collectionOperations={
 *         "get",
 *         "post"={"access_control"="(is_granted('ROLE_USER') and object.user == user) or is_granted('ROLE_ADMIN')"}
 *     },
 *     itemOperations={
 *          "get",
 *          "delete"={"access_control"="(is_granted('ROLE_USER') and object.user == user) or is_granted('ROLE_ADMIN')"},
 *     },
 *     normalizationContext={"groups"={"reservation"}},
 *     attributes={"pagination_items_per_page"=350}
 * )
 * @ApiFilter(GetReservationsFilter::class)
 * @ApiFilter(SearchFilter::class, properties={"room.id": "exact", "user.id": "exact"})
 */
class Reservation
{
    /**
     * @var int|null
     *
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Column(type="integer")
     * @Groups({"reservation"})
     */
    private $id;

    /**
     * @var User The user who book this reservation.
     *
     * @ORM\ManyToOne(targetEntity="User", inversedBy="reservations")
     * @JoinColumn(name="user_id", referencedColumnName="id", onDelete="CASCADE")
     * @Assert\NotNull
     * @Groups({"reservation"})
     */
    public $user;

    /**
     * @var Room The room which is booked by this reservation.
     *
     * @ORM\ManyToOne(targetEntity="Room", inversedBy="reservations")
     * @JoinColumn(name="room_id", referencedColumnName="id", onDelete="CASCADE")
     * @Assert\NotNull
     * @Groups({"reservation"})
     */
    public $room;

    /**
     * @var integer The date of the beginning of this reservation.
     *
     * @ORM\Column(name="start_time", type="integer", unique=true)
     * @Assert\NotNull
     * @Groups({"reservation"})
     */
    public $startTime;


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

    /**
     * @return int
     */
    public function getStartTime(): int
    {
        return $this->startTime;
    }

    /**
     * @param int $startTime
     */
    public function setStartTime(int $startTime): void
    {
        $this->startTime = $startTime;
    }

    




}
