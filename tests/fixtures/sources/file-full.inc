<?php

use Xylemical\Code\Definition\File;

return (new File('test'))
  ->addStructures([
    include 'mixin-full.inc',
  ]);
