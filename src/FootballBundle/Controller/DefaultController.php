<?php

namespace FootballBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;

use Symfony\Component\Serializer\Serializer;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;

class DefaultController extends Controller
{
    public function indexAction()
    {
    }

    public function JsonResponse($entity, $status=200)
    {

        if (is_string($entity)) return new JsonResponse($entity, $status);

        $encoder = new JsonEncoder();
        $normalizer = new ObjectNormalizer();
        $normalizer->setIgnoredAttributes(['league']);

        $serializer = new Serializer([$normalizer], [$encoder]);

        return new JsonResponse( json_decode($serializer->serialize($entity, 'json')), $status );
    }

}
