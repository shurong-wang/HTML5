
// 通过 onmessage 监听主线程
this.onmessage = function(event){
    // event 参数中的 data 属性，就是主线程发送的数据
    count(event.data);
}

function count(num){
	// 通过 postMessage 把结果返回给主线程
    self.postMessage(num);  // 在这段时间内，主线程不会被阻塞
    num ++;
    setTimeout(function(){
        count(num);
    }, 1000);
}

