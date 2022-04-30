<?php

use Xylemical\Code\Definition\Property;
use Xylemical\Code\Documentation;
use Xylemical\Code\Expression;
use Xylemical\Code\Language;
use Xylemical\Code\NameManager;
use Xylemical\Code\Visibility;

$manager = $manager ?? new NameManager(new Language());
$manager->get('Test\\Code')->setShorthand('Shorthand');
return (new Property('property', $manager))
  ->setVisibility(Visibility::PROTECTED)
  ->setType('Code\\Bar')
  ->setDocumentation(new Documentation('Test'))
  ->setStatic(TRUE)
  ->setValue(new Expression('tank'));
