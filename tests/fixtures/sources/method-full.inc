<?php

use Xylemical\Code\Definition\Method;
use Xylemical\Code\Definition\Parameter;
use Xylemical\Code\Documentation;
use Xylemical\Code\Expression;
use Xylemical\Code\FullyQualifiedName;
use Xylemical\Code\Visibility;
use Xylemical\Code\NameManager;
use Xylemical\Code\Language;

$manager = $manager ?? new NameManager(new Language());
$type = (new FullyQualifiedName('Test\\Code', $manager))->setShorthand('Shorthand');
return (new Method('method', $manager))
  ->setVisibility(Visibility::PROTECTED)
  ->setType($type)
  ->setDocumentation(new Documentation('Test'))
  ->setValue(new Expression('tank'))
  ->setAbstract(TRUE)
  ->setStatic(TRUE)
  ->addParameters([
    (new Parameter('abc', $manager))
      ->setDocumentation(new Documentation('testing'))
      ->setType($type)
      ->setValue(new Expression('done')),
  ]);
