<?php

use Xylemical\Code\Definition\Contract;
use Xylemical\Code\Language;
use Xylemical\Code\NameManager;

return new Contract('Test\Code', $manager ?? new NameManager(new Language()));
