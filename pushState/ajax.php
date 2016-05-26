<?php
$area = array();
// 浦东
$area['pudong'] = '[{"name": "浦发御园", "price": "参考价40000元/平", "address": "浦东 三林西泰林路480弄、6号线华夏西路"}, {
    "name": "毕加索小镇",
    "price": "单价22500元/平",
    "address": "浦东 2号线唐镇站纬四路出口300米"
}, {"name": "万科海上传奇", "price": "待定", "address": "浦东 御桥路1751号、11号线御桥路站(在建中)"}, {
    "name": "乾耀东港",
    "price": "待定",
    "address": "浦东 临港新城霞光路368弄"
}, {"name": "汇锦城", "price": "总价105-110万/套", "address": "浦东 新场镇新环北路1180弄、16号线新场站"}, {
    "name": "朗诗未来树",
    "price": "待定",
    "address": "浦东 秋亭路88弄、16号线惠南站"
}, {"name": "大华珐朵公馆", "price": "预计34000元/平", "address": "浦东 成山路1488弄、7号线杨高南路站"}, {
    "name": "小上海新城",
    "price": "预计15000元/平",
    "address": "浦东 周浦川周公路4318弄"
}]';

// 宝山
$area['baoshan'] = '[{"name": "聚丰福邸", "price": "待定", "address": "宝山 环镇北路1366弄、7号线上海大学站"}, {
    "name": "经纬泓汇地标家园",
    "price": "待定",
    "address": "宝山 纬地路375弄、7号线南陈路站"
}, {"name": "同济城市阳光", "price": "待定", "address": "宝山 环镇北路1118弄、7号线上海大学站"}, {
    "name": "远洋香奈",
    "price": "待定",
    "address": "宝山 蕴川路绿龙路、1号线富锦路站"
}, {"name": "保利叶之林", "price": "均价24000元/平", "address": "宝山 华秋路349弄、7号线祁华路站"}, {
    "name": "招商海德公馆",
    "price": "2房约175万/套",
    "address": "宝山 蕰川路2488弄、1号线富锦路站"
}, {"name": "美兰湖畔雅苑", "price": "待定", "address": "宝山 罗迎路558弄、7号线美兰湖站"}]';

// 青浦
$area['qingpu'] = '[{"name": "西郊半岛名苑", "price": "预计135000元/平", "address": "青浦 华新镇新府中路1331弄"}, {
    "name": "锦绣逸庭",
    "price": "待定",
    "address": "青浦 盈港东路徐盈路交汇处"
}, {"name": "鑫塔水尚", "price": "待定", "address": "青浦 华青南路以东，沪青平公路以北，淀浦河以南"}]';

// 闵行
$area['minhang'] = '[{"name": "VCITY", "price": "待定", "address": "闵行 华宁路银春路"}, {
    "name": "圣特丽墅",
    "price": "待定",
    "address": "闵行 贵都路366弄"
}, {"name": "嘉怡水岸", "price": "待定", "address": "闵行 龙吴路5899号、5号线东川路站"}, {
    "name": "浦江华侨城",
    "price": "预计23000元/平",
    "address": "闵行 浦星路800号、8号线浦江镇站"
}]';

// 普陀
$area['putuo'] = '[{"name": "同进理想城", "price": "均价14500元/平", "address": "普陀 金通路1118号、11号线桃浦新村站"}, {
    "name": "雅戈尔长风8号",
    "price": "均价45000元/平",
    "address": "普陀 泸定路555弄、13号线真北路站"
}]';

// 闸北
$area['zhabei'] = '[{"name": "都荟豪庭", "price": "预计均价42000元/平", "address": "闸北 芷江西路488号、1号线中山北路站"}]';

// 奉贤
$area['fengxian'] = '[{"name": "棕榈滩海景城", "price": "均价12000元/平", "address": "奉贤 海湾旅游区金汇塘东路1799弄"}, {
    "name": "卓越世纪中心",
    "price": "均价17600元/平",
    "address": "奉贤 望园南路269弄、5号线(规划中)"
}, {"name": "众旺苑", "price": "待定", "address": "奉贤 解放西路环城西路70-91号"}, {
    "name": "景源名墅",
    "price": "待定",
    "address": "奉贤 解放西路1000号(浦卫公路东侧)"
}, {"name": "棕榈滩高尔夫别墅", "price": "待定", "address": "奉贤 海湾旅游区金汇塘路388号"}]';

$key = $_GET['area'];

if($area[$key]){
    echo $area[$key];
}else{
    echo '{}';
}
