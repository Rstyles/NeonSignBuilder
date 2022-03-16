const canvas = <HTMLCanvasElement>document.getElementById("neonSignCanvas");
const context = <CanvasRenderingContext2D>canvas.getContext("2d");
var text = <HTMLInputElement>document.getElementById("neonSignText");

const image =<HTMLImageElement> document.getElementById("neonSignImage");

function submitNeonSign() {
  var price = document.getElementById("neonSignPrice");

  var pricePerInch = 1.27;

  var fontSize = (<HTMLInputElement>document.querySelector('input[name="fontSizeSlider"]'))!.value;

  var font = fontSize + "px " + (<HTMLInputElement>document.querySelector('input[name="signFont"]:checked'))!.value;
  var color = (<HTMLInputElement>document.querySelector('input[name="SignColor"]:checked'))!.value;

  drawImage(canvas, context, image, text, font, color);

  var numberWhitePixels = countPixels(canvas, context);
  price!.innerHTML = "$" + calculatePrice(pricePerInch, numberWhitePixels);
  console.log(numberWhitePixels);
}