<?php
function phptest(){
  echo 'tester';
}
?>
<!DOCTYPE html>
<html lang="zh_TW">
<head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8" />
<title>米粒測試頁</title>
<link rel="stylesheet" href="js/jquery/css/sunny/jquery-ui-1.8.11.custom.css">
<script src="js/jquery/jquery-1.5.1.min.js"></script>
<script src="js/jquery/jquery-ui-1.8.11.custom.min.js"></script>
<script>
$(function(){
	//date_add();
	//list_record();
	var fn_name = '';
	var btn_code = '';
	/* template
	fn_name = '';
	btn_code = '<input type="button" id="' + fn_name + '_btn" value="' + fn_name + '">';
	$('#btn_bar').append(btn_code);
	$('#' + fn_name + '_btn').click(function(){
    	$.ajax({
    		url : 'http://dev4.skysoft.com.tw/~millyhung/nsysu_iucc/web/?act=&fn=',
    		type : 'POST',
    		data : {type:'json',date:'2011-04-20',field:'y',amount:-3},
    		dataType : 'html',
    		error : function(err) {
    			$('#result').html('ERROR :<br>' + err.status + ' : ' + err.responseText);
    		},
    		success : function(res) {
    			$('#result').html(JSON.stringify(res));
    		}
    	});
	});
	$('#' + fn_name + '_btn').button();
	 */
	fn_name = 'show_hand';
	btn_code = '<input type="button" id="' + fn_name + '_btn" value="' + fn_name + '">';
	$('#btn_bar').append(btn_code);
	$('#' + fn_name + '_btn').click(function(){
		req='{"sc":0,"pi":1,"act":0,"si":"8b58d9cc0e4e262d983cc9f869301ace"}';
    	$.ajax({
    		url : 'http://dev4.skysoft.com.tw/~millyhung/20110425/blackjack.php?fn=game',
    		type : 'POST',
    		data : {s:null,req:req},
    		dataType : 'html',
    		error : function(err) {
    			$('#result').html('ERROR :<br>' + err.status + ' : ' + err.responseText);
    		},
    		success : function(res) {
    			$('#result').html(JSON.stringify(res));
    		}
    	});
	});
	$('#' + fn_name + '_btn').button();
	fn_name = 'add';
	btn_code = '<input type="button" id="' + fn_name + '_btn" value="' + fn_name + '">';
	$('#btn_bar').append(btn_code);
	$('#' + fn_name + '_btn').click(function(){
		req='{"sc":0,"pi":1,"act":1,"si":"8b58d9cc0e4e262d983cc9f869301ace"}';
    	$.ajax({
    		url : 'http://dev4.skysoft.com.tw/~millyhung/20110425/blackjack.php?fn=game',
    		type : 'POST',
    		data : {s:null,req:req},
    		dataType : 'html',
    		error : function(err) {
    			$('#result').html('ERROR :<br>' + err.status + ' : ' + err.responseText);
    		},
    		success : function(res) {
    			$('#result').html(JSON.stringify(res));
    		}
    	});
	});
	$('#' + fn_name + '_btn').button();
	fn_name = 'new_game';
	btn_code = '<input type="button" id="' + fn_name + '_btn" value="' + fn_name + '">';
	$('#btn_bar').append(btn_code);
	$('#' + fn_name + '_btn').click(function(){
		req='{"sc":1,"si":"8b58d9cc0e4e262d983cc9f869301ace"}';
    	$.ajax({
    		url : 'http://dev4.skysoft.com.tw/~millyhung/20110425/blackjack.php?fn=game',
    		type : 'POST',
    		data : {s:null,req:req},
    		dataType : 'html',
    		error : function(err) {
    			$('#result').html('ERROR :<br>' + err.status + ' : ' + err.responseText);
    		},
    		success : function(res) {
    			$('#result').html(JSON.stringify(res));
    		}
    	});
	});
	$('#' + fn_name + '_btn').button();
	fn_name = 'login';
	btn_code = '<input type="button" id="' + fn_name + '_btn" value="' + fn_name + '">';
	$('#btn_bar').append(btn_code);
	$('#' + fn_name + '_btn').click(function(){
		req='{"user":"milly","passwd":"827ccb0eea8a706c4c34a16891f84e7b"}';
    	$.ajax({
    		url : 'http://dev4.skysoft.com.tw/~millyhung/index.php?fn=login',
    		type : 'POST',
    		data : {s:null,req:req},
    		dataType : 'html',
    		error : function(err) {
    			$('#result').html('ERROR :<br>' + err.status + ' : ' + err.responseText);
    		},
    		success : function(res) {
    			$('#result').html(JSON.stringify(res));
    		}
    	});
	});
	$('#' + fn_name + '_btn').button();
});
</script>
</head>
<body>
	<div id="btn_bar"></div>
	<div id="result"></div>
	<?php
	phptest();
	?>
