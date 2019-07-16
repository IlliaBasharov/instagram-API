<form method="GET">
    <input type="text" name="tag"/>
    <input type="submit"/>
</form>
<?php
$tag = $_GET['tag'];
//require __DIR__.'vendor/autoload.php';
require_once 'vendor/autoload.php';

/////// CONFIG ///////
$username = 'illia_basharov_';
$password = 'Stryker19969966';
$debug = false;
$truncatedDebug = false;
//////////////////////
$ig = new \InstagramAPI\Instagram($debug, $truncatedDebug);
try {
    $ig->login($username, $password);
} catch (\Exception $e) {
    echo 'Something went wrong: '.$e->getMessage()."\n";
    exit(0);
}
$search = $ig->hashtag->search($tag,[],'1818356605.1677ed0.0750bf51f22a49e9b1ca00acf4962913');
foreach($search->asArray() as $s){
    foreach($s as $item){
//        echo '<pre>';
//        var_dump($ig->media->getInfo($item["id"]));
//        echo '</pre>';
//        die();
        $content .= '<img src="'.$item['profile_pic_url'].'" alt="" />';
    }
}
echo $content;








//$photos = $ig->collection->getList();
//foreach ($photos->asArray() as $photo){
//    foreach ($photo as $item) {
//        $content .= '<img src="'.$item['cover_media_list'][0]['image_versions2']['candidates'][0]['url'].'" alt="" />';
//    }
//
//
//}
//echo $content;
