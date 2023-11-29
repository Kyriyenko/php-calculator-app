<?php

namespace App;

class FormGenerator
{

    public function __construct(
        private readonly string $method = 'GET',
        private readonly string $action = '',
        private string          $form = '',
    ){}


    /**
     * @param array $elements
     * @return string
     */
    public function generateForm(array $elements = []): string
    {
        $this->openForm();

        foreach ($elements as $element)
        {
            if (!($element instanceof Element)) {
                throw new \InvalidArgumentException('Invalid element type. Expected instance of App\Element.');
            }

            $this->addElement($element);
        }

        $this->closeForm();

        return $this->form;
    }

    private function openForm(): void
    {
        $this->form .= "<form method=\"{$this->method}\" action=\"{$this->action}\">";
    }

    private function addElement(Element $element): void
    {
        $this->form .= $element->render();
    }

    private function closeForm(): void
    {
        $this->form .= '</form>';
    }
}