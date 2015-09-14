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

function jsonReturn( $atts ) {
  $campaign1 = new CampaignInfo('xxx---xxx---', '---xxx');
  $campaign1->getEvent(xxx---);

  global $jsonResult;

  $a = shortcode_atts( array(
      'totalRaised' => $jsonResult['campaigns'][0]['total_raised'],
      'goal' => $jsonResult['campaigns'][0]['total_raised'],
  ), $atts );

  return "total raised = {$a['totalRaised']}, goal = {$a['goal']}";
}

add_shortcode('campaign_one', 'jsonReturn' );

?>