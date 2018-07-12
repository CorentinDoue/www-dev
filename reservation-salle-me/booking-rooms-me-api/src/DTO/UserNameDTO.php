<?php
/**
 * Created by PhpStorm.
 * User: corentin
 * Date: 11/07/18
 * Time: 20:13
 */

namespace App\DTO;

use App\Controller\GetUserNameDTO;
use ApiPlatform\Core\Annotation\ApiResource;

/**
 * Class UserNameDTO
 * @package App\DTO
 * @ApiResource(
 *     collectionOperations={
 *         "get"={
 *              "method"="GET",
 *              "path"="/users/names",
 *              "controller"=GetUserNameDTO::class
 *          }
 *     },
 *     itemOperations={}
 * )
 */
class UserNameDTO
{
    public $id;
    public $lastname;
    public $surname;

    /**
     * UserNameDTO constructor.
     * @param $id
     * @param $lastname
     * @param $surname
     */
    public function __construct($id, $lastname, $surname)
    {
        $this->id = $id;
        $this->lastname = $lastname;
        $this->surname = $surname;
    }
}