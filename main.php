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
		<div class="header_bottom clearfix"><font color="#ffffff">ตรวจสอบ Space Notebook</font></div><br>
			<table align=center border=0 width="100%">
				<tr>
					<td>
						<fieldset>
							<center>กรอกข้อมูลตามที่ต้องการ
								<form method="post" action="#">
									ค่ายผูจำหน่าย : 
									<select name="cpu">

									<?php
											$bandarray=array();
											$bandcmd = "swipl -q -f notebook.pl -g \"forall(notebooks(BRAND,VERSION,CPUNO,GPCARD,HDD,MEMORY,WEIGTH,SCREEN,OS,PRICE),writeln([BRAND]))\",halt";
											$output = shell_exec($bandcmd);
											$output = explode("[", $output);
											foreach ($output as $key => $value) {
												$output[$key]=str_replace("]", "", $value);
											}
											foreach ($output as $key => $value) {
												if($output[$key]!=null){
													//echo "<option value=\"a\">a";
													if(((array_search($output[$key],$bandarray)))!=true){
														$bandarray[$key]=$output[$key];
														echo "<option value=\"".$bandarray[$key]."\">".$bandarray[$key];
													} 
												}
											}
										?>										
									</select>

									CPU : 
									<select name="cpu">

										<?php
											$cpucmd = "swipl -q -f notebook.pl -g \"forall(cpus(CPUBRAND,CPUNAME,CPUNUMBER,CPUSPEED,CPUSPEEDUP,CPUCASE),writeln([CPUBRAND,CPUNAME]))\",halt";
											$output = shell_exec($cpucmd);
											$output = explode("[", $output);
											$arrprint =array();
											foreach ($output as $key => $value) {
												$output[$key]=str_replace("]", "", $value);
											}
											foreach ($output as $key => $value) {
												$output[$key]=str_replace(",", " ", $value);
												if($output[$key]!=null){
													//echo "<option value=\"a\">a";
													if(((array_search($output[$key], $arrprint)))!=true){
														echo "<option value=\"".$output[$key]."\">".$output[$key];
														$arrprint[$key]=$output[$key];
													} 
												}
											}
										?>
									</select>

									การ์ดจอ : 

									<select name="gp">
										<?php
											$gpcmd = "swipl -q -f notebook.pl -g \"forall(gpcard(GPBRAND,GPNO,GPSIZE),writeln([GPBRAND,GPNO]))\",halt.";
											$output = shell_exec($gpcmd);
											$output = explode("[", $output);
											$arrprint =array();
											foreach ($output as $key => $value) {
												$output[$key]=str_replace("]", "", $value);
											}
											foreach ($output as $key => $value) {
												$output[$key]=str_replace(",", " ", $value);
												if($output[$key]!=null){
													//echo "<option value=\"a\">a";
													if(((array_search($output[$key], $arrprint)))!=true){
														echo "<option value=\"".$output[$key]."\">".$output[$key];
														$arrprint[$key]=$output[$key];
													} 
												}
											}
										?>
									</select>

									<br>

									ความจุ HDD: 
									<select name="hddsize">
									
									<?php
											$hddarray=array();
											
											$hddcmd = "swipl -q -f notebook.pl -g \"forall(notebooks(BRAND,VERSION,CPUNO,GPCARD,HDD,MEMORY,WEIGTH,SCREEN,OS,PRICE),writeln([HDD]))\",halt";
											$output = shell_exec($hddcmd);
											$output = explode("[", $output);
											foreach ($output as $key => $value) {
												$output[$key]=str_replace("]", "", $value);
											}
											sort($output,SORT_NUMERIC);
											foreach ($output as $key => $value) {
												if($value!=null){
													if(((array_search($value,$bandarray)))!=true){
														if($value >= 1000){
															$value = $value/1000;
															if(((array_search($value,$bandarray)))!=true){
																$bandarray[$key]=$value;
																echo "<option value=\"".$value."\">".$value."TB";
															}
														}else{
															if(((array_search($value,$bandarray)))!=true){
																$bandarray[$key]=$value;
																echo "<option value=\"".$value."\">".$value."GB";
															}
														}
													} 
												}
											}
										?>		

									</select>

									Memory: 
									<select name="memorysize">									
									<?php
											$hddarray=array();
											
											$hddcmd = "swipl -q -f notebook.pl -g \"forall(notebooks(BRAND,VERSION,CPUNO,GPCARD,HDD,MEMORY,WEIGTH,SCREEN,OS,PRICE),writeln([MEMORY]))\",halt";
											$output = shell_exec($hddcmd);
											$output = explode("[", $output);
											foreach ($output as $key => $value) {
												$output[$key]=str_replace("]", "", $value);
											}
											sort($output,SORT_NUMERIC);
											foreach ($output as $key => $value) {
												if($value!=null){
													if(((array_search($value,$bandarray)))!=true){
														if($value >= 1000){
															$value = $value/1000;
															if(((array_search($value,$bandarray)))!=true){
																$bandarray[$key]=$value;
																echo "<option value=\"".$value."\">".$value."TB";
															}
														}else{
															if(((array_search($value,$bandarray)))!=true){
																$bandarray[$key]=$value;
																echo "<option value=\"".$value."\">".$value."GB";
															}
														}
													} 
												}
											}
										?>		

									</select>

									น้ำหนัก :
									<select name="weith">
										<option value="1.0-2.0">1.0 - 2.0 KG
										<option value="2.1-3.0">2.1 - 3.0 KG
										<option value="3.1-4.0">3.1 - 4.0 KG
									</select>

									ขนาดจอ : 

									<select name="screen">

										<?php
											$screenarray=array();
											$screencmd = "swipl -q -f notebook.pl -g \"forall(notebooks(BRAND,VERSION,CPUNO,GPCARD,HDD,MEMORY,WEIGTH,SCREEN,OS,PRICE),writeln([SCREEN]))\",halt";
											$output = shell_exec($screencmd);
											$output = explode("[", $output);
											foreach ($output as $key => $value) {
												$output[$key]=str_replace("]", "", $value);
											}
											sort($output,SORT_NUMERIC);
											foreach ($output as $key => $value) {
												if($value!=null){
													if(((array_search($value,$bandarray)))!=true){
															$bandarray[$key]=$value;
															echo "<option value=\"".$value."\">".$value." N";
															
														
													} 
												}
											}
										?>		

									</select>

									<br>

									ระบบปฏิบัติการ : 
									<select name="os">
										
										<?php
											$bandarray=array();
											$bandcmd = "swipl -q -f notebook.pl -g \"forall(notebooks(BRAND,VERSION,CPUNO,GPCARD,HDD,MEMORY,WEIGTH,SCREEN,OS,PRICE),writeln([OS]))\",halt";
											$output = shell_exec($bandcmd);
											$output = explode("[", $output);
											foreach ($output as $key => $value) {
												$output[$key]=str_replace("]", "", $value);
											}
											foreach ($output as $key => $value) {
												if($output[$key]!=null){
													//echo "<option value=\"a\">a";
													if(((array_search($output[$key],$bandarray)))!=true){
														$bandarray[$key]=$output[$key];
														echo "<option value=\"".$bandarray[$key]."\">".$bandarray[$key];
													} 
												}
											}
										?>		

									</select>

									ราคา : 
									<select name="price">

										<option value="5000.0-10000">5,000.0 - 10,000 B
										<option value="10000.0-20000">10,000.0 - 20,000 B
										<option value="20000.0-30000">20,000.0 - 30,000 B
										<option value="40000.0-50000">40,000.0 - 50,000 B
										<option value="50000.0-60000">50,000.0 - 60,000 B
										<option value="60000.0-70000">60,000.0 - 70,000 B
										<option value="70000.0-80000">70,000.0 - 80,000 B
										<option value="80000.0-90000">80,000.0 - 90,000 B
										<option value="90000.0-100000">90,000.0 - 100,000 B

									</select>
								</form>
							</center>
						</fieldset>
						<?php
							$cmd = "swipl -q -f notebook.pl -g \"forall(notebooks(BRAND,VERSION,CPUNO,GPCARD,HDD,MEMORY,WEIGTH,SCREEN,OS,PRICE),writeln([PRICE]))\",halt";
							$output = shell_exec($cmd);
							$output = explode("[", $output);
							$countoutput = count($output)-2;
							echo "<center><br>จำนวน Notebook ที่มี : ".$countoutput." รุ่น <center><br><hr width = 80%>";
						?>
					</td>
				</tr>
			</table>
	</body>
</html>