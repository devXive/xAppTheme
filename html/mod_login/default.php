<?php
/**
 * @package     Joomla.Site
 * @subpackage  mod_login
 *
 * @copyright   Copyright (C) 2005 - 2013 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

JHtml::_('behavior.keepalive');
JHtml::_('bootstrap.tooltip');
?>
<a class="user-menu dropdown-toggle" href="#" data-toggle="dropdown">
	<i class="icon-signin"> <?php echo JText::_('JLOGIN') . '/' . JText::_('MOD_LOGIN_REGISTER'); ?> </i>
	<i class="icon-caret-down"></i>
</a>
<ul id="user_menu" class="pull-right dropdown-menu dropdown-yellow dropdown-caret dropdown-closer" style="padding-top: 0;">
	<li>
		<form action="<?php echo JRoute::_('index.php', true, $params->get('usesecure')); ?>" method="post" class="well" style="margin-bottom: 5px;">
			<?php if ($params->get('pretext')) : ?>
				<p><?php echo $params->get('pretext'); ?></p>
			<?php endif; ?>
			<div class="input-prepend">
				<span class="add-on"><i class="icon-user"></i></span>
				<input id="prependedInput" type="text" name="username" class="span2" placeholder="<?php echo JText::_('MOD_LOGIN_VALUE_USERNAME') ?>" />
			</div>
			<div class="input-prepend">
				<span class="add-on"><i class="icon-lock"></i></span>
				<input id="prependedInput" type="password" name="password" class="span2" placeholder="<?php echo JText::_('JGLOBAL_PASSWORD') ?>" />
			</div>
			<?php if (JPluginHelper::isEnabled('system', 'remember')) : ?>
				<label class="checkbox">
					<input type="checkbox" name="remember" value="yes" style="opacity: 1;"/> <?php echo JText::_('MOD_LOGIN_REMEMBER_ME') ?>
				</label>
			<?php endif; ?>
			<button type="submit" name="Submit" class="btn btn-primary"><?php echo JText::_('JLOGIN') ?></button>
			<?php if ($params->get('posttext')) : ?>
				<p><?php echo $params->get('posttext'); ?></p>
			<?php endif; ?>
			<input type="hidden" name="option" value="com_users" />
			<input type="hidden" name="task" value="user.login" />
			<input type="hidden" name="return" value="<?php echo $return; ?>" />
			<?php echo JHtml::_('form.token'); ?>
		</form>
	</li>
	<?php
		$usersConfig = JComponentHelper::getParams('com_users');
		if ($usersConfig->get('allowUserRegistration')) : ?>
			<li>
				<a href="<?php echo JRoute::_('index.php?option=com_users&view=registration'); ?>">
				<?php echo JText::_('MOD_LOGIN_REGISTER'); ?> <span class="icon-arrow-right"></span></a>
			</li>
			<li>
				<a href="<?php echo JRoute::_('index.php?option=com_users&view=remind'); ?>">
				  <?php echo JText::_('MOD_LOGIN_FORGOT_YOUR_USERNAME'); ?></a>
			</li>
			<li>
				<a href="<?php echo JRoute::_('index.php?option=com_users&view=reset'); ?>"><?php echo JText::_('MOD_LOGIN_FORGOT_YOUR_PASSWORD'); ?></a>
			</li>
	<?php endif; ?>
</ul>