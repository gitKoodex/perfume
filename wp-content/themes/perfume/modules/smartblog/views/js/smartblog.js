/*
* 2007-2017 PrestaShop
*
* NOTICE OF LICENSE
*
* This source file is subject to the Academic Free License (AFL 3.0)
* that is bundled with this package in the file LICENSE.txt.
* It is also available through the world-wide-web at this URL:
* http://opensource.org/licenses/afl-3.0.php
* If you did not receive a copy of the license and are unable to
* obtain it through the world-wide-web, please send an email
* to license@prestashop.com so we can send you a copy immediately.
*
* DISCLAIMER
*
* Do not edit or add to this file if you wish to upgrade PrestaShop to newer
* versions in the future. If you wish to customize PrestaShop for your
* needs please refer to http://www.prestashop.com for more information.
*
*  @author PrestaShop SA <contact@prestashop.com>
*  @copyright  2007-2017 PrestaShop SA
*  @version  Release: $Revision$
*  @license    http://opensource.org/licenses/afl-3.0.php  Academic Free License (AFL 3.0)
*  International Registered Trademark & Property of PrestaShop SA
*/
$('#submitComment').bind('click',function(event) {
    event.preventDefault();


    var data = { 'action':'postcomment', 
        'id_post':$('input[name=\'id_post\']').val(),
        'comment_parent':$('input[name=\'comment_parent\']').val(),
        'name':$('input[name=\'name\']').val(),
        'website':$('input[name=\'website\']').val(),
        'smartblogcaptcha':$('input[name=\'smartblogcaptcha\']').val(),
        'comment':$('textarea[name=\'comment\']').val(),
        'mail':$('input[name=\'mail\']').val() };
    $.ajax( {
        url: baseDir + 'modules/smartblog/ajax.php',
        data: data,

        dataType: 'json',

        beforeSend: function() {
            $('.success, .warning, .error').remove();
            $('#submitComment').attr('disabled', true);
            $('#commentInput').before('<div class="attention"><img src="http://321cart.com/sellya/catalog/view/theme/default/image/loading.gif" alt="" />Please wait!</div>');

        },
        complete: function() {
            $('#submitComment').attr('disabled', false);
            $('.attention').remove();
        },
        success: function(json) {
            if (json['error']) {

                $('#commentInput').before('<div class="warning">' + json['error']['common'] + '</div>');

                if (json['error']['name']) {
                    $('.inputName').after('<span class="error">' + json['error']['name'] + '</span>');
                }
                if (json['error']['mail']) {
                    $('.inputMail').after('<span class="error">' + json['error']['mail'] + '</span>');
                }
                if (json['error']['comment']) {
                    $('.inputContent').after('<span class="error">' + json['error']['comment'] + '</span>');
                }
                if (json['error']['captcha']) {
                    $('.smartblogcaptcha').after('<span class="error">' + json['error']['captcha'] + '</span>');
                }
            }

            if (json['success']) {
                $('input[name=\'name\']').val('');
                $('input[name=\'mail\']').val('');
                $('input[name=\'website\']').val('');
                $('textarea[name=\'comment\']').val('');
                $('input[name=\'smartblogcaptcha\']').val('');

                $('#commentInput').before('<div class="success">' + json['success'] + '</div>');
                setTimeout(function(){
                    $('.success').fadeOut(300).delay(450).remove();
                },5000);

            }
        }
    } );
} );
var addComment = {
    moveForm : function(commId, parentId, respondId, postId) {

        var t = this, div, comm = t.I(commId), respond = t.I(respondId), cancel = t.I('cancel-comment-reply-link'), parent = t.I('comment_parent'), post = t.I('comment_post_ID');

        if ( ! comm || ! respond || ! cancel || ! parent )
            return;

        t.respondId = respondId;
        postId = postId || false;

        if ( ! t.I('wp-temp-form-div') ) {
            div = document.createElement('div');
            div.id = 'wp-temp-form-div';
            div.style.display = 'none';
            respond.parentNode.insertBefore(div, respond);
        }


        comm.parentNode.insertBefore(respond, comm.nextSibling);
        if ( post && postId )
            post.value = postId;
        parent.value = parentId;
        cancel.style.display = '';

        cancel.onclick = function() {
            var t = addComment, temp = t.I('wp-temp-form-div'), respond = t.I(t.respondId);

            if ( ! temp || ! respond )
                return;

            t.I('comment_parent').value = '0';
            temp.parentNode.insertBefore(respond, temp);
            temp.parentNode.removeChild(temp);
            this.style.display = 'none';
            this.onclick = null;
            return false;
        };

        try { t.I('comment').focus(); }
        catch(e) {}

        return false;
    },

    I : function(e) {
        return document.getElementById(e);
    }
};