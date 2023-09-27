<?php


namespace app\core;


class View
{
    private $template = 'main';

    public function __construct($template = null)
    {
        if ($template !== null) {
            $this->template = $template;
        }
    }

    public function render($page, array $data = [])
    {
        extract($data);
        include_once '../views/templates/' . $this->template . '_template.php';
    }

}