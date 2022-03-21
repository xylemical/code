# Code Object Model

Simple class, interface and trait object modelling.

## Install

The recommended way to install this library is [through composer](http://getcomposer.org).

```sh
composer require xylemical/code
```

## Usage

Creating a class representation:

```php
<?php

use Xylemical\Code\Expression;
use Xylemical\Code\Definition\Method;
use Xylemical\Code\Definition\Property;
use Xylemical\Code\Definition\Structure;
use Xylemical\Code\Definition\Contract;

$class = Structure::create('Xylemical\\Code\\Representation')
  ->addContract(Contract::create('Xylemical\\Code\\RepresentationInterface'))
  ->addProperty(Property::create('rep'))
  ->addMethod(Method::create('show')->setBody(Expression::create('return $this;')));
```

The model definition is equivalent to:

```php
<?php
namespace Xylemical\Code;

use Xylemical\Code\RepresentationInterface;

class Representation implements RepresentationInterface {

  public $rep;

  public function show() {
    return $this;
  }

}
```

Due to naming clashes, the class names are as follows:

* Structure represents a class,
* Contract represents an interface,
* Mixin represents a trait.

## License

MIT, see LICENSE.