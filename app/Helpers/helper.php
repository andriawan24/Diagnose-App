<?php

function encode($param)
{
    return base64_encode(base64_encode(base64_encode(base64_encode($param))));
}

function decode($param)
{
    return base64_decode(base64_decode(base64_decode(base64_decode($param))));
}