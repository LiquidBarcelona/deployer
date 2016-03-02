<?php
class Deployer extends Object {
    private $repositories = null;

    function __construct($repositories) {
        $this->repositories = $repositories;
    }
    function deploy() {
        $body = @file_get_contents('php://input');
        $payload = json_decode($body);
        $this->log($payload);
        if(!empty($payload->repository->name)) {
            if(isset($this->repositories[$payload->repository->name])) {
                $config = $this->repositories[$payload->repository->name];
                if(strtolower($config['branch']) == strtolower($payload->ref)) {
                    $success = $this->runDeployScript($config);
                    if($success) {
                        $this->registerDeploy($config, $payload);
                    }
                }
                else {
                    $this->log('Branch does not match');
                }
            }
            else {
                $this->log('Repo not found in configuration');
            }
        }
        else {
            $this->log('Void Webhook');
        }
    }

    private function registerDeploy($config, $payload) {
        $data = array(
            'commit'        =>  $payload->after,
            'message'       =>  $payload->head_commit->message,
            'commiter'      =>  $payload->head_commit->author->name,
            'pusher'        =>  $payload->pusher->name
        );
        $this->log($data, $config['log']);
    }
    function runDeployScript($config) {
        $this->log("Begin Deployment");
        $ret = shell_exec('./config/scripts'. DS . $config['script']);
        $this->log("Deployment Finished: $ret");
        return true;
    }
}

