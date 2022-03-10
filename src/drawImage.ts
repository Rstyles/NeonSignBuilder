function drawImage(
  neonSignCanvas: HTMLCanvasElement,
  canvasContext: CanvasRenderingContext2D,
  imageElement: HTMLImageElement,
  canvasText: HTMLInputElement,
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

  drawLines(canvasContext, canvasText!.value, x, y, 70);
  imageElement!.src = canvasContext.canvas.toDataURL();
}

function drawLines(
	context: CanvasRenderingContext2D,
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