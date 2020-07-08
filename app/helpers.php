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

function MBTITagToText($player, $theme) {

    // If theme is not active for player position return nothing
    if($player->position){
        if(!$theme->positions->contains($player->position->id)) {
            return '';
        }
    }

    $types = $theme->types;
    $type = getMBTIType($player, $types);

    if($type) {
        $element = '<div class="m-catagory__type">';
        if($type->hyperlink) {
            $element .= '<a href="'.$type->hyperlink.'">'.$type->keywords.'</a>';
        } else {
            $element .= $type->keywords;
        }

        if($type->description) {

            // $element .= "<a class='btn btn-secondary m-catagory__info' id='info".$type->id."'><i class='fas fa-info'></i></a>";
            // $element .= "<div id='template".$type->id."' style='display: none;'>".$type->description."</div>";
            $element .= "<a class='btn btn-secondary m-catagory__info' data-modal='".$type->id."' id='description-".$type->id."'><i class='fas fa-info'></i></a>";
            
        }

        $element .= '</div>';

        return $element;
    } else {
        return 'Leeg';
    }
}