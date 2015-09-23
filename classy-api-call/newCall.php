<?php

/*
** Classy API calls
**
*/

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

    // exit if no results returned
    if ($jsonResult['status_code'] != 'SUCCESS') {
      return;
    }

  }
}


/*
**
** Campaign One!
**
*/

function instantiate_campaigns( $atts ) {
  
  $campaign1 = new CampaignInfo('xxx---xxx---', '---xxx');
  $campaign1->getEvent(---xxx);

  global $camp_one_name;
  global $camp_one_total;
  global $camp_one_progress;
  
  global $camp_two_name;
  global $camp_two_total;
  global $camp_two_progress;
  
  global $camp_three_name;
  global $camp_three_total;
  global $camp_three_progress;

  global $jsonResult;

  /*
  ** First Campaign
  **
  **  To set up, go to: www.classy.org/api1/campaigns?token= xxx---xxx--- &cid= ---xxx
  **  Select which campaign you want to display and put its index into "$campaign_one_parse = $jsonResult['campaigns'][ < HERE > ];"
  **
  */
  
  $campaign_one_parse = $jsonResult['campaigns'][0];
  extract(shortcode_atts(array(
    'key' => 'name'
    ), $atts));
  
  $camp_one_name = $campaign_one_parse["name"];
  $camp_one_total = $campaign_one_parse["total_raised"];
  if ( $campaign_one_parse["goal"] < 1 ) {
    $camp_one_progress = 100;
  } else {
    $camp_one_progress = ($campaign_one_parse["total_raised"]/$campaign_one_parse["goal"])*100;
  }
  $camp_one = '[rockthemes_skill skill_title="' . $camp_one_name . ' - $ ' . $camp_one_total . '" skill_color="#787878" skill_bg_color="#219cab" skill_current_value="' . $camp_one_progress . '%"]undefined[/rockthemes_skill]';
  print $camp_one;

  /*
  ** Second Campaign
  **
  **  To set up, go to: www.classy.org/api1/campaigns?token= xxx---xxx--- &cid= ---xxx
  **  Select which campaign you want to display and put its index into "$campaign_one_parse = $jsonResult['campaigns'][ < HERE > ];"
  **


  $campaign_two_parse = $jsonResult['campaigns'][1];
  extract(shortcode_atts(array(
    'key' => 'name'
    ), $atts));
  
  $camp_two_name = $campaign_two_parse["name"];
  $camp_two_total = $campaign_two_parse["total_raised"];
  if ( $campaign_two_parse["goal"] < 1 ) {
    $camp_two_progress = 100;
  } else {
    $camp_two_progress = ($campaign_two_parse["total_raised"]/$campaign_two_parse["goal"])*100;
  }
  $camp_two = '[rockthemes_skill skill_title="' . $camp_two_name . ' - $ ' . $camp_two_total . '" skill_color="#787878" skill_bg_color="#219cab" skill_current_value="' . $camp_two_progress . '%"]undefined[/rockthemes_skill]';
  print $camp_two;

  /*
  ** Third Campaign
  **
  **  To set up, go to: www.classy.org/api1/campaigns?token= xxx---xxx--- &cid= ---xxx
  **  Select which campaign you want to display and put its index into "$campaign_one_parse = $jsonResult['campaigns'][ < HERE > ];"
  **


  $campaign_three_parse = $jsonResult['campaigns'][2];
  extract(shortcode_atts(array(
    'key' => 'name'
    ), $atts));
  
  $camp_three_name = $campaign_three_parse["name"];
  $camp_three_total = $campaign_three_parse["total_raised"];
  if ( $campaign_three_parse["goal"] < 1 ) {
    $camp_three_progress = 100;
  } else {
    $camp_three_progress = ($campaign_three_parse["total_raised"]/$campaign_three_parse["goal"])*100;
  }
  $camp_three = '[rockthemes_skill skill_title="' . $camp_three_name . ' - $ ' . $camp_three_total . '" skill_color="#787878" skill_bg_color="#219cab" skill_current_value="' . $camp_three_progress . '%"]undefined[/rockthemes_skill]';
  print $camp_three;
*/
  
}

?>






