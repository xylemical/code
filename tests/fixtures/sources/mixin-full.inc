<?php

use Xylemical\Code\Definition\Mixin;
use Xylemical\Code\Documentation;

return (new Mixin('Test\\Code'))
  ->setDocumentation(new Documentation('test'))
  ->addConstants([
    include 'constant-full.inc',
  ])
  ->addMethods([
    include 'method-full.inc',
  ])
  ->addProperties([
    include 'property-full.inc',
  ])
  ->addMixins([
    include 'mixin-generic.inc',
  ]);
