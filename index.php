<div class="wrapper">
    <form action="/" method="POST">
        <h4>Квадрат</h4>

        <input type="hidden" name="figure_type" value="square">

        <label for="side"></label>
        <input id="side" name="side" type="number" min="1" placeholder="Введіть тут довжину сторони квадрата...">

        <label for="color"></label>
        <input id="color" name="color" type="color">

        <input type="submit" value="намалювати">
    </form>

    <form action="/" method="POST">
        <h4>Прямокутник</h4>

        <input type="hidden" name="figure_type" value="rectangle">

        <label for="height"></label>
        <input id="height" name="height" type="number" min="1" placeholder="висота">

        <label for="with"></label>
        <input id="with" name="with" type="number" min="1" placeholder="ширина">

        <label for="color"></label>
        <input id="color" name="color" type="color">

        <input type="submit" value="намалювати">
    </form>

    <form action="/" method="POST">
        <h4>Коло</h4>
        <input type="hidden" name="figure_type" value="circle">

        <label for="radius"></label>
        <input id="radius" name="radius" type="number" min="1" placeholder="радіус">

        <label for="color"></label>
        <input id="color" name="color" type="color">

        <input type="submit" value="намалювати">
    </form>

    <hr>

    <?php
    require_once('Figure.php');

    $with = $_REQUEST['with'] ?? null;
    $height = $_REQUEST['height'] ?? null;
    $side = $_REQUEST['side'] ?? null;
    $color = $_REQUEST['color'] ?? null;
    $radius = $_REQUEST['radius'] ?? null;
    $type = $_REQUEST['figure_type'] ?? null;

    if ($type && $color) {
        $figure = new Figure($side, $with, $height, $radius, $color, $type);

        echo $figure->renderFigure();
        echo '<hr>';
        echo $figure->calculate();
    }
    ?>
</div>
