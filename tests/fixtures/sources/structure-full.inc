<?php

use Xylemical\Code\Definition\Structure;
use Xylemical\Code\Documentation;

return (new Structure('Test\\Code'))
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
  ])
  ->addContracts([
    include 'contract-full.inc',
  ]);