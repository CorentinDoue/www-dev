<?php
// api/src/Controller/BookSpecial.php

namespace App\Controller;

use ApiPlatform\Core\Serializer\JsonEncoder;
use App\Entity\User;
use App\DTO\UserNameDTO;
use App\Repository\UserCustomRepository;
use Doctrine\ORM\EntityManager;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Serializer\Encoder\XmlEncoder;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Serializer;

class GetUserNameDTO
{
    protected $userCustomRepository;



    public function __construct(UserCustomRepository $userCustomRepository)
    {
        $this->userCustomRepository = $userCustomRepository;
    }

    /**
     * @return JsonResponse
     */
    public function __invoke(): JsonResponse
    {
        $encoders = array(new XmlEncoder(), new JsonEncoder('json'));
        $normalizers = array(new ObjectNormalizer());

        $serializer = new Serializer($normalizers, $encoders);

        $data = $this->userCustomRepository->findAllPartial();
        $jsonContent = $serializer->serialize($data, 'json');
        return new JsonResponse($jsonContent,200,array(),true);
    }
}