<?php

namespace App\Twig;

use Twig\Extension\AbstractExtension;
use Twig\TwigFilter;
use Twig\TwigFunction;

class ConnectionExtension extends AbstractExtension
{
    public function getFilters(): array
    {
        return [
            // If your filter generates SAFE HTML, you should add a third
            // parameter: ['is_safe' => ['html']]
            // Reference: https://twig.symfony.com/doc/2.x/advanced.html#automatic-escaping
			new TwigFilter('status_description', [$this, 'statusDescription'], ['is_safe' => ['html']]),
        ];
    }

    public function getFunctions(): array
    {
        return [
           // new TwigFunction('function_name', [$this, 'doSomething']),
        ];
    }

    public function statusDescription($value)
    {
		switch ($value) {
			case 0:
				return 'Pending';
				break;
			case 1:
				return 'Connected';
				break;
			case 2:
				return 'Declined';
				break;
			default:
				return '<a href="#" class="add_connection">Add</a>';
		}
    }
}
