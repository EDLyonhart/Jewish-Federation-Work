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



/*
 * Back end display
 *  - Form which Accepts inputs (EID's and the like)
 *   - Create Array for storage, store only if 'status_code' return 'SUCCESS'
 *  - Display previously, successful, searches
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
      <input type="text" name="eid" value="" placeholder="Input EID here">
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

        // if 'myEvents' is empty, initialize it
        if (empty($myEvents)) {
          // initialize it
          $myEvents = array();
        } else {
          // otherwise get the previously existing values from options tabel
        }
        

        // when 'newEventSearch' is submitted:
        if ($_POST['newEventSearch']) {
          // add the submitted value into the 'myEvents' array
          // search to see if the event exists
            // if the status returns "SUCCESS"
            // save the updated 'myEvents' into the options tabel



          array_push($myEvents, $_POST["eid"])
          $eid_search = $_POST['update'];
          // if $eid_search->'status-code' === "SUCCESS"
            //update_options($myEvents)
          // else return an error
        }

        get_alloptions('newEventSearch')


        // display all values (events) stored in 'myEvents' array

/*
** Here is the main grind.
** I want to generate shortcode (or some other way to reference an API call function) for each of these events.
** This would be to store values needed. 'goal' and 'current-total' are the main ones which come to mind currently.
**
*/

        foreach ($myEvents as $myEvent){

          ?>
          <tr>    
            <?php
            // display the value
            echo"<td>" . $myEvent . "</td>";
          ?>          
        </tr>
        <?php } ?>
      </tbody>
    </table>
  </div>
  <?php

}


/*
 * Access to information
 *  - API call in a place where the returned info can be accessed from the front end?
 *  - Create Shortcodes or Variables which will be useable by other elements // plugins on the website
 *   - Used to run more API calls
 *   - Get fresh information on each page load
 */
?>