function submitNeonSign() {
    var canvas = document.getElementById('neonSignCanvas');
    var context = canvas.getContext('2d');
    var image = document.getElementById('neonSignImage');
    var text = document.getElementById('neonSignText');

    var price = document.getElementById('neonSignPrice');

    var font = '60px ' + document.querySelector('input[name="signFont"]:checked').value;
    var color = document.querySelector('input[name="SignColor"]:checked').value;

    drawImage(canvas, context, image, text, font, color);

    numberWhitePixels = countPixels(canvas, context);
    price.innerHTML = '$' + parseFloat(numberWhitePixels/10).toFixed(2);
}

function drawImage(neonSignCanvas, canvasContext, imageElement, canvasText, canvasfont, canvasColor) {
    canvasContext.clearRect(0, 0, 1800, 1800);
    
    canvasContext.textBaseline = 'ideographic';
    var textMeasurement = canvasContext.measureText(canvasText.value);
    neonSignCanvas.width = textMeasurement.width+150;
    neonSignCanvas.height = 600;

    canvasContext.fillStyle = 'white';
    canvasContext.font = canvasfont;
    canvasContext.shadowColor = canvasColor;
    canvasContext.shadowBlur = 20;
    canvasContext.textAlign = 'center';

    drawLines(canvasContext, canvasText.value, neonSignCanvas.width/2, 70, 70);
    imageElement.src = canvasContext.canvas.toDataURL();
}

function countPixels(canvas, context) {
	var imageData =  context.getImageData(0, 0, canvas.width, canvas.height);
	var rgba = [];
    var counter = 0;

	for(var index = 0; index < imageData.data.length; index += 4) {
		rgba = [imageData.data[index], 
			    imageData.data[index + 1], 
		    	imageData.data[index + 2],
                (imageData.data[index + 3] / 255)];

        if (rgba[0] == 255 && rgba[1] == 255 && rgba[2] == 255 && rgba[3] == 1) {
            counter++;
        }
	}
    return counter;
} 

function drawLines(context, text, x, y, lineHeight) {
    var lines = text.split('\n');

    for (var i = 0; i < 8 ; i++) {
        context.fillText(lines[i], x, y + (i*lineHeight));
    }
}
