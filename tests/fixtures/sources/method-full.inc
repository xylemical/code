<?php

use Xylemical\Code\Definition\Method;
use Xylemical\Code\Definition\Parameter;
use Xylemical\Code\Documentation;
use Xylemical\Code\Expression;
use Xylemical\Code\FullyQualifiedName;
use Xylemical\Code\Visibility;

$type = (new FullyQualifiedName('Test\\Code'))->setShorthand('Shorthand');
return (new Method('method'))
  ->setVisibility(Visibility::PROTECTED)
  ->setType($type)
  ->setDocumentation(new Documentation('Test'))
  ->setValue(new Expression('tank'))
  ->addParameters([
    (new Parameter('abc'))
      ->setDocumentation(new Documentation('testing'))
      ->setType($type)
      ->setValue(new Expression('done')),
  ]);
