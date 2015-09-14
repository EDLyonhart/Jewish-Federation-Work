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

    $jsonResult = json_decode($result, true);
    // var_dump($jsonResult);

    $totalRaised = $jsonResult['campaigns'][0]['total_raised'];
    $goal = $jsonResult['campaigns'][0]['goal'];
  }
}

$accessToken = 'xxx---xxx';
$cid = '---xxx';
$eid = $_POST["eid"];

$campaign = new CampaignInfo($accessToken, $cid);
$campaign->getEvent($eid);

?>









