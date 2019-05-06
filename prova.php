<?php
require 'vendor/autoload.php';

$nameFile = "http://mirrors.standaloneinstaller.com/video-sample/Panasonic_HDC_TM_700_P_50i.avi";
$path_parts = pathinfo($nameFile);


$ffmpeg = FFMpeg\FFMpeg::create();
$video = $ffmpeg->open($nameFile);


$frame = $video->frame(FFMpeg\Coordinate\TimeCode::fromSeconds(15));
$frame->save('output/frame/'.$path_parts['filename'].'.jpg');
    

$clip = $video->clip(FFMpeg\Coordinate\TimeCode::fromSeconds(10), FFMpeg\Coordinate\TimeCode::fromSeconds(15));
$clip->save(new FFMpeg\Format\Video\WMV(), 'output/video/'.$path_parts['filename'].'.wmv');


$finalVideo = $ffmpeg->open('output/video/'.$path_parts['filename'].'.wmv');
$finalVideo->save(new FFMpeg\Format\Audio\Mp3(), 'output/audio/'.$path_parts['filename'].'.mp3');


/*
per informazioni sui metodi leggere https://github.com/PHP-FFMpeg/PHP-FFMpeg
per scaricare dei video per test usare https://standaloneinstaller.com/blog/big-list-of-sample-videos-for-testers-124.html    
IL FORMATO X264 NON FUNZIONA    
*/
?>