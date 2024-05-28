function convertImageToBlackAndWhite(image) {
    if (image.classList.contains("grayscale")) {
      image.classList.remove("grayscale");
    } else {
      image.classList.add("grayscale");
    }
  }
  