<?php

namespace App\Enums;

enum CacheKeys: string
{
    case FLOW_TITLE = "flow_";
    case FLOW_TOKEN = "token_flow_";
    case FLOW_BLOCK = "token_flow_block_";


    public function append(string|int $content)
    {
        return $this->value . $content;
    }
}
