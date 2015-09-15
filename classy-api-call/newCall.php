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

    global $jsonResult;
    $jsonResult = json_decode($result, true);

  }
}

function campaign_one_return( $atts ) {
  $campaign1 = new CampaignInfo('xxx---xxx---', 'xxx---');
  $campaign1->getEvent(---xxx);

  global $jsonResult;
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






