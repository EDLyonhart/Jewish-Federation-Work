<?php

class CampaignInfo
{

  //  Mask values
  private $accessToken;
  private $cid;

  public function __construct($accessToken, $cid) {
    $this->accessToken = $accessToken;
    $this->cid = $cid;
  }

  public function getEvent($eid) {
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, "www.classy.org/api1/campaigns?token=" . $this->accessToken . "&cid=" . $this->cid . "&eid=" . $eid);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

    $result = curl_exec ($ch);
    echo curl_error($ch);
    curl_close ($ch);
    
    // make 'jsonResult' available to other functions
    add_filter( 'json_retrieve', 'json_send' )
    function json_send ($arg = '') {
      $jsonResult = json_decode($result, true);
    }

    // exit if no results returned
    if ($jsonResult['status_code'] != 'SUCCESS' {
      return;
    }

  }
}

function campaign_one_return( $atts ) {

  // TO DO
  // rename away from individual campaigns.
  
  $campaign1 = new CampaignInfo('xxx---xxx---', 'xxx---');
  $campaign1->getEvent(---xxx);

  $jsonResult = apply_filters( 'json_send', '' );

  $campaign_one_parse = $jsonResult['campaigns'][0];
  extract(shortcode_atts(array(
    'key' => 'name'
    ), $atts));

  return $campaign_one_parse[$key];
}

add_shortcode('campaign_one', 'campaign_one_return' );


/*

Here is what the shotcodes will look like this:

[campaign_one key="name"]
[campaign_one key="total_raised]
[campaign_one key="goal"]

*/

?>






