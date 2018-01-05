<?php
error_reporting(E_ALL^E_NOTICE^E_WARNING);
/*
三要点：
第一，初始化二个数组，一个存放已找到的最近节点，目的是防止重复寻找(如数组中已有a和b,下次从b就不用重复从b到a)，
另一个存放除最近节点外所有与a连接的节点距离(存放c和d)。
第二，从a出发，找到和a最近的节点b。
第三，从这个最近的节点b出发，找出与这个节点最近的节点c，将这个通过b找到的节点c到a的距离与所有其它
节点到a的距离比较。
最后，重复三个步骤即可完成全部查找。
*/

$list = [
    'a' => ['b' => 69],
    'b' => ['a' => 69, 'e' => 59, 'f' => 210],
    'c' => ['f' => 75],
    'd' => ['e' => 180],
    'e' => ['b' => 59, 'd' => 180, 'g' => 100, 'f' => 290],
    'f' => ['g' => 200, 'e' => 290, 'b' => 210, 'c' => 75],
    'g' => ['e' => 100, 'f' => 200],
];
function find($node, $list, $next, $a = [])
{
    if (count($next) == count($list)) {
        return $_GET = [array_merge($next, $a)];
    }
    foreach ($list[$node[strlen($node) - 1]] as $k => $v) {
        foreach ($next as $n => $m) {
            if ($k == $n[strlen($n) - 1]) {
                unset($list[$node][$k]);
            }
        }
    }
    foreach ($list[$node[strlen($node) - 1]] as $k => $v) {
        $a[$node . $k] = $next[$node] + $v;
    }
    foreach ($a as $k => $v) {
        foreach ($next as $n => $m) {
            if ($k[strlen($k) - 1] == $n[strlen($n) - 1]) {
                unset($a[$k]);
            }
        }
    }
    foreach ($a as $k => $v) {
        if (!isset($smallest) || $smallest > $v) {
            $smallest = $v;
            $node = $k;
        }
    }
    //$node=$node[strlen($node)-1];
    $next[$node] = $smallest;
    unset($smallest);
    find($node, $list, $next, $a);
}

function getRouter($start, $end)
{

    $city_code = [
        'a' => "十堰市",
        'b' => "荆门市",
        'c' => "黄冈市",
        'd' => "恩施自治区",
        'e' => "宜昌",
        'f' => "武汉",
        'g' => "荆州市",
    ];


    $msg = ["router" => [], "len" => ""];

    foreach ($_GET[0] as $key => $val) {


        if ($start == $city_code[$key[0]] && $end == $city_code[$key[(strlen($key)) - 1]]) {
            $rarray = array();
            for ($i = 0; $i < strlen($key); $i++) {
                $rarray[$i] = $city_code[$key[$i]];
            }
            $msg['len'] = $val;
            $msg['router'] = $rarray;
        }


    }
    return $msg;
}

$ms =null;

if (@$_POST['start'] != "" && @$_POST['end']!="") {


    $startname = @$_POST['start'];
    $endname = @$_POST['end'];
    $city_codes = [
        '十堰市' => "a",
        '荆门市' => "b",
        '黄冈市' => "c",
        '恩施自治区' => "d",
        '宜昌' => "e",
        '武汉' => "f",
        '荆州市' => "g",
    ];
    find($city_codes[$startname], $list, [$endname => 0]);
    $ms = getRouter($startname, $endname);
    echo "路线指示:";
    $msg="";
    foreach($ms['router'] as $key=>$val){
        echo "--->".$val;
        $msg.=$val.",";
    }
    $msg=substr($msg, 0, -1);
    $fopen=fopen("map.temp","wb")or die('文件不在');
    fwrite($fopen,$msg);
    fclose($fopen);
    echo "<br>";
    echo "路途长度:".$ms['len'];
    echo "
           <iframe src='b.html' width='100%' height='100%' frameborder='0' scrolling='no'></iframe>
    ";
}

?>