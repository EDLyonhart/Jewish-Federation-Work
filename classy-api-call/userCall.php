<?php

class UserInfo
{

  //  Mask values
  private $accessToken;
  private $cid;

  public function __construct($accessToken, $cid) {
    $this->accessToken = $accessToken;
    $this->cid = $cid;
  }

  public function getUser($email) {
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, "www.classy.org/api1/fundraisers?token=" . $this->accessToken . "&cid=" . $this->cid . "&mid=" . $mid);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

    $result = curl_exec ($ch);
    echo curl_error($ch);
    curl_close ($ch);

    global $jsonResult;
    $jsonResult = json_decode($result, true);

  }
}

function user_info_return( $atts ) {
  $user_info = new UserInfo('xxx---xxx---', 'xxx---');
  $user_info->getUser(---xxx);

  global $jsonResult;
  $user_info_parse = $jsonResult;
  extract(shortcode_atts(array(
    'donation' => '0',
    'key' => 'charity_name'
    ), $atts));

  return $user_info_parse[$donation, $key];
}

add_shortcode('user_info', 'user_info_return' );

?>



// thinking about how this will look.

<?php

$i = 0;

while ( ?>[user_info donation="<?php $i ?>"] <?php != "") {
  
  echo " On " ?>[user_info donation="<?php $i ?>", key="donation_date"] <?php " you gave " ?>[user_info donation="<?php $i ?>", key="donate_amount"] <?php " to " ?>[user_info donation="<?php $i ?>", key="event_name"]<?php ;
  $i++;

}

?>


//return 3 values from the first donation

[user_info donation="0", key="event_name"]
[user_info donation="0", key="donation_date"]
[user_info donation="0", key="donate_amount"]

// and three donations from the second donation

[user_info donation="1", key="event_name"]
[user_info donation="1", key="donation_date"]
[user_info donation="1", key="donate_amount"]


https://www.classy.org/api1/donations?token=xxxxxxxxxxxxxxxxx&cid=xxx&mid=xxx