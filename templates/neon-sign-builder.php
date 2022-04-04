<?php

  $url = plugin_dir_url(dirname(__FILE__));

  wp_enqueue_style('canvasStyle', $url . 'dist/style.css', __FILE__ );
?>
<div class="canvas_wrapper">
    <div class="canvas_left">
        <canvas id="neonSignCanvas"></canvas>
        <span class="neonSignHelper"></span>
        <img id="neonSignImage" />
    </div>

    <div class="canvas_right">
        <form action="<?php echo $url . 'inc/NeonSign.php'; ?>" method="post" name="neonBuilder"
            class="neonSignEditorForm" onchange="submitNeonSign()">
            <label for="neonSignText">Text:</label>
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
                    <input type="radio" name="signFont" id="fontComicSans" value="Comic Sans MS, Comic Sans, cursive"
                        checked="true" />
                    <label for="fontComicSans" style="font-family: Comic Sans MS, Comic Sans, cursive">Comic
                        Sans</label>

                    <input type="radio" name="signFont" id="fontTrattatello" value="Trattatello, fantasy" />
                    <label for="fontTrattatello" style="font-family: Trattatello, fantasy">Trattatello</label>

                    <input type="radio" name="signFont" id="fontAndaleMono" value="Andale Mono, monospace" />
                    <label for="fontAndaleMono" style="font-family: Andale Mono, monospace">Andale Mono</label>

                    <input type="radio" name="signFont" id="fontHelvetica" value="Helvetica, sans-serif" />
                    <label for="fontHelvetica" style="font-family: Helvetica, sans-serif">Helvetica</label>
                </div>
            </div>

            <div id="fontSizeSliderWrapper" class="fontGroup">
                <h3 class="neonSignHeading">Size:</h3>
                <input type="range" name="fontSizeSlider" id="fontSizeSlider" class="fontSizeSlider" min="50" max="75"
                    onmousemove="submitNeonSign()">
            </div>

            <div class="usage-support flex-container">
                <div class="neon-sign-support">
                    <h3 class="neonSignHeading">Support:</h3>
                    <div class="supportOptions change-radio-button">
                        <input type="radio" name="neonSignSupportType" id="cutToShape" value="Cut to Shape"
                            checked="true">
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

            $<input type="text" name="priceField" id="priceField" readonly="true">
            <button id="neonSignSubmit">Submit</button>
            <input type="hidden" id="postImg" name="neonsignPostImg">
        </form>
    </div>

    <div class="neonSignPriceWrapper">
        <p id="neonSignPrice"></p>
    </div>
</div>
<script src="<?php echo $url . 'dist/NeonSignCanvas.js' ?>"></script>
<script src="<?php echo $url . 'dist/calculatePrice.js' ?>"></script>
<script src="<?php echo $url . 'dist/drawImage.js' ?>"></script>
<script src="<?php echo $url . 'dist/dragItem.js' ?>"></script>