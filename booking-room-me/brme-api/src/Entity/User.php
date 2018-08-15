<?php
namespace App\Entity;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use Symfony\Component\Security\Core\User\UserInterface;
use ApiPlatform\Core\Annotation\ApiResource;
use Symfony\Component\Validator\Constraints as Assert;
use App\Controller\EncodeUser;
use Symfony\Component\Serializer\Annotation\Groups;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use ApiPlatform\Core\Annotation\ApiFilter;
use App\Filter\UserAllFilter;
use ApiPlatform\Core\Bridge\Doctrine\Orm\Filter\OrderFilter;

/**
 * @ORM\Table(name="users")
 * @ORM\Entity(repositoryClass="App\Repository\UserCustomRepository")
 * @UniqueEntity("email", message="Cet Email existe déjà")
 * @ApiResource(
 *     collectionOperations={
 *         "get"={"access_control"="is_granted('ROLE_ADMIN')"},
 *         "post"={"access_control"="is_granted('ROLE_ADMIN')",
 *                  "controller"=EncodeUser::class}
 *     },
 *     itemOperations={
 *          "get"={"access_control"="(is_granted('ROLE_USER') and object == user) or is_granted('ROLE_ADMIN')"},
 *          "delete"={"access_control"="is_granted('ROLE_ADMIN')"},
 *          "put"={"access_control"="(is_granted('ROLE_USER') and object == user) or is_granted('ROLE_ADMIN')"
 *                }
 *     },
 *     normalizationContext={"groups"={"read"}}
 * )
 * @ApiFilter(UserAllFilter::class)
 * @ApiFilter(OrderFilter::class, properties={"email", "firstname", "lastname", "type", "role", "bedRoomNumber"}, arguments={"orderParameterName"="order"})
 */
class User implements UserInterface
{
    /**
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @Groups({"read"})
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=100, unique=true)
     * @Assert\NotBlank
     * @Assert\Email()
     * @Groups({"read"})
     */
    private $email;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Groups({"read"})
     */
    private $firstname;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Groups({"read"})
     */
    private $lastname;

    /**
     * @ORM\Column(type="string", length=50, nullable=true)
     * @Groups({"read"})
     */
    private $type;

    /**
     * @ORM\Column(type="string", length=50, nullable=true)
     * @Groups({"read"})
     */
    private $role;

    /**
     * @ORM\Column(name="bed_room_number", type="string", length=25, nullable=true)
     * @Groups({"read"})
     */
    private $bedRoomNumber;

    /**
     * @ORM\Column(type="string", length=500)
     * @Assert\NotBlank
     */
    private $password;


    /**
     * @var Reservation[] All reservations booked by this user.
     *
     * @ORM\OneToMany(targetEntity="Reservation", mappedBy="user")
     * @Groups({"read"})
     */
    public $reservations;

    /**
     * @ORM\Column(name="created_at", type="datetime")
     * @Groups({"read"})
     */
    private $createdAt;

    /**
     * @ORM\Column(name="updated_at", type="datetime", nullable=true)
     * @Groups({"read"})
     */
    private $updatedAt;


    public function __construct($email, $lastname = "", $firstname = "", $type = "", $role = null, $bedRoomNumber = "")
    {
        $this->email = $email;
        $this->lastname = $lastname;
        $this->firstname = $firstname;
        $this->type = $type;
        $this->role = $role;
        $this->bedRoomNumber = $bedRoomNumber;
        $this->reservations = new ArrayCollection();
        $this->createdAt = new \DateTime();
    }

    /**
     * @ORM\PreUpdate
     */
    public function updateDate()
    {
        $this->setUpdatedAt(new \Datetime());
    }


    public function getSalt()
    {
        return null;
    }

    public function getPassword()
    {
        return $this->password;
    }

    public function setPassword($password)
    {
        $this->password = $password;
    }

    public function getRoles()
    {

        if ($this->role != Null)
        {
            return array_unique(array_merge(['ROLE_USER'], [$this->role]));
        }else{
            return array('ROLE_USER');
        }

    }

    public function eraseCredentials()
    {
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id): void
    {
        $this->id = $id;
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
     * Returns the username used to authenticate the user.
     *
     * @return string The username
     */
    public function getUsername()
    {
        return $this->email;
    }

    /**
     * @return mixed
     */
    public function getRole()
    {
        return $this->role;
    }

    /**
     * @param mixed $role
     */
    public function setRole($role): void
    {
        $this->role = $role;
    }

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param mixed $email
     */
    public function setEmail($email): void
    {
        $this->email = $email;
    }

    /**
     * @return mixed
     */
    public function getFirstname()
    {
        return $this->firstname;
    }

    /**
     * @param mixed $firstname
     */
    public function setFirstname($firstname): void
    {
        $this->firstname = $firstname;
    }

    /**
     * @return mixed
     */
    public function getLastname()
    {
        return $this->lastname;
    }

    /**
     * @param mixed $lastname
     */
    public function setLastname($lastname): void
    {
        $this->lastname = $lastname;
    }

    /**
     * @return mixed
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @param mixed $type
     */
    public function setType($type): void
    {
        $this->type = $type;
    }

    /**
     * @return mixed
     */
    public function getBedRoomNumber()
    {
        return $this->bedRoomNumber;
    }

    /**
     * @param mixed $bedRoomNumber
     */
    public function setBedRoomNumber($bedRoomNumber): void
    {
        $this->bedRoomNumber = $bedRoomNumber;
    }

    /**
     * @return Reservation[]
     */
    public function getReservations(): array
    {
        return $this->reservations->toArray();
    }

    /**
     * @param Reservation[] $reservations
     */
    public function setReservations(array $reservations): void
    {
        $this->reservations = $reservations;
    }





}
