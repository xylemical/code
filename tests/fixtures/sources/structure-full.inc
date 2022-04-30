<?php

use Xylemical\Code\Definition\Structure;
use Xylemical\Code\Documentation;
use Xylemical\Code\Language;
use Xylemical\Code\NameManager;

return (new Structure('Test\\Code', $manager ?? new NameManager(new Language())))
  ->setParent('Test\\Bar')
  ->setDocumentation(new Documentation('test'))
  ->addElements([
    include 'constant-full.inc',
    include 'method-full.inc',
    include 'property-full.inc',
  ])
  ->addMixins(['Test\\Code'])
  ->addContracts(['Test\\Code']);
