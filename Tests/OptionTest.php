<?php
use Joomla\Console\Command\DefaultCommand;
use Joomla\Console\Option\Option;

/**
 * Generated by PHPUnit_SkeletonGenerator 1.2.1 on 2013-11-09 at 14:36:49.
 */
class OptionTest extends PHPUnit_Framework_TestCase
{
	/**
	 * @var Option
	 */
	protected $instance;

	protected $command;

	/**
	 * Sets up the fixture, for example, opens a network connection.
	 * This method is called before a test is executed.
	 */
	protected function setUp()
	{
		$command = new DefaultCommand('default');

		$this->instance = $option = new Option(array('y', 'yell'), 0, 'desc', Option::IS_GLOBAL);

		$command->addOption($option);

		$this->command = $command;
	}

	/**
	 * Tears down the fixture, for example, closes a network connection.
	 * This method is called after a test is executed.
	 */
	protected function tearDown()
	{
	}

	/**
	 * optionProvider
	 *
	 * @return array
	 */
	public function optionProvider()
	{
		return array(
			array(
				array(
					'y' => array('y', 'yell', 'Y')
				),

				array(
					'yell' => array('y', 'yell', 'Y')
				),

				array(
					'Y' => array('y', 'yell', 'Y')
				)
			)
		);
	}

	/**
	 * @covers Joomla\Console\Option\Option::setAlias
	 * @todo   Implement testSetAlias().
	 */
	public function testSetAndGetAlias()
	{
		$this->instance->setAlias(array('yell', 'Y'));

		$alias = $this->instance->getAlias();

		$this->assertEquals(array('yell', 'Y'), $alias);
	}

	/**
	 * @covers Joomla\Console\Option\Option::setDefault
	 * @todo   Implement testSetDefault().
	 */
	public function testSetAndGetDefault()
	{
		$this->instance->setDefault(0);

		$this->assertEquals(0, $this->instance->getDefault(), 'Default value not matched.');
	}

	/**
	 * @covers Joomla\Console\Option\Option::setDescription
	 * @todo   Implement testSetDescription().
	 */
	public function testSetAndGetDescription()
	{
		$this->instance->setDescription('Desc');

		$this->assertEquals('Desc', $this->instance->getDescription(), 'Description value not matched.');
	}

	/**
	 * @covers Joomla\Console\Option\Option::setName
	 * @todo   Implement testSetName().
	 */
	public function testSetAndGetName()
	{
		$this->instance->setName('defaulttt');

		$this->assertEquals('defaulttt', $this->instance->getName(), 'Name value not matched.');
	}

	/**
	 * @covers Joomla\Console\Option\Option::getInput
	 * @todo   Implement testGetInput().
	 */
	public function testSetAndGeTInput()
	{
		$this->assertEquals($this->instance->getInput(), $this->command->getInput(), 'Input not the same instance.');
	}

	/**
	 * @dataProvider optionProvider
	 */
	public function testGetValue($inputs)
	{
		foreach($inputs as $key => $vals)
		{
			$this->instance->getInput()->set($key, 1);

			foreach ($vals as $val)
			{
				$this->assertEquals(1, $this->instance->getValue($val));
			}
		}
	}

	/**
	 * @covers Joomla\Console\Option\Option::isGlobal
	 * @todo   Implement testIsGlobal().
	 */
	public function testGlobal()
	{
		$this->command->addOption(
			'k',
			'default',
			'k desc',
			Option::IS_GLOBAL
		)
		->addArgument('kkk');

		$kkk = $this->command->getArgument('kkk');

		$options = $kkk->getAllOptions();

		$this->assertArrayHasKey('k', $options);
	}
}
