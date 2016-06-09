var http = require('http');
var fs = require('fs');
var io = require('socket.io');

// 创建 http 服务
var httpServer = http.createServer(function(req, res) {
	fs.readFile(__dirname + '/move.html', function(err, data) {
		if (err) {
			res.writeHeader(404, {'content-type': 'text/html;charset="utf-8"'});
			res.write('<h1>Not Found!</h1>');
		} else {
			res.writeHeader(200, {'content-type' : 'text/html;charset="utf-8"'});
			res.write(data);
		}
		res.end();
	});
}).listen(8080);
  
var SocketIO = io(httpServer);
SocketIO.on('connection', function (socket) {
	console.log('SocketIO listening at: http://localhost:8080');
	
    socket.on('move', function (pos) {
		console.log(pos);
		// 广播
		//SocketIO.emit('move', pos);
		socket.broadcast.emit('move', pos);
    });
});