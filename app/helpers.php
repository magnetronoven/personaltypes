<?php
function getMBTIType($player, $types) {

    foreach($types as $type) {
        if(strpos($player->profile, $type->connected_mbti) !== false) {
            return $type;
        }
    }
    return false;
}

function MBTITagToText($player, $types) {
    $type = getMBTIType($player, $types);

    if($type) {
        if($type->hyperlink) {
            return '<div class="m-catagory__type"><a href="'.$type->hyperlink.'">'.$type->keywords.'</a><a tabindex="0" class="btn btn-secondary m-catagory__info" role="button" data-toggle="popover" data-trigger="focus" data-content="'.$type->description.'">info</a></div>';
        } else {
            return '<div class="m-catagory__type">'.$type->keywords.'<a tabindex="0" class="btn btn-secondary m-catagory__info" role="button" data-toggle="popover" data-trigger="focus" data-content="'.$type->description.'">info</a></div>';
        }
    } else {
        return 'Leeg';
    }
}