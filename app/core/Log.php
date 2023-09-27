<?php


namespace app\core;


class Log
{
    const LOG_FILE = 'error.log';
    static private $instance;
    private $messages = [];

    private $fileName;

    private function __construct()
    {
        $this->fileName = realpath(self::LOG_FILE);
    }

    static public function getInstance()
    {
        if (!self::$instance) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    private function __clone()
    {
        // TODO: Implement __clone() method.
    }

    private function __wakeup()
    {
        // TODO: Implement __wakeup() method.
    }

    static public function info($message)
    {
        $message .= date('Y-m-d H:i:s');
        $obj = self::getInstance();
        $obj->messages[] = $message;
    }

    public function __destruct()
    {
        if (count($this->messages) > 0) {
            $str = implode("\n", self::getInstance()->messages);
            file_put_contents($this->fileName, $str, FILE_APPEND);
        }
    }
}