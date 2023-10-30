<?php

class Figure
{
    public function __construct(
        private null|float|int $side,
        private null|float|int $width,
        private null|float|int $height,
        private null|float|int $radius,
        private string $color,
        private string $type = 'square'
    ) {
        $this->validate();
    }

    private function getDiameter(): float|int
    {
        return $this->radius * 2;
    }

    /**
     * @return void
     * @throws Exception
     */
    private function validate(): void
    {
        if ($this->type === 'square') {
            if ($this->side <= 0) {
                throw new Exception('Сторона квадрата повинна бути більше нуля');
            }
        } elseif ($this->type === 'rectangle') {
            if ($this->width <= 0 || $this->height <= 0 || $this->width === $this->height) {
                throw new Exception('Сторони прямокутника повинні бути більше нуля та різними');
            }
        } elseif ($this->type === 'circle') {
            if ($this->radius <= 0) {
                throw new Exception('Радіус круга повинен бути більше нуля');
            }
        } else {
            throw new Exception('Невідомий тип фігури');
        }
    }

    /**
     * @return string
     */
    public function renderFigure(): string
    {
        $options = [
            'square' => "<div style='width: {$this->side}px; height: {$this->side}px; background-color: {$this->color};'></div>",
            'rectangle' => "<div style='width: {$this->width}px; height: {$this->height}px; background-color: {$this->color};'></div>",
            'circle' => "<div style='width: {$this->getDiameter()}px; height: {$this->getDiameter()}px; background-color: {$this->color}; border-radius: 50%;'></div>",
        ];

        if (!key_exists($this->type, $options)) return '<div style="color: red">Невідома фігура</div>';

        return $options[$this->type];
    }

    /**
     * @return string
     */
    public function calculate(): string
    {
        $options = [
            'square' => [
                'perimeter' => $this->side * 4,
                'area' => $this->side * $this->side,
            ],
            'rectangle' => [
                'perimeter' => 2 * ($this->width + $this->height),
                'area' => $this->width * $this->height,
            ],
            'circle' => [
                'perimeter' => 2 * pi() * $this->radius,
                'area' => pi() * $this->radius * $this->radius,
            ],
        ];

        if (!key_exists($this->type, $options)) return '<div style="color: red">Помилка</div>';

        $result = "Периметр: {$options[$this->type]['perimeter']}<br>";
        $result .= "Площа: {$options[$this->type]['area']}";

        return $result;
    }
}