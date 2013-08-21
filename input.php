<html>
	<head>
		<title>Notebookspec</title>
		<meta charset='utf-8'>
		<link href="maincss.css" rel="stylesheet" type="text/css">
	</head>
	<body>
		<div id="ext_container">
		<div class="header_top clearfix">
		<a id="logo"></a>
		</div>
		<div class="header_bottom clearfix"><font color="#ffffff">เพิ่มข้อมูล</font></div><br>
		<form method="post" action="input.php">	
			<input type = "submit" name="notebook" value="เพิ่มข้อมูล Notebook"/> <input type = "submit" name="cpu" value="เพิ่มข้อมูล CPU"/> <input type = "submit" name="graphic" value="เพิ่มข้อมูลการ์ดจอ"/>
		</form>
		<br>
		<?php
			$notebook = "swipl -q -f notebook.pl -g \"forall(notebooks(BRAND,VERSION,CPUNO,GPCARD,HDD,MEMORY,WEIGTH,SCREEN,OS,PRICE),writeln([PRICE]))\",halt";
			$notebookoutput = shell_exec($notebook);
			$notebookoutput = explode("[", $notebookoutput);
			$countnotebookoutput = count($notebookoutput)-1;

			$cpu = "swipl -q -f notebook.pl -g \"forall(cpus(CPUBRAND,CPUNAME,CPUNUMBER,CPUSPEED,CPUSPEEDUP,CPUCASE),writeln([CPUNUMBER]))\",halt";
			$cpuoutput = shell_exec($cpu);
			$cpuoutput = explode("[", $cpuoutput);
			$countcpuoutput = count($cpuoutput)-1;

			$graphic = "swipl -q -f notebook.pl -g \"forall(gpcard(GPBRAND,GPNO,GPSIZE),writeln([GPBRAND]))\",halt";
			$graphicoutput = shell_exec($graphic);
			$graphicoutput = explode("[", $graphicoutput);
			$countgraphicoutput = count($graphicoutput)-1;
			echo "<center><br>จำนวน notebook ที่มี : ".$countnotebookoutput." รุ่น <br> จำนวน CPU ที่มี : ".$countcpuoutput." รุ่น <br> จำนวนการ์ดจอที่มี : ".$countgraphicoutput." รุ่น <center><br>";
		?>
		<center><font color="blue">* * * * * * * * * * * * * * * * * *</font></center>
		<?php
			$s_notebook = $_POST['notebook'];
			$s_cpu = $_POST['cpu'];
			$s_graphic = $_POST['graphic'];
			$notebook = "swipl -q -f notebook.pl -g \"forall(notebooks(BRAND,VERSION,CPUNO,GPCARD,HDD,MEMORY,WEIGTH,SCREEN,OS,PRICE),writeln([BRAND,VERSION,CPUNO,GPCARD,HDD,MEMORY,WEIGTH,SCREEN,OS,PRICE]))\",halt";
			$cpu = "swipl -q -f notebook.pl -g \"forall(cpus(CPUBRAND,CPUNAME,CPUNUMBER,CPUSPEED,CPUSPEEDUP,CPUCASE),writeln([CPUBRAND,CPUNAME,CPUNUMBER,CPUSPEED,CPUSPEEDUP,CPUCASE]))\",halt";
			$graphic = "swipl -q -f notebook.pl -g \"forall(gpcard(GPBRAND,GPNO,GPSIZE),writeln([GPBRAND,GPNO,GPSIZE]))\",halt.";

			$notebookoutput = shell_exec($notebook);
			$arraynotebook = cutarray($notebookoutput);

			$cpuoutput = shell_exec($cpu);
			$arraycpu = cutarray($cpuoutput);

			$graphicoutput = shell_exec($graphic);
			$arraygraphic = cutarray($graphicoutput);
				if($s_notebook=="เพิ่มข้อมูล Notebook"){				
					echo "<form method=\"post\" action=\"input.php\">	
						ค่ายผูจำหน่าย : <input type = \"text\" name=\"brand\" value=\"-\"/> version : <input type = \"text\" name=\"version\" value=\"-\"/>
						cpu : ";
						cpuselect();
					echo "<br> การ์ดจอ : ";
						graphicselect();
					echo" ความจุ HDD : <input type = \"text\" name=\"hdd\" value=\"-\"/> memory : <input type = \"text\" name=\"memory\" value=\"-\"/><br>";
					echo "น้ำหนัก : <input type = \"text\" name=\"weigth\" size = \"5%\" value=\"-\"/> ขนาดหน้าจอ : <input type = \"text\" name=\"screen\" size = \"5%\" value=\"-\"/> ระบบปฎิบัติการ : <input type = \"text\" name=\"os\" value=\"-\"/> ราคา : <input type = \"text\" name=\"price\" value=\"-\"/>";
					echo "<br><br><input type = \"submit\" name=\"sendnotebook\" value=\"ยืนยัน\" value=\"-\"/>";
				}else if ($s_cpu=="เพิ่มข้อมูล CPU") {
					echo "<form method=\"post\" action=\"input.php\">	
						ค่ายผูผลิต : <input type = \"text\" name=\"brand\" value=\"-\"/> ตระกูล : <input type = \"text\" name=\"version\" value=\"-\"/>";
					echo" รุ่น : <input type = \"text\" name=\"cpunumber\" value=\"-\"/> <br> ความเร็ว : <input type = \"text\" name=\"cpuspeed\" size = \"10%\" value=\"-\"/>";
					echo "ความเร็วเพื่ม : <input type = \"text\" name=\"speedup\" size = \"10%\" value=\"-\"/> case : <input type = \"text\" name=\"case\" size = \"10%\" value=\"-\"/>";
					echo "<br><br><input type = \"submit\" name=\"sendcpu\" value=\"ยืนยัน\" value=\"-\"/>";
				}else if ($s_graphic=="เพิ่มข้อมูลการ์ดจอ") {
					echo "<form method=\"post\" action=\"input.php\">	
						ค่ายผูผลิต : <input type = \"text\" name=\"gbrand\" value=\"-\"/> รุ่น : <input type = \"text\" name=\"gversion\" value=\"-\"/>";
					echo" memory : <input type = \"text\" name=\"graphicsize\" value=\"-\"/>";
					echo "<br><br><input type = \"submit\" name=\"sendgraphic\" value=\"ยืนยัน\" value=\"-\"/>";
				}elseif ($_POST['sendnotebook']=="ยืนยัน") {
					$check=0;
					$cpuarr=array();
					$graphicarr=array();
					$brand=$_POST['brand'];
					$version=$_POST['version'];
					$cpuselect=$_POST['cpuselect'];
					$graphicselect=$_POST['graphicselect'];
					$hdd=$_POST['hdd'];
					$memory=$_POST['memory'];
					$weigth=$_POST['weigth'];
					$screen=$_POST['screen'];
					$os=$_POST['os'];
					$price=$_POST['price'];
					if($brand==" "){
						$brand="-";
					}
					if($version==" "){
						$version="-";
					}
					if($cpuselect==" "){
						$cpuarr[2]="-";
					}else{
						$cpuselect=str_replace("\n", "", $cpuselect);
						$cpuarr=explode("-", $cpuselect);
						$cpuarr[2]=substr($cpuarr[2], 0,(strlen($cpuarr[2])));
					}
					if($graphicselect==" "){
						$graphicarr[1]="-";
					}else{
						$graphicselect=str_replace("\n", "", $graphicselect);
						$graphicarr=explode("-", $graphicselect);
						$graphicarr[1]=substr($graphicarr[1], 0,(strlen($graphicarr[1])));
					}
					if($hdd==" "){
						$hdd="-";
					}else{
						$hdd=$hdd*1;
						if($hdd==0){
							$hdd="-";
						}
					}
					if($memory==" "){
						$memory="-";
					}else{
						$memory=$memory*1;
						if($memory==0){
							$memory="-";
						}
					}
					if($weigth==" "){
						$weigth="-";
					}else{
						$weigth=$weigth*1;
						//$weigth=$weigth*1000;
						if($weigth==0){
							$weigth="-";
						}
					}
					if($screen==" "){
						$screen="-";
					}else{
						$screen=$screen*1;
						if($screen==0){
							$screen="-";
						}
					}
					if($os==" "){
						$os="-";
					}
					if($price==" "){
						$price="-";
					}else{
						$price=str_replace(",","",$price);
						$price=$price*1;
						if($price==0){
							$price="-";
						}
					}
					foreach ($arraynotebook as $key => $value) {
						$value[0]=substr($value[0], 1);
						if($brand==$value[0]&&$version==$value[1]&&substr($cpuarr[2], 0,(strlen($cpuarr[2])-1))==$value[2]&&substr($graphicarr[1], 0,(strlen($graphicarr[1])-1))==$value[3]&&$hdd==$value[4]&&$memory==$value[5]&&$weigth==$value[6]&&$screen==$value[7]&&$os==$value[8]&&$price==$value[9]){
							$check=1;
						}else{

						}
					}
					if($brand=="-"||$cpuselect=="-"||$graphicselect=="-"||$brand==" "||$cpuselect==" "||$graphicselect==" "){
						echo "<font color=red size=4> กรุณากรอกข้อมูล ผู้จำหน่าย หรืือ cpu หรือ การ์ดจอ ด้วย</font>";
					}elseif($check!=1){
						$file = "notebook.pl";
						$read = file($file);
						$open = fopen($file, "w");
						$hello;
						if ($open==FALSE) {
						  echo "<font color=red size=4>ไม่สามารถแก้ไขไฟล์ได้</font>";
						}else{
							foreach ($read as $key => $value) {
							  if($value=="%endnotebook\n"){
							    $expot= "notebook('".$brand."','".$version."','".substr($cpuarr[2], 0,(strlen($cpuarr[2])-1))."','".substr($graphicarr[1], 0,(strlen($graphicarr[1])-1))."',".$hdd.",".$memory.",".$weigth.",".$screen.",'".$os."',".$price.").\n";
							   $hello=$hello.$expot.$value."";
							   }else{
							        $hello=$hello.$value;
							  }
							}
							fwrite($open, $hello);
							fclose($open);
							echo "<font color=blue size=4>บันทึกข้อมูล</font>";
						}
					}else{
							echo "<font color=red size=4>ข้อมูลนี้มีอยู่แล้ว</font>";
							$check=0;
					}
				}elseif ($_POST['sendcpu']=="ยืนยัน") {
					$pointtrue=0;
					$cpubrand=$_POST['brand'];
					$cpuversion=$_POST['version'];
					$cpunumber=$_POST['cpunumber'];
					$cpuspeed=$_POST['cpuspeed'];
					$cpuspeedup=$_POST['speedup'];
					$cpucase=$_POST['case'];
					if($cpubrand==" "){
						$cpubrand="-";
					}
					if($cpuversion==" "){
						$cpuversion="-";
					}
					if($cpunumber==" "){
						$cpunumber="-";
					}
					if($cpuspeed==" "){
						$cpuspeed="-";
					}
					if($cpuspeedup==" "){
						$cpuspeedup="-";
					}
					if($cpucase==" "){
						$cpucase="-";
					}
					foreach ($arraycpu as $key => $value) {
						if($cpubrand==$value[0]&&$cpuversion==$value[1]&&$cpunumber==$value[2]&&$cpuspeed==$value[3]&&$cpuspeedup==$value[4]&&$cpucase==$value[5]){
							$check=1;
						}elseif ($cpunumber==$value[2]) {
							$pointtrue=1;
						}else{

						}
					}
					if($cpubrand=="-"||$cpuversion=="-"||$cpunumber=="-"||$cpubrand==" "||$cpuversion==" "||$cpunumber==" "){
						echo "<font color=red size=4>กรุณากรอกข้อมูล ผู้ผลิต หรือ ตระกูล cpu หรือ รุ่นของ cpu</fonnt>";
					}elseif($check!=1&&$pointtrue!=1){
						$file = "notebook.pl";
						$read = file($file);
						$open = fopen($file, "w");
						$hello;
						if ($open==FALSE) {
						  echo "<font color=red size=4>ไม่สามารถแก้ไขไฟล์ได้</font>";
						}else{
							foreach ($read as $key => $value) {
							  if($value=="%endcpu\n"){
							    $expot= "cpu('".$cpubrand."','".$cpuversion."','".$cpunumber."','".$cpuspeed."','".$cpuspeedup."','".$cpucase."').\n";
							   $hello=$hello.$expot.$value."";
							   }else{
							        $hello=$hello.$value;
							  }
							}
							fwrite($open, $hello);
							fclose($open);
							echo "<font color=blue size=4>บันทึกข้อมูล</font>";
						}
					}else{
							echo "<font color=red size=4>ไม่อนุญาติให้บันทึก</font>";
							$check=0;
							$pointtrue=0;
					}
				}elseif ($_POST['sendgraphic']=="ยืนยัน") {
					$pointtrue=0;
					$checking=0;
					$graphicbrand=$_POST['gbrand'];
					$graphicversion=$_POST['gversion'];
					$graphicsize=$_POST['graphicsize'];

					if($graphicbrand==" "){
						$graphicbrand="-";
					}
					if($graphicversion==" "){
						$graphicversion="-";
					}
					if($graphicsize==" "){
						$graphicsize="-";
					}
					foreach ($arraygraphic as $key => $value) {
						if($graphicbrand==$value[0]&&$graphicversion==$value[1]&&$graphicsize==$value[2]){
							$checking=1;
						}elseif ($graphicversion==$value[2]) {
							$pointtrue=1;
						}else{
						}
					}
					if($graphicbrand=="-"||$graphicversion=="-"||$graphicbrand==" "||$graphicversion==" "){
						echo "<font color=red size=4>กรุณากรอกข้อมูล ผู้ผลิต หรือ รุ่นของการ์ดจอ</font>";
					}elseif($checking!=1&&$pointtrue!=1){
						$file = "notebook.pl";
						$read = file($file);
						$open = fopen($file, "w");
						$hello;
						if ($open==FALSE) {
						  echo "<font color=red size=4>ไม่สามารถแก้ไขไฟล์ได้</font>";
						}else{
							foreach ($read as $key => $value) {
							  if($value=="%endgraphic\n"){
							    $expot= "card('".$graphicbrand."','".$graphicversion."','".$graphicsize."').\n";
							   $hello=$hello.$expot.$value."";
							   }else{
							        $hello=$hello.$value;
							  }
							}
							fwrite($open, $hello);
							fclose($open);
							echo "<font color=blue size=4>บันทึกข้อมูล</blue>".$check;
						}
					}else{
							echo "<font color=red size=4>ไม่อนุญาติให้บันทึก</font>";
							$check=0;
							$pointtrue=0;
					}
				}

				function cpuselect(){
					echo "<select name=\"cpuselect\">";
						$cpucmd = "swipl -q -f notebook.pl -g \"forall(cpus(CPUBRAND,CPUNAME,CPUNUMBER,CPUSPEED,CPUSPEEDUP,CPUCASE),writeln([CPUBRAND,CPUNAME,CPUNUMBER]))\",halt";
						$output = shell_exec($cpucmd);
						$output = explode("[", $output);
						$arrprint =array();
						foreach ($output as $key => $value) {
							$output[$key]=str_replace("]", "", $value);
						}
						foreach ($output as $key => $value) {
							$value2 = str_replace(","," ", $value);
							$output[$key]=str_replace(",", "-", $value);
							if($output[$key]!=null){
								//echo "<option value=\"a\">a";
								if(((array_search($output[$key], $arrprint)))!=true){
									echo "<option value=\"".$output[$key]."\">".$value2;
									$arrprint[$key]=$output[$key];
								} 
							}else{
								echo "<option value=\"-\">-";
							}
						}
					echo "</select>";
				}

			function graphicselect(){
				echo "<select name=\"graphicselect\">";
				$gpcmd = "swipl -q -f notebook.pl -g \"forall(gpcard(GPBRAND,GPNO,GPSIZE),writeln([GPBRAND,GPNO]))\",halt.";
				$output = shell_exec($gpcmd);
				$output = explode("[", $output);
				$arrprint =array();
				foreach ($output as $key => $value) {
					$output[$key]=str_replace("]", "", $value);
				}
				foreach ($output as $key => $value) {
					$value2 = str_replace(",", " ", $value);
					$output[$key]=str_replace(",", "-", $value);
					if($output[$key]!=null){
						//echo "<option value=\"a\">a";
						if(((array_search($output[$key], $arrprint)))!=true){
							echo "<option value=\"".$output[$key]."\">".$value2;
							$arrprint[$key]=$output[$key];
						} 
					}else{
						echo "<option value=\"-\">-";
					}
				}
				echo "</select>";
			}

			function cutarray($output){
				$printout = explode("]", $output);
				$arrprint =array();
				foreach ($printout as $key => $value) {
			      	$printout[$key]=str_replace("[", "", $value);
			   	}
			   	foreach ($printout as $key => $value) {
			      	$arrprint[$key] = explode(",",$value);
			   	}
			  	return $arrprint;
			}
		?>
	</body>
</html>