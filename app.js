var canvas = document.getElementById("neonSignCanvas");
var context = canvas.getContext("2d");
var text = document.getElementById("neonSignText");

var image = document.getElementById("neonSignImage");

function submitNeonSign() {

  var price = document.getElementById("neonSignPrice");

  var basePrice = 0;
  var pricePerInch = 0;

  var fontSize = document.querySelector('input[name="fontSizeSlider"]').value;

  var font = fontSize + 'px ' + document.querySelector('input[name="signFont"]:checked').value;
  var color = document.querySelector('input[name="SignColor"]:checked').value;

  drawImage(canvas, context, image, text, font, color);

  var numberWhitePixels = countPixels(canvas, context);
  price.innerHTML = "$" + calculatePrice(numberWhitePixels, basePrice);


  var isDraggable = false
  canvas.onmousedown = function (e) {
    var mouseX = e.pageX - this.offsetLeft;
    var mouseY = e.pageY - this.offsetTop;
    //console.log(mouseX + ' ' + mouseY);
    
    console.log(this.x);
    if (mouseX >= (this.x - image.width / 2) &&
    mouseX <= (this.x + image.width / 2) &&
    mouseY >= (this.y - image.height / 2) &&
    mouseY <= (this.y + image.height / 2)) {
      isDraggable = true;
    }
  }
  canvas.onmousemove = function (e) {
    console.log(e.pageX + '|' + e.pageY);
    while (isDraggable != false) {
      drawImage(this, context, image, text, font, e.pageX - this.offsetLeft, e.pageY - this.offsetTop);
    }
  }
  canvas.onmouseup = function () {
    isDraggable = false;
    console.log(isDraggable);
  }
}

function drawImage(neonSignCanvas, canvasContext, imageElement, canvasText, canvasfont, canvasColor, x, y) {
  x = (typeof x !== 'undefined') ? x : neonSignCanvas.width / 2
  y = (typeof y !== 'undefined') ? y : 70

  canvasContext.clearRect(0, 0, neonSignCanvas.width, neonSignCanvas.height);

  canvasContext.textBaseline = "ideographic";
  var textMeasurement = canvasContext.measureText(canvasText.value);
  neonSignCanvas.width = textMeasurement.width + 150;
  neonSignCanvas.height = 225;

  canvasContext.fillStyle = "white";
  canvasContext.font = canvasfont;
  canvasContext.shadowColor = canvasColor;
  canvasContext.shadowBlur = 20;
  canvasContext.textAlign = "center";

  drawLines(canvasContext, canvasText.value, x, y, 70);
  imageElement.src = canvasContext.canvas.toDataURL();
}


function drawLines(context, text, x, y, lineHeight) {
  var lines = text.split("\n");

  if (lines.length > 3) {
    lines.length = 3;
  }

  for (var i = 0; i < lines.length; i++) {
    context.fillText(lines[i], x, y + i * lineHeight);
  }

}

function calculatePrice(pixelCount, basePrice, pricePerInch) {
  if (pixelCount < basePrice) {
    return parseFloat(basePrice).toFixed(2);
  }
  else {
    return parseFloat(pixelCount).toFixed(2);
  }
}

function countPixels(canvas, context) {
  var imageData = context.getImageData(0, 0, canvas.width, canvas.height);
  var rgba = [];
  var counter = 0;

  for (var index = 0; index < imageData.data.length; index += 4) {
    rgba = [
      imageData.data[index],
      imageData.data[index + 1],
      imageData.data[index + 2],
      imageData.data[index + 3] / 255,
    ];

    if (rgba[0] == 255 && rgba[1] == 255 && rgba[2] == 255 && rgba[3] == 1) {
      counter++;
    }
  }
  return counter;
}
