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
									Brand : 
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
									<br>
									Graphic Card : 

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
									ความจุ HDD: 

									<select name="hddsize">
										<option value="a">a
										<option value="a">a
										<option value="a">a
									</select>
									น้ำหนัก :
									<select name="weith">
										<option value="a">a
										<option value="a">a
										<option value="a">a
									</select>
									ขนาดจอ : 
									<select name="screen">
										<option value="a">a
										<option value="a">a
										<option value="a">a
									</select>

									ระบบปฏิบัติการ : 
									<select name="os">
										<option value="a">a
										<option value="a">a
										<option value="a">a
									</select>

									ราคา : 
									<select name="price">
										<option value="a">a
										<option value="a">a
										<option value="a">a
									</select>
								</form>
							</center>
						</fieldset>
					</td>
				</tr>
			</table>

	</body>
</html>