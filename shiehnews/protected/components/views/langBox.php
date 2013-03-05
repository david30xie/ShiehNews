<?php echo CHtml::form(); ?>
        <?php echo CHtml::dropDownList('_lang', $currentLang, array(
            'en_us' => 'English'), array('submit' => '')); ?>
<?php echo CHtml::endForm(); ?>