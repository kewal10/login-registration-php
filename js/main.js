/*jslint browser:true, devel:true, white:true, vars:true */
/*global $:false */
/* jshint strict: false, -W117 */

$(function() {

    //noinspection JSUnresolvedVariable,JSUnresolvedFunction,JSUnresolvedFunction
    $.validator.setDefaults({
        errorClass: 'help-block',
        highlight: function(element) {
            $(element)
                .closest('.form-group')
                .addClass('has-error');
        },
        unhighlight: function(element) {
            $(element)
                .closest('.form-group')
                .removeClass('has-error');
        }
    });


    //noinspection JSUnresolvedFunction
    $("#userForm").validate({
        rules: {
            email: {
                required: true,
                email: true
            },
            password: "required",
            password_again: {
                required: true,
                equalTo: "#password"
            },
            fullname: {
                required: true
            },
            message: {
                required: true
            }
        },
        messages: {
            email: {
                required: 'Please Enter a Email Address.',
                email: 'Please Enter a <em>valid</em> Email Address'
            },
            fullname: {
                required: 'Please Enter your Full Name'
            },
            password: {
                required: 'Please Enter your passowrd'
            },
            password_again: {
                required: 'Please Enter your passowrd Again'
            },
            message: {
                required: 'Please provide your message'
            }
        }
    });

    $(document).ready(function () {
      var url = window.location;
      $('ul.nav a[href="'+ url +'"]').parent().addClass('active');
      $('ul.nav a').filter(function() {
           return this.href == url;
      }).parent().addClass('active');
    });



});