</body>
</html>

<?php
function big_hex_add($a, $b){
  $arr_a = str_split($a);
  $arr_b = str_split($b);
  $size_a = strlen($a);
  $size_b = strlen($b);
  $tmp = abs($size_a - $size_b);
  if ($tmp > 0){
    $arr_tmp = array_fill(0, $tmp, '0');
    if ($size_a > $size_b) {
      $arr_b = array_merge($arr_tmp, $arr_b);
      //array_pad($arr_b,$size_a, '0');
    } else {
      $arr_a = array_merge($arr_tmp, $arr_a);
      //array_pad($arr_a,$size_b, '0');
    }
  }
  $result = array();
  $carry = 0;
  for ($i = count($arr_a) - 1; $i >= 0 ;$i--) {
    $result[$i] = hexdec($arr_a[$i]) + hexdec($arr_b[$i]) + $carry;
    $carry = $result[$i] >> 4;
    if($carry > 0){
      $result[$i] -= 0x10 * $carry;
    }
    $result[$i] = dechex($result[$i]);
    //echo sprintf("i: %s\ta: %s\tb: %s\tr: %s\tcarry: %s\n", $i,$arr_a[$i],$arr_b[$i],$result[$i],$carry);
  }
  ksort($result);
  if($carry > 0){
    array_unshift($result, $carry);
  }
  return $result;
}//end of big_hex_add


/*
require_once 'lib/xtpl.php';

$row = array('id'=>'ID','name'=>'NAME','tel'=>'TEL','addr'=>'ADDR');
$xtpl = new XTPL;            //宣告一個 xtpl object
$xtpl->set_file('test_xtpl.php');	//output 的 html 頁面
$xtpl->assign('ROW',  $row);
$xtpl->parse('table.row');
$xtpl->parse('table');
$xtpl->out('main');
*/

/*
 * KKBOX lib db.php
require_once 'db.php';
$dbh = new DB('mysql','localhost','millyhung','millyhung','millyhung','utf8');
//如果使用query
$res = $dbh->query('select * from toupper_strcat');
//$res == false 表示語法或資料庫有問題
//沒查到資料$res也不會是false

//prepare有問題，不能用
$sdh = $dbh->prepare('insert into toupper_strcat(session_id, session_data) values(:id, :data)');
$sdh->execute(array(':id'=>'test',':data'=>'try'));
$result = $dbh->execute('select * from toupper_strcat');
for ($i = 0; $i < $dbh->count($result); $i++) {
  print_r($dbh->fetch_array($result));
  echo '<br>';
}
$dbh->close();
*/
/*
 * PHP mysql
$con = mysql_connect('localhost','millyhung','millyhung');
mysql_select_db('millyhung',$con);
$result = mysql_query('select session_data from toupper_strcat',$con);
$num_rows = mysql_num_rows($result);
for ( $i=0; $i<$num_rows; $i++ ) {
  list($value1, $value2) = mysql_fetch_row($result);
  echo $value1;
  echo $value2;
}
*/
/*
 * PDO
$dbh = new PDO('mysql:host=localhost;dbname=millyhung', 'millyhung', 'millyhung');
$sdh = $dbh->prepare('insert into toupper_strcat(session_id, session_data) values(:id, :data)');
$sdh->execute(array());
*/