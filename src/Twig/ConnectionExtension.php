<?php

namespace App\Twig;

use App\Entity\UserConnection;
use Twig\Extension\AbstractExtension;
use Twig\TwigFilter;

class ConnectionExtension extends AbstractExtension
{
    public function getFilters(): array
    {
        return [
			new TwigFilter('status_description', [$this, 'statusDescription'], ['is_safe' => ['html']]),
        ];
    }

    public function statusDescription($status)
    {
		switch ($status) {
			case UserConnection::PENDING:
				return 'Pending';
				break;
			case UserConnection::CONNECTED:
				return 'Connected';
				break;
			case UserConnection::DECLINED:
				return 'Declined';
				break;
			default:
				return 'Not Connected';
		}
    }
}
