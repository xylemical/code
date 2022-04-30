<?php

use Xylemical\Code\Definition\Property;
use Xylemical\Code\Language;
use Xylemical\Code\NameManager;

return new Property('property', $manager ?? new NameManager(new Language()));
