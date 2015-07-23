<!DOCTYPE html>
<?php
include 'php/mysql_conn.php';
include 'fun.inc.php';
?>
<html lang="zh-TW">
<head>
<title>亞洲泛舟網</title>
<meta charset="UTF-8">
<meta name="robots" content="noindex">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="X-UA-Compatible" content="IE=Edge" />
<link rel="stylesheet"
	href="http://www.justinaguilar.com/animations/css/animations.css">
<link rel="stylesheet"
	href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
<script type="text/javascript"
	src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
<script src="http://code.jquery.com/jquery-latest.min.js"
	type="text/javascript"></script>
<script
	src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
<style>
table {
	border-collapse: collapse;
}

td, th {
	padding: 10px;
	border: #0033FF 1px solid;
	font-size: 12px;
}

th {
	color: #FF3333
}

#jointable td:first-child {
	text-align: center;
}
</style>
<script language=javascript>
function check ()
{
	var alertStr="";
	re = /^[09]{2}[0-9]{8}$/;
	if(document.getElementsByName("date_y")[0].value=="" ||
		document.getElementsByName("date_m")[0].value=="" ||
		document.getElementsByName("date_d")[0].value=="")	alertStr +="*請選擇泛舟日期\n";
	if(document.getElementsByName("contact")[0].value=="")	alertStr +="*請填寫聯絡人\n";
	
	if(document.getElementsByName("reachway")[0].value=="專車接送" && document.getElementsByName("takeplace")[0].value=="")	
		alertStr +="*請填寫接送地點\n";
	if(document.getElementsByName("project")[0].value=="")	
		alertStr +="*請填寫行程選擇\n";

	if(document.getElementsByName("tel")[0].value=="") alertStr +="*請填寫室內電話\n";
	if(document.getElementsByName("cell")[0].value=="")	
		alertStr +="*請填寫手機號碼\n";
	else if(!re.test(document.getElementsByName("cell")[0].value))
	{
		alertStr +="*手機號碼格式不正確\n";
	}
	if(document.getElementsByName("selecttype")[0].value=="")	alertStr +="*請填寫泛舟選擇\n";
	if(document.getElementsByName("actmoney")[0].value=="") alertStr +="*請填寫活動費用\n";
	if(document.getElementsByName("lastfive")[0].value=="") alertStr +="*請填寫匯款末五碼\n";
	if(document.getElementsByName("payment")[0].value=="") alertStr +="*請填寫匯款金額\n";
	if( alertStr != "" ) {
		alert( alertStr );
		return false;
	}
	return true;
}
</script>
</head>

