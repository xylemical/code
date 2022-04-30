<?php

use Xylemical\Code\Definition\Contract;
use Xylemical\Code\Documentation;
use Xylemical\Code\Language;
use Xylemical\Code\NameManager;

return (new Contract('Test\\Code', $manager ?? new NameManager(new Language())))
  ->setDocumentation(new Documentation('test'))
  ->addElements([
    include 'constant-full.inc',
    include 'method-full.inc',
  ]);
