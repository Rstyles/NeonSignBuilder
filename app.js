var canvasContext = document.getElementById('neonSignCanvas').getContext('2d');
var imageElement = document.getElementById('neonSignImage');
var canvasText = document.getElementById('neonSignText');

function drawImage() {
    canvasContext.clearRect(0, 0, 500, 500);
    canvasContext.font = '60px sans-serif';
    canvasContext.textAlign = 'center';
    canvasContext.fillStyle = document.getElementById('neonSignColor').value;
    canvasContext.fillText(canvasText.value, 300, 50);
    imageElement.src = canvasContext.canvas.toDataURL();
    console.log(imageElement.src);
    //checkIfEmpty();
}

function checkIfEmpty() {
    if (imageElement.src == ',' || imageElement.src == null) {
        imageElement.style.display = 'none';
    }
}