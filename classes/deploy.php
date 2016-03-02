<?php
class Deployer extends Object {

    function deploy() {
        $body = @file_get_contents('php://input');
        $event_json = json_decode($body);
        $this->log($event_json);
    }
}

