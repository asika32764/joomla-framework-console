<?php
/**
 * Part of the Joomla Framework Application Package
 *
 * @copyright  Copyright (C) 2005 - 2013 Open Source Matters, Inc. All rights reserved.
 * @license    GNU General Public License version 2 or later; see LICENSE
 */

namespace Joomla\Console\Tests\Output;

use Joomla\Application\Cli\Output\Stdout;

/**
 * Class Stdout.
 *
 * @since  1.0
 */
class TestStdout extends Stdout
{
	protected $output = '';

	/**
	 * Write a string to standard output.
	 *
	 * @param   string   $text  The text to display.
	 * @param   boolean  $nl    True (default) to append a new line at the end of the output string.
	 *
	 * @since   1.0
	 * @return $this
	 */
	public function out($text = '', $nl = true)
	{
		$this->output .= $this->processor->process($text) . ($nl ? "\n" : null);

		return $this;
	}

	/**
	 * Write a string to standard error output.
	 *
	 * @param   string   $text  The text to display.
	 * @param   boolean  $nl    True (default) to append a new line at the end of the output string.
	 *
	 * @since   1.0
	 * @return $this
	 */
	public function err($text = '', $nl = true)
	{
		$this->output .= $this->processor->process($text) . ($nl ? "\n" : null);

		return $this;
	}

	/**
	 * getOutput
	 *
	 * @return string
	 */
	public function getOutput()
	{
		return $this->output;
	}

	/**
	 * setOutput
	 *
	 * @param $output
	 *
	 * @return $this
	 */
	public function setOutput($output)
	{
		$this->output = $output;

		return $this;
	}
}
