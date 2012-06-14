<?php

namespace Registry;

/**
 * Represents the registry database table.
 * All access to this table should be done through this class.
 *
 * @since 0.1
 *
 * @file
 * @ingroup Registry
 *
 * @licence GNU GPL v2+
 * @author Jeroen De Dauw < jeroendedauw@gmail.com >
 */
class Table extends \ORMTable {

	/**
	 * @see IORMTable::getName()
	 * @since 0.1
	 * @return string
	 */
	public function getName() {
		return 'registry';
	}

	/**
	 * @see IORMTable::getFieldPrefix()
	 * @since 0.1
	 * @return string
	 */
	public function getFieldPrefix() {
		return 'entry_';
	}

	/**
	 * @see IORMTable::getRowClass()
	 * @since 0.1
	 * @return string
	 */
	public function getRowClass() {
		return '\Registry\Entry';
	}

	/**
	 * @see IORMTable::getFields()
	 * @since 0.1
	 * @return array
	 */
	public function getFields() {
		return array(
			'id' => 'id',
			'type' => 'str',
			'key' => 'str',
			'info' => 'blob',
		);
	}

}