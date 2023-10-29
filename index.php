<div class="wrapper">
    <form action="/" method="POST">
        <h4>Квадрат</h4>

        <input type="hidden" name="figure_type" value="square">

        <label for="height"></label>
        <input id="height" name="height" type="number" min="1" placeholder="height">

        <label for="with"></label>
        <input id="with" name="with" type="number" min="1" placeholder="with">

        <label for="color"></label>
        <input id="color" name="color" type="color">

        <input type="submit" value="намалювати">
    </form>

    <form action="/" method="POST">
        <h4>Прямокутник</h4>

        <input type="hidden" name="figure_type" value="rectangle">

        <label for="height"></label>
        <input id="height" name="height" type="number" min="1" placeholder="height">

        <label for="with"></label>
        <input id="with" name="with" type="number" min="1" placeholder="with">

        <label for="color"></label>
        <input id="color" name="color" type="color">

        <input type="submit" value="намалювати">
    </form>

    <form action="/" method="POST">
        <h4>Коло</h4>
        <input type="hidden" name="figure_type" value="circle">

        <label for="height"></label>
        <input id="height" name="height" type="number" min="1" placeholder="height">

        <label for="with"></label>
        <input id="with" name="with" type="number" min="1" placeholder="with">

        <label for="color"></label>
        <input id="color" name="color" type="color">

        <input type="submit" value="намалювати">
    </form>

    <hr>

    <?php
    require_once('Figure.php');

    $with = $_REQUEST['with'] ?? null;
    $height = $_REQUEST['height'] ?? null;
    $color = $_REQUEST['color'] ?? null;
    $type = $_REQUEST['figure_type'] ?? null;

    if ($with && $height && $color && $type) {
        $figure = new Figure($with, $height, $color, $type);

        echo $figure->renderFigure();
        echo '<hr>';
        echo $figure->calculate();
    }
    ?>
</div>
