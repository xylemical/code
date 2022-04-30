<?php

use Xylemical\Code\Definition\Method;
use Xylemical\Code\Definition\Parameter;
use Xylemical\Code\Documentation;
use Xylemical\Code\Expression;
use Xylemical\Code\Language;
use Xylemical\Code\NameManager;
use Xylemical\Code\Visibility;

$manager = $manager ?? new NameManager(new Language());
$manager->get('Test\\Code')->setShorthand('Shorthand');
return (new Method('method', $manager))
  ->setVisibility(Visibility::PROTECTED)
  ->setType('Test\\Code')
  ->setDocumentation(new Documentation('Test'))
  ->setValue(new Expression('tank'))
  ->setAbstract(TRUE)
  ->setStatic(TRUE)
  ->addParameters([
    (new Parameter('abc', $manager))
      ->setDocumentation(new Documentation('testing'))
      ->setType('Test\\Code')
      ->setValue(new Expression('done')),
  ]);
