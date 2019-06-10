<?php
if (isset($_POST['username'])) {
  $username = $_POST['username'];
  $password = $_POST['password'];

  
  
  include 'functions.php';
$xHeader  = array();
$xData    = array();
$xAction  = array();
$xDOMdata = array();

$xHeader[] 					 = 'Accept: */*';
$xHeader[] 					 = 'Accept-Language: en-US;q=0.8,en;q=0.7';
$xHeader[] 					 = 'Cache-Control: no-cache7';
$xHeader[] 					 = 'Connection: keep-alive';
$xHeader[] 					 = 'Content-Type: application/x-www-form-urlencoded; charset=UTF-8';
$xHeader[] 					 = 'DNT: 1';
$xHeader[] 					 = 'Host: studentportal.aast.edu';
$xHeader[] 					 = 'Origin: https://studentportal.aast.edu';
$xHeader[] 					 = 'Pragma: no-cache';
$xHeader[] 					 = 'Referer: https://studentportal.aast.edu/';
$xHeader[] 					 = 'X-MicrosoftAjax: Delta=true';
$xHeader[] 					 = 'User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/73.0.3683.86 Safari/537.36';
$xHeader[] 					 = 'Cookie: ASP.NET_SessionId=aynwlnzintdz1n45ojfeut55; TS01531f8a=01902d7a3fb5d358223e384f1a1ff071ae90188e0d26605705dfa697a975cc12c10568b43085edeff568fa3be8b5147cb97d904de6533082db5d449f259902f063fdf78a2a';

$xData['ScriptManager1'] 			 = 'up4|Button2';
$xData['__EVENTTARGET'] 		 = null;
$xData['__EVENTARGUMENT'] = null;
$xData['__VIEWSTATE'] = '/wEPDwUKMTM5MzY0MzUyM2QYAQUeX19Db250cm9sc1JlcXVpcmVQb3N0QmFja0tleV9fFgEFBHJybWU0ocqU8rj1sdmnLgB1Bf2COPi1ow==';
$xData['__VIEWSTATEGENERATOR'] = 'C2EE9ABB';
$xData['__EVENTVALIDATION'] = '/wEWCAL80aPFDQL9lveNCgLyveCRDwK7q7GGCAKHubAeAqu9j6wLApqK2JcOApnAiY0LehuP5gswn/7b3z0Scm5V7RZ0AzY=';
$xData['Button2'] = 'Login';
$xData['__ASYNCPOST'] = true;
$xData['f_email'] = null;
$xData['f_username'] = null;

$xData['user_name'] = $username;
$xData['password'] = $password;

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, "https://studentportal.aast.edu/Login.aspx");
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch,CURLOPT_FOLLOWLOCATION,false);

curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($xData));
curl_setopt($ch, CURLOPT_COOKIEJAR,  'lotfy.txt');
curl_setopt($ch, CURLOPT_COOKIEFILE, 'lotfy.txt');
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, $xHeader);
$result = curl_exec($ch);
header("Content-type: text/plain");


