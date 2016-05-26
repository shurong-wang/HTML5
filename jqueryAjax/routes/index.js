var express = require('express');
var router = express.Router();

router.all('/', function (req, res) {
    res.sendFile('../public/index.html');
});

router.all('/test', function (req, res) {

    console.log(req.query);

    if (req.query.err == 'y') {
        res.status(400);
    }
    setTimeout(function() {
        res.send('ok');
    }, 100);

});

router.all('/types', function (req, res) {
    // res.json({a: 1});
    // res.send(JSON.stringify({a:1}));
    res.type('application/javascript');
    res.send('alert("test");');
});

router.all('/time', function(req, res) {
    res.setHeader('ETag', '12345');
   res.send(new Date().getTime() + '');
});

router.all('/convert', function(req, res) {
   res.setHeader('contentType', 'mime/ctype');
    res.send('abc');
});

module.exports = router;