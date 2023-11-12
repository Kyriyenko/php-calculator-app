<?php

namespace App\Elements;

use App\Element;

class Time extends Element
{

    private string $type = 'time';
    public function render(): string
    {
        $element = "<div>
               <input type='$this->type' id='$this->id' name='$this->name' />";

        if ($this->description !== '') {
            $element .= "<label id='$this->id'>$this->description</label>";
        }

        $element .= "</div>";

        return $element;
    }
}