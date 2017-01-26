<?php if (!defined('IPHORM_VERSION')) exit; ?><html>
<body leftmargin="0" marginwidth="0" topmargin="0" marginheight="0">
<table width="100%" cellpadding="0" cellspacing="0" border="0">
    <tr>
        <td valign="top" style="padding: 25px;"><table width="600" cellpadding="0" cellspacing="0" border="0" style="font: 14px Helvetica, Arial, sans-serif;">
            <tr>
                <td valign="top" style="font-family: Helvetica, Arial, sans-serif; font-size: 25px; font-weight: bold; color: #282828; padding-bottom: 10px;"><?php echo esc_html($mailer->Subject); ?></td>
            </tr>
            <tr>
                <td valign="top"><table width="100%" border="0" cellpadding="2" cellspacing="0">
                    <?php
                    $elements = $form->getElements();
                    foreach ($elements as $element) {
                        if (!$element->isHidden() && (!$element->isEmpty() || ($element->isEmpty() && $form->getNotificationShowEmptyFields()))) {
                            if ($element instanceof iPhorm_Element_Groupstart) {
                                if ($element->getShowNameInEmail() && strlen($adminTitle = $element->getAdminTitle())) {
                                    ?><tr>
                                        <td colspan="2" valign="top" style="font-family: Helvetica, Arial, sans-serif; font-size: 19px; font-weight: bold; color: #282828; padding-top: 15px; padding-bottom: 10px;"><?php echo esc_html($adminTitle); ?></td>
                                    </tr>
                                    <?php
                                }
                            } else {
                                ?><tr>
                                    <td valign="top" style="font-family: Helvetica, Arial, sans-serif; font-size: 17px; font-weight: bold; color: #282828; width: 30%;"><?php echo esc_html($element->getAdminLabel()); ?></td>
                                    <td valign="top" style="font-family: Helvetica, Arial, sans-serif; color: #282828; line-height: 130%; width: 70%;">
                                        <?php echo $element->getValueHtml(); ?>
                                    </td>
                                </tr>
                                <?php
                            }
                        }
                    }
                    ?>
                </table></td>
            </tr>
        </table>
        </td>
    </tr>
</table>
</body>
</html>