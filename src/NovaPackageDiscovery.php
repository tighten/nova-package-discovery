<?php

namespace Tightenco\NovaPackageDiscovery;

use Laravel\Nova\Card;

class NovaPackageDiscovery extends Card
{
    /**
     * The width of the card (1/3, 1/2, or full).
     *
     * @var string
     */
    public $width = 'full'; // @todo: Make it smaller and figure the size later

    /**
     * Get the component name for the element.
     *
     * @return string
     */
    public function component()
    {
        return 'nova-package-discovery';
    }
}
