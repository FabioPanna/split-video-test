<?php
require 'vendor/autoload.php';
class GetElementsGame {
   
    function getElements($name){
        $path_parts = pathinfo($name);
        $ffmpeg = FFMpeg\FFMpeg::create();
        $video = $ffmpeg->open($name);

        $frame = $video->frame(FFMpeg\Coordinate\TimeCode::fromSeconds(15));
        $frame->save('output/frame/'.$path_parts['filename'].'.jpg');
            
        $clip = $video->clip(FFMpeg\Coordinate\TimeCode::fromSeconds(10), FFMpeg\Coordinate\TimeCode::fromSeconds(15));
        $clip->save(new FFMpeg\Format\Video\WMV(), 'output/video/'.$path_parts['filename'].'.wmv');
        
        $finalVideo = $ffmpeg->open('output/video/'.$path_parts['filename'].'.wmv');
        $finalVideo->save(new FFMpeg\Format\Audio\Mp3(), 'output/audio/'.$path_parts['filename'].'.mp3');

        $elObj = (object)[];
        $elObj->frame = 'output/frame/'.$path_parts['filename'].'.jpg';
        $elObj->video = 'output/video/'.$path_parts['filename'].'.wmv';
        $elObj->audio = 'output/audio/'.$path_parts['filename'].'.mp3';

        $myJSON = json_encode($elObj);
        return  $elObj;
    }

}

?>