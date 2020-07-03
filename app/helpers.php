<?php
function getMBTIType($player, $types) {
    foreach($types as $type) {
        $tags = explode(',', $type->connected_mbti);

        foreach ($tags as $tag) {
            $isInString = true;
            $chars = str_split($tag);

            foreach($chars as $char) {
                if(!preg_match("/{$char}/", $player->profile)) {
                    $isInString = false;
                }
            }

            if($isInString) {
                return $type;
            }
        }
    }
    return false;
}

function MBTITagToText($player, $types) {
    $type = getMBTIType($player, $types);

    if($type) {
        $element = '';
        if($type->hyperlink) {
            $element .= '<div class="m-catagory__type"><a href="'.$type->hyperlink.'">'.$type->keywords.'</a>';
        } else {
            $element .= '<div class="m-catagory__type">'.$type->keywords;
        }

        if($type->description) {
            $element .= '<a tabindex="0" class="btn btn-secondary m-catagory__info" role="button" data-toggle="popover" data-trigger="focus" data-content="'.$type->description.'"><i class="fas fa-info"></i></a>';
        }

        $element .= '</div>';

        return $element;
    } else {
        return 'Leeg';
    }
}