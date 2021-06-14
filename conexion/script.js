/*var jcontent = {
	"firstName": "john",
	"lastName": "smith"
}
var output = document.getElementById('output');
output.innerHTML = jcontent.firstName +' '+ jcontent.lastName;*/
"use sctrict";
var myInit = {
	method: 'GET',
	headers: {
		'Content-Type': 'application/json'
	},
	mode: 'cors',
	cache: 'default'
};

let myRequest = new Request("./extraccion_datos.json", myInit);

fetch(myRequest)
	.then(function (resp) {
		return resp.json();
	})
	.then(function (data) {
		for (var i = 0; i < data.length; i++) {
			console.log(data[i].message);
		}
	});

(function () {
	var old = console.log;
	var logger = document.getElementById('log');
	console.log = function () {
		for (var i = 0; i < arguments.length; i++) {
			if (typeof arguments[i] == 'object') {
				logger.innerHTML += (JSON && JSON.stringify ? JSON.stringify(arguments[i], undefined, 2) : arguments[i]) + '<br />';
			} else {
				logger.innerHTML += arguments[i] + ',' + ' ';
			}
		}
	}
})();