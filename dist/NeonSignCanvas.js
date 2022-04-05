var canvas = document.getElementById("neonSignCanvas");
var context = canvas.getContext("2d");
var text = document.getElementById("neonSignText");
var image = document.getElementById("neonSignImage");
var formImg = document.getElementById("postImg");
function submitNeonSign() {
    var price = document.getElementById("priceField");
    var pricePerInch = 1.27;
    var fontSize = document.querySelector('input[name="fontSizeSlider"]').value;
    var font = fontSize + "px " + document.querySelector('input[name="signFont"]:checked').value;
    var color = document.querySelector('input[name="SignColor"]:checked').value;
    drawImage(canvas, context, image, text, font, color);
    var numberWhitePixels = countPixels(canvas, context);
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
