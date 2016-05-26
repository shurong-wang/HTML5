<?php
header('Content-Type: text/event-stream');
header('Cache-Control: no-cache');

echo "event:newDate\n";
echo "data:".date('Y-m-d H:i:s');
echo "\n\n";
flush();
