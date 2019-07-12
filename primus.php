<?php

print "Hello World";

$data_from_post = $_POST;

foreach ($data_from_post as &$xxx) {
    print $xxx;
}