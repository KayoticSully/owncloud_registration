<form id="register" method="post">
    <fieldset>
        <ul>
        </ul>
        <p class="infield grouptop">
            <input type="text" name="user" id="user" placeholder=""
                   value="<?php p($_['username']); ?>"<?php p($_['user_autofocus'] ? ' autofocus' : ''); ?>
                   autocomplete="on" required/>
            <label for="user" class="infield"><?php p($l->t('Username')); ?></label>
            <img class="svg" src="<?php print_unescaped(image_path('', 'actions/user.svg')); ?>" alt=""/>
        </p>
        <p class="infield groupmiddle">
            <input type="password" name="password" id="password" value="" data-typetoggle="#show" placeholder=""
                   required<?php p($_['user_autofocus'] ? '' : ' autofocus'); ?> />
            <label for="password" class="infield"><?php p($l->t('Password')); ?></label>
            <img class="svg" id="password-icon" src="<?php print_unescaped(image_path('', 'actions/password.svg')); ?>" alt=""/>
            <input type="checkbox" id="show" name="show" />
            <label for="show"></label>
        </p>
        <p class="infield groupbottom">
            <input type="text" name="activation_code" id="activation_code" value="" data-typetoggle="#show" placeholder=""
                   required<?php p($_['user_autofocus'] ? '' : ' autofocus'); ?> />
            <label for="activation_code" class="infield"><?php p($l->t('Activation Code')); ?></label>
            <img class="svg" id="password-icon" src="<?php print_unescaped(image_path('', 'actions/lock.svg')); ?>" alt=""/>
        </p>
        
        <input type="hidden" name="timezone-offset" id="timezone-offset"/>
            <input type="submit" id="submit" class="login primary" value="<?php p($l->t('Register')); ?>"/>
    </fieldset>
</form>
<?php
OCP\Util::addscript('core', 'visitortimezone');