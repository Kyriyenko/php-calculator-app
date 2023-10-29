<?php


class Figure
{
    public function __construct(
        private float|int $width,
        private float|int $height,
        private string $color,
        private string $type = 'square',
    ){
        $this->validate();
    }


    /**
     * @return void
     * @throws Exception
     */
    private function validate(): void
    {
        if ($this->type === 'square') {
            if ($this->width !== $this->height) {
                throw new Exception('Усі сторони квадрата повинні бути рівні');
            }
        } elseif ($this->type === 'rectangle') {
            if ($this->width === $this->height) {
                throw new Exception('Прямокутник повинен мати різні сторони');
            }
        }
    }

    /**
     * @return string
     */
    public function renderFigure(): string
    {
        $options = [
            'square' => "<div style='width: $this->width" . "px; height: $this->height"
                . "px; background-color: $this->color;'></div>",
            'rectangle' => "<div style='width: $this->width" . "px; height: $this->height"
                . "px; background-color: $this->color;'></div>",
            'circle' => "<div style='width: $this->width" . "px; height: $this->height"
                . "px; background-color: $this->color; border-radius: 50%;'></div>",
        ];

        if (!key_exists($this->type, $options)) return '<div style="color: red">Невідома фігура</div>';

        return $options[$this->type];
    }

    /**
     * @return string
     */
    public function calculate(): string
    {
        $radius = min($this->height, $this->width) / 2;

        $options = [
            'square' => [
                'perimeter' => $this->width * 4,
                'area' => $this->width * $this->width,
            ],
            'rectangle' => [
                'perimeter' => 2 * ($this->width + $this->height),
                'area' => $this->width * $this->height,
            ],
            'circle' => [
                'perimeter' => 2 * pi() * $radius,
                'area' => pi() * $radius * $radius,
            ],
        ];

        if (!key_exists($this->type, $options)) return '<div style="color: red">Помилка</div>';

        $result = "Периметр : {$options[$this->type]['perimeter']}<hr>";
        $result .= "Площа : {$options[$this->type]['area']}";

        return $result;
    }
}