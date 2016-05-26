var express = require('express');
var router = express.Router();

var users = [{type: 1, name: 'zhangsan'}, {type: 2, name: 'lisi'}, {type: 1, name: 'wangwu'}];

/**
 * 全部用户
 */
router.all('/allusers', function (req, res) {
    console.log(req.body);
//console.log(req.body['c[x]']);
    //res.status(400); // 模拟错误
    res.json(users);
    // res.send(toHtml(users));
});
/**
 * 按type过滤用户列表
 */
router.get('/list', function (req, res) {

    var ret = [];

    var type = req.query.type;
    for (var i = 0; i < users.length; ++i) {
        if (users[i].type == type) {
            ret.push(users[i]);
        }
    }

    res.json(ret);
    // jsonp return
    // res.send(req.query.callback + "(" + JSON.stringify(users)  + ")");
});

router.post('/list', function (req, res) {
    var ret = [];

    var type = req.body.type;
    for (var i = 0; i < users.length; ++i) {
        if (users[i].type == type) {
            ret.push(users[i]);
        }
    }

    console.log(toHtml(ret));
    res.send(toHtml(ret));
});

function toHtml(users) {
    var ret = [];
    for (var i = 0; i < users.length; ++i) {
        ret.push("<li>" + users[i].name + "</li>");
    }

    return "<ul>" + ret.join("") + "</ul>";
}

module.exports = router;