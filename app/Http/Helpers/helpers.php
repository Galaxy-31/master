<?php

function renameResource($name)
{
    return [
        'index' => $name . ".index",
        'create' => $name . ".create",
        'store' => $name . ".store",
        'show' => $name . ".show",
        'edit' => $name . ".edit",
        'update' => $name . ".update",
        'destroy' => $name . ".destroy",
    ];
}