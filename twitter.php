<?php
		require 'dbinfo.php';
		require_once('twitter/TwitterAPIExchange.php');
		$id = $_POST['user_id'];
		$arr = array();
		$sql = "SELECT twitter_name FROM reg WHERE id= '$id'";
		$result = mysqli_query($connection,$sql);
		if($rows = mysqli_fetch_assoc($result)) {
			$arr['a'] = $rows['twitter_name'];
		}
		
		$settings = array(
    'oauth_access_token' => "4920069551-tJSnWUE4NYGIosB636mBd33OsyftPAVvbBVCpk8",
    'oauth_access_token_secret' => "JoAu7YA9Yl4yKGjgZwUXNiVcksIpXN838uHppfe2uaFm7",
    'consumer_key' => "5gpmoJCkH4NClaR0W2iaaLN6B",
    'consumer_secret' => "FceC09enwnL3gM8aa0V7IMQQuaHKLgXB6vAOOAiw4vioWKrV4g"
	);
	$url = "https://api.twitter.com/1.1/statuses/user_timeline.json";
	$requestMethod = "GET";
	if (isset($_GET['user']))  {$user = $_GET['user'];}  else {$user  = $arr['a'];}
	if (isset($_GET['count'])) {$count = $_GET['count'];} else {$count = 10;}
	$getfield = "?screen_name=$user&count=$count";
	$twitter = new TwitterAPIExchange($settings);
	$string = json_decode($twitter->setGetfield($getfield)
	->buildOauth($url, $requestMethod)
	->performRequest(),$assoc = TRUE);
	if($string["errors"][0]["message"] != "") {echo "<h3>Sorry, there was a problem.</h3><p>Twitter returned the following error message:</p><p><em>".$string[errors][0]["message"]."</em></p>";exit();}
	$val = "";
	foreach($string as $items)
	{
		?>
		<?php
		//echo "<br/>Tweet: ". $items['text']."<br />";
	    //echo "Tweeted by: ". $items['user']['screen_name']."<br />";
	    //echo "Time and Date of Tweet: ".$items['created_at']."<br />";
	    $val  .= "Screen_Name: ". $items['user']['screen_name'] ."<br/>";
	    $val  .= "Date and Time: ". $items['created_at'] ."<br/>";
	    $val  .= "Tweet: ". $items['text'] . "<br/><br/>";
	    //$val . = "Tweeted by: ". $items['user']['screen_name']."<br />";
	}
		$arr['res'] = $val;
	echo json_encode($arr);
?>