if (!empty($result) && $result !== false) {

  $result = explode("|",$result);
  if (isset($result[51]) && !empty($result[51])) {

    $result = json_decode($result[51]);
    if ($result->text == 'alertsp(\'Registration # and Pin Code dose not matched.\');') {

      $xAction['stat'] = 'true';
      $xAction['msg'] = 'chack your ID or Password';

    }else {

      $xAction['stat'] = 'true';
      $xAction['msg'] = 'Error in api';

    }

  }elseif (isset($result[5]) && !empty($result[5]) && $result[5] == 'pageRedirect') {

    $xAction['stat'] = 'true';
    $xAction['msg'] = 'valid login';

    $xHeader  = array();
    $xData    = array();

    $xHeader[] 			 = 'Accept: text/html,application/xhtml+xml,application/xml;q=0.9,image/webp,image/apng,*/*;q=0.8,application/signed-exchange;v=b3';
    $xHeader[] 			 = 'Accept-Language: en-US;q=0.8,en;q=0.7';
    $xHeader[] 			 = 'Cache-Control: no-cache';
    $xHeader[] 			 = 'Connection: keep-alive';
    $xHeader[] 			 = 'DNT: 1';
    $xHeader[] 			 = 'Host: studentportal.aast.edu';
    $xHeader[] 			 = 'Pragma: no-cache';
    $xHeader[] 			 = 'Referer: https://studentportal.aast.edu/';
    $xHeader[] 			 = 'Upgrade-Insecure-Requests: 1';
    $xHeader[] 			 = 'User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/73.0.3683.86 Safari/537.36';
    //$xHeader[] 			 = 'Cookie: ASP.NET_SessionId=aynwlnzintdz1n45ojfeut55; TS01531f8a=01902d7a3fb5d358223e384f1a1ff071ae90188e0d26605705dfa697a975cc12c10568b43085edeff568fa3be8b5147cb97d904de6533082db5d449f259902f063fdf78a2a';

    curl_setopt($ch, CURLOPT_URL, "https://studentportal.aast.edu/Main_Page/StudentApp.aspx");
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch,CURLOPT_FOLLOWLOCATION,true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($xData));
    curl_setopt($ch, CURLOPT_COOKIEJAR,  'lotfy.txt');
    curl_setopt($ch, CURLOPT_COOKIEFILE, 'lotfy.txt');
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, $xHeader);
    $result = curl_exec($ch);
    $data                     = between_last ('<div class="data">', '<div class="clearf">', $result);
    $xDOMdata['Name']         = between_last ('<h1>', '</h1>', $data);
    $xDOMdata['faculty']      = between ('<span><strong>Faculty :</strong><span>', '</span></span>', $data);
    $xDOMdata['department']   = between ('<span><strong>Department :</strong><span>', '</span></span>', $data);
    $xDOMdata['period']       = between ('<span><strong>Period :</strong><span>', '</span></span>', $data);
    $xDOMdata['GPA']          = between ('<span><strong>GPA :</strong><span>', '</span></span>', $data);
    $xDOMdata['AchievedHours']= between ('<span><strong>Achieved Hours :</strong><span>', '</span></span>', $data);
    $xDOMdata['Img']          = between ('<img style="margin-left: 10px;" width="auto" src="', '" /></a>', $result);

    $xAction['stat'] = 'true';
    $xAction['msg']  = 'login valid';
    $xAction['data'] = $xDOMdata;

    $xHeader  = array();
    $xData    = array();

    $xHeader[] 			 = 'Accept: text/html,application/xhtml+xml,application/xml;q=0.9,image/webp,image/apng,*/*;q=0.8,application/signed-exchange;v=b3';
    $xHeader[] 			 = 'Accept-Language: en-US;q=0.8,en;q=0.7';
    $xHeader[] 			 = 'Cache-Control: no-cache';
    $xHeader[] 			 = 'Connection: keep-alive';
    $xHeader[] 			 = 'DNT: 1';
    $xHeader[] 			 = 'Host: studentporta2.aast.edu';
    $xHeader[] 			 = 'Pragma: no-cache';
    $xHeader[] 			 = 'Referer: https://studentportal.aast.edu/';
    $xHeader[] 			 = 'Upgrade-Insecure-Requests: 1';
    $xHeader[] 			 = 'User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/73.0.3683.86 Safari/537.36';
    $xHeader[] 			 = 'Cookie: _ga=GA1.2.23119227.1554038350; _gid=GA1.2.876131771.1554038350; ASP.NET_SessionId=ldpbyedsec5gx2dcicx31djc; ';

    curl_setopt($ch, CURLOPT_URL, "https://aastmtic2.aast.edu/studresults/StudentResults.aspx");
    curl_setopt($ch, CURLOPT_POST, 0);
    curl_setopt($ch,CURLOPT_FOLLOWLOCATION,true);
    curl_setopt($ch, CURLOPT_COOKIEJAR,  'lotfy.txt');
    curl_setopt($ch, CURLOPT_COOKIEFILE, 'lotfy.txt');
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, $xHeader);
    $result = curl_exec($ch);

    $years = between ('<div id="batches" class="btn-group btn-group-sm btn-block btn-group-justified">', '</div>',$result);
    $years  = explode("id=\"",$years);

    for ($i=0; $i < count($years); $i++) {

      $years[$i] = str_replace(after ("\"", $years[$i]),'', $years[$i]);
      $years[$i] = str_replace('"','', $years[$i]);

    }
    $years[0] = null;
    //print_r($years);

    $xHeader  = array();
    $xData    = array();
    $StudentResults = array();

    $xHeader[] 			 = 'Accept: text/html,application/xhtml+xml,application/xml;q=0.9,image/webp,image/apng,*/*;q=0.8,application/signed-exchange;v=b3';
    $xHeader[] 			 = 'Accept-Language: en-US;q=0.8,en;q=0.7';
    $xHeader[] 			 = 'Cache-Control: no-cache';
    $xHeader[] 			 = 'Connection: keep-alive';
    $xHeader[] 			 = 'DNT: 1';
    $xHeader[] 			 = 'Host: studentporta2.aast.edu';
    $xHeader[] 			 = 'Pragma: no-cache';
    $xHeader[] 			 = 'Referer: https://studentportal.aast.edu/';
    $xHeader[] 			 = 'Upgrade-Insecure-Requests: 1';
    $xHeader[] 			 = 'User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/73.0.3683.86 Safari/537.36';
    $xHeader[] 			 = 'Cookie: _ga=GA1.2.23119227.1554038350; _gid=GA1.2.876131771.1554038350; ASP.NET_SessionId=ldpbyedsec5gx2dcicx31djc; ';
    $xHeader[] 			 = 'Origin: https://aastmtic2.aast.edu';
    $xHeader[] 			 = 'Host: aastmtic2.aast.edu';

    $xData['__EVENTARGUMENT'] = null;
    $xData['__VIEWSTATE'] = '/wEPDwUKLTI2ODI5NzIwOA9kFgYCAw8WAh4JaW5uZXJodG1sBR5FU0xBTSBNT0hBTUVEIE1PSEFNRUQgTU9OVEFTRUJkAgQPFgIfAAUIMTQxMDI4MzVkAgYPZBYIAgEPDxYEHgRUZXh0BQpWaWV3IE1pbm9yHgdWaXNpYmxlaGRkAgUPPCsAEQMADxYEHgtfIURhdGFCb3VuZGceC18hSXRlbUNvdW50AgZkARAWABYAFgAMFCsAABYCZg9kFg4CAQ9kFhJmDw8WAh8BBQdDUzExMSAgZGQCAQ8PFgIfAQWsAkludHJvZHVjdGlvbiB0byBDb21wdXRlcnMgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgIGRkAgIPDxYCHwEFAzMuMGRkAgMPZBYCAgEPDxYCHwJoFgIeBGhyZWYFH1Jlc3VsdEVudHJ5LmFzcHg/Y3JzbnVtPTM1ODIrKytkAgQPZBYEAgEPFgIfAQUDMC4wZAIDDw9kFgIfBQUlU3R1ZGVudEF0dGVuZGFuY2UuYXNweD9jcnNudW09MzU4MiAgIGQCBQ8PFgIfAQUDMjEgZGQCBg8PFgIfAQUDOC4wZGQCBw8PFgIfAQUDMTAgZGQCCA8PFgIfAQUCQyBkZAICD2QWEmYPDxYCHwEFB0lTMTcxICBkZAIBDw8WAh8BBawCSW50cm9kdWN0aW9uIHRvIEluZm9ybWF0aW9uIHN5c3RlbXMgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgZGQCAg8PFgIfAQUDMy4wZGQCAw9kFgICAQ8PFgIfAmgWAh8FBR9SZXN1bHRFbnRyeS5hc3B4P2Nyc251bT0zNTgzKysrZAIED2QWBAIBDxYCHwEFAzAuMGQCAw8PZBYCHwUFJVN0dWRlbnRBdHRlbmRhbmNlLmFzcHg/Y3JzbnVtPTM1ODMgICBkAgUPDxYCHwEFAzE2IGRkAgYPDxYCHwEFAzE2IGRkAgcPDxYCHwEFAzcuMGRkAggPDxYCHwEFAkMgZGQCAw9kFhJmDw8WAh8BBQdCQTEwMSAgZGQCAQ8PFgIfAQWsAkNhbGN1bHVzIEkgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgIGRkAgIPDxYCHwEFAzMuMGRkAgMPZBYCAgEPDxYCHwJoFgIfBQUfUmVzdWx0RW50cnkuYXNweD9jcnNudW09Mzc0OCsrK2QCBA9kFgQCAQ8WAh8BBQMwLjBkAgMPD2QWAh8FBSVTdHVkZW50QXR0ZW5kYW5jZS5hc3B4P2Nyc251bT0zNzQ4ICAgZAIFDw8WAh8BBQMxNyBkZAIGDw8WAh8BBQM5LjBkZAIHDw8WAh8BBQMxMCBkZAIIDw8WAh8BBQJDIGRkAgQPZBYSZg8PFgIfAQUHQkExMTMgIGRkAgEPDxYCHwEFrAJQaHlzaWNzICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICBkZAICDw8WAh8BBQMzLjBkZAIDD2QWAgIBDw8WAh8CaBYCHwUFH1Jlc3VsdEVudHJ5LmFzcHg/Y3JzbnVtPTYyNTIrKytkAgQPZBYEAgEPFgIfAQUDMC4wZAIDDw9kFgIfBQUlU3R1ZGVudEF0dGVuZGFuY2UuYXNweD9jcnNudW09NjI1MiAgIGQCBQ8PFgIfAQUDMTUgZGQCBg8PFgIfAQUDMTUgZGQCBw8PFgIfAQUDMTAgZGQCCA8PFgIfAQUCQyBkZAIFD2QWEmYPDxYCHwEFB0FSMTE1ICBkZAIBDw8WAh8BBawCVmlzdWFsIFN0dWRpZXMgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgZGQCAg8PFgIfAQUDMy4wZGQCAw9kFgICAQ8PFgIfAmgWAh8FBR9SZXN1bHRFbnRyeS5hc3B4P2Nyc251bT02MjUzKysrZAIED2QWBAIBDxYCHwEFAzAuMGQCAw8PZBYCHwUFJVN0dWRlbnRBdHRlbmRhbmNlLmFzcHg/Y3JzbnVtPTYyNTMgICBkAgUPDxYCHwEFAzI5IGRkAgYPDxYCHwEFAzE0IGRkAgcPDxYCHwEFAzEwIGRkAggPDxYCHwEFAkEtZGQCBg9kFhJmDw8WAh8BBQdMSDEzMCogZGQCAQ8PFgIfAQWsAkVTUCAwMiAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgIGRkAgIPDxYCHwEFAzIuMGRkAgMPZBYCAgEPDxYCHwJoFgIfBQUfUmVzdWx0RW50cnkuYXNweD9jcnNudW09NzY3MysrK2QCBA9kFgQCAQ8WAh8BBQMwLjBkAgMPD2QWAh8FBSVTdHVkZW50QXR0ZW5kYW5jZS5hc3B4P2Nyc251bT03NjczICAgZAIFDw8WAh8BBQMyNSBkZAIGDw8WAh8BBQMxNyBkZAIHDw8WAh8BBQM5LjBkZAIIDw8WAh8BBQJQIGRkAgcPDxYCHwJoZGQCBw9kFgQCAQ9kFgQCAg9kFgICAQ8PFgIfAQUEMTUuMGRkAgMPZBYCAgEPDxYCHwEFBDIuMzBkZAICD2QWBAICD2QWAgIBDw8WAh8BBQUxMjMuMGRkAgMPZBYCAgEPDxYCHwEFBDIuMjBkZAIJDxYCHwJoZBgBBQVHVlJlcw88KwAMAQgCAWScb4q7UTS6vD3Kx8I0BqiJEAJLjyNthy6xMyv1vYsW9A==';
    $xData['__VIEWSTATEGENERATOR'] = '1F216AF8';
    $xData['__EVENTVALIDATION'] = '/wEdAAwBuFfCkWdElH069HmN3EOcSU9afsFJxhncmwuX0peNkFuLLq+z4+9hOUFn8smG/FYs+uYsJe0eC0kII/pdLmmZYAtPyRo6QOR5o9Bz7K2NuZnKuwXjICMS2EIjvTT9VzSCgzPUiQ7ocgfMnWDQ+TkKxqvzPG9VaGJfJ5btfHlZg8d+Q89Sa6tBSqfYkkFKbB4CrRoMnLur0ZGMaSTsA3RQQbcpHH+f/yE+MShCyFXxpZHqQmIyd5aq6dOiXEHp1YRQTFMUq4CjrB+xO6i0lj8DpTHqRcTHYSZrtrGtBqPVrg==';
    //header("Content-type: text/html; charset=utf-8");
    for ($i=0; $i < count($years)-1; $i++) {

      $xData['__EVENTTARGET'] = $years[$i+1];

      curl_setopt($ch, CURLOPT_URL, "https://aastmtic2.aast.edu/studresults/StudentResults.aspx");
      curl_setopt($ch, CURLOPT_POST, 1);
      curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($xData));
      curl_setopt($ch,CURLOPT_FOLLOWLOCATION,true);
      curl_setopt($ch, CURLOPT_COOKIEJAR,  'lotfy.txt');
      curl_setopt($ch, CURLOPT_COOKIEFILE, 'lotfy.txt');
      curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
      curl_setopt($ch, CURLOPT_HTTPHEADER, $xHeader);
      $result = curl_exec($ch);
      //echo $result;
      $StudentResults[$i] = '<table cellspacing="0"rules="all"border="1"style="border-collapse:collapse;">' . between ('<table cellspacing="0" rules="all" class="generalTable" border="1" id="GVRes" style="border-collapse:collapse;">', '</table>',$result)."</table><br>";
    }

    $xAction['StudentResults'] = $StudentResults;
    session_start();
    $_SESSION["username"] = $xAction['data']['Name'];
    $_SESSION["faculty"] = $xAction['data']['faculty'];
    $_SESSION["department"] = $xAction['data']['department'];
    $_SESSION["period"] = $xAction['data']['period'];
    $_SESSION["GPA"] = $xAction['data']['GPA'];
    $_SESSION["AchievedHours"] = $xAction['data']['AchievedHours'];
	$_SESSION["uid"] = $_POST['username'];
    header('Location: profile.php');


  }

}else {

  $xAction['stat'] = 'false';
  $xAction['msg'] = 'Error in api';

}

}else {
}

?>
