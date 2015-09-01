<?php
/*
 * Plugin Name: Classy API Call
 * Plugin URI: https://github.com/EDLyonhart/Jewish-Federation-Work/tree/master/classy-api-call
 * Description: A plugin to make calls to Classy's API
 * Author: Eli Lyonhart
 * Version: 1.0
 * Author URI: http://www.EliLyonhart.com
 * License: None
 */

add_action('admin_menu', 'classy_api_call_admin_actions');
function classy_api_call_admin_actions() {
  add_options_page('Classy API Call', 'Classy API Call', 'manage_options', __FILE__, 'classy_api_call_admin');
}

function classy_api_call_admin() {
?>
  <div class="wrap">
    <h2>API Calls</h2>
    <h3>Listed below are the current calls to the Classy API</h3>
    <p>Fill in the form and click the button below to add an API query</p>
    <br>
    <form action="" method="POST">
      <input type="text" name="eventID" value="" placeholder="Input EID here">
      <input type="submit" name="newEventSearch" value="search" class="button-primary">
    </form>
    <br>

    <table class="widefat">
      <thead>
        <tr>
          <th>Event ID</th>
        </tr>
      </thead>

      <tfoot>
        <tr>
          <th>Event ID</th>
        </tr>
      </tfoot>

      <tbody>
<?php

$myEvents = array();

if(isset($_POST('newEventSearch')){
  // check the API for this event
  // if status_code === 'SUCCESS'
    // add it to the $myEvents array as 'eventID'
    // add status code to the array
  // else display an error message
  // update_options('newEventSearch', $myEvents); // store events in the 'options' table
}
else if (get_option('newEventSearch')){
  $myEvents = get_option('myEvents')
}

  // loop through each element of the $myEvents array
  // list all events which have successfully been queried in the past
foreach ($myEvents as $myEvent)
{
?>
        <tr>    
<?php
  
  echo"<td>" . $myEvent->status_code . "</td>";
}
?>          

        </tr>
      </tbody>
    </table>
  </div>
<?php

}

?>