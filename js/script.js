//Javascript for changing background color

//Function to change background color
function changeBackgroundColor(color) {
	document.body.style.backgroundColor = color;
}

//Add event listener to change background color (yellow)
var yellow = document.getElementById("yellow");
yellow.addEventListener("click", function () {
	changeBackgroundColor("#FFFFF0")
});

//Add event listener to change background color (white)
var white = document.getElementById("white");
white.addEventListener("click", function () {
	changeBackgroundColor("#FFF")
});

//Add event listener to change background color (green)
var green = document.getElementById("green");
green.addEventListener("click", function () {
	changeBackgroundColor("#E6FFF0")
});
