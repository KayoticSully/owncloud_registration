/**
 * ownCloud - Registration app
 *
 * @author Ryan Sullivan
 *
 * @copyright 2013 Ryan Sullivan <kayoticsully@gmail.com>
 *
 * This library is free software; you can redistribute it and/or
 * modify it under the terms of the GNU AFFERO GENERAL PUBLIC LICENSE
 * License as published by the Free Software Foundation; either
 * version 3 of the License, or any later version.
 *
 * This library is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU AFFERO GENERAL PUBLIC LICENSE for more details.
 *
 * You should have received a copy of the GNU Affero General Public
 * License along with this library.  If not, see <http://www.gnu.org/licenses/>.
 *
 */
$(document).ready(function(){
    $('#login > form[id != register]').prepend(
        '<div class="center registration-links">' +
            t('registration', 'Don\'t have an account?') + ' ' +
            '<a id="register_button" class="button" href="#">' +
                t('registration', 'Register') +
            '</a>' +
        '</div>'
    );
    
    $('#login > form[id = register]').prepend(
        '<div class="center registration-links">' +
            t('registration', 'Already have an account?') + ' ' +
            '<a class="button" href="/">' +
                t('registration', 'Login') +
            '</a>' +
        '</div>'
    );
    
    
    $('#register').submit(function (event) {
        event.preventDefault();
        var username = $('#user').val();
        var password = $('#password').val();
        var activation_code = $('#activation_code').val();
        
        if ($.trim(username) == '') {
            OC.dialogs.alert(
                t('registration', 'A valid username must be provided'),
                t('registration', 'Error creating user'));
            return false;
        }
        
        if ($.trim(password) == '') {
            OC.dialogs.alert(
                t('registration', 'A valid password must be provided'),
                t('registration', 'Error creating user'));
            return false;
        }
        
        if ($.trim(activation_code) == '') {
            OC.dialogs.alert(
                t('registration', 'A valid activation code must be provided'),
                t('registration', 'Error creating user'));
            return false;
        }
        
        //$('#register').get(0).reset();
        
        $.post(
            OC.filePath('registration', 'ajax', 'createuser.php'),
            {
                username: username,
                password: password,
                activation_code: activation_code
            },
            
            function (result) {
                if (result.status != 'success') {
                    OC.dialogs.alert(
                        result.data.message,
                        t('registration', 'Error creating user')
                    );
                } else {
                    // Success!
                    OC.dialogs.info(
                        'The test was successful',
                        t('registration', 'Success')
                    );
                }
            }
        );
    });
});

OC.Router.registerLoadedCallback(function(){
    $('#register_button').attr('href', OC.Router.generate('registration_form'));
});