<?php
$alternatives = $ahp->getAlternatives(2);
$criterias = $ahp->getCriteria(2);


foreach ($criterias as $criteria) {
    echo '<h1>' . $criteria['name'] . '</h1>';
    $countalt = count($alternatives);
    $k = 0;
    $satir = 0;
    $sutun = 0;

    echo '<form action=index.php method=get> ';
    echo '<table border="1">';

    for ($i = 0; $i < $countalt; $i++) {
        echo '<tr><td></td>';
        for ($i = 0; $i < $countalt; $i++) {

            echo "<td align=center>" . @$alternatives[$k++]['name'] . "</td>";
        }
        echo '</tr>';
        foreach ($alternatives as $key => $value) {
            $satir++;
            $sutun++;
            echo "<tr>";
            echo "<td>" . $value["name"] . "</td>";
            for ($i = 0; $i < $countalt; $i++) {
                echo "<td><input name='matris[" . $satir . "][" . $sutun++ . "]' type=text size=2></td>";
            }

            echo "</tr>";
            if ($sutun > 0) {
                $sutun = 0;
            }
        }
    }
    echo '</table>';
    echo '<input type=submit>';
    echo '</form>';
}
?>