<?php

namespace LeoUnglaub\LaravelBaseline\Helper;

/**
 * A helper class for managing IP addresses.
 */
class Ip
{
	protected string $ip = '';

	/**
	 * Create a new Ip instane.
	 *
	 * @return void
	 */
	public function __construct(string $ip)
	{
		$this->ip = $ip;
	}

	/**
	 * Return true if the address is a valid IPv4 address.
	 *
	 * @TODO: This is a very simple check, maybe it can be extended to a Regex
	 */
	public function isV4(): bool
	{
		if (str_contains($this->ip, '.'))
		{
			return true;
		}

		return false;
	}

	/**
	 * Return true if the address is a valid IPv6 address.
	 *
	 * @TODO: This is a very simple check, maybe it can be extended to a Regex
	 */
	public function isV6(): bool
	{
		if (str_contains($this->ip, ':'))
		{
			return true;
		}

		return false;
	}
}
