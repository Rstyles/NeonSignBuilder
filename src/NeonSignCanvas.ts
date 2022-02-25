const canvas = <HTMLCanvasElement>document.getElementById("neonSignCanvas");
const context = <CanvasRenderingContext2D>canvas.getContext("2d");
var text = <HTMLInputElement>document.getElementById("neonSignText");

const image = document.getElementById("neonSignImage");

function submitNeonSign() {
  var price = document.getElementById("neonSignPrice");

  //var basePrice = 0;
  var pricePerInch = 1.27;

  var fontSize = (<HTMLInputElement>document.querySelector('input[name="fontSizeSlider"]'))!.value;

  var font =
    fontSize +
    "px " +
    (<HTMLInputElement>document.querySelector('input[name="signFont"]:checked'))!.value;
  var color = (<HTMLInputElement>document.querySelector('input[name="SignColor"]:checked'))!.value;

  drawImage(canvas, context, image, text, font, color);

  var numberWhitePixels = countPixels(canvas, context);
  price!.innerHTML = "$" + calculatePrice(pricePerInch, numberWhitePixels);
  console.log(numberWhitePixels);
}

function drawImage(
  neonSignCanvas: HTMLCanvasElement,
  canvasContext: CanvasRenderingContext2D | null,
  imageElement: HTMLElement | null,
  canvasText: HTMLInputElement | null,
  canvasfont: string,
  canvasColor: string,
  x: number = neonSignCanvas.width / 2,
  y: number = 70
) {
  canvasContext!.clearRect(0, 0, neonSignCanvas.width, neonSignCanvas.height);

  canvasContext!.textBaseline = "ideographic";
  var textMeasurement = canvasContext!.measureText(canvasText!.value);
  neonSignCanvas.width = textMeasurement.width + 150;
  neonSignCanvas.height = 225;

  canvasContext!.fillStyle = "white";
  canvasContext!.font = canvasfont;
  canvasContext!.shadowColor = canvasColor;
  canvasContext!.shadowBlur = 20;
  canvasContext!.textAlign = "center";

  drawLines(canvasContext, canvasText.value, x, y, 70);
  imageElement.src = canvasContext.canvas.toDataURL();
}

function drawLines(
  context: { fillText: (arg0: any, arg1: any, arg2: any) => void },
  text: string,
  x: any,
  y: number,
  lineHeight: number
) {
  var lines = text.split("\n");

  if (lines.length > 3) {
    lines.length = 3;
  }

  for (var i = 0; i < lines.length; i++) {
    context.fillText(lines[i], x, y + i * lineHeight);
  }
}

function countPixels(
  canvas: HTMLCanvasElement,
  context: CanvasRenderingContext2D | null
) {
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

function calculatePrice(pricePerInch: number, pixelCount: number) {
  var numInches = (pixelCount * 13) / 136;
  return parseFloat(numInches * pricePerInch).toFixed(2);
}
