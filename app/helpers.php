<?php

if (! function_exists('set_breadcrumbs')) {
    function set_breadcrumbs(array $breadcrumbs = [], string $pageName = ''): void
    {
        session()->put('breadcrumbs.parent', $breadcrumbs);
        session()->put('breadcrumbs.pageName', $pageName);
    }
}
