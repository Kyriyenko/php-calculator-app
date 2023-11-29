<?php


namespace App\Elements;

use App\Element;

class Submit extends Element
{
    private string $type = 'submit';

    public function render(): string
    {
        $value = $this->value ?? 'submit';

        return "<input type='$this->type' value='$value' />";
    }
}