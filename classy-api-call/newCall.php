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

  global $camp_one_name;
  global $camp_one_total;
  global $camp_one_progress;
  
  $campaign1 = new CampaignInfo('xxx---xxx---', '---xxx');
  $campaign1->getEvent(xxx---);

  global $jsonResult;
  $campaign_one_parse = $jsonResult['campaigns'][0];
  extract(shortcode_atts(array(
    'key' => 'name'
    ), $atts));

  $campaign_one_parse = $jsonResult["campaigns"][0];
  
  $camp_one_name = $campaign_one_parse["name"];
  $camp_one_total = $campaign_one_parse["total_raised"];
  if ( $campaign_one_parse["goal"] < 1 ) {
    $camp_one_progress = 100;
  } else {
    $camp_one_progress = ($campaign_one_parse["total_raised"]/$campaign_one_parse["goal"])*100;
  }
  $camp_one = '[rockthemes_skill skill_title="' . $camp_one_name . ' - $ ' . $camp_one_total . '" skill_color="#787878" skill_bg_color="#219cab" skill_current_value="' . $camp_one_progress . '%"]undefined[/rockthemes_skill]';
  print $camp_one;
}

/*

Here is what the shotcodes will look like this:

[campaign_one key="name"]
[campaign_one key="total_raised"]
[campaign_one key="goal"]

*/

?>






