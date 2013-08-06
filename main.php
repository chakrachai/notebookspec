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
									<select name="brand">

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
												}else{
													echo "<option value=\"-\">-";
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
										?>
									</select>

									การ์ดจอ : 

									<select name="graphic">
										<?php
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
										?>
									</select>

									<br>

									ความจุ HDD: 
									<select name="hdd">
									
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
												}else{
													echo "<option value=\"-\">-";
												}
											}
										?>		

									</select>

									Memory: 
									<select name="memory">									
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
												}else{
													echo "<option value=\"-\">-";
												}
											}
										?>		

									</select>

									น้ำหนัก :
									<select name="weith">
										echo "<option value="-">-
										<option value="1000-2000">1.0 - 2.0 KG
										<option value="2000-3000">2.1 - 3.0 KG
										<option value="3000-4000">3.1 - 4.0 KG
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
												}else{
													echo "<option value=\"-\">-";
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
												}else{
													echo "<option value=\"-\">-";
												}
											}
										?>		

									</select>

									ราคา : 
									<select name="price">
										<option value="-">-
										<option value="0-10000">0 - 10,000 B
										<option value="10000-20000">10,000 - 20,000 B
										<option value="20000-30000">20,000 - 30,000 B
										<option value="40000-50000">40,000 - 50,000 B
										<option value="50000-60000">50,000 - 60,000 B
										<option value="60000-70000">60,000 - 70,000 B
										<option value="70000-80000">70,000 - 80,000 B
										<option value="80000-90000">80,000 - 90,000 B
										<option value="90000-100000">90,000 - 100,000 B

									</select>

									<br><br><input type="submit" name="submit" value="ยืนยัน"/>
								</form>
							</center>
						</fieldset>
						<?php
							$cmd = "swipl -q -f notebook.pl -g \"forall(notebooks(BRAND,VERSION,CPUNO,GPCARD,HDD,MEMORY,WEIGTH,SCREEN,OS,PRICE),writeln([PRICE]))\",halt";
							$output = shell_exec($cmd);
							$output = explode("[", $output);
							$countoutput = count($output)-1;
							echo "<center><br>จำนวน Notebook ที่มี : ".$countoutput." รุ่น <center><br><hr width = 80%>";
						?>
					</td>
				</tr>
			</table>

			<?php
				$brand = $_POST['brand'];
				$cpu = $_POST['cpu'];
				$graphic = $_POST['graphic'];
				$hdd = $_POST['hdd'];
				$memory = $_POST['memory'];
				$weith = $_POST['weith'];
				$screen = $_POST['screen'];
				$os = $_POST['os'];
				$price = $_POST['price'];
				$cmd="";
				if($brand=='-'){
					$brand = "BRAND";
				}else{
					$brandprint= "ค่ายผูจำหน่ายคือ ".$brand;
				}
				if ($cpu=='-') {
					$cpu = "CPU";
				}else{
					$cpuprint = "CPU ".$cpu;
				}
				if ($graphic=='-') {
					$graphic = "GRAPHIC";
				}else{
					$graphicprint = "graphic ".$graphic;
				}
				if ($hdd == '-') {
					$hdd = "HDD";
				}else{
					if(ereg("TB", $hdd))
					$hdd = $hdd*1000;
					$hddprint = "ความจุ ".$hdd;
				}
				if ($memory=='-') {
					$memory = "MEMORY";
				}else{
					$memoryprint = "memory ".$memory;
				}
				if ($weith=='-') {
					$weith="WEITH";
				}else{
					$cutweith = explode("-", $weith);
					$weithprint = "น้ำหนักระหว่า ".($cutweith[0]/1000)." KG ถึง ".($cutweith[1]/1000)." KG";
				}
				if ($screen=='-') {
					$screen="SCREEN";
				}else{
					$screenprint = "ขนาดจอ ".$screen." นิ้ว";
				}
				if ($os=='-') {
					$os="OS";
				}else{
					$osprint = "ระบบปฏิบัติการ ".$os;
				}
				if ($price=='-') {
					$price="PRICE";
				}else{
					$cutprice = explode("-", $price);
						if($cutprice[0]>=1000){
			    			$cutprice[0] = $cutprice[0]/1000;
			    			$cutprice[0] = $cutprice[0].",000";
			    		}
						if($cutprice[1]>=1000){
			    			$cutprice[1] = $cutprice[1]/1000;
			    			$cutprice[1] = $cutprice[1].",000";
			    		}
					$priceprint = "ราคาตั้งแต่ ".$cutprice[0]." บาท ถึง ".$cutprice[1]." บาท ";
				}
				if($_POST['submit']=="ยืนยัน"){
					if($brand=="BRAND"&&$cpu=="CPU"&&$graphic=="GRAPHIC"&&$hdd=="HDD"&&$memory=="MEMORY"&&$weith=="WEITH"&&$screen=="SCREEN"&&$os=="OS"&&$price=="PRICE"){
						echo "<font color=blue size = 2>ค้นหาข้อมูลทั้งหมดที่มี</font>";
					}else{
						echo "<font color=blue size = 2>ข้อมูลที่่ต้องการคือ ".$brandprint.$cpuprint.$graphicprint.$hddprint.$memoryprint.$weithprint.$screenprint.$osprint.$priceprint."</font>";
					}
					if($weith!="WEITH"||$price!="PRICE"||$cpu!="CPU"||$graphic!="GRAPHIC"){
						$weithout = explode("-",$weith);
						$priceout = explode("-", $price);
						$cpuout = explode("-", $cpu);
						$graphicout = explode("-", $graphic);							
							if ($weith!="WEITH"&&$price!=="PRICE"&&$cpu!="CPU"&&$graphic!="GRAPHIC"){
								$weith = "WEITH";
								$price = "PRICE";
								$cpu = "CPU";
								$graphic = "GRAPHIC";
								$cmd = "swipl -q -f notebook.pl -g \"forall((notebookspec(".$brand.",VERSION,CPUNO,".$graphicout[1].",".$hdd.",".$memory.",".$weith.",".$screen.",".$os.",".$price.",CPUBRAND,".$cpuout[1].",CPUSPEED,CPUSPEEDUP,CPUCASE,GPBRAND,GPSIZE),between(".$weithout[0].",".$weithout[1].",".$weith."),between(".$priceout[0].",".$priceout[1].",".$price.")),writeln([".$brand.",VERSION,CPUBRAND,".$cpuout[1].",CPUNO,CPUSPEED,CPUSPEEDUP,CPUCASE,GPBRAND,".$graphicout[1].",GPSIZE,".$memory.",".$weith.",".$screen.",".$os.",".$price.",".$hdd."]))\",halt";
							
							}elseif($weith!="WEITH"&&$price!="PRICE"&&$cpu!="CPU"&&$graphic=="GRAPHIC"){
								$weith = "WEITH";
								$price = "PRICE";
								$cpu = "CPU";
								$graphic = "GRAPHIC";
								$cmd = "swipl -q -f notebook.pl -g \"forall((notebookspec(".$brand.",VERSION,CPUNO,".$graphic.",".$hdd.",".$memory.",".$weith.",".$screen.",".$os.",".$price.",CPUBRAND,".$cpuout[1].",CPUSPEED,CPUSPEEDUP,CPUCASE,GPBRAND,GPSIZE),between(".$weithout[0].",".$weithout[1].",".$weith."),between(".$priceout[0].",".$priceout[1].",".$price.")),writeln([".$brand.",VERSION,CPUBRAND,".$cpuout[1].",CPUNO,CPUSPEED,CPUSPEEDUP,CPUCASE,GPBRAND,".$graphic.",GPSIZE,".$memory.",".$weith.",".$screen.",".$os.",".$price.",".$hdd."]))\",halt";
							}elseif($weith!="WEITH"&&$price!="PRICE"&&$cpu=="CPU"&&$graphic!="GRAPHIC"){
								$weith = "WEITH";
								$price = "PRICE";
								$cpu = "CPU";
								$graphic = "GRAPHIC";
								$cmd = "swipl -q -f notebook.pl -g \"forall((notebookspec(".$brand.",VERSION,CPUNO,".$graphicout[1].",".$hdd.",".$memory.",".$weith.",".$screen.",".$os.",".$price.",CPUBRAND,".$cpu.",CPUSPEED,CPUSPEEDUP,CPUCASE,GPBRAND,GPSIZE),between(".$weithout[0].",".$weithout[1].",".$weith."),between(".$priceout[0].",".$priceout[1].",".$price.")),writeln([".$brand.",VERSION,CPUBRAND,".$cpu.",CPUNO,CPUSPEED,CPUSPEEDUP,CPUCASE,GPBRAND,".$graphicout[1].",GPSIZE,".$memory.",".$weith.",".$screen.",".$os.",".$price.",".$hdd."]))\",halt";
							
							}elseif ($weith!="WEITH"&&$price!="PRICE"&&$cpu=="CPU"&&$graphic=="GRAPHIC"){
								$weith = "WEITH";
								$price = "PRICE";
								$cpu = "CPU";
								$graphic = "GRAPHIC";
								$cmd = "swipl -q -f notebook.pl -g \"forall((notebookspec(".$brand.",VERSION,CPUNO,".$graphic.",".$hdd.",".$memory.",".$weith.",".$screen.",".$os.",".$price.",CPUBRAND,".$cpu.",CPUSPEED,CPUSPEEDUP,CPUCASE,GPBRAND,GPSIZE),between(".$weithout[0].",".$weithout[1].",".$weith."),between(".$priceout[0].",".$priceout[1].",".$price.")),writeln([".$brand.",VERSION,CPUBRAND,".$cpu.",CPUNO,CPUSPEED,CPUSPEEDUP,CPUCASE,GPBRAND,".$graphic.",GPSIZE,".$memory.",".$weith.",".$screen.",".$os.",".$price.",".$hdd."]))\",halt";
							
							}elseif($weith!="WEITH"&&$price=="PRICE"&&$cpu!="CPU"&&$graphic!="GRAPHIC"){
								$weith = "WEITH";
								$price = "PRICE";
								$cpu = "CPU";
								$graphic = "GRAPHIC";
								$cmd = "swipl -q -f notebook.pl -g \"forall((notebookspec(".$brand.",VERSION,CPUNO,".$graphicout[1].",".$hdd.",".$memory.",".$weith.",".$screen.",".$os.",".$price.",CPUBRAND,".$cpuout[1].",CPUSPEED,CPUSPEEDUP,CPUCASE,GPBRAND,GPSIZE),between(".$weithout[0].",".$weithout[1].",".$weith.")),writeln([".$brand.",VERSION,CPUBRAND,".$cpuout[1].",CPUNO,CPUSPEED,CPUSPEEDUP,CPUCASE,GPBRAND,".$graphicout[1].",GPSIZE,".$memory.",".$weith.",".$screen.",".$os.",".$price.",".$hdd."]))\",halt";
							
							}elseif($weith!="WEITH"&&$price=="PRICE"&&$cpu!="CPU"&&$graphic=="GRAPHIC"){
								$weith = "WEITH";
								$price = "PRICE";
								$cpu = "CPU";
								$graphic = "GRAPHIC";
								$cmd = "swipl -q -f notebook.pl -g \"forall((notebookspec(".$brand.",VERSION,CPUNO,".$graphic.",".$hdd.",".$memory.",".$weith.",".$screen.",".$os.",".$price.",CPUBRAND,".$cpuout[1].",CPUSPEED,CPUSPEEDUP,CPUCASE,GPBRAND,GPSIZE),between(".$weithout[0].",".$weithout[1].",".$weith.")),writeln([".$brand.",VERSION,CPUBRAND,".$cpuout[1].",CPUNO,CPUSPEED,CPUSPEEDUP,CPUCASE,GPBRAND,".$graphic.",GPSIZE,".$memory.",".$weith.",".$screen.",".$os.",".$price.",".$hdd."]))\",halt";
							
							}elseif ($weith!="WEITH"&&$price=="PRICE"&&$cpu=="CPU"&&$graphic!="GRAPHIC"){
								$weith = "WEITH";
								$price = "PRICE";
								$cpu = "CPU";
								$graphic = "GRAPHIC";
								$cmd = "swipl -q -f notebook.pl -g \"forall((notebookspec(".$brand.",VERSION,CPUNO,".$graphicout[1].",".$hdd.",".$memory.",".$weith.",".$screen.",".$os.",".$price.",CPUBRAND,".$cpu.",CPUSPEED,CPUSPEEDUP,CPUCASE,GPBRAND,GPSIZE),between(".$weithout[0].",".$weithout[1].",".$weith.")),writeln([".$brand.",VERSION,CPUBRAND,".$cpu.",CPUNO,CPUSPEED,CPUSPEEDUP,CPUCASE,GPBRAND,".$graphicout[1].",GPSIZE,".$memory.",".$weith.",".$screen.",".$os.",".$price.",".$hdd."]))\",halt";
							
							}elseif($weith!="WEITH"&&$price=="PRICE"&&$cpu=="CPU"&&$graphic=="GRAPHIC"){
								$weith = "WEITH";
								$price = "PRICE";
								$cpu = "CPU";
								$graphic = "GRAPHIC";
								$cmd = "swipl -q -f notebook.pl -g \"forall((notebookspec(".$brand.",VERSION,CPUNO,".$graphic.",".$hdd.",".$memory.",".$weith.",".$screen.",".$os.",".$price.",CPUBRAND,".$cpu.",CPUSPEED,CPUSPEEDUP,CPUCASE,GPBRAND,GPSIZE),between(".$weithout[0].",".$weithout[1].",".$weith.")),writeln([".$brand.",VERSION,CPUBRAND,".$cpu.",CPUNO,CPUSPEED,CPUSPEEDUP,CPUCASE,GPBRAND,".$graphic.",GPSIZE,".$memory.",".$weith.",".$screen.",".$os.",".$price.",".$hdd."]))\",halt";

							}elseif($weith=="WEITH"&&$price!="PRICE"&&$cpu!="CPU"&&$graphic!="GRAPHIC"){
								$weith = "WEITH";
								$price = "PRICE";
								$cpu = "CPU";
								$graphic = "GRAPHIC";
								$cmd = "swipl -q -f notebook.pl -g \"forall((notebookspec(".$brand.",VERSION,CPUNO,".$graphicout[1].",".$hdd.",".$memory.",".$weith.",".$screen.",".$os.",".$price.",CPUBRAND,".$cpuout[1].",CPUSPEED,CPUSPEEDUP,CPUCASE,GPBRAND,GPSIZE),between(".$priceout[0].",".$priceout[1].",".$price.")),writeln([".$brand.",VERSION,CPUBRAND,".$cpuout[1].",CPUNO,CPUSPEED,CPUSPEEDUP,CPUCASE,GPBRAND,".$graphicout[1].",GPSIZE,".$memory.",".$weith.",".$screen.",".$os.",".$price.",".$hdd."]))\",halt";
							
							}elseif($weith=="WEITH"&&$price!="PRICE"&&$cpu!="CPU"&&$graphic=="GRAPHIC"){
								$weith = "WEITH";
								$price = "PRICE";
								$cpu = "CPU";
								$graphic = "GRAPHIC";
								$cmd = "swipl -q -f notebook.pl -g \"forall((notebookspec(".$brand.",VERSION,CPUNO,".$graphic.",".$hdd.",".$memory.",".$weith.",".$screen.",".$os.",".$price.",CPUBRAND,".$cpuout[1].",CPUSPEED,CPUSPEEDUP,CPUCASE,GPBRAND,GPSIZE),between(".$priceout[0].",".$priceout[1].",".$price.")),writeln([".$brand.",VERSION,CPUBRAND,".$cpuout[1].",CPUNO,CPUSPEED,CPUSPEEDUP,CPUCASE,GPBRAND,".$graphic.",GPSIZE,".$memory.",".$weith.",".$screen.",".$os.",".$price.",".$hdd."]))\",halt";
							
							}elseif($weith=="WEITH"&&$price!="PRICE"&&$cpu=="CPU"&&$graphic!="GRAPHIC"){
								$weith = "WEITH";
								$price = "PRICE";
								$cpu = "CPU";
								$graphic = "GRAPHIC";
								$cmd = "swipl -q -f notebook.pl -g \"forall((notebookspec(".$brand.",VERSION,CPUNO,".$graphicout[1].",".$hdd.",".$memory.",".$weith.",".$screen.",".$os.",".$price.",CPUBRAND,".$cpu.",CPUSPEED,CPUSPEEDUP,CPUCASE,GPBRAND,GPSIZE),between(".$priceout[0].",".$priceout[1].",".$price.")),writeln([".$brand.",VERSION,CPUBRAND,".$cpu.",CPUNO,CPUSPEED,CPUSPEEDUP,CPUCASE,GPBRAND,".$graphicout[1].",GPSIZE,".$memory.",".$weith.",".$screen.",".$os.",".$price.",".$hdd."]))\",halt";
							}elseif($weith=="WEITH"&&$price!="PRICE"&&$cpu=="CPU"&&$graphic=="GRAPHIC"){
								$weith = "WEITH";
								$price = "PRICE";
								$cpu = "CPU";
								$graphic = "GRAPHIC";
								$cmd = "swipl -q -f notebook.pl -g \"forall((notebookspec(".$brand.",VERSION,CPUNO,".$graphic.",".$hdd.",".$memory.",".$weith.",".$screen.",".$os.",".$price.",CPUBRAND,".$cpu.",CPUSPEED,CPUSPEEDUP,CPUCASE,GPBRAND,GPSIZE),between(".$priceout[0].",".$priceout[1].",".$price.")),writeln([".$brand.",VERSION,CPUBRAND,".$cpu.",CPUNO,CPUSPEED,CPUSPEEDUP,CPUCASE,GPBRAND,".$graphic.",GPSIZE,".$memory.",".$weith.",".$screen.",".$os.",".$price.",".$hdd."]))\",halt";
							}elseif($weith=="WEITH"&&$price=="PRICE"&&$cpu!="CPU"&&$graphic!="GRAPHIC"){
								$weith = "WEITH";
								$price = "PRICE";
								$cpu = "CPU";
								$graphic = "GRAPHIC";
								$cmd = "swipl -q -f notebook.pl -g \"forall(notebookspec(".$brand.",VERSION,CPUNO,".$graphicout[1].",".$hdd.",".$memory.",".$weith.",".$screen.",".$os.",".$price.",CPUBRAND,".$cpuout[1].",CPUSPEED,CPUSPEEDUP,CPUCASE,GPBRAND,GPSIZE),writeln([".$brand.",VERSION,CPUBRAND,".$cpuout[1].",CPUNO,CPUSPEED,CPUSPEEDUP,CPUCASE,GPBRAND,".$graphicout[1].",GPSIZE,".$memory.",".$weith.",".$screen.",".$os.",".$price.",".$hdd."]))\",halt";
							}elseif($weith=="WEITH"&&$price=="PRICE"&&$cpu!="CPU"&&$graphic=="GRAPHIC"){
								$weith = "WEITH";
								$price = "PRICE";
								$cpu = "CPU";
								$graphic = "GRAPHIC";
								$cmd = "swipl -q -f notebook.pl -g \"forall(notebookspec(".$brand.",VERSION,CPUNO,".$graphic.",".$hdd.",".$memory.",".$weith.",".$screen.",".$os.",".$price.",CPUBRAND,".$cpuout[1].",CPUSPEED,CPUSPEEDUP,CPUCASE,GPBRAND,GPSIZE),writeln([".$brand.",VERSION,CPUBRAND,".$cpuout[1].",CPUNO,CPUSPEED,CPUSPEEDUP,CPUCASE,GPBRAND,".$graphic.",GPSIZE,".$memory.",".$weith.",".$screen.",".$os.",".$price.",".$hdd."]))\",halt";
							}elseif($weith=="WEITH"&&$price=="PRICE"&&$cpu=="CPU"&&$graphic!="GRAPHIC"){
								$weith = "WEITH";
								$price = "PRICE";
								$cpu = "CPU";
								$graphic = "GRAPHIC";
								$cmd = "swipl -q -f notebook.pl -g \"forall(notebookspec(".$brand.",VERSION,CPUNO,".$graphicout[1].",".$hdd.",".$memory.",".$weith.",".$screen.",".$os.",".$price.",CPUBRAND,".$cpu.",CPUSPEED,CPUSPEEDUP,CPUCASE,GPBRAND,GPSIZE),writeln([".$brand.",VERSION,CPUBRAND,".$cpu.",CPUNO,CPUSPEED,CPUSPEEDUP,CPUCASE,GPBRAND,".$graphicout[1].",GPSIZE,".$memory.",".$weith.",".$screen.",".$os.",".$price.",".$hdd."]))\",halt";
							}elseif($weith=="WEITH"&&$price=="PRICE"&&$cpu=="CPU"&&$graphic=="GRAPHIC"){
								$weith = "WEITH";
								$price = "PRICE";
								$cpu = "CPU";
								$graphic = "GRAPHIC";
								$cmd = "swipl -q -f notebook.pl -g \"forall(notebookspec(".$brand.",VERSION,CPUNO,".$graphic.",".$hdd.",".$memory.",".$weith.",".$screen.",".$os.",".$price.",CPUBRAND,".$cpu.",CPUSPEED,CPUSPEEDUP,CPUCASE,GPBRAND,GPSIZE),writeln([".$brand.",VERSION,CPUBRAND,".$cpu.",CPUNO,CPUSPEED,CPUSPEEDUP,CPUCASE,GPBRAND,".$graphic.",GPSIZE,".$memory.",".$weith.",".$screen.",".$os.",".$price.",".$hdd."]))\",halt";
							}else{
								echo "";
								
							}

//======================================================================================================================
						
//=====================================================================================================================

					}else{
						$cmd = "swipl -q -f notebook.pl -g \"forall(notebookspec(".$brand.",VERSION,CPUNO,".$graphic.",".$hdd.",".$memory.",".$weith.",".$screen.",".$os.",".$price.",CPUBRAND,CPUNAME,CPUSPEED,CPUSPEEDUP,CPUCASE,GPBRAND,GPSIZE),writeln([".$brand.",VERSION,CPUBRAND,CPUNAME,CPUNO,CPUSPEED,CPUSPEEDUP,CPUCASE,GPBRAND,".$graphic.",GPSIZE,".$memory.",".$weith.",".$screen.",".$os.",".$price.",".$hdd."]))\",halt";
					}
					$output = shell_exec($cmd);
	                $anserset = cutarray($output);
	                readarray($anserset);
	               // echo $cmd;
	                //print_r($anserset);

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

			    function readarray($re){
			    	$i=0;
			    	$count = count($re)-1;
	                if($count==0){
	                	echo "<br><font color = red size = 5>ไม่พบข้อมูลที่ต้องการ กรุณาค้นหาข้อมูลอีกครั้ง</font>";
	                }else{

	                	echo "<br><font color = green size = 5>พบ".$count."รายการ</font>";
	                }
			    	//print_r($re);
			    	echo "<table width =\"100%\" align = \" center\">";
			    	foreach ($re as $key => $value) {
			    		$value[12] = $value[12]/1000;
			    		if($value[16]>=1000){
			    			$value[16] = $value[16]/1000;
			    			$value[16] = $value[16]." TB";
			    		}else{
			    			$value[16] = $value[16]." GB";
			    		}
			    		if(ereg("_",$value[9])){
			    			$value[9]=str_replace("_", " ", $value[9]);
			    		}
			    		foreach ($value as $key2 => $value2) {
			    			if($value2=="-"){
			    				$value[$key2]="";
			    			}
			    		}
			    		
			    		if($value[5]!=""){
			    			$value[5]=" speed ".$value[5];
			    		}
			    		if($value[6]!=""){
			    			$value[6]=" speed up ".$value[6];
			    		}
			    		if($value[7]!=""){
			    			$value[7]=" case ".$value[7];
			    		}
			    		if($value[15]>=1000){
			    			$value[15] = $value[15]/1000;
			    			$value[15] = str_replace(".", ",", $value[15]);
			    			$value[15] = $value[15]."00";
			    		}
			    		if($count!=$key){
							$i=$i+1;
					      	if($i==1){
					      		if($key>=1){
					      			echo "<tr><td width =\" 34%\">";
					      			echo "<center><image src = notebook.jpg width = 110 high = 110></center>";
					        		echo ucfirst(substr($value[0],1))." ".ucfirst($value[1])."<br>cpu : ".ucfirst($value[2])." ".$value[3]."-".$value[4]."".$value[5]."".$value[6].$value[7]."<br> Graphic : ".ucfirst($value[8])." ".ucfirst($value[9])." ".$value[10]."<br>Memory : ".$value[11]." GB<br> HDD : ".$value[16]."<br>น้ำหนัก : ".$value[12]." KG <br>หน้าจอ : ".$value[13]." N<br>ระบบปฏิบัติการ : ".$value[14]."<br>ราคา : ".$value[15]." บาท";
					      		}else{
					      			echo "<tr><td width =\" 34%\">";
					      			echo "<center><image src = notebook.jpg width = 110 high = 110></center>";
					        		echo ucfirst($value[0])." ".ucfirst($value[1])."<br>cpu : ".ucfirst($value[2])." ".$value[3]."-".$value[4]."".$value[5]."".$value[6].$value[7]."<br> Graphic : ".ucfirst($value[8])." ".ucfirst($value[9])." ".$value[10]."<br>Memory : ".$value[11]." GB<br> HDD : ".$value[16]."<br>น้ำหนัก : ".$value[12]." KG <br>หน้าจอ : ".$value[13]." N<br>ระบบปฏิบัติการ : ".$value[14]."<br>ราคา : ".$value[15]." บาท";
					        	
					      		}
					      			/*writeln(["0.$brand.",1VERSION,2CPUBRAND,3CPUNAME,".4$cpu.",5CPUSPEED,6CPUSPEEDUP,7CPUCASE,8GPBRAND,".
					        			9$graphic.",10GPSIZE,".11$memory.",".12$weith.",".13$screen.",".14$os.",".15$price."]))\",halt";*/
					        	echo "</td>";
					      	}elseif ($i==3) {
					      		echo "<td width =\" 34%\">";
								echo "<center><image src = notebook.jpg width = 110 high = 110></center>";
								echo ucfirst(substr($value[0],1))." ".ucfirst($value[1])."<br>cpu : ".ucfirst($value[2])." ".$value[3]."-".$value[4]."".$value[5]."".$value[6].$value[7]."<br> Graphic : ".ucfirst($value[8])." ".ucfirst($value[9])." ".$value[10]."<br>Memory : ".$value[11]." GB<br> HDD : ".$value[16]."<br>น้ำหนัก : ".$value[12]." KG <br>หน้าจอ : ".$value[13]." N<br>ระบบปฏิบัติการ : ".$value[14]."<br>ราคา : ".$value[15]." บาท";
					        	echo "</td></tr>";
					      		$i=0;
					      	}elseif ($count==$key){
					      		echo "";
					      	}else{
					      		echo "<td width =\" 34%\"><center><image src = notebook.jpg width = 110 high = 110></center>";
								echo ucfirst(substr($value[0],1))." ".ucfirst($value[1])."<br>cpu : ".ucfirst($value[2])." ".$value[3]."-".$value[4]."".$value[5]."".$value[6].$value[7]."<br> Graphic : ".ucfirst($value[8])." ".ucfirst($value[9])." ".$value[10]."<br>Memory : ".$value[11]." GB<br> HDD : ".$value[16]."<br>น้ำหนัก : ".$value[12]." KG <br>หน้าจอ : ".$value[13]." N<br>ระบบปฏิบัติการ : ".$value[14]."<br>ราคา : ".$value[15]." บาท";
					        	echo "</td>";
					      	}
			    		}
			      	}
			      	echo "</table>";
			      	echo "";
			    }
			?>
	</body>
</html>