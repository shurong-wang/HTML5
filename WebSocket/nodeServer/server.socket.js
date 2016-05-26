var http = require('http');
var fs = require('fs');	// 导入文件系统模块
var io = require('socket.io');	// 导入 websocket 模块
var documentRoot = 'F:/wnmp/WWW/html5/Websocket/nodeServer';

// 创建服务
var httpServer = http.createServer(function(req, res) {
	var url = req.url;
	var file = documentRoot + url;
	// console.log(file);

	fs.readFile(file, function(err, data) {
		if (err) {
			res.writeHeader(404, {
				'content-type' : 'text/html;charset="utf-8"'
			});
			res.write('<h1>404</h1><p>文件不存在</p>');
			res.end();
		} else {
			res.writeHeader(200, {
				'content-type' : 'text/html;charset="utf-8"'
			});
			res.write(data);
			res.end();
		}
	});
}).listen(8888);

// 监听 websocket 请求
var socketServer = io.listen(httpServer);

// 建立连接， 客户端用 io.connect('http://127.0.0.1:8888') 发起
socketServer.sockets.on('connection', function(socket) {
	// console.log('Socket connection is successful.');
	
	// 启动 socket.emit() 事件发送器
	socket.emit('Event-01', '今天群里抢红包！'); // 客户端用 socket.on() 监听
	
	// 监听请求
	socket.on('Event-02', function(data) {
		console.log(data);
		socket.emit('Event-02', '人数到100就抢红包！')
	});
	
	// 事件广播
	socket.broadcast.emit('Event-00', '欢迎新同学！');
	socket.on('IMove', function(data) {
		socket.broadcast.emit('AllMove', data);
	});
	
});