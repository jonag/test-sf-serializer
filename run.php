<?php

use Symfony\Component\PropertyInfo\Extractor\PhpDocExtractor;
use Symfony\Component\PropertyInfo\Extractor\ReflectionExtractor;
use Symfony\Component\PropertyInfo\PropertyInfoExtractor;

require_once 'vendor/autoload.php';

$phpDocExtractor = new PhpDocExtractor();
$reflectionExtractor = new ReflectionExtractor();

// array of PropertyListExtractorInterface
$listExtractors = array($phpDocExtractor, $reflectionExtractor);

// array of PropertyTypeExtractorInterface
$typeExtractors = array($phpDocExtractor, $reflectionExtractor);

// array of PropertyDescriptionExtractorInterface
$descriptionExtractors = array($phpDocExtractor, $phpDocExtractor);

// array of PropertyAccessExtractorInterface
$accessExtractors = array($phpDocExtractor, $reflectionExtractor);

$propertyInfo = new PropertyInfoExtractor(
    $listExtractors,
    $typeExtractors,
    $descriptionExtractors,
    $accessExtractors
);

$encoders = [new \Symfony\Component\Serializer\Encoder\JsonEncoder()];
$normalizers = [new \Symfony\Component\Serializer\Normalizer\DateTimeNormalizer('Y-m-d'), new \Symfony\Component\Serializer\Normalizer\ObjectNormalizer(null, null, null, $propertyInfo), new \Symfony\Component\Serializer\Normalizer\ArrayDenormalizer()];

$serialzer = new \Symfony\Component\Serializer\Serializer($normalizers, $encoders);

$json = <<<JSON
{
  "name": "Bob",
  "books": [
    {
      "name": "Livre A"
    },
    {
      "name": "Livre B"
    }
  ],
  "birthCountry": {
    "name": "France"
  },
  "birthDate": "1992-11-08"
}       
JSON;

dump($serialzer->deserialize($json, \App\Model\Author::class, 'json'));

