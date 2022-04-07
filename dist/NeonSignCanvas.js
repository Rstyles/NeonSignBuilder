var canvas = document.getElementById("neonSignCanvas");
var context = canvas.getContext("2d");
var text = document.getElementById("neonSignText");
var image = document.getElementById("neonSignImage");
var formImg = document.getElementById("postImg");
var signHeight = document.getElementById("signHeight");
function submitNeonSign() {
    var price = document.getElementById("priceField");
    var pricePerInch = 1.27;
    var fontSize = document.querySelector('input[name="fontSizeSlider"]').value;
    var height = fontSize * 0.26;
    signHeight.value = parseFloat(height).toFixed(2) + " inches";
    var font = fontSize + "px " + document.querySelector('input[name="signFont"]:checked').value;
    var color = document.querySelector('input[name="SignColor"]:checked').value;
    drawImage(canvas, context, image, text, font, color);
    var numberWhitePixels = countPixels(canvas, context);
    console.log(numberWhitePixels);
    var outdoorUse = () => {
        if (document.querySelector('input[name="neonSignUsageType"]:checked').value == "Outdoor Use") {
            return true;
        } else { 
            return false;
        }
    };
    var includeDimmer = () => {
        if (document.querySelector('input[name="neonSignDimmer"]:checked').value == "Yes") {
            return true;
        } else {
            return false;
        }
    };
    var addMounting = () => {
        if (document.querySelector('input[name="neonSignMounting"]:checked').value == "Yes") {
            return true;
        } else {
            return false;
        }
    };
    price.value = calculatePrice(pricePerInch, numberWhitePixels, outdoorUse(), includeDimmer(), addMounting());
    formImg.value = canvas.toDataURL();
}
