<?php


class GetMID
{
  //  Mask values
  private $accessToken;
  private $cid;

  public function __construct($accessToken, $cid) {
    $this->accessToken = $accessToken;
    $this->cid = $cid;
  }

  public function getMember($email) {
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, "www.classy.org/api1/donations?token=" . $this->accessToken . "&cid=" . $this->cid . "&email=" . $email);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

    $result = curl_exec ($ch);
    echo curl_error($ch);
    curl_close ($ch);
    $jsonResult = json_decode($result, true);

    if ($jsonResults['status_code'] != 'SUCCESS' {

      return;

    } elseif ($jsonResults['status_code'] == 'SUCCESS') {

      // add $mid to user_meta
      $mid = $jsonResults['donations'][0]['member_id']
      add_user_meta( $user_id, $classy_mid, $mid );
    
    }

    } else {
      return 'When donating to any of our fundraisers through Classy.org, please donate using the email address ' . $current_user->user_emial . ' so that we can properly show you your donation history';
    }
  }



function get_user_classy_mid() {

  $current_user = wp_get_current_user();
  $user_id = wp_get_current_user_id();

  if ( !user_meta($current_user->classy_mid) ) {

    $accessToken = 'xxx---xxx';
    $cid = '---xxx';
    $email = $current_user->user_emial;

    $newMid = new GetMID($accessToken, $cid)
    $newMid = getMember($email)

    }




  } else {

    // query API using $mid in /donations

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
        curl_setopt($ch, CURLOPT_URL, "www.classy.org/api1/donations?token=" . $this->accessToken . "&cid=" . $this->cid . "&mid=" . $mid);
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

    // does this need to be short coded?
    // is there a better way to output the values given that we are still within the function?

    add_shortcode('user_info', 'user_info_return' );



// echo all of this? how to out-put this loop into text on the page.

    $i = 0;
    while ( ?>[user_info donation="<?php $i ?>"] <?php != "") {
      echo " On " ?>[user_info donation="<?php $i ?>", key="donation_date"] <?php " you gave " ?>[user_info donation="<?php $i ?>", key="donate_amount"] <?php " to " ?>[user_info donation="<?php $i ?>", key="event_name"]<?php ;
      $i++;
    } 
  }
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