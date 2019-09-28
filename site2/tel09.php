<html>
<head>
<meta charset="utf-8">
<title>Сайт web-студії "Web-DECO" </title>
<script src="js/clock.js"></script>
<script src="js/game.js"></script>
<script type="text/javascript">
function send()
{ 	var valid = true;
	var elems = document.forms[0].elements;
	for(var i=0; i<document.forms[0].length; i++){
		if( elems[i].getAttribute('type') == 'text' ||
			elems[i].getAttribute('type') == 'password' ||
			elems[i].getAttribute('type') == 'email' ) {
			if(elems[i].value == '') {
				elems[i].style.border = '2px solid red';
				valid = false;
			}
		}
	}	
	if(!valid) {
		alert('Заповніть всі поля !!!');
		return false;
	} else 
	{ var r = /^\w+@\w+\.\w{2,4}$/i;
		if (!r.test(elems[3].value)) {
			alert('Заповніть вірно E-Mail !!');
			return false;
	    } else return true;
	}
}	
window.onload = function() {setInterval(clockPainting, 1000);}	
</script>
  <style>
   .shadowtext {
    text-shadow: 1px 2px 2px white, 0 0 1em red; /* Параметры тени */
    color: navy; /* Белый цвет текста */
    font-size: 2em; /* Размер надписи */
   }
  </style>

</head>
<body background="images/bg.jpg">
<table border="1" align="center"   background="images/bg-3.jpg" cellpadding="10" >
     <tr>
      <td colspan="2" height="150" align="right" hspace="5">
		<img src="images/logo.png" height="140" width="140" align="left" >	  
	  <font size="5" color="Maroon"><h1 class="shadowtext">Сайт web-студії "Web-DECO"</h1></font></td>
    </tr>
    <tr>
      <td colspan="2">
	  <font size="4"><b><a href="index.php">Наші послуги</a>&nbsp;&nbsp; <a href="input.php">Про нас</a>&nbsp;&nbsp; <a href="log.php">Інформація</a>&nbsp; &nbsp;<a href="foto.php">Фотогалерея</a></b></font></td>
    </tr>
    <tr>
      <td width="30%" valign="top" background="images/bg.jpg">
<center><canvas id="canvas" height="120" width="120"></canvas></center>
<br>
<hr>
	  <font size="5" color="navy"><h2>Новини</h2></font>
      <font size="5" ><ul>
      <li><a href="tel.php">Телефонний довідник м.Рівне</a></li>
      <li><a href="#">Сайт ТМ "Новашкола" </a></li>
      <li><a href="#">Редизайн сайту classno.com.ua</a></li>
      <li><a href="#">Розробка CMS для Metro Cash&Carry</a></li>
      <li><a href="#">Сайт-візитка дизайнера інтерфейсів</a></li><br>
      <p align="right"><a href="#">інші...</a></p>
      </ul>
      </font>
 	  <hr>
<H1 align="center"><font color="green">Реєстрація</font></H1>
 <form action="forma.php" method="post" onsubmit="return send();">
<TABLE align="center" bgcolor="#ccc">
<TR>
<TD><font color="green">Прізвище</font>: </TD>
<TD><input type="text" size="10" maxlength="20" name="name2"> </TD>
</TR>

<TR>
<TD><font color="green">Ім'я</font> :  </TD>
<TD><input type="text" size="10" maxlength="20" name="name1"> </TD>
</TR>
<TR>
<TD><font color="green">Бажаний Login</font> :  </TD>
<TD><input type="text" size="10" maxlength="20" name="nic1"> </TD>
</TR>
<TR>
<TD><font color="green">E-Mail</font> : </TD>
<TD><input type="email" size="10" maxlength="20" name="email"></TD>
</TR>
<TR>
<TD><font color="green">Пароль</font> : </TD>
<TD><input type="password" size="10" maxlength="20" name="password"></TD>
</TR>
</TABLE>

<p align="center"> 
<input type="submit" value="Зареєструватись" >
<input type="reset" value="Очистити">
</p>
 </form> 
<hr>
      <td width="70%" background="images/bg.jpg" valign="top"><font size="5" color="navy">
