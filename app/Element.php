<?php

namespace App;

// All elements based on https://developer.mozilla.org/en-US/docs/Web/HTML/Element/input
// Feel free to add your own to Elements/YourCustomElement.php

abstract class Element
{


   public function __construct(
       protected mixed $id = '',
       protected string $name = '',
       protected string $value = '',
       protected string $description = ''
   ){}

   abstract public function render(): string;
}