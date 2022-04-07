<?php
  $url = plugin_dir_url(dirname(__FILE__));

  wp_enqueue_style('canvasStyle', $url . 'dist/style.css', __FILE__ );
?>
<div class="custom-neon-builder-wrapper">
  <div class="canvas_wrapper">
    <div class="canvas_left">
      <canvas id="neonSignCanvas"></canvas>
      <span class="neonSignHelper"></span>
      <img id="neonSignImage" />
    </div>

    <div class="canvas_right">
      <form action="<?php echo $url . 'inc/NeonSign.php'; ?>" method="post" name="neonBuilder"
        class="neonSignEditorForm" onchange="submitNeonSign()">
        <h3><label for="neonSignText">Text:</label></h3>
        <textarea name="neonSignText" id="neonSignText" onkeyup="submitNeonSign()"></textarea>

        <div class="color-font flex-container">
          <div class="colorPickerRadioGroup">
            <h3 class="neonSignHeading">Color:</h3>
            <input type="radio" name="SignColor" id="ColorRed" value="red" checked="true" />
            <input type="radio" name="SignColor" id="ColorGreen" value="green" />
            <input type="radio" name="SignColor" id="ColorBlue" value="blue" />
            <input type="radio" name="SignColor" id="ColorOrange" value="orange" />
            <input type="radio" name="SignColor" id="ColorPink" value="pink" />
            <input type="radio" name="SignColor" id="ColorWhite" value="#eee" />
            <input type="radio" name="SignColor" id="ColorYellow" value="yellow" />
            <input type="radio" name="SignColor" id="ColorIceBlue" value="#24B7DE" />
          </div>
          <div id="fontPickerRadioGroup" class="fontGroup">
            <h3 class="neonSignHeading">Font:</h3>
            <!-- font Comic Sans MS, Comic Sans, cursive -->
            <input type="radio" name="signFont" id="fontComicSans" value="Comic Sans MS, Comic Sans, cursive"
              checked="true" />
            <label for="fontComicSans" style="font-family: Comic Sans MS, Comic Sans, cursive">Comic
              Sans</label>

            <!-- font Trattatello, fantasy -->
            <input type="radio" name="signFont" id="fontTrattatello" value="Trattatello, fantasy" />
            <label for="fontTrattatello" style="font-family: Trattatello, fantasy">Trattatello</label>

            <!-- font Andale Mono, monospace -->
            <input type="radio" name="signFont" id="fontAndaleMono" value="Andale Mono, monospace" />
            <label for="fontAndaleMono" style="font-family: Andale Mono, monospace">Andale Mono</label>

            <!-- font Helvetica, sans-serif -->
            <input type="radio" name="signFont" id="fontHelvetica" value="Helvetica, sans-serif" />
            <label for="fontHelvetica" style="font-family: Helvetica, sans-serif">Helvetica</label>

            <!-- font 'Assalwa', Sans-serif -->
            <input type="radio" name="signFont" id="fontAssalwa" value="'Assalwa', Sans-serif" />
            <label for="fontAssalwa" style="font-family: 'Assalwa', Sans-serif">Assalwa</label>
            
            <!-- font 'ATypewriterForMe', Sans-serif-serif -->
            <input type="radio" name="signFont" id="fontATypewriterForMe" value="'ATypewriterForMe', Sans-serif-serif" />
            <label for="ATypewriterForMe" style="font-family: 'ATypewriterForMe', Sans-serif-serif">ATypewriterForMe</label>

            <!-- font 'Avgardn', Sans-serif -->
            <input type="radio" name="signFont" id="fontAvgardin" value="'Avgardn', Sans-serif" />
            <label for="fontAvgardin" style="font-family: 'Avgardn', Sans-serif">Avgardn</label>

            <!-- font "Barcelony", Sans-serif -->
            <input type="radio" name="signFont" id="fontBarcelony" value="'Barcelony', Sans-serif" />
            <label for="fontBarcelony" style="font-family: 'Barcelony', Sans-serif">Barcelony</label>

            <!-- font "Bauhaus", Sans-serif -->
            <input type="radio" name="signFont" id="fontBauhaus" value="'Bauhaus', Sans-serif" />
            <label for="fontBauhaus" style="font-family: 'Bauhaus', Sans-serif">Bauhaus</label>

            <!-- font "Carbono", Sans-serif -->
            <input type="radio" name="signFont" id="fontCarbono" value="'Carbono', Sans-serif" />
            <label for="fontCarbono" style="font-family: 'Carbono', Sans-serif">Carbono</label>

            <!-- font "Hamilton", Sans-serif -->
            <input type="radio" name="signFont" id="fontHamilton" value="'Hamilton', Sans-serif" />
            <label for="fontHamilton" style="font-family: 'Hamilton', Sans-serif">Hamilton</label>

            <!-- font "Hesterica", Sans-serif -->
            <input type="radio" name="signFont" id="fontHesterica" value="'Hesterica', Sans-serif" />
            <label for="fontHesterica" style="font-family: 'Hesterica', Sans-serif">Hesterica</label>

            <!-- font "Kiona", Sans-serif -->
            <input type="radio" name="signFont" id="fontKiona" value="'Kiona', Sans-serif" />
            <label for="fontKiona" style="font-family: 'Kiona', Sans-serif">Kiona</label>

            <!-- font "Lovelo Line", Sans-serif -->
            <input type="radio" name="signFont" id="fontLoveloLine" value="'Lovelo Line', Sans-serif" />
            <label for="fontLoveloLine" style="font-family: 'Lovelo Line', Sans-serif">Lovelo Line</label>

            <!-- font "Market Street", Sans-serif -->
            <input type="radio" name="signFont" id="fontMarketStreet" value="'Market Street', Sans-serif" />
            <label for="fontMarketStreet" style="font-family: 'Market Street', Sans-serif">Market Street</label>

            <!-- font "Neon Glow", Sans-serif -->
            <input type="radio" name="signFont" id="fontNeonGlow" value="'Neon Glow', Sans-serif" />
            <label for="fontNeonGlow" style="font-family: 'Neon Glow', Sans-serif">Neon Glow</label>

            <!-- font "Neon Tubes", Sans-serif -->
            <input type="radio" name="signFont" id="fontNeonTubes" value="'Neon Tubes', Sans-serif" />
            <label for="fontNeonTubes" style="font-family: 'Neon Tubes', Sans-serif">Neon Tubes</label>

            <!-- font "Northwell Alt", Sans-serif -->
            <input type="radio" name="signFont" id="fontNorthwellAlt" value="'Northwell Alt', Sans-serif" />
            <label for="fontNorthwellAlt" style="font-family: 'Northwell Alt', Sans-serif">Northwell Alt</label>

            <!-- font "Paperdaisy", Sans-serif -->
            <input type="radio" name="signFont" id="fontPaperdaisy" value="'Paperdaisy', Sans-serif" />
            <label for="fontPaperdaisy" style="font-family: 'Paperdaisy', Sans-serif">Paperdaisy</label>

            <!-- font "Quinzey", Sans-serif -->
            <input type="radio" name="signFont" id="fontQuinzey" value="'Quinzey', Sans-serif" />
            <label for="fontQuinzey" style="font-family: 'Quinzey', Sans-serif">Quinzey</label>

            <!-- font "Sebastian", Sans-serif -->
            <input type="radio" name="signFont" id="fontSebastian" value="'Sebastian', Sans-serif" />
            <label for="fontSebastian" style="font-family: 'Sebastian', Sans-serif">Sebastian</label>

            <!-- font "The Bouquet List", Sans-serif -->
            <input type="radio" name="signFont" id="fontTheBouquetList" value="'The Bouquet List', Sans-serif" />
            <label for="fontTheBouquetList" style="font-family: 'The Bouquet List', Sans-serif">The Bouquet List</label>
          </div>
        </div>

        <div id="fontSizeSliderWrapper" class="fontGroup">
          <h3 class="neonSignHeading">Size:</h3>
          <input type="range" name="fontSizeSlider" id="fontSizeSlider" class="fontSizeSlider" min="50" max="100"
            onmousemove="submitNeonSign()" />
          <input type="text" class="text" class="signHeight" id="signHeight" readonly />
        </div>

        <div class="usage-support flex-container">
          <div class="neon-sign-support">
            <h3 class="neonSignHeading">Support:</h3>
            <div class="supportOptions change-radio-button">
              <input type="radio" name="neonSignSupportType" id="cutToShape" value="Cut to Shape" checked="true">
              <label for="cutToShape">Cut to Shape -
                <span class="flavor-text">Acrylic display that follows the shape of your sign.</span>
              </label>
            </div>

            <div class="supportOptions change-radio-button">
              <input type="radio" name="neonSignSupportType" id="hollowOut" value="Hollow Out">
              <label for="hollowOut">Hollow Out -
                <span class="flavor-text">The most descreet transparent backing.</span>
              </label>
            </div>

            <div class="supportOptions change-radio-button">
              <input type="radio" name="neonSignSupportType" id="fullBoard" value="Full Board">
              <label for="fullBoard">Full Board -
                <span class="flavor-text">Acrylic display in shape of a square around your sign.</span>
              </label>
            </div>

            <div class="supportOptions change-radio-button">
              <input type="radio" name="neonSignSupportType" id="stand" value="Stand">
              <label for="stand">Stand -
                <span class="flavor-text">Make your sign upright on the floor.</span>
              </label>
            </div>
          </div>
          <div class="sign-usage">
            <h3 class="neonSignHeading">Sign Usage:</h3>
            <div class="usageOptions change-radio-button">
              <input type="radio" name="neonSignUsageType" id="indoor-use" value="Indoor Use" checked=true>
              <label for="indoor-use">Indoor Use</label>
            </div>
            <div class="usageOptions change-radio-button">
              <input type="radio" name="neonSignUsageType" id="outdoor-use" value="Outdoor Use">
              <label for="outdoor-use">Outdoor Use (Waterproof Price +10%)</label>
            </div>
          </div>
        </div>
        <hr>
        <div class="dimmer-type flex-container">
          <div class="dimmer">
            <h3 class="neonSignHeading">Dimmer with Remote?</h3>
            <p>Add a remote with your included dimmer?</p>
            <div class="dimmerOptions change-radio-button">
              <input type="radio" name="neonSignDimmer" id="dimmerYes" value="Yes" checked="true">
              <label for="dimmerYes">Yes (+$29)</label>
            </div>
            <div class="dimmerOptions change-radio-button">
              <input type="radio" name="neonSignDimmer" id="dimmerNo" value="No">
              <label for="dimmerNo">No</label>
            </div>
          </div>
          <div class="type-of-neon">
            <h3 class="neonSignHeading">Type of Neon:</h3>
            <div class="neonOptions change-radio-button">
              <input type="radio" name="neonSignType" id="white-jacket" value="White Jacket" checked="true">
              <label for="white-jacket">White Jacket</label>
            </div>
            <div class="neonOptions change-radio-button">
              <input type="radio" name="neonSignType" id="colored-jacket" value="Colored Jacket">
              <label for="colored-jacket">Colored Jacket</label>
            </div>
          </div>
        </div>
        <div class="mounting">
          <h3 class="neonSignHeading">Mounting (3M):</h3>
          <p>Add some 3M Command Stripes to your free screw kit (optional)</p>
          <p>No tools necessary, <b>indoor use</b></p>
          <div class="mountingOptions change-radio-button">
            <input type="radio" name="neonSignMounting" id="mountingYes" value="Yes" checked="true">
            <label for="mountingYes">Yes (+$10)</label>
          </div>
          <div class="mountingOptions change-radio-button">
            <input type="radio" name="neonSignMounting" id="mountingNo" value="No">
            <label for="mountingNo">No</label>
          </div>
        </div>

        $<input type="text" name="priceField" id="priceField" readonly="true">
        <button id="neonSignSubmit">Submit</button>
        <input type="hidden" id="postImg" name="neonsignPostImg">
      </form>
    </div>
  </div>
</div>
<script src="<?php echo $url . 'dist/NeonSignCanvas.js' ?>"></script>
<script src="<?php echo $url . 'dist/calculatePrice.js' ?>"></script>
<script src="<?php echo $url . 'dist/drawImage.js' ?>"></script>
<script src="<?php echo $url . 'dist/dragItem.js' ?>"></script>