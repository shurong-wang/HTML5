var http = require('http'), fs = require('fs'), io = require('socket.io');
  
var server = http.createServer(function(req, res) {
    res.writeHead(200, { 'Content-type': 'text/html'});
    res.end(fs.readFileSync(__dirname + '/chat.html'));
}).listen(8080);

// 写法一 
var socket1 = io.listen(server);
socket1.on('connection', function (socket) {
	console.log('Socket1 listening at: http://localhost:8080');
	
    socket.on('message', function (msg) {
        console.log('Message Received: ', msg);

		// 发送广播广播消息--自己不会收到
        socket.broadcast.emit('message', msg);
    });
});

/*
// 写法二
var socket2 = io(server);
socket2.on('connection', function (socket) {
	console.log('Socket2 listening at: http://localhost:8080');
	
    socket.on('message', function (msg) {
        console.log('Message Received: ', msg);

		// 发送广播广播消息--自己也会收到
        socket2.emit('message', msg);
    });
});
*/
