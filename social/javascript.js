canvas = O('logo')
context = canvas.getContext('2d')
context.font = 'bold italic 97px Geargia'
context.textBaseLine = 'top'
image = new Image()


image.onload = function()
{
	gradient = context.createLinearGradient(0, 0, 0, 89)
	gradient.addColorStop(0.00, '#faa')
	gradient.addColorStop(0.66, '#f00')
	context.fillStyle = gradient
	context.fillText("Ну шо приехали?", 0, 0)
	context.strokeText("Ну шо приехали?", 0, 0)
	context.drawImage(image, 64, 32)
}

function O(obj)
{
	if (typeof obj == 'object') return obj
	else return document.getElementById(obj)
}

function S(obj)
{
	return O(obj).style
}

function C(name)
{
	var elements = document.getElementsByTagName('*')
	var objects = []

	for (var i = 0; i < elements.length; ++i)
	{
		if(elements[i].className == name)
			objects.push(elements[i])
		return objects
	}
}