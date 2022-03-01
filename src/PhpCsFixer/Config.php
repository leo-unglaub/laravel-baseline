<?php

namespace LeoUnglaub\LaravelBaseline\PhpCsFixer;

use PhpCsFixer\Config as PhpCsFixerConfig;


/**
 * Class Config
 * 
 * This overrides the PhpCsFixer Config class and sets some usefull 
 * defaults.
 * 
 * @package LeoUnglaub\LaravelBaseline\PhpCsFixer
 */
class Config extends PhpCsFixerConfig
{
	/**
	 * @inheritdoc
	 */
	public function __construct(string $name = 'default')
	{
		parent::__construct();

		$this
			->setRiskyAllowed(true)
			->setUsingCache(true)
			->setFinder($this->getCustomFinder())
			->setRules($this->getCustomRules())
			->setIndent("\t")
			->setLineEnding("\n");
	}


	/**
	 * Get a custom Finder instance
	 * 
	 * @return Finder 
	 */
	public function getCustomFinder(): Finder
	{
		$finder = new Finder();
		return $finder;
	}

	/**
	 * Define all custom rules
	 * 
	 * @return array 
	 */
	protected function getCustomRules(): array
	{
		return [
			'@Symfony' => true,
			'no_useless_return' => true,
			'phpdoc_order' => true,
			'align_multiline_comment' => [
				'comment_type' => 'all_multiline',
			],
			'class_definition' => [
				'multi_line_extends_each_single_line' => true,
			],
			'concat_space' => [
				'spacing' => 'one',
			],
			'braces' => [
				'allow_single_line_closure' => true,
				'position_after_control_structures' => 'next',
				'position_after_functions_and_oop_constructs' => 'next',
			],
			'array_indentation' => true,
			'yoda_style' => false,
		];
	}
}
