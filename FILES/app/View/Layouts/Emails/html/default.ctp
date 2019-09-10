<?php
/**
 *
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.View.Layouts.Email.html
 * @since         CakePHP(tm) v 0.10.0.1076
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width" />
    <!-- NOTE: external links are for testing only -->
    <link href="http://noisy.ir/app/webroot/css/mui-email-styletag.css" rel="stylesheet" />
    <link href="http://noisy.ir/app/webroot/css/mui-email-inline.css" rel="stylesheet" />
    <title><?php echo $title_for_layout; ?></title>
  </head>
  <body>
    <table class="mui-body" cellpadding="0" cellspacing="0" border="0">
      <tr>
        <td>
          	<?php echo $this->fetch('content'); ?>
			<div class="mui--divider-top"></div>
			<a href="http://noisy.ir" class="mui-btn mui-btn--raised mui-btn--primary">دست نوشته های یک تازه کار</a>
        </td>
      </tr>
    </table>
  </body>
</html>