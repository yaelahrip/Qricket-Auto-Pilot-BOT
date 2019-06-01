<?php

	################################################
	##
	##	Qricket Auto Males Bot 1.6
	##  Coded by github.com/yaelahrip
	##  Landing nda landing pikir keri.
	################################################
	set_time_limit(0);
	//error_reporting(0);


	$deviceInfo = getRandomDeviceInfo();

	$DeviceHard = getRandomDeviceInfo();

	$coki = "cookie";
	$proxy = "";
	$proxyauth = "";
	$vr = "1.0";
	
print "
                             
	 _____     _     _       _   
	|     |___|_|___| |_ ___| |_ 
	|  |  |  _| |  _| '_| -_|  _|
	|__  _|_| |_|___|_,_|___|_|  
 	  |__|  By Yelahrip 
	Landing nda Landing Pikir Keri";
	print "\r\n";
	sleep(2);

	print "\r\nPilih Mode
[1].REG WITH REFERRAL
[2].ONLY REG [AUTO GENERATE CREDENTIAL]
[3].PLAY THE SPINWHEEL
[4].EXIT
Input Your Choice : ";	
	$handlex = fopen ("php://stdin","rb");
	$typegila = fgets($handlex);
	if(trim($typegila) == "1")
	{
		print "\r\nPhone Number: ";	
		$handle = fopen ("php://stdin","rb");
		$nohp = fgets($handle);
		if(trim($nohp) != '')
		{
			$Step1 = SendOTP(trim($nohp),$deviceInfo);
			if(preg_match('/phoneNumber/', $Step1))
			{
				print "\r\nOTP: ";	
				$handle2 = fopen ("php://stdin","rb");
				$otp = fgets($handle2);
				if(trim($otp) != '')
				{
					$step2 = VerifOTP(trim($nohp),trim($otp),$deviceInfo);

					if(preg_match('/200/', $step2))
					{
						print "\r\nREFFERAL CODE? (AKUN PERTAMA ? inputin: 99): ";	
						$handle3 = fopen ("php://stdin","rb");
						$referralCode = fgets($handle3);
						if(trim($referralCode) != '')
						{
							
							$firstName = namaku();
							$usernameEmail = $firstName.rand(1111,9999);
							$lastName  = namaku();
							$password  = getRandomWord(rand(5,8)).getRandomNumber().strtoupper(getRandomWord(1));
							
							
							$tp = 2;
							if(trim($referralCode) == "99")
							{
								$referralCode = "PKT8HD";
							}
							$hasil =  Register($usernameEmail,$firstName,$lastName,$password,$tp,trim($nohp),trim($referralCode),$deviceInfo);

							//saveCredXX($hasil);

							$dcodx = json_decode($hasil);
							$email 			= $dcodx->account->user->email;
							$referralCode 	= $dcodx->account->user->referralCode;
							$referralID 	= $dcodx->account->referral->id;
							$token 			= $dcodx->auth->jwt->accessToken;

							$data = array("type"=>"ref","email"=>$email,"password"=>$password,"referralCode"=>$referralCode,"referralID"=>$referralID,"token"=>$token);
							$data = json_encode($data);
							saveCred($data);

							

							if($email != "")
							{
								print "\r\n$email|$password -> Sukses Saved. ~~~~\r\n";
								$data = $email."|".$password."|".$token;							

								saveJson($data);
							}else
							{
								print "\r\n Failed register \r\n";
							}
							

						}						

						fclose($handle3);
					}

				}
				fclose($handle2);
			}else
			{
				print $Step1;
			}
		}
		fclose($handle);

	}elseif(trim($typegila) == "2")
	{
		$firstName = namaku();
		$usernameEmail = $firstName.rand(1111,9999);
		$lastName  = namaku();
		$password  = getRandomWord(rand(5,8)).getRandomNumber().strtoupper(getRandomWord(1));
		$tp = 1;
		$hasil =  Register($usernameEmail,$firstName,$lastName,$password,$tp,"","",$deviceInfo);

		$dcodx = json_decode($hasil);
		@$email 			= $dcodx->account->user->email;
		@$referralCode 	= $dcodx->account->user->referralCode;
		@$referralID 	= $dcodx->account->referral->id;
		@$token 			= $dcodx->auth->jwt->accessToken;

		$data = array("type"=>"biasa","email"=>$email,"password"=>$password,"referralCode"=>$referralCode,"referralID"=>$referralID,"token"=>$token);
		$data = json_encode($data);
		saveCred($data);

		print "\r\n$email|$password -> Sukses Saved. ~~~~\r\n";
	}elseif(trim($typegila) == "3")
	{
			print "\r\nInput Email|Password : ";
			$handleR = fopen ("php://stdin","rb");
			$line = fgets($handleR);
			if(trim($line) != '' && preg_match('/@/', trim($line)))
			{
				$exp = explode("|", trim($line));
				playTheGame($exp[0],$exp[1]);
			}
			fclose($handleR);
	}
	else
	{
		print "
We wait your next spin bitchhhhhh Hahaha ~

		";
		exit();
	}

	fclose($handlex);
	function namaku()
	{
		$nama = array("Putri","Kevin","Irene","arief","Intan","ahmad","aulia","farel","Annisa","Angga","maria","Henry","Nurul","stanley","Sarah","fadhlan","Farah","arif","Cindy","David","Dewi","Rio","Syifa","dimas","bella","andy","Gita","Denny","dian","Michael","Hana","Jonathan","jessica","Osbert","Dina","Aditya","nadya","adit ","ayu","Bayu","Amalia","adi","Sharon","Bintang","nabila","ariel","Grace","Aldi","Shinta","imam","Vania","hilman","Dinda","anas","Anna","Rafi","Wulan","Bagus","Abigail","akmal","novita","Fauzi","Alya","Farhan","Amelia","fajar","Nisrina","Haliim","karina","rudi","Jasmine","Renaldi","FITRI","pandu","Gabriella","Andreas","icha","adesta","Vivian","Andri","nisa","Timoty","Vina","rifqi","Salsabilla","Zulfikar","Kezia","Ansel","indah","rendy","Clarissa","Ilham","Michelle","Ramadhan","dini","Jonah","Adinda","Randika","maya","nando","Sari","Euan","Sonia","Ridho","Vanessa","Satria","Lia","Eka","Tika","danny","Aisyah","andre","Eva","adrian","Novi","Prendy","Elsa","Daffa","Amanda ","Gilang","nanda","Yoga","Imelda","Robby","Tasya","Iqbal","farrah","Muhammad","Sella","Raditya","Nadira","Rama","Rika","Yudianto","nur","ryo","Rani","adithia","Veronica","reza","sabrina","indra","Gabriela","aldo","Clara","Rahmat","defi","gerry","fani","Andra","Debby","Hanif","Belinda","Dwi","Muthia","Rahmat Teguh","angela","Abdi","Indonesia","Ricky","Diah","Hardi","Sheren","felix","Ana","Nickindo","ika","bryan","Sasha","Darren","Rachel","Hans","ira","Firman","eka","Samuel Reinhard","Tyas","Endang","cynthia","dafa","Dea","Fariz","Salsa","Rizki","Nadia","Daniel","Hani","gideon","devi","Afif","Audrey","aldy","Ken","Leo","linda","Fadlika","Hasna","Darryl","septi","ahmad","sarah","Haziq","aisyah","amir","Nurul","Daniel","Mira","Tan","alia","ADAM","Anis","Muhammad","Michelle","Adib","Aina","syafiq","Najwa","Ryan","farah","Alan","siti","Afiq","Maryam","Kim","AIN","Aiman","nabilah","Ashraf","hana","lokman","sofea","amirul","Irdina","luqman","Hani","John","alya","Jack","Jane","Alex","hanna","jeremy","Chloe","Hilmi","Anna","Syah","putri","Nabil","Diyana","Awang","Qistina","Jeffrey","batrisyia","Ali","husna","Jon","Atiqah","Jason","Wani","syam","Amanda","izzat","Fatin","hakim","Carmen","Azim","nethya","Amsyar","Adriana","Ben","Amirah","Ivan","Nini","Lim","Balqis","Jonathan","Natasha","Aisar","Nana","AKMAL","Aishah","Zulhasif","sabrina","ISKANDAR","Damia","Syed","Bella","raymond","sharifah","Taufik","Insyirah","Chan","Hanan","Alvin ","Jannah","Lee","Amy ","Mikail","Wendy","ameer","Farhana","arden","Sofia","Mathias","Angel","James","Yasmin","Ammar","Najah","Ethan","Tiffany","Hay","Crystal","Danny","aida","isfahann","Liyana","Syahmi","syahirah","sam","Hanis","Imran","Nadia","Rayzal","Najihah","ron","Zoe","Ming","Maisarah","PARVIN","Afiqah","arvin","Ayu","Han Siang","zahra","Abell","Iman","Sylvester","Nina","Sudhish Rao","Kim","issam","xin","Wayne","Mimi","MUHAMMAD DANIAL","sara","Key","nadrah","Rudy","Wan","Jeshurun David ","Sharon","affandi","lina","GG BOND","Natalie","Teoh","Puteri","Chin Poh","Izzah","Rachel","atan ","Syira","izzato","alyaa","shahzil","Zulaikha","Alisa","Ariff","NURIN","Phoenix","Nicole");


			return trim(strtolower($nama[rand(0,count($nama)-1)]));
	}

	function SendOTP($nohp,$deviceInfo)
	{
		
		$post = '{"phoneNumber":"+1'.$nohp.'"}';

		$url = 'https://goldcloudbluesky.com/app/sms/verify';

		return exeCute($post,$url,$deviceInfo);
		//{"countryCode":"ID","phoneNumber":"+187876605654","nationalFormat":"0878-7660-5654"}
	}

	function VerifOTP($nohp,$otp,$deviceInfo)
	{
		
		$post = '{"code":"'.$otp.'","phoneNumber":"+1'.$nohp.'"}';

		$url = 'https://goldcloudbluesky.com/app/sms/verify';

		return exeCutePUT($post,$url,$deviceInfo);
		//{"title":"Error verifying SMS.","errors":["Verification code for that number has expired or was never made."]}
	}

	function Register($usernameEmail,$firstName,$lastName,$password,$tp,$phoneNumber = null ,$referralCode = null,$deviceInfo)
	{

		if($tp == 1)
		{
			$post = '{"email":"'.$usernameEmail.'@gmail.com","firstName":"'.$firstName.'","lastName":"'.$lastName.'","password":"'.$password.'","utcOffset":420}';
	
		}else
		{
			$post = '{"email":"'.$usernameEmail.'@gmail.com","firstName":"'.$firstName.'","lastName":"'.$lastName.'","password":"'.$password.'","phoneNumber":"+1'.$phoneNumber.'","referralCode":"'.$referralCode.'","utcOffset":420}';

		}

		$url = 'https://goldcloudbluesky.com/app/register';

		return exeCute($post,$url,$deviceInfo);
	}


	function exeCutePUT($post,$url,$deviceInfo)
	{	
		
		$headers= array(
		"device-type: Android",
		"device-hardware: Xiaomi Redmi ".rand(3,7),
		"device-version: ".rand(19,25),
		"version: 3.1.9",
		"Authorization: Bearer 0",
		"Content-Type: application/json; charset=UTF-8",
		"Content-Length: ".strlen($post),
		"Host: goldcloudbluesky.com",
		"Connection: Keep-Alive",
		"User-Agent: okhttp/3.8.0",

		);

		$cha = curl_init();
		curl_setopt_array($cha, Array(
		CURLOPT_URL => $url,
		CURLOPT_SSL_VERIFYPEER => false,
		CURLOPT_SSL_VERIFYHOST => false,
		CURLOPT_RETURNTRANSFER => true,
		CURLOPT_HTTPHEADER => $headers,
		//CURLOPT_PROXY => $proxy,
		CURLOPT_CUSTOMREQUEST => "PUT",
		CURLOPT_POSTFIELDS => $post,
		CURLOPT_HEADER => true,
		));
		$responsea = curl_exec($cha);
		curl_close($cha);

		return $responsea;

	}


	function exeCute($post,$url,$deviceInfo)
	{	
		//PKT8HD	

		//print $post;		
		$headers= array(
		"device-type: Android",
		"device-hardware: Xiaomi Redmi ".rand(3,7),
		"device-version: ".rand(19,25),
		"version: 3.1.9",
		"Content-Type: application/json; charset=UTF-8",
		"Content-Length: ".strlen($post),
		"Host: goldcloudbluesky.com",
		"Connection: Keep-Alive",
		"User-Agent: okhttp/3.8.0",

		);

		$cha = curl_init();
		curl_setopt_array($cha, Array(
		CURLOPT_URL => $url,
		CURLOPT_SSL_VERIFYPEER => false,
		CURLOPT_SSL_VERIFYHOST => false,
		CURLOPT_RETURNTRANSFER => true,
		CURLOPT_HTTPHEADER => $headers,
		//CURLOPT_PROXY => $proxy,
		CURLOPT_CUSTOMREQUEST => "POST",
		CURLOPT_POSTFIELDS => $post,
		CURLOPT_HEADER => false,
		));
		$responsea = curl_exec($cha);
		curl_close($cha);

		return $responsea;

	}

	function getRandomWord($length = 5)
  	{
   		return substr(str_shuffle("qwertyuiopasdfghjklzxcvbnmQWERTYUIOPASDFGHJKLZXCVBNM0123456789"),0,$length);
	}

	function getRandomNumber($length = 1)
  	{
   		return substr(str_shuffle("01234567890"),0,$length);
	}


	function saveCred($data)
	{	
		$myfile = fopen("CredentialQriket.txt", "a+") or die("Unable to open file!");
		fwrite($myfile,$data."\r\n");
		fclose($myfile);	
		
	}


	function saveCredXX($data)
	{	
		$myfile = fopen("!HASILLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLL.txt", "a+") or die("Unable to open file!");
		fwrite($myfile,$data."\r\n");
		fclose($myfile);	
		
	}


	function saveJson($data)
	{	
		$myfile = fopen("xLogin.txt", "a+") or die("Unable to open file!");
		fwrite($myfile,$data."\r\n");
		fclose($myfile);	
		
	}


	function getRandomDeviceInfo()
	{
		$nama = array("Galaxy View2","Galaxy S10 5G","Galaxy S10+","Galaxy S10","Galaxy S10e","Galaxy Fold","Galaxy Watch Active","Galaxy A2 Core","Galaxy M30","Galaxy M20","Galaxy M10","Galaxy A80","Galaxy A70","Galaxy A60","Galaxy A50","Galaxy A40","Galaxy A30","Galaxy A20e","Galaxy A20","Galaxy A10","Galaxy Tab S5e","Galaxy Tab A 10.1 (2019)","Galaxy Tab A 8 (2019)","Galaxy Tab Advanced2","Galaxy Tab A 8.0 (2018)","Galaxy Tab S4 10.5","Galaxy Tab A 10.5","Galaxy A8s","Galaxy A6s","Galaxy A9 (2018)","Galaxy A7 (2018)","Galaxy Note9","Galaxy Watch","Galaxy J6+","Galaxy J4 Core","Galaxy J4+","Galaxy J2 Core","Galaxy On6","Galaxy J7 (2018)","Galaxy J3 (2018)","Galaxy A8 Star (A9 Star)","Galaxy S Light Luxury","Galaxy J8","Galaxy J6","Galaxy J4","Galaxy A6+ (2018)","Galaxy A6 (2018)","Galaxy J7 Duo","Galaxy J7 Prime 2","Galaxy S9+","Galaxy S9","Galaxy J2 Pro (2018)","Galaxy A8+ (2018)","Galaxy A8 (2018)","Galaxy J2 (2017)","Galaxy Tab Active 2","Galaxy Tab A 8.0 (2017)","Galaxy C7 (2017)","Gear Sport","Galaxy Note8","Galaxy S8 Active","Galaxy J7 V","Galaxy Note FE","Galaxy J7 Max","Galaxy J7 Pro","Galaxy J7 (2017)","Galaxy J5 (2017)","Galaxy J3 (2017)","Galaxy Folder2","Z4","Galaxy S8","Galaxy S8+","Gear S3 classic LTE","Galaxy C5 Pro","Galaxy Xcover 4","Galaxy Tab S3 9.7","Galaxy J1 mini prime","Galaxy J3 Emerge","Galaxy C7 Pro","Galaxy A7 (2017)","Galaxy A5 (2017)","Galaxy A3 (2017)","Galaxy Grand Prime Plus","Galaxy J2 Prime","Galaxy C9 Pro","iPad Air (2019)","iPad mini (2019)","iPad Pro 12.9 (2018)","iPad Pro 11","iPhone XS Max","iPhone XS","iPhone XR","iPad 9.7 (2018)","iPhone X","iPhone 8 Plus","iPhone 8","iPad Pro 12.9 (2017)","iPad Pro 10.5 (2017)","iPad 9.7 (2017)","iPhone 7 Plus","iPhone 7","iPad Pro 9.7 (2016)","iPhone SE","iPhone 6s Plus","iPhone 6s","iPad Pro 12.9 (2015)","iPad mini 4","Xiaomi Redmi Y3","Xiaomi Black Shark 2","Xiaomi Redmi 7","Xiaomi Redmi Note 7 Pro","Xiaomi Mi Mix 3 5G","Xiaomi Mi 9 Explorer","Xiaomi Mi 9 SE","Xiaomi Mi 9","Xiaomi Redmi Go","Xiaomi Redmi Note 7","Xiaomi Mi Play","Xiaomi Black Shark Helo","Xiaomi Mi Mix 3","Xiaomi Redmi Note 6 Pro","Xiaomi Mi 8 Pro","Xiaomi Mi 8 Lite","Xiaomi Pocophone F1","Xiaomi Mi A2 (Mi 6X)","Xiaomi Mi A2 Lite (Redmi 6 Pro)","Xiaomi Mi Max 3","Xiaomi Mi Pad 4","Xiaomi Mi Pad 4 Plus","Xiaomi Redmi 6","Xiaomi Redmi 6A","Xiaomi Mi 8 Explorer","Xiaomi Mi 8","Xiaomi Mi 8 SE","Xiaomi Redmi S2 (Redmi Y2)","Xiaomi Mi Mix 2S","Xiaomi Redmi Note 5 AI Dual Camera","Xiaomi Redmi Note 5 Pro","Xiaomi Black Shark","Xiaomi Redmi Note 5 (Redmi 5 Plus)","Xiaomi Redmi 5","Xiaomi Redmi 5A","Xiaomi Redmi Y1 (Note 5A)","Xiaomi Redmi Y1 Lite","Xiaomi Mi Note 3","Xiaomi Mi Mix 2","Xiaomi Mi A1 (Mi 5X)","Xperia 1","Xperia 10 Plus","Xperia 10","Xperia L3","Xperia XZ3","Xperia XA2 Plus","Xperia XZ2 Premium","Xperia XZ2","Xperia XZ2 Compact","Xperia XA2 Ultra","Xperia XA2","Xperia L2","Xperia R1 (Plus)","Xperia XZ1","Xperia XA1 Plus","Xperia XZ1 Compact","Xperia L1","Xperia XZs","Xperia XZ Premium","Xperia XA1 Ultra","Xperia XA1","Xperia X Compact","Xperia XZ","Xperia E5","Xperia XA Ultra","Xperia X Performance","Xperia X","Xperia XA Dual","Xperia XA","Xperia Z5 Premium Dual");

		return trim($nama[rand(0,count($nama)-1)]);
	}


	function playTheGame($email,$pass)
	{
		$totalSpin = 0;
		$pth = "";
		$tr = "";

		$lgn = true;
		while (true) {

			$path = "app/login";
			$post = json_encode(["email" => $email, "password" => $pass]);
			$aksi = defaul($path, $post);
			$js = json_decode($aksi, true);
			$res = $js["account"];
			$auth = $js["auth"];
			@$err = @$js["errors"];
			if ($res != null) {
				$game = true;
				$id = $res["user"]["id"];
				$email = $res["user"]["email"];
				$ref = $res["user"]["referralCode"];
				$coin = $res["balance"]["spins"];
				$bal = $res["balance"]["cash"];
				$token = $auth["jwt"]["accessToken"];
				$fn = $res["user"]["firstName"];
				$lsn = $res["user"]["lastName"];
				$nik = $fn . " " . $lsn;
				if ($lgn) {
					$lgn = false;
					print "[Login Sukses -> $nik]"."\r\n";
					sleep(1);
				}
				print $pth . "[Spin : $coin $pth | Balance :\$$bal]"."\r\n";
				sleep(1);
			} else {
				print print_r($err);
				exit;
			}




			sleep(1);
			$stat_qr = true;
			if ($stat_qr) {
				if ($game) {
					while (true) {
						
						
						$am = 1;//rand(1, 2);
						if ($coin > $am) {
							$path = "config/wheel";
							$aksi = gets($path, $token);
							$js = json_decode($aksi, true);
							$hash = $js["hash"];
							if ($hash != null) {
								$po1 = true;
							} else {
								$po1 = false;
							}
						} else {
							print $pth . "[Coin spin : $coin -> Not Enough]"."\r\n";
							$adss = true;
							$po1 = false;
						}

						GLOBAL $adss;
						sleep(1);
						if ($po1) {
							$arr = [0, 1];
							$rnd = array_rand($arr);
							$kol = $arr[$rnd];
							print $pth . "[Starting step 1] --> $am"."\r\n";
							sleep(1);
							$path = "game";
							$post = json_encode(["configHash" => $hash, "selectedColor" => $kol, "wager" => ["amount" => $am, "type" => "spins"]]);
							$aksi = post($path, $post, $token);
							$js = json_decode($aksi, true);
							$sesi = $js["session"];
							$res = $js["results"];
							$cash = $js["balance"];
							$scret = $sesi["nextMove"]["secret"];
							$guid = $sesi["GUID"];
							$next = $sesi["continue"];
							$round = $res["round"];
							$sgm = $res["segment"];
							$coin = $cash["spins"];
							$bal = $cash["cash"];
							if ($next == 1) {
								if ($scret != null) {
									$po2 = true;
								} else {
									$po2 = false;
								}
							}
						} else {
							print $pth . "[Spin Break]"."\r\n";
							break;
						}

						GLOBAL $po2;
						sleep(2);
						if ($po2) {
							$arr = [0, 1];
							$rnd = array_rand($arr);


							//SEting
							$kol = $arr[$rnd];
							print "[Step 1 -> OK ]"."\r\n";
							//sleep(1);
							print "[Starting step 2] --> $am"."\r\n";
							sleep(1);
							$path = "game";
							$post = json_encode(["GUID" => $guid, "secret" => $scret, "selectedColor" => $kol]);
							$aksi = put($path, $post, $token);
							$js = json_decode($aksi, true);
							@$sesi = $js["session"];
							@$res = $js["results"];
							$round = $res["round"];
							$sgm = $res["segment"];
							$screts = $sesi["nextMove"]["secret"];
							$guid = $sesi["GUID"];
							$next = $sesi["continue"];
							if ($next == 1) {
								if ($screts != null) {
									$claim = true;
								} else {
									$claim = false;
								}
							} else {
								$claim = false;
							}
						} else {
							print $pth . "[Step 1 -> Break]"."\r\n";
							$claim = false;
						}
						sleep(1);
						if ($claim) {
							
							print $pth . "[Step 2 -> OK | Total Spin : $totalSpin]"."\r\n";

							sleep(1);
							print "[Claim reward]"."\r\n";
							sleep(1);
							$path = "game/claim";
							$post = json_encode(["GUID" => $guid, "secret" => $screts,]);
							$aksi = put($path, $post, $token);
							$js = json_decode($aksi, true);
							$res = @$js["prize"];
							$rwd = @$res["amount"];
							$des = @$res["type"];
							$amo = @$js["balance"];
							$bal = @$amo["cash"];
							$coin = $amo["spins"];
							if ($res != null) {
								print $pth . "[Claim : \$$rwd | Balance : $bal -> Claim $pth| Spin :$tr $coin ]"."\r\n";
							} else {
								print $js["title"]."\r\n";
							}
						} else {
							print $pth . "[Step 2 -> Break ]"."\r\n";
						}
						sleep(1);

						$totalSpin++;
					}
				}
				sleep(1);
				if ($adss) {
					print "[ On the way claim Ads ]"."\r\n";
					sleep(1);
					$i = 0;
					while (true) {
						$path = "campaigns";
						$aksi = gets($path, $token);
						$js = json_decode($aksi, true);
						$intr = $js["campaigns"]["internal"];
						$net = $js["campaigns"]["networks"];


						// Campaign Internal************************************************
						if ($intr != null) {
							$co = count($intr);
							for ($c = 0; $c < $co; $c++) {
								$cpgn = $intr[$c]["campaign"];
								$netw = $intr[$c]["network"];
								$path = "campaigns/claim";
								$post = json_encode(["campaign" => $cpgn, "network" => $netw, "referralGoal" => true]);
								$aksi = post($path, $post, $token);
								$js = json_decode($aksi, true);
								$srwd = @$js["reward"]["amount"];
								$coin = @$js["balance"]["spins"];
								$rf = @$js["referral"];
								if ($srwd != null) {
									$i++;
									print $pth . "[ Reward $srwd $pth spins For Internal Campaign | total spin : $coin ]"."\r\n";
								}else
								{
									print $pth . "[ Reward Thru Internal Campaign -> 0 ]"."\r\n";
								}
								sleep(rand(3,5));
							}
						}

						// Campaign Network************************************************
						if ($net != null) {
							$nco = count($net);
							for ($n = 0; $n < $nco; $n++) {
								$ncpgn = $net[$n]["campaign"];
								$nnetw = $net[$n]["network"];
								$path = "campaigns/claim";
								$post = json_encode(["campaign" => $ncpgn, "network" => $nnetw, "referralGoal" => true]);
								$aksi = post($path, $post, $token);
								$js = json_decode($aksi, true);
								$srwd = @$js["reward"]["amount"];
								$coin = @$js["balance"]["spins"];
								$rf = @$js["referral"];
								if ($srwd != null) {
									$i++;
									print $pth . "[ We got $srwd spins For Network Campaign | total spin : $coin ]"."\r\n";
								}else
								{
									print $pth . "[ Reward Thru Network Campaign -> 0 ]"."\r\n";
								}
								sleep(rand(3,5));
							}
						}
						if ($i >= 4) {
							break;
						}
					}
				}
			} else {
				print "[ recoded by yaelahrip 2k19 All reserver and Made with Love ]"."\r\n";
				break;
			}
		}
	}





	function defaul($path, $post)
	{
		GLOBAL $coki;GLOBAL $proxyauth; GLOBAL $proxy;GLOBAL $DeviceHard; 
		$url = "https://goldcloudbluesky.com/$path";
		$h[] = "device-type: Android";
		$h[] = "device-hardware: ".$DeviceHard;
		$h[] = "device-version: ".rand(18,25);
		$h[] = "version: 3.1.".rand(7,9);
		$h[] = "content-type: application/json; charset=UTF-8";
		$h[] = "user-agent: okhttp/3.8.0";
		$curl = curl_init();
		curl_setopt_array(
			$curl,
			array(
				CURLOPT_RETURNTRANSFER => true, CURLOPT_URL => $url, CURLOPT_TIMEOUT => 30, CURLOPT_POST => true, CURLOPT_POSTFIELDS => $post,
				CURLOPT_HTTPHEADER => $h,  CURLOPT_SSL_VERIFYPEER => true, //CURLOPT_PROXY => $proxy,
				CURLOPT_COOKIEJAR => $coki, CURLOPT_COOKIEFILE => $coki,
			)
		);
		$result = curl_exec($curl);
		curl_close($curl);
		return $result;
	}

	function post($path, $post, $token)
	{
		GLOBAL $coki;GLOBAL $proxyauth; GLOBAL $proxy;GLOBAL $DeviceHard; 
		$url = "https://goldcloudbluesky.com/$path";
		$h[] = "authorization: Bearer $token";
		$h[] = "device-type: Android";
		$h[] = "device-hardware: ".$DeviceHard;
		$h[] = "device-version: ".rand(18,25);
		$h[] = "version: 3.1.".rand(7,9);
		$h[] = "content-type: application/json; charset=UTF-8";
		$h[] = "user-agent: okhttp/3.8.0";
		$curl = curl_init();
		curl_setopt_array(
			$curl,
			array(
				CURLOPT_RETURNTRANSFER => true, CURLOPT_URL => $url, CURLOPT_TIMEOUT => 30, CURLOPT_POST => true, CURLOPT_POSTFIELDS => $post,
				CURLOPT_HTTPHEADER => $h,  CURLOPT_SSL_VERIFYPEER => true, //CURLOPT_PROXY => $proxy,
				CURLOPT_COOKIEJAR => $coki, CURLOPT_COOKIEFILE => $coki,
			)
		);
		$result = curl_exec($curl);
		curl_close($curl);
		return $result;
	}

	function gets($path, $token)
	{
		GLOBAL $coki;GLOBAL $proxyauth; GLOBAL $proxy;GLOBAL $DeviceHard; 
		$url = "https://goldcloudbluesky.com/$path";
		$h[] = "accept: application/json";
		$h[] = "device-type: Android";		
		$h[] = "device-hardware: ".$DeviceHard;
		$h[] = "device-version: ".rand(18,25);
		$h[] = "version: 3.1.".rand(7,9);
		$h[] = "authorization: Bearer $token";
		$h[] = "user-agent: okhttp/3.8.0";
		$curl = curl_init();
		curl_setopt_array(
			$curl,
			array(
				CURLOPT_RETURNTRANSFER => true, CURLOPT_URL => $url, CURLOPT_TIMEOUT => 30, CURLOPT_HEADER => false, CURLOPT_HTTPHEADER => $h,
				 CURLOPT_SSL_VERIFYPEER => true, //CURLOPT_PROXY => $proxy, CURLOPT_COOKIEJAR => $coki,
				CURLOPT_COOKIEFILE => $coki,
			)
		);
		$result = curl_exec($curl);
		$code = curl_getinfo($curl, CURLINFO_HTTP_CODE);
		curl_close($curl);
		return $result;
	}

	function put($path, $post, $token)
	{
		GLOBAL $coki;GLOBAL $proxyauth; GLOBAL $proxy;
		$url = "https://goldcloudbluesky.com/$path";
		$h[] = "authorization: Bearer $token";
		$h[] = "device-type: Android";
		GLOBAL $DeviceHard; $h[] = "device-hardware: ".$DeviceHard;
		$h[] = "device-version: ".rand(18,25);
		$h[] = "version: 3.1.".rand(7,9);
		$h[] = "content-type: application/json; charset=UTF-8";
		$h[] = "user-agent: okhttp/3.8.0";
		$curl = curl_init();
		curl_setopt_array(
			$curl,
			array(
				CURLOPT_RETURNTRANSFER => true, CURLOPT_URL => $url, CURLOPT_TIMEOUT => 30, CURLOPT_CUSTOMREQUEST => "PUT", CURLOPT_POSTFIELDS => $post,
				CURLOPT_HTTPHEADER => $h,  CURLOPT_SSL_VERIFYPEER => true, //CURLOPT_PROXY => $proxy,
				CURLOPT_COOKIEJAR => $coki, CURLOPT_COOKIEFILE => $coki,
			)
		);
		$result = curl_exec($curl);
		$info = curl_getinfo($curl);
		curl_close($curl);
		return $result;
	}
