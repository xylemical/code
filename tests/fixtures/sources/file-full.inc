<?php

use Xylemical\Code\Definition\File;

return (new File('test'))
  ->addStructures([
    include 'mixin-full.inc',
    include 'structure-full.inc',
    include 'contract-full.inc',
  ]);
