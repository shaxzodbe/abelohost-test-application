<?php

namespace App\Controllers;

use Smarty;

abstract class BaseController
{
    protected Smarty $smarty;

    public function __construct()
    {
        $this->smarty = new Smarty();
        $this->smarty->setTemplateDir(__DIR__ . '/../../templates');
        $this->smarty->setCompileDir(__DIR__ . '/../../storage/smarty/templates_c');
        $this->smarty->setCacheDir(__DIR__ . '/../../storage/smarty/cache');

        $this->smarty->setCaching(Smarty::CACHING_OFF);
    }

    protected function render(string $template, array $data = []): void
    {
        foreach ($data as $key => $value) {
            $this->smarty->assign($key, $value);
        }
        $this->smarty->display($template . '.tpl');
    }
}
