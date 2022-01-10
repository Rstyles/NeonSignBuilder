var canvasContext = document.getElementById('neonSignCanvas').getContext('2d');
var imageElement = document.getElementById('neonSignImage');
var canvasText = document.getElementById('neonSignText');

// document.getElementById('neonSignText').addEventListener('keyup', function(){
//     canvasContext.canvas.width = canvasContext.measureText(this.value).width;
//     canvasContext.font = '45px sans-serif';
//     canvasContext.fillStyle = document.getElementById('neonSignColor').value;;
//     canvasContext.fillText(this.value, 0, 40);
//     imageElement.src = canvasContext.canvas.toDataURL();
//     console.log(imageElement.src);
//     checkIfEmpty();
// }, false);

function drawImage() {
    canvasContext.clearRect(0, 0, 300, 300);
    canvasContext.width = canvasContext.measureText(canvasText.value).width;
    canvasContext.font = '60px sans-serif';
    canvasContext.fillStyle = document.getElementById('neonSignColor').value;
    canvasContext.fillText(canvasText.value, 0, 50);
    imageElement.src = canvasContext.canvas.toDataURL();
    console.log(imageElement.src);
    checkIfEmpty();
}

function checkIfEmpty() {
    if (imageElement.src == ',' || imageElement.src == null) {
        imageElement.style.display = 'none';
    }
}