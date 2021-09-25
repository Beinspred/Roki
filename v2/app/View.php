<?php


class View
{
    private $viewName;
    private $data;

    public function __construct($viewName, $data = null)
    {
        $this->viewName = $viewName;
        $this->data = $data;
    }

    public function __toString()
    {
        ob_start();

        $viewPath = __DIR__ . '/view/' . $this->viewName . '.php';

        if (!file_exists($viewPath)) {
            die('no view');
        }

        extract($this->data);

        require $viewPath;

        return ob_get_clean();
    }
}
