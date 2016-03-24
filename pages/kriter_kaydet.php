<?php

$array = $_POST;
$matris = $array['matris'];
echo '<pre>';
$satir_sayisi = 0;
$m = count($matris);
$sutun_toplami = 0;
for ($j = 0; $j < $m; $j++) {

    for ($p = 0; $p < $m; $p++) {

        $deger = array_values(array_values($matris)[$p])[$j];
        $kesir = explode('/', $deger);
        if (count($kesir) > 1) {
            $ondalik = $kesir[0] / $kesir[1];
            $ondalik = round($ondalik, 4);
        } else {
            $ondalik = $kesir[0];
        }
        $sutun_toplami = $sutun_toplami + $ondalik;
    }

    $sutun_toplamlari[] = $sutun_toplami;
    $sutun_toplami = 0;
}
echo '</pre>';


echo '<table border="1">';
echo '<tr><td></td>';
for ($i = 0; $i < $countcriteria; $i++) {

    echo "<td align=center>" . @$criterias[$k++]['name'] . "</td>";
}
echo '<td>Sonuç</td>';
echo '</tr>';
$s = -1;
$a = -1;
$bolum = 0;
$satir_toplami = 0;
foreach ($criterias as $key => $value) {

    echo "<tr>";
    echo "<td>" . $value["name"] . "</td>";
    $a = $a + 1;
    foreach ($criterias as $key2 => $value2) {

        $s = $s + 1;
        $bolum = $bolum + 1;
        $kesir = explode('/', $matris[$value['id']][$value2['id']]);
        if (count($kesir) > 1) {
            $ondalik = $kesir[0] / $kesir[1];
            $ondalik = round($ondalik, 4);
        } else {
            $ondalik = $matris[$value['id']][$value2['id']];
        }

        $satir_degeri = round($ondalik / $sutun_toplamlari[$s], 4);
        
        $satir_toplami = $satir_degeri + $satir_toplami;
        echo "<td>" . $satir_degeri . "</td>";
        
        
    }
    $s = -1;
    $satir_toplami = round($satir_toplami / $bolum, 4);
    $satir_toplamlari[]=$satir_toplami;

    echo "<td>" . $satir_toplami . "</td>";
    $ahp->insertCriterValue(array(
        'kriter_id' => $value['id'],
        'deger' => $satir_toplami,
        'kullanici_id' => 1
    ));
    $satir_toplami = 0;
    $bolum = 0;
    echo "</tr>";
}
echo "<tr><td></td>";
foreach($sutun_toplamlari as $s){
    echo "<td>".$s."</td>";
    
}

echo "</tr>";
echo '</table>';
echo '<pre>';
var_dump($sutun_toplamlari);
var_dump($satir_toplamlari);
echo '</pre>';

$adim=count($sutun_toplamlari);
$max=0;
for($z=0;$z<$adim;$z++){
    $carpim=$sutun_toplamlari[$z]*$satir_toplamlari[$z];
    $max=$max+$carpim;
}


$ci=($max-$adim)/($adim-1);
echo round($ci,4).'<br>';

$cr=$ci/1.12;
echo round($cr,4);

echo '<br>'.$cr*100;