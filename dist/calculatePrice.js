function calculatePrice(pricePerInch, pixelCount, outdoorUse, includeDimmer, addMounting) {
    var numInches = (pixelCount * 13) / 136 * 1.1;
    var price = numInches * pricePerInch;
    if (outdoorUse == true) {
        price = price + (price * 0.1);
    }
    if (includeDimmer == true) {
        price = price + 29;
    }
    if (addMounting == true) {
        price = price + 10;
    }
    return parseFloat(price).toFixed(2);
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
