<?php

require __DIR__ . '/vendor/autoload.php';

use Symfony\Component\Serializer\Encoder\{JsonEncoder, XmlEncoder};
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Serializer;
use App\User;

$encoders = [new XmlEncoder(), new JsonEncoder()];
$normalizers = [new ObjectNormalizer()];

$serializer = new Serializer($normalizers, $encoders);

$user = new User();

$jsonContent = $serializer->serialize($user, 'json');

$user = $serializer->deserialize($jsonContent, User::class, 'json');

dump($user);
dump('JSON: ' . $jsonContent);
