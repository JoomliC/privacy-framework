<?php
/**
 * @package     Joomla.Administrator
 * @subpackage  com_privacy
 *
 * @copyright   Copyright (C) 2005 - 2018 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

/**
 * Capabilities model class.
 *
 * @since  __DEPLOY_VERSION__
 */
class PrivacyModelCapabilities extends JModelLegacy
{
	/**
	 * Retrieve the extension capabilities.
	 *
	 * @return  array
	 *
	 * @since   __DEPLOY_VERSION__
	 */
	public function getCapabilities()
	{
		$app = JFactory::getApplication();

		/*
		 * Capabilities will be collected in two parts:
		 *
		 * 1) Core capabilities - This will cover the core API, i.e. all library level classes
		 * 2) Extension capabilities - This will be collected by a plugin hook to select plugin groups
		 *
		 * Plugins which report capabilities should return an associative array with a single root level key which is used as the title
		 * for the reporting section and an array with each value being a separate capability. All capability messages should be translated
		 * by the extension when building the array. An example of the structure expected to be returned from plugins can be found in the
		 * $coreCapabilities array below.
		 */
		$coreCapabilities = array(
			JText::_('COM_PRIVACY_HEADING_CORE_CAPABILITIES') => array(
				JText::_('COM_PRIVACY_CORE_CAPABILITY_SESSION_IP_ADDRESS_AND_COOKIE'),
				JText::sprintf('COM_PRIVACY_CORE_CAPABILITY_LOGGING_IP_ADDRESS', $app->get('log_path', JPATH_ADMINISTRATOR . '/logs')),
			)
		);

		return $coreCapabilities;
	}

	/**
	 * Method to auto-populate the model state.
	 *
	 * @return  void
	 *
	 * @since   __DEPLOY_VERSION__
	 */
	protected function populateState()
	{
		// Load the parameters.
		$this->setState('params', JComponentHelper::getParams('com_privacy'));
	}
}