<body style="background-image: url('images/river-bg.jpg')">
	<?php topNavBarLogin(103);?>
	<div class="container" style="margin-top: 50px;">
		<h1>線上報名</h1>
		<form id="myform" name="myform" onSubmit="return check();"
			action="order.php" method="post">
			<table border="1" cellspacing="0" cellpadding="0" width="100%"
				style="background: white">
				<thead>
					<tr>
						<td colspan="2"
							style="color: #3333FF; background: #3366FF; color: #fff;">步驟一、泛舟行程專案</td>
					</tr>
					<tr>
						<td colspan="2"><p>
								線上報名注意事項： <br /> 1.註明泛舟船種及其他行程(選擇其他旅遊行程，請附上行程表) <br />
								2.姓名、生日、身份證字號、聯絡電話(國賠用資料) <br /> 3.請在報名表上方留1~2支行動電話以備出外聯絡 <br />
							</p></td>
					</tr>
				</thead>
				<tbody>
					<tr>
						<th width="100">泛舟日期</th>
						<td><select name="date_y" class="form-control" style="width: 15%">
								<option value="">請選擇</option>
								<option value='2015' selected='selected'>2015</option>
								<option value='2016'>2016</option>
						</select> 年 <select name="date_m" class="form-control"
							style="width: 15%">
								<option value="">請選擇</option>
								<option value='1'>1</option>
								<option value='2'>2</option>
								<option value='3'>3</option>
								<option value='4'>4</option>
								<option value='5'>5</option>
								<option value='6'>6</option>
								<option value='7'>7</option>
								<option value='8'>8</option>
								<option value='9'>9</option>
								<option value='10'>10</option>
								<option value='11'>11</option>
								<option value='12'>12</option>
						</select> 月 <select name="date_d" class="form-control"
							style="width: 15%">
								<option value="">請選擇</option>
								<option value='1'>1</option>
								<option value='2'>2</option>
								<option value='3'>3</option>
								<option value='4'>4</option>
								<option value='5'>5</option>
								<option value='6'>6</option>
								<option value='7'>7</option>
								<option value='8'>8</option>
								<option value='9'>9</option>
								<option value='10'>10</option>
								<option value='11'>11</option>
								<option value='12'>12</option>
								<option value='13'>13</option>
								<option value='14'>14</option>
								<option value='15'>15</option>
								<option value='16'>16</option>
								<option value='17'>17</option>
								<option value='18'>18</option>
								<option value='19'>19</option>
								<option value='20'>20</option>
								<option value='21'>21</option>
								<option value='22'>22</option>
								<option value='23'>23</option>
								<option value='24'>24</option>
								<option value='25'>25</option>
								<option value='26'>26</option>
								<option value='27'>27</option>
								<option value='28'>28</option>
								<option value='29'>29</option>
								<option value='30'>30</option>
								<option value='31'>31</option>
						</select> 日 (必填) 例 ： 2005-04-16</td>
					</tr>
					<tr>
						<th width="100">參加人數</th>
						<td><input type="text" name="people" style="width: 40px;" value="" />人
							(必填)</td>
					</tr>
					<tr>
						<th width="100">便 當</th>
						<td>葷<input type="text" name="meal_m" style="width: 40px;"
							value="" />素<input type="text" name="meal_v" style="width: 40px;"
							value="" /> (填寫數量)
						</td>
					</tr>
					<tr>
						<th width="100">船 班</th>
						<td><select name="shipshift">
								<option value="">請選擇</option>
								<option value="07:00">07:00</option>
								<option value="08:30">08:30</option>
								<option value="11:00">11:00</option>
						</select></td>
					</tr>
					<tr>
						<th width="100">到達方法</th>
						<td><select name="reachway">
								<option value="">請選擇</option>
								<option value="自行開車">自行開車</option>
								<option value="專車接送">專車接送</option>
						</select></td>
					</tr>
					<tr>
						<th width="100">車 號</th>
						<td><input type="text" name="carno" value="" /> 若自行開車請填寫車號</td>
					</tr>
					<tr>
						<th width="100">接送地點</th>
						<td>&nbsp; <input type="text" name="takeplace" value="" />
							若專車接送者必填，則user自行填入接送地點。
						</td>
					</tr>
					<tr>
						<th width="100">報名單位</th>
						<td><input type="text" name="unit" value="" /> (團體或單位報名填寫)</td>
					</tr>
					<tr>
						<th width="100">單位電話</th>
						<td><input type="text" name="unittel" value="" /></td>
					</tr>
					<tr>
						<th width="100">聯絡人姓名</th>
						<td><input type="text" name="contact" value="" /> (必填)</td>
					</tr>
					<tr>
						<th width="100">聯絡人電話</th>
						<td><input type="text" name="tel" value="" /> Ｈ(必填)</td>
					</tr>
					<tr>
						<th width="100">...</th>
						<td><input type="text" name="cell" value="" />
							手機(必填，格式0912345678請確認為小寫數字，簡訊回覆系統使用)</td>
					</tr>
					<tr>
						<th width="100">聯絡信箱</th>
						<td><input type="text" name="email" value="" /></td>
					</tr>
					<tr>
						<th width="100">行程選擇</th>
						<td><input type="text" name="project" value="" /> (必填)
							請自行填入專案名稱或行程需求</td>
					</tr>
					<tr>
						<th width="100">泛舟選擇</th>
						<td><select name="selecttype" class="form-control">
								<option value="">請選擇</option>
								<option value="向">向上之星</option>
								<option value="急">急流之星</option>
								<option value="自">自動排水舟</option>
								<option value="動">動力艇</option>
								<option value="貴">貴賓艇</option>
								<option value="守">守護艇</option>
						</select> (必填)</td>
					</tr>
					<tr>
						<th width="100">活動費用</th>
						<td><input type="text" name="actmoney" value="" /> (必填)</td>
					</tr>
					<tr>
						<th width="100">帳號末五碼</th>
						<td><input type="text" name="lastfive" value="" />
							(必填，如匯款請填入匯款人姓名)</td>
					</tr>
					<tr>
						<th width="100">匯款金額</th>
						<td><input type="text" name="payment" value="" /> (必填)</td>
					</tr>
					<tr>
						<td colspan="2"
							style="color: #3333FF; background: #3366FF; color: #fff;">步驟二、報名參加人員資料
							<span style="color: #aaa;">(應填寫項目 / 1.姓 名、2.生 日、3.身份證字號、4.行動電話)</span>
						</td>
					</tr>
					<tr>
					
					
					<tr>
						<td colspan="2"><table cellpadding="0" cellspacing="0" width="98%"
								align="center" id="jointable">
								<tr>
									<td>+/-</td>
									<td>姓 名</td>
									<td>出生年月日(1977-01-01)</td>
									<td>身份證字號</td>
									<td>行動電話</td>
								</tr>
								<tr>
									<td></td>
									<td><input type="text" name="member_name[]" /></td>
									<td><input type="text" name="member_birth[]" /></td>
									<td><input type="text" name="member_cardid[]" /></td>
									<td><input type="text" name="member_cell[]" /></td>
								</tr>
							</table></td>
					</tr>
					<tr>
						<td colspan="2"
							style="color: #3333FF; background: #3366FF; color: #fff;">步驟三、泛舟注意事項</td>
					</tr>
					<tr>
						<td colspan="2">
							※孕婦、氣喘、心臟病、高血壓、癲癇等禁止參加泛舟活動，以上除孕婦外皆屬突發性病症，如不告知泛舟業者，執意參加水上活動一切後果自行負責。</br>
							※經大眾認定當天水位不適合泛舟之年齡經勸導仍執意參加者，除國賠以外其餘則認自行負責。</br>
							※請勿攜帶貴重物品，可攜帶少許零錢已便中途休息站使用。</br> ※泛舟請專著輕便長袖、長褲、布鞋等裝備參加，並自備一套換洗衣物。</br>
							※泛舟屬挑戰激烈之活動，台灣以照規定辦理國賠250萬，如泛舟中途受傷，皆由國家來理賠，法律訴訟等皆可再上訴。</br> </br>
							<font style="color: red;"><b>備註：以上泛舟事項不代表本台立場，純粹娛樂，請放鬆心情，閱讀注意事項，同意後再行填寫泛舟報名。</b>
						
						</td>
					</tr>
					<tr>
						<td align="center" colspan="2"><input type="reset"
							class="btn btn-danger" name="nosure" value="修改重填"
							style="width: 100px; height: 40px;"> &nbsp;&nbsp;&nbsp; <input
							type="submit" class="btn btn-success" name="sure" value="確定送出"
							style="width: 100px; height: 40px;"></td>
					</tr>
					<?php
					echo "<script> if(check()){
							alert('報名表已送出，我們將會盡速聯絡你');
							window.location = 'Rafting.php';
						}</script>";
					?>
				</tbody>
			</table>
		</form>
	</div>
</body>
</html>