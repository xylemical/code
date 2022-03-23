<?php

use Xylemical\Code\Definition\Property;
use Xylemical\Code\Documentation;
use Xylemical\Code\Expression;
use Xylemical\Code\FullyQualifiedName;
use Xylemical\Code\Visibility;

return (new Property('property'))
  ->setVisibility(Visibility::PROTECTED)
  ->setType((new FullyQualifiedName('Test\\Code'))->setShorthand('Shorthand'))
  ->setDocumentation(new Documentation('Test'))
  ->setValue(new Expression('tank'));
