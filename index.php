<html>
<head>
<meta name="txtweb-appkey" content=""/>
</head>
<body>
<?php
require_once('twitteroauth/twitteroauth.php');
$msg=$_GET['txtweb-message'];
$twitter_un = "";
$num_tweets = 100;
$consumerkey = "";
$consumersecret = "";
$accesstoken = "";
$accesstokensecret = "";
$connection = new TwitterOAuth($consumerkey, $consumersecret, $accesstoken, $accesstokensecret);
if($msg == NULL)
{
	

echo "Support and Spread MARD (MEN AGAINST RAPE AND DISCRIMINATION): <br/>";
echo "Speak your voice to World about MARD: <br/><br/>";
echo "Send @mard.support&lt;space&gt;&lt;your_message&gt; to post your message to MARD Campign <br/> <br/>";

echo "Your message will directly posted to Twitter and Facebook MARD pages with hashtags #realmard & #supportmard <br/><br/>";


echo "Recent Voices: <br/>";
$tweets = $connection->get("https://api.twitter.com/1.1/statuses/user_timeline.json?screen_name=".$twitter_un."&count=".$num_tweets);
foreach($tweets as $tweet) {
	echo "<p>".$tweet->text."</p>";
}
}
else{
	
$status = $connection->post('statuses/update', array('status' => $msg.""." #realmard"." #supportmard" ,));
echo $status ? 'Thank You for Supporting MARD <br/> Follow us @supportmard on twitter & facebook <br/><br/>' : 'ERROR';
echo "Recent Voices about MARD <br/>";
$tweets = $connection->get("https://api.twitter.com/1.1/statuses/user_timeline.json?screen_name=".$twitter_un."&count=".$num_tweets);
foreach($tweets as $tweet) {
	echo "<p>".$tweet->text."</p>";
}
}
?>
