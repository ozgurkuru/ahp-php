<style>
    table,th,td
    {
        border:1px solid black;
        text-align:center;
    }
</style>
<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

session_start();
require_once ('C:\xampp\htdocs\ahp\config.php');
//require_once ("C:\xampp\htdocs\ahp\lib\general.lib.php");
require_once ('C:\xampp\htdocs\ahp\lib\mysql.lib.php');
require_once ('C:\xampp\htdocs\ahp\lib\mysql.mod.php');
require_once ('C:\xampp\htdocs\ahp\lib\general.lib.php');
require_once ('C:\xampp\htdocs\ahp\class\ahp.php');
require_once ('C:\xampp\htdocs\ahp\class\login.php');
// onemli tanimlar

$database = new Database(
        array(
    'user' => Setting::MYSQL_USER,
    'password' => Setting::MYSQL_PASSWORD,
    'host' => Setting::MYSQL_HOST,
    'database' => Setting::MYSQL_DATABASE,
        )
);


$db = new db();

$ahp = new ahp();
$login = new login();

$is_login = $login->isLogin();
$alternatives = $ahp->getAlternatives(2);
$criterias = $ahp->getCriteria(2);
$countcriteria = count($criterias);
$countalt = count($alternatives);
$k = 0;
$satir = 0;
$sutun = 0;


switch ($_GET['page']) {
    case 'giris':

        $result=$login->loginUser($_POST);
        
        break;
    case '1':
        foreach ($criterias as $criteria) {
            echo '<h1>' . $criteria['name'] . '</h1>';


            echo '<form action=index.php?page=kaydet&islem=1 method=post> ';
            echo '<table border="1">';

            for ($i = 0; $i < $countalt; $i++) {
                echo '<tr><td></td>';
                for ($k = 0; $k < $countalt; $k++) {
                    echo "<td align=center>" . @$alternatives[$k]['name'] . "</td>";
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
        break;
    case '2':
        echo '<h1>Kriter Değerleme</h1>';

        echo '<form action=index.php?page=kaydet&islem=2 method=post> ';
        echo '<table border="1">';
        for ($i = 0; $i < $countcriteria; $i++) {
            echo '<tr><td></td>';
            for ($i = 0; $i < $countcriteria; $i++) {

                echo "<td align=center>" . @$criterias[$k++]['name'] . "</td>";
            }
            echo '</tr>';
            foreach ($criterias as $key => $value) {
                $satir++;
                $sutun++;
                echo "<tr>";
                echo "<td>" . $value["name"] . "</td>";
                foreach ($criterias as $key2 => $value2) {

                    $s = $sutun++;
                    if ($satir == $s) {
                        echo "<td><input name='matris[" . $value['id'] . "][" . $value2['id'] . "]' type=text size=2 value=1 readonly></td>";
                    } else {
                        echo "<td><input name='matris[" . $value['id'] . "][" . $value2['id'] . "]' type=text size=2></td>";
                    }
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
        break;
    case 'kaydet':
        switch ($_GET['islem']) {
            case '1':
                var_dump($_POST);
                break;
            case '2':
                include('pages/kriter_kaydet.php');
                break;
        }
        break;
    default:
        include('tema/index.php');
        break;
}


//$kriter_degerleme = $ahp->sampling($criterias, 2);
//foreach ($kriter_degerleme as $kriter_id) {
//    $parca = explode('-', $kriter_id);
//    $a = $parca[0];
//    $b = $parca[1];
//    if ($a != $b) {
//        $info_a = $ahp->getCriteriaInfo($a);
//        $info_b = $ahp->getCriteriaInfo($b);
//        echo $info_a['name'] . ' e göre ' . $info_b['name'] . ' değerlendirme:<br/>';
//    }
//}