<!-- ===================================================================-->	  
<?php$db_conn =mysqli_connect("localhost","user","l","tel09");
mysqli_set_charset($db_conn,'utd8');
$rez="SELECT * FROM tel09 WHERE";
$stre="SELECT * FROM street WHERE";
$rl=0;$num=0;
$ntel=$_POST['ntel'];
$fio=$_POST['fio'];
$street=$_POST['street'];
$ndom=$_POST['ndom'];
if($fio!=""):
fio=strtoupper($fio);
$rl=1;
$rez="$rez a_name LIKE'$fio%'";
endif;
if($street!=0):
	if($rl==1):
	$rez="rez AND";
	endif;
	$rl=1;
	$rez=" $rez street=$street";
	endif;
	if($ndom !=""):
	if($rl==1):
	$rez="rez AND";
	endif;
	$rl=1;
	$rez="$rez house LIKE '$ndom%'";
	endif;
	if($ntel != ""):
	$ntel =str_replace("-","",$ntel);
	if($rl==1):
	$rez="$rez AND";
	endif;
	$rl=1;
	$rez="rez phone LOKE '%$ntel%'";
	endif;
	?>
	
	
<!-- =====================================================================================-->
<TABLE align=center border=0 cellPadding=0 cellSpacing=0>
<TBODY>
<TR>
<TD>

<TABLE align=center border=0 cellPadding=0 cellSpacing=0 WIDTH="100%">
<TBODY>
<TR>
<TD align="middle" height=52 width=600>
<B><I><FONT FACE="Arial" Size=+2>
Телефонний довідник міста Рівне.</FONT></I></B>
</TD></TR></TBODY></TABLE>
<CENTER><B><FONT SIZE=+1;
Результат пошуку телефону &nbsp;&nbsp;&nbsp;&nbsp;<?echo "$ntel"?> </FONT> </B></CENTER>
<!-- =====================================================================================-->
<?php
if(!@db_conn):
echo "<strong>";
echo "База данних тимчасово не працює.<br>"; echo "<hr></strong>";
else:
if($rl==1):
$result =mysql_query($db_conn,4rez) or die("Querry failed");
$num=mysql_num_rows($result);
endif;
endif;
$i=0;
if($num==0 OR $rl==0)
{
	echo"<hr><center><strong>";
	echo "Книга не містить жодного запису.<br>";
echo "</strong></center>";
}else{
	$i=0;
	if($num>500){$num=500;
	echo "<hr><center><strong>";
	echo "Ви не вірно вказали дані для запиту.<br>";
	echo "Кількість запитів перевищує 500.<br>";
	echo"</strong></center>";}
	else{
		echo "<hr><center><strong>";
		echo "Знайдено $num записів. <br>";
echo "</strong></center>"}}
	echo "<CENTER><table border=3 color=red><tr>";
	echo "<th><b><font size=+1 color=#006600>Прізвище</font></b></th>";
	echo "<th><b><font size=+1 color=#006600>Телефон</font></b></th>";
	echo "<th><b><font size=+1 color=#006600>Адреса</font></b></th>";
	while($line=mysqli_fetch_array($result, MYSQL_NUM)){
		echo "<tr><td><b> %nbsp;%nbsp;%nbsp;%nbsp;".$line[1];
		echo "</b></td><td><b> %nbsp;%nbsp;%nbsp;%nbsp;".$line[0];
		$stl="SELECT * FROM street WHERE n_street=".$line[2];
		$res_st=mysql_query($db_conn,$stl) or die("Query fdailed");
		$lst=mysqli_fetch_array($res_St,MYSQLI_NUM);
	echo"</b></td><td><b>%nbsp;%nbsp;%nbsp;%nbsp;".$lst[1]."%nbsp;%nbsp;буд".$line[3]."кв.".$line[4];}
	echo "</b></td></tr></table></CENTER>";
	?>
<!-- =====================================================================================-->
   </td>
    </tr>
    <tr>
      <td background="images/bg-3.jpg" colspan="2" valign="middle" height="90"><font size="4">Сайт розробив "Автор"</font></td>
     </tr>
 </table>
 </body>