<?php

use Xylemical\Code\Definition\Structure;
use Xylemical\Code\Language;
use Xylemical\Code\NameManager;

return new Structure('Test\Code', $manager ?? new NameManager(new Language()));
