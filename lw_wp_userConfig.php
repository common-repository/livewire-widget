<div class="wrap">
  <div id="icon-options-general" class="icon32"> <br>
  </div>
  
  <h2>Livewire Messenger</h2>

  <br />


  <div id="panel-overview" class="postbox">
    <h2>Overview</h2>
    
    <div class="panel-body">
      <div class="mm-panel-overview">
        <p>
          <strong>Livewire Messenger</strong> is a chat widget which allows your website visitors to chat with you through live video, voice and text. You can receive the calls and messages from the Livewire Messenger android app downloadable from the <a href="https://play.google.com/store/apps/details?id=com.everycrave.livewire_messenger" target="_blank">play store</a>               
        </p>
          
        <h4>To set up the widget, Please follow the below steps</h4>

        <ul class="steps_list">
          <li> Download the Livewire Messenger App* from the <a id="mm-panel-primary-link" href="https://play.google.com/store/apps/details?id=com.everycrave.livewire_messenger" target="_blank">play store</a></li>
          <li>Sign into the Livewire Messenger app and set your Live URL</li>
          <li>Update the settings in the next section.</li>
        </ul>



        <p>
          * The Livewire Messenger app has a 7 day trial, after which you will need to upgrade to one of the <a href="https://livewire.live/pricing" target="_blank">paid plans</a>.
        </p>
      </div>
    </div>
  </div>



  <br />
  <br />

  <h2>Livewire Messenger Setting</h2>


  <?php if(isset($_POST['update_settings'])):?>
  <div id="message" class="updated below-h2">
    <p>Widget configured and ready for use</p>
  </div>
  <?php endif;?>

  <div class="metabox-holder" id="settings-section">
    <div class="postbox">
      <form action="<?php echo esc_url( 'tools.php?page=livewire-widget%2Flivewire-wpwidget.php' ); ?>" method="post">
        <table class="form-table">
          <?php wp_nonce_field('lw_wp_update_settings', 'lw_wp_update_nonce');?>
          <tr>
            <th scope="row" style="padding-left: 12px !important;">Livewire Number</th>
            <td><input type="tel" name="livewire_number" value="<?php echo esc_attr(get_option('livewire_number'));?>" style="width:350px;" placeholder="International Format without '+' (ex: 15856742000)" /></td>
          </tr>


          <tr>
            <th scope="row" style="padding-left: 12px !important;">Livewire Live Link</th>
            <td><input type="text" name="livewire_livelink" value="<?php echo esc_attr(get_option('livewire_livelink'));?>" style="width:350px;" placeholder="Livelink without url  (ex: jagat)"/></td>
          </tr>

          <tr>
            <th scope="row">&nbsp;</th>
            <td style="padding-top:10px;  padding-bottom:10px;">
              <input type="submit" name="update_settings" value="Update" class="button-primary" />
            </td>
          </tr>
        </table>

      </form>
    </div>
  </div>

</div>


