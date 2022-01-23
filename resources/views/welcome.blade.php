<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <meta http-equiv="X-UA-Compatible" content="IE=edge">

  <meta name="copyright" content="sixtysixlanka">

  <title>Sixty Six Lanka(Pvt).Ltd</title>


  <link href="{{ asset('/css/maincons.css') }}" rel="stylesheet">
  <link href="{{ asset('/css/theme.css') }}" rel="stylesheet">
  <link href="{{ asset('/css/bootstrap.css') }}" rel="stylesheet">

  <link href="{{ asset('/css/home_page/animate.css') }}" rel="stylesheet">
  <link href="{{ asset('/css/home_page/animate.css') }}" rel="stylesheet">
  <link href="{{ asset('/css/home_page/animate.css') }}" rel="stylesheet">
  <link href="{{ asset('/css/home_page/owl.carousel.css') }}" rel="stylesheet">

  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

</head>
<style>
.dropbtn {
  color: #6C55F9;
  font-size: 16px;
  padding: auto;
  border: none;
  cursor: pointer;
}

.dropbtn:hover, .dropbtn:focus {
  background-color: transparent !important;
}

.dropdown {
  position: relative;
  display: inline-block;
}

.dropdown-content {
  display: none;
  position: absolute;
  background-color: #f1f1f1;
  min-width: 160px;
  overflow: auto;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  z-index: 1;
}

.dropdown-content a {
  color: black;
  padding: 12px 16px;
  text-decoration: none;
  display: block;
}

.dropdown a:hover {
    background-color: #ddd;
}

.show {display: block;}
    :root {
  --primary: #6C55F9;
  --accent: #FF3D85;
  --secondary: #645F88;
  --success: #35bb78;
  --info: #05B4E1;
  --warning: #FAC14D;
  --danger: #FF4943;
  --grey: #B4B2C5;
  --dark: #2D2B3A;
  --light: #F6F5FC;
    }

    @import url("https://fonts.googleapis.com/css2?family=Work+Sans:wght@300;400;500;600;700&display=swap");

    body {
    font-family: "Work Sans", sans-serif;
    line-height: 1.5;
    color: #2D2B3A;
    }

    a {
    color: #6C55F9;
    text-decoration: none;
    background-color: transparent;
    }

    a:hover {
    color: #5641df;
    text-decoration: underline;
    }


    .text-xs {
    font-size: 12px !important;
    }

    .text-sm {
    font-size: 14px !important;
    }

    .text-md {
    font-size: 1rem !important;
    }

    .text-lg {
    font-size: 18px !important;
    }

    .text-xl {
    font-size: 20px !important;
    }

    /* Color systems */
    .bg-primary {
    background-color: #6C55F9 !important;
    }

    a.bg-primary:hover, a.bg-primary:focus {
    background-color: #5d47eb !important;
    }

    .bg-accent {
    background-color: #FF3D85 !important;
    }

    a.bg-accent:hover, a.bg-accent:focus {
    background-color: #e93577 !important;
    }

    .bg-secondary {
    background-color: #645F88 !important;
    }

    a.bg-secondary:hover, a.bg-secondary:focus {
    background-color: #59547c !important;
    }

    .bg-success {
    background-color: #35bb78 !important;
    }

    a.bg-success:hover, a.bg-success:focus {
    background-color: #28a868 !important;
    }

    .bg-info {
    background-color: #05B4E1 !important;
    }

    a.bg-info:hover, a.bg-info:focus {
    background-color: #07a2c8 !important;
    }

    .bg-warning {
    background-color: #FAC14D !important;
    }

    a.bg-warning:hover, a.bg-warning:focus {
    background-color: #ebb039 !important;
    }

    .bg-danger {
    background-color: #FF4943 !important;
    }

    a.bg-danger:hover, a.bg-danger:focus {
    background-color: #e73832 !important;
    }

    .bg-grey {
    background-color: #8e8aad !important;
    }

    a.bg-grey:hover, a.bg-grey:focus {
    background-color: #7d7a99 !important;
    }

    .bg-light {
    background-color: #F6F5FC !important;
    }

    a.bg-light:hover, a.bg-light:focus {
    background-color: #EDECF5 !important;
    }

    .bg-dark {
    background-color: #2D2B3A !important;
    }

    a.bg-dark:hover, a.bg-dark:focus {
    background-color: #1d1b25 !important;
    }

    .text-primary {
    color: #6C55F9 !important;
    }

    a.text-primary:hover, a.text-primary:focus {
    color: #5d47eb !important;
    }

    .text-accent {
    color: #FF3D85 !important;
    }

    a.text-accent:hover, a.text-accent:focus {
    color: #e93577 !important;
    }

    .text-secondary {
    color: #645F88 !important;
    }

    a.text-secondary:hover, a.text-secondary:focus {
    color: #59547c !important;
    }

    .text-success {
    color: #35bb78 !important;
    }

    a.text-success:hover, a.text-success:focus {
    color: #28a868 !important;
    }

    .text-info {
    color: #05B4E1 !important;
    }

    a.text-info:hover, a.text-info:focus {
    color: #07a2c8 !important;
    }

    .text-warning {
    color: #FAC14D !important;
    }

    a.text-warning:hover, a.text-warning:focus {
    color: #ebb039 !important;
    }

    .text-danger {
    color: #FF4943 !important;
    }

    a.text-danger:hover, a.text-danger:focus {
    color: #e73832 !important;
    }

    .text-grey {
    color: #8e8aad !important;
    }

    a.text-grey:hover, a.text-grey:focus {
    color: #7d7a99 !important;
    }

    .text-light {
    color: #F6F5FC !important;
    }

    a.text-light:hover, a.text-light:focus {
    color: #EDECF5 !important;
    }

    .text-dark {
    color: #2D2B3A !important;
    }

    a.text-dark:hover, a.text-dark:focus {
    color: #1d1b25 !important;
    }

    .text-body {
    color: #3f3d4d !important;
    }


    .border {
    border-color: #e9e8f5 !important;
    }

    .border-top {
    border-top-color: #e9e8f5 !important;
    }

    .border-right {
    border-right-color: #e9e8f5 !important;
    }

    .border-bottom {
    border-bottom-color: #e9e8f5 !important;
    }

    .border-left {
    border-left-color: #e9e8f5 !important;
    }

    .border-primary {
    border-color: #6C55F9 !important;
    }

    .border-accent {
    border-color: #FF3D85 !important;
    }

    .border-secondary {
    border-color: #645F88 !important;
    }

    .border-success {
    border-color: #35bb78 !important;
    }

    .border-info {
    border-color: #05B4E1 !important;
    }

    .border-warning {
    border-color: #FAC14D !important;
    }

    .border-danger {
    border-color: #FF4943 !important;
    }

    .border-grey {
    border-color: #B4B2C5 !important;
    }

    .border-light {
    border-color: #F6F5FC !important;
    }

    .border-dark {
    border-color: #2D2B3A !important;
    }

    /* Social Color */
    .bg-facebook,
    .bg-hover-facebook:hover,
    .bg-focus-facebook:focus {
    background-color: #3B5999 !important;
    }

    .bg-twitter,
    .bg-hover-twitter:hover,
    .bg-focus-twitter:focus {
    background-color: #1DA1F2 !important;
    }

    .bg-google-plus,
    .bg-hover-google-plus:hover,
    .bg-focus-google-plus:focus {
    background-color: #DB4437 !important;
    }

    .bg-youtube,
    .bg-hover-youtube:hover,
    .bg-focus-youtube:focus {
    background-color: #CD201F !important;
    }

    .bg-dribbble,
    .bg-hover-dribbble:hover,
    .bg-focus-dribbble:focus {
    background-color: #EA4C89 !important;
    }

    .bg-pinterest,
    .bg-hover-pinterest:hover,
    .bg-focus-pinterest:focus {
    background-color: #BD081C !important;
    }

    .bg-slack,
    .bg-hover-slack:hover,
    .bg-focus-slack:focus {
    background-color: #3AAF85 !important;
    }

    .bg-linkedin,
    .bg-hover-linkedin:hover,
    .bg-focus-linkedin:focus {
    background-color: #0077B5 !important;
    }

    .fg-facebook,
    .fg-hover-facebook:hover,
    .fg-focus-facebook:focus {
    color: #3B5999 !important;
    }

    .fg-twitter,
    .fg-hover-twitter:hover,
    .fg-focus-twitter:focus {
    color: #1DA1F2 !important;
    }

    .fg-google-plus,
    .fg-hover-google-plus:hover,
    .fg-focus-google-plus:focus {
    color: #DB4437 !important;
    }

    .fg-youtube,
    .fg-hover-youtube:hover,
    .fg-focus-youtube:focus {
    color: #CD201F !important;
    }

    .fg-dribbble,
    .fg-hover-dribbble:hover,
    .fg-focus-dribbble:focus {
    color: #EA4C89 !important;
    }

    .fg-pinterest,
    .fg-hover-pinterest:hover,
    .fg-focus-pinterest:focus {
    color: #BD081C !important;
    }

    .fg-slack,
    .fg-hover-slack:hover,
    .fg-focus-slack:focus {
    color: #3AAF85 !important;
    }

    .fg-linkedin,
    .fg-hover-linkedin:hover,
    .fg-focus-linkedin:focus {
    color: #0077B5 !important;
    }

    .btn.social-facebook {
    background-color: #3B5999;
    color: #fff;
    }

    .btn.social-facebook:hover,
    .btn.social-facebook:focus {
    background-color: #314e8f;
    color: #fff;
    }

    .btn.social-twitter {
    background-color: #1DA1F2;
    color: #fff;
    }

    .btn.social-twitter:hover,
    .btn.social-twitter:focus {
    background-color: #0d92e4;
    color: #fff;
    }

    .btn.social-linkedin {
    background-color: #0077B5;
    color: #fff;
    }

    .btn.social-linkedin:hover,
    .btn.social-linkedin:focus {
    background-color: #02659b;
    color: #fff;
    }

    .btn.google-plus {
    background-color: #DB4437;
    color: #fff;
    }

    .btn.google-plus:hover,
    .btn.google-plus:focus {
    background-color: #ca3224;
    color: #fff;
    }


    /* Buttons */
    .btn {
    transition: all .2s ease;
    }

    .btn:focus {
    box-shadow: none !important;
    }

    .btn-primary {
    color: #fff;
    background-color: #6C55F9;
    border-color: transparent;
    }

    .btn-primary.disabled, .btn-primary:disabled {
    color: #fff;
    background-color: #5d47eb;
    border-color: transparent;
    }

    .btn-primary:not(:disabled):not(.disabled):active, .btn-primary:not(:disabled):not(.disabled).active,
    .show > .btn-primary.dropdown-toggle {
    color: #fff;
    background-color: #6C55F9;
    border-color: #5d47eb;
    }

    .btn-primary:not(:disabled):not(.disabled):active:focus, .btn-primary:not(:disabled):not(.disabled).active:focus,
    .show > .btn-primary.dropdown-toggle:focus {
    box-shadow: none;
    }

    .btn-accent {
    color: #fff;
    background-color: #FF3D85;
    border-color: transparent;
    }

    .btn-accent.disabled, .btn-accent:disabled {
    color: #fff;
    background-color: #e93577;
    border-color: transparent;
    }

    .btn-accent:not(:disabled):not(.disabled):active, .btn-accent:not(:disabled):not(.disabled).active,
    .show > .btn-accent.dropdown-toggle {
    color: #fff;
    background-color: #FF3D85;
    border-color: #e93577;
    }

    .btn-accent:not(:disabled):not(.disabled):active:focus, .btn-accent:not(:disabled):not(.disabled).active:focus,
    .show > .btn-accent.dropdown-toggle:focus {
    box-shadow: none;
    }

    .btn-secondary {
    color: #fff;
    background-color: #645F88;
    border-color: transparent;
    }

    .btn-secondary.disabled, .btn-secondary:disabled {
    color: #fff;
    background-color: #59547c;
    border-color: transparent;
    }

    .btn-secondary:not(:disabled):not(.disabled):active, .btn-secondary:not(:disabled):not(.disabled).active,
    .show > .btn-secondary.dropdown-toggle {
    color: #fff;
    background-color: #645F88;
    border-color: #59547c;
    }

    .btn-secondary:not(:disabled):not(.disabled):active:focus, .btn-secondary:not(:disabled):not(.disabled).active:focus,
    .show > .btn-secondary.dropdown-toggle:focus {
    box-shadow: none;
    }

    .btn-success {
    color: #fff;
    background-color: #35bb78;
    border-color: transparent;
    }

    .btn-success.disabled, .btn-success:disabled {
    color: #fff;
    background-color: #28a868;
    border-color: transparent;
    }

    .btn-success:not(:disabled):not(.disabled):active, .btn-success:not(:disabled):not(.disabled).active,
    .show > .btn-success.dropdown-toggle {
    color: #fff;
    background-color: #35bb78;
    border-color: #28a868;
    }

    .btn-success:not(:disabled):not(.disabled):active:focus, .btn-success:not(:disabled):not(.disabled).active:focus,
    .show > .btn-success.dropdown-toggle:focus {
    box-shadow: none;
    }

    .btn-info {
    color: #fff;
    background-color: #05B4E1;
    border-color: transparent;
    }

    .btn-info.disabled, .btn-info:disabled {
    color: #fff;
    background-color: #07a2c8;
    border-color: transparent;
    }

    .btn-info:not(:disabled):not(.disabled):active, .btn-info:not(:disabled):not(.disabled).active,
    .show > .btn-info.dropdown-toggle {
    color: #fff;
    background-color: #05B4E1;
    border-color: #07a2c8;
    }

    .btn-info:not(:disabled):not(.disabled):active:focus, .btn-info:not(:disabled):not(.disabled).active:focus,
    .show > .btn-info.dropdown-toggle:focus {
    box-shadow: none;
    }

    .btn-warning {
    color: #343531;
    background-color: #FAC14D;
    border-color: transparent;
    }

    .btn-warning.disabled, .btn-warning:disabled {
    color: #343531;
    background-color: #ebb039;
    border-color: transparent;
    }

    .btn-warning:not(:disabled):not(.disabled):active, .btn-warning:not(:disabled):not(.disabled).active,
    .show > .btn-warning.dropdown-toggle {
    color: #343531;
    background-color: #FAC14D;
    border-color: #ebb039;
    }

    .btn-warning:not(:disabled):not(.disabled):active:focus, .btn-warning:not(:disabled):not(.disabled).active:focus,
    .show > .btn-warning.dropdown-toggle:focus {
    box-shadow: none;
    }

    .btn-danger {
    color: #fff;
    background-color: #FF4943;
    border-color: transparent;
    }

    .btn-danger.disabled, .btn-danger:disabled {
    color: #fff;
    background-color: #e73832;
    border-color: transparent;
    }

    .btn-danger:not(:disabled):not(.disabled):active, .btn-danger:not(:disabled):not(.disabled).active,
    .show > .btn-danger.dropdown-toggle {
    color: #fff;
    background-color: #FF4943;
    border-color: #e73832;
    }

    .btn-danger:not(:disabled):not(.disabled):active:focus, .btn-danger:not(:disabled):not(.disabled).active:focus,
    .show > .btn-danger.dropdown-toggle:focus {
    box-shadow: none;
    }

    .btn-light {
    color: #8e8aad;
    background-color: #F5F9F6;
    border-color: transparent;
    }

    .btn-light:hover {
    color: #8e8aad;
    background-color: #F6F5FC;
    border-color: transparent;
    }

    .btn-light:focus, .btn-light.focus {
    color: #8e8aad;
    background-color: #d5dfdc;
    border-color: transparent;
    box-shadow: none;
    }

    .btn-light.disabled, .btn-light:disabled {
    color: #8e8aad;
    background-color: #d0ddd9;
    border-color: transparent;
    }

    .btn-light:not(:disabled):not(.disabled):active, .btn-light:not(:disabled):not(.disabled).active,
    .show > .btn-light.dropdown-toggle {
    color: #8e8aad;
    background-color: #F5F9F6;
    border-color: #d0ddd9;
    }

    .btn-light:not(:disabled):not(.disabled):active:focus, .btn-light:not(:disabled):not(.disabled).active:focus,
    .show > .btn-light.dropdown-toggle:focus {
    box-shadow: none;
    }

    .btn-dark {
    color: #fff;
    background-color: #2D2B3A;
    border-color: transparent;
    }

    .btn-dark.disabled, .btn-dark:disabled {
    color: #fff;
    background-color: #1d1b25;
    border-color: transparent;
    }

    .btn-dark:not(:disabled):not(.disabled):active, .btn-dark:not(:disabled):not(.disabled).active,
    .show > .btn-dark.dropdown-toggle {
    color: #fff;
    background-color: #2D2B3A;
    border-color: #1d1b25;
    }

    .btn-dark:not(:disabled):not(.disabled):active:focus, .btn-dark:not(:disabled):not(.disabled).active:focus,
    .show > .btn-dark.dropdown-toggle:focus {
    box-shadow: none;
    }

    .btn-primary:hover,
    .btn-accent:hover,
    .btn-secondary:hover,
    .btn-success:hover,
    .btn-info:hover,
    .btn-warning:hover,
    .btn-danger:hover,
    .btn-dark:hover {
    color: #fff;
    background-color: #645F88;
    border-color: transparent;
    }

    .btn-primary:focus, .btn-primary.focus,
    .btn-accent:focus, .btn-accent.focus,
    .btn-secondary:focus, .btn-secondary.focus,
    .btn-success:focus, .btn-success.focus,
    .btn-info:focus, .btn-info.focus,
    .btn-warning:focus, .btn-warning.focus,
    .btn-danger:focus, .btn-danger.focus,
    .btn-dark:focus, .btn-dark.focus {
    color: #fff;
    background-color: #8e8aad;
    border-color: transparent;
    box-shadow: none;
    }

    .btn-outline {
    border-color: #D7D5E9;
    color: #645F88;
    }

    .btn-outline:hover {
    background-color: #F6F5FC;
    }

    .btn-outline-primary {
    color: #6C55F9;
    border-color: #6C55F9;
    }

    .btn-outline-primary:hover {
    color: #fff;
    background-color: #6C55F9;
    border-color: #6C55F9;
    }

    .btn-outline-primary:focus, .btn-outline-primary.focus {
    box-shadow: none;
    }

    .btn-outline-primary.disabled, .btn-outline-primary:disabled {
    color: #6C55F9;
    background-color: transparent;
    }

    .btn-outline-primary:not(:disabled):not(.disabled):active, .btn-outline-primary:not(:disabled):not(.disabled).active,
    .show > .btn-outline-primary.dropdown-toggle {
    color: #fff;
    background-color: #6C55F9;
    border-color: #6C55F9;
    }

    .btn-outline-primary:not(:disabled):not(.disabled):active:focus, .btn-outline-primary:not(:disabled):not(.disabled).active:focus,
    .show > .btn-outline-primary.dropdown-toggle:focus {
    box-shadow: none;
    }

    .btn-outline-accent {
    color: #FF3D85;
    border-color: #FF3D85;
    }

    .btn-outline-accent:hover {
    color: #fff;
    background-color: #FF3D85;
    border-color: #FF3D85;
    }

    .btn-outline-accent:focus, .btn-outline-accent.focus {
    box-shadow: none;
    }

    .btn-outline-accent.disabled, .btn-outline-accent:disabled {
    color: #FF3D85;
    background-color: transparent;
    }

    .btn-outline-accent:not(:disabled):not(.disabled):active, .btn-outline-accent:not(:disabled):not(.disabled).active,
    .show > .btn-outline-accent.dropdown-toggle {
    color: #fff;
    background-color: #FF3D85;
    border-color: #FF3D85;
    }

    .btn-outline-accent:not(:disabled):not(.disabled):active:focus, .btn-outline-accent:not(:disabled):not(.disabled).active:focus,
    .show > .btn-outline-accent.dropdown-toggle:focus {
    box-shadow: none;
    }

    .btn-outline-secondary {
    color: #645F88;
    border-color: #645F88;
    }

    .btn-outline-secondary:hover {
    color: #fff;
    background-color: #645F88;
    border-color: #645F88;
    }

    .btn-outline-secondary:focus, .btn-outline-secondary.focus {
    box-shadow: none;
    }

    .btn-outline-secondary.disabled, .btn-outline-secondary:disabled {
    color: #645F88;
    background-color: transparent;
    }

    .btn-outline-secondary:not(:disabled):not(.disabled):active, .btn-outline-secondary:not(:disabled):not(.disabled).active,
    .show > .btn-outline-secondary.dropdown-toggle {
    color: #fff;
    background-color: #645F88;
    border-color: #645F88;
    }

    .btn-outline-secondary:not(:disabled):not(.disabled):active:focus, .btn-outline-secondary:not(:disabled):not(.disabled).active:focus,
    .show > .btn-outline-secondary.dropdown-toggle:focus {
    box-shadow: none;
    }

    .btn-outline-success {
    color: #35bb78;
    border-color: #35bb78;
    }

    .btn-outline-success:hover {
    color: #fff;
    background-color: #35bb78;
    border-color: #35bb78;
    }

    .btn-outline-success:focus, .btn-outline-success.focus {
    box-shadow: none;
    }

    .btn-outline-success.disabled, .btn-outline-success:disabled {
    color: #35bb78;
    background-color: transparent;
    }

    .btn-outline-success:not(:disabled):not(.disabled):active, .btn-outline-success:not(:disabled):not(.disabled).active,
    .show > .btn-outline-success.dropdown-toggle {
    color: #fff;
    background-color: #35bb78;
    border-color: #35bb78;
    }

    .btn-outline-success:not(:disabled):not(.disabled):active:focus, .btn-outline-success:not(:disabled):not(.disabled).active:focus,
    .show > .btn-outline-success.dropdown-toggle:focus {
    box-shadow: none;
    }

    .btn-outline-info {
    color: #05B4E1;
    border-color: #05B4E1;
    }

    .btn-outline-info:hover {
    color: #fff;
    background-color: #05B4E1;
    border-color: #05B4E1;
    }

    .btn-outline-info:focus, .btn-outline-info.focus {
    box-shadow: none;
    }

    .btn-outline-info.disabled, .btn-outline-info:disabled {
    color: #05B4E1;
    background-color: transparent;
    }

    .btn-outline-info:not(:disabled):not(.disabled):active, .btn-outline-info:not(:disabled):not(.disabled).active,
    .show > .btn-outline-info.dropdown-toggle {
    color: #fff;
    background-color: #05B4E1;
    border-color: #05B4E1;
    }

    .btn-outline-info:not(:disabled):not(.disabled):active:focus, .btn-outline-info:not(:disabled):not(.disabled).active:focus,
    .show > .btn-outline-info.dropdown-toggle:focus {
    box-shadow: none;
    }

    .btn-outline-warning {
    color: #FAC14D;
    border-color: #FAC14D;
    }

    .btn-outline-warning:hover {
    color: #212529;
    background-color: #FAC14D;
    border-color: #FAC14D;
    }

    .btn-outline-warning:focus, .btn-outline-warning.focus {
    box-shadow: none;
    }

    .btn-outline-warning.disabled, .btn-outline-warning:disabled {
    color: #FAC14D;
    background-color: transparent;
    }

    .btn-outline-warning:not(:disabled):not(.disabled):active, .btn-outline-warning:not(:disabled):not(.disabled).active,
    .show > .btn-outline-warning.dropdown-toggle {
    color: #212529;
    background-color: #FAC14D;
    border-color: #FAC14D;
    }

    .btn-outline-warning:not(:disabled):not(.disabled):active:focus, .btn-outline-warning:not(:disabled):not(.disabled).active:focus,
    .show > .btn-outline-warning.dropdown-toggle:focus {
    box-shadow: none;
    }

    .btn-outline-danger {
    color: #FF4943;
    border-color: #FF4943;
    }

    .btn-outline-danger:hover {
    color: #fff;
    background-color: #FF4943;
    border-color: #FF4943;
    }

    .btn-outline-danger:focus, .btn-outline-danger.focus {
    box-shadow: none;
    }

    .btn-outline-danger.disabled, .btn-outline-danger:disabled {
    color: #FF4943;
    background-color: transparent;
    }

    .btn-outline-danger:not(:disabled):not(.disabled):active, .btn-outline-danger:not(:disabled):not(.disabled).active,
    .show > .btn-outline-danger.dropdown-toggle {
    color: #fff;
    background-color: #FF4943;
    border-color: #FF4943;
    }

    .btn-outline-danger:not(:disabled):not(.disabled):active:focus, .btn-outline-danger:not(:disabled):not(.disabled).active:focus,
    .show > .btn-outline-danger.dropdown-toggle:focus {
    box-shadow: none;
    }

    .btn-outline-light {
    color: #F6F5FC;
    border-color: #F6F5FC;
    }

    .btn-outline-light:hover {
    color: #343531;
    background-color: #F6F5FC;
    border-color: #F6F5FC;
    }

    .btn-outline-light:focus, .btn-outline-light.focus {
    box-shadow: none;
    }

    .btn-outline-light.disabled, .btn-outline-light:disabled {
    color: #F6F5FC;
    background-color: transparent;
    }

    .btn-outline-light:not(:disabled):not(.disabled):active, .btn-outline-light:not(:disabled):not(.disabled).active,
    .show > .btn-outline-light.dropdown-toggle {
    color: #343531;
    background-color: #F6F5FC;
    border-color: #F6F5FC;
    }

    .btn-outline-light:not(:disabled):not(.disabled):active:focus, .btn-outline-light:not(:disabled):not(.disabled).active:focus,
    .show > .btn-outline-light.dropdown-toggle:focus {
    box-shadow: none;
    }

    .btn-outline-dark {
    color: #2D2B3A;
    border-color: #2D2B3A;
    }

    .btn-outline-dark:hover {
    color: #fff;
    background-color: #2D2B3A;
    border-color: #2D2B3A;
    }

    .btn-outline-dark:focus, .btn-outline-dark.focus {
    box-shadow: none;
    }

    .btn-outline-dark.disabled, .btn-outline-dark:disabled {
    color: #2D2B3A;
    background-color: transparent;
    }

    .btn-outline-dark:not(:disabled):not(.disabled):active, .btn-outline-dark:not(:disabled):not(.disabled).active,
    .show > .btn-outline-dark.dropdown-toggle {
    color: #fff;
    background-color: #2D2B3A;
    border-color: #2D2B3A;
    }

    .btn-outline-dark:not(:disabled):not(.disabled):active:focus, .btn-outline-dark:not(:disabled):not(.disabled).active:focus,
    .show > .btn-outline-dark.dropdown-toggle:focus {
    box-shadow: none;
    }

    .btn-link {
    font-weight: 400;
    color: #5d47eb;
    text-decoration: none;
    }

    .btn-link:hover {
    color: #5641df;
    text-decoration: underline;
    }

    .btn-link:focus, .btn-link.focus {
    text-decoration: underline;
    }

    .btn-link:disabled, .btn-link.disabled {
    color: #645F88;
    pointer-events: none;
    }


    .btn {
    padding: 8px 24px;
    }

    .breadcrumb {
    font-weight: 500;
    background-color: #f8f9fa;
    }

    .breadcrumb .breadcrumb-item.active {
    color: #8e8aad;
    }

    .breadcrumb .breadcrumb-item + .breadcrumb-item::before {
    color: #8e8aad;
    }

    .breadcrumb-dark .breadcrumb-item a {
    color: #6C55F9;
    }

    .breadcrumb-dark .breadcrumb-item a:hover {
    color: #6C55F9;
    text-decoration: none;
    }

    .breadcrumb-dark .breadcrumb-item + .breadcrumb-item::before {
    display: inline-block;
    padding-right: 0.5rem;
    color: rgba(255, 255, 255, 0.8);
    content: "/";
    }

    .breadcrumb-dark .breadcrumb-item.active {
    color: rgba(255, 255, 255, 0.8);
    }


    .navbar {
    min-height: 70px;
    z-index: 1000;
    }

    .navbar-float {
    position: absolute;
    top: 20px;
    left: 0;
    width: 100%;
    background-color: #fff;
    box-shadow: 0 2px 6px rgba(100, 95, 136, 0.15);
    z-index: 1070;
    }

    .navbar.sticky {
    z-index: 1080;
    }

    .navbar.sticky.fixed ~ * {
    margin-top: 70px;
    }

    .navbar.sticky.fixed {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    animation: navTransition .5s ease;
    box-shadow: 0 2px 6px rgba(100, 95, 136, 0.15);
    z-index: 1080;
    }

    @keyframes navTransition {
    from {
        top: -100%;
    }
    to {
        top: 0;
    }
    }

    .navbar-brand {
    font-weight: 600;
    padding-top: 10px;
    padding-bottom: 10px;
    }

    .navbar-nav {
    margin-top: 10px;
    border-top: 1px solid #e4e7ee;
    flex-shrink: 0;
    }

    .navbar-nav .nav-link {
    transition: all .2s ease;
    }

    .navbar-nav .btn {
    font-size: 14px;
    }

    .navbar-light .navbar-nav .nav-link {
    color: rgba(100, 95, 136, 0.75);
    }

    .navbar-light .navbar-nav .nav-link:hover, .navbar-light .navbar-nav .nav-link:focus {
    color: #645F88;
    }

    .navbar-light .navbar-nav .show > .nav-link,
    .navbar-light .navbar-nav .active > .nav-link,
    .navbar-light .navbar-nav .nav-link.show,
    .navbar-light .navbar-nav .nav-link.active {
    font-weight: 500;
    color: #6C55F9;
    }


    @media (min-width: 576px) {
    .navbar-expand-sm .navbar-nav {
        margin-top: 0;
        border-top: none;
    }
    .navbar-expand-sm .navbar-nav .nav-link {
        padding-right: 16px;
        padding-left: 16px;
    }
    .navbar-expand-sm .navbar-nav {
        align-items: center;
    }
    }

    @media (min-width: 768px) {
    .navbar-expand-md .navbar-nav {
        margin-top: 0;
        border-top: none;
    }
    .navbar-expand-md .navbar-nav .nav-link {
        padding-right: 16px;
        padding-left: 16px;
    }
    .navbar-expand-md .navbar-nav {
        align-items: center;
    }
    }

    @media (min-width: 992px) {
    .navbar-expand-lg .navbar-nav {
        margin-top: 0;
        border-top: none;
    }
    .navbar-expand-lg .navbar-nav .nav-link {
        padding-right: 16px;
        padding-left: 16px;
    }
    .navbar-expand-lg .navbar-nav {
        align-items: center;
    }
    }

    @media (min-width: 1200px) {
    .navbar-expand-xl .navbar-nav {
        margin-top: 0;
        border-top: none;
    }
    .navbar-expand-xl .navbar-nav .nav-link {
        padding-right: 16px;
        padding-left: 16px;
    }
    .navbar-expand-xl .navbar-nav {
        align-items: center;
    }
    }

    .form-control {
    padding: 8px 15px;
    height: calc(1.5em + 1.375rem + 2px);
    border-color: #d6dbd9;
    }

    .custom-select {
    height: calc(1.5em + 1.375rem + 2px);
    }

    .page-link {
    margin-left: 5px;
    min-width: 40px;
    color: #B4B2C5;
    border: 1px solid #dee1e6;
    text-align: center;
    border-radius: 4px;
    }

    .page-link:hover {
    color: #645F88;
    background-color: #F6F5FC;
    border-color: #dee1e6;
    }

    .page-link:focus {
    box-shadow: none;
    }

    .page-item.active .page-link {
    z-index: 3;
    color: #fff;
    background-color: #6C55F9;
    border-color: #4330c2;
    }

    .page-item.disabled .page-link {
    color: #645F88;
    pointer-events: none;
    cursor: auto;
    background-color: #fff;
    border-color: #dee2e6;
    }

    .pagination-lg .page-link {
    padding: 0.75rem 1.5rem;
    font-size: 1.25rem;
    line-height: 1.5;
    }

    .pagination-lg .page-item:first-child .page-link {
    border-top-left-radius: 0.3rem;
    border-bottom-left-radius: 0.3rem;
    }

    .pagination-lg .page-item:last-child .page-link {
    border-top-right-radius: 0.3rem;
    border-bottom-right-radius: 0.3rem;
    }

    .pagination-sm .page-link {
    padding: 0.25rem 0.5rem;
    font-size: 0.875rem;
    line-height: 1.5;
    }

    .pagination-sm .page-item:first-child .page-link {
    border-top-left-radius: 0.2rem;
    border-bottom-left-radius: 0.2rem;
    }

    .pagination-sm .page-item:last-child .page-link {
    border-top-right-radius: 0.2rem;
    border-bottom-right-radius: 0.2rem;
    }


    .img-place {
    position: relative;
    display: block;
    margin: 0 auto;
    width: 100%;
    height: 100%;
    text-align: center;
    overflow: hidden;
    }

    .img-place img {
    width: auto;
    max-width: 100%;
    height: auto;
    }

    .bg-image {
    position: relative;
    background-position: center center;
    background-size: cover;
    background-repeat: no-repeat;
    }

    .bg-image > * {
    position: relative;
    z-index: 10;
    }

    .bg-image-parallax {
    background-attachment: fixed;
    }

    .bg-image-overlay-dark {
    position: relative;
    }

    .bg-image-overlay-dark::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    opacity: 0.6;
    background-color: #343531;
    }

    .bg-size-50 {
    background-size: 50% 50%;
    }

    .bg-size-75 {
    background-size: 75% 75%;
    }

    .bg-size-100 {
    background-size: 100% 100%;
    }

    .avatar {
    display: inline-flex;
    flex-direction: row;
    align-items: center;
    }

    .avatar-img {
    margin-right: 6px;
    width: 32px;
    height: 32px;
    border-radius: 50%;
    overflow: hidden;
    }

    .avatar-img img {
    width: 100%;
    height: 100%;
    }

    .back-to-top {
    position: fixed;
    bottom: 20px;
    right: 25px;
    width: 50px;
    height: 50px;
    border-radius: 50%;
    background: rgba(224, 223, 233, 0.7);
    visibility: hidden;
    cursor: pointer;
    transition: all .2s ease;
    z-index: 1100;
    }

    .back-to-top::after {
    content: "";
    position: absolute;
    top: 50%;
    left: 0;
    right: 0;
    margin: -4px auto;
    width: 12px;
    height: 12px;
    border-top: 2px solid #555;
    border-right: 2px solid #555;
    -webkit-transform: rotate(-45deg);
        -moz-transform: rotate(-45deg);
            transform: rotate(-45deg);
    }

    .back-to-top:hover {
    background: #6C55F9;
    }

    .back-to-top:hover::after {
    border-color: #fff;
    }


    .page-section {
    position: relative;
    padding-top: 80px;
    padding-bottom: 80px;
    background-color: #fff;
    overflow: hidden;
    }

    .page-section p {
    color: #898798;
    }


    .page-banner {
    position: relative;
    margin-top: 16px;
    margin-bottom: 16px;
    height: 320px;
    background-color: #F6F5FC;
    color: #645F88;
    border-radius: 30px;
    }

    .page-banner.home-banner {
    margin-top: 100px;
    height: auto;
    background-color: #fff;
    border-radius: 0;
    }

    .page-banner.home-banner h1 {
    color: #2D2B3A;
    }

    .page-banner.home-banner .img-place {
    max-width: 400px;
    margin: 0 auto;
    }

    .page-banner.home-banner .btn-scroll {
    position: absolute;
    bottom: -14px;
    left: 0;
    right: 0;
    margin: auto;
    width: 26px;
    height: 40px;
    line-height: 44px;
    background-color: #fff;
    color: #645F88;
    text-align: center;
    border-radius: 40px;
    box-shadow: 0 2px 6px rgba(100, 95, 136, 0.24);
    transition: all .2s ease;
    }

    .page-banner.home-banner .btn-scroll:hover {
    text-decoration: none;
    background-color: #6C55F9;
    color: #fff;
    }

    @media (min-width: 768px) {
    .page-banner.home-banner {
        height: 600px;
    }
    }

    @media (min-width: 992px) {
    .page-banner.home-banner {
        margin-top: 0;
    }
    }

    .page-hero.overlay-dark::before,
    .page-banner.overlay-dark::before {
    content: "";
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: rgba(52, 53, 49, 0.7);
    z-index: 1;
    }

    .page-banner .breadcrumb-item,
    .page-banner .breadcrumb-item a {
    font-size: 14px;
    }

    .home-banner .row > *:first-child {
    padding-left: 8%;
    }

    .subhead {
    display: block;
    text-transform: uppercase;
    letter-spacing: 3px;
    color: #898798;
    font-weight: 500;
    margin-bottom: 8px;
    }

    .title-section {
    max-width: 450px;
    color: #2D2B3A;
    font-weight: 600;
    }

    .title-section .marked {
    position: relative;
    color: #6C55F9;
    }

    .title-section .marked::before {
    content: '';
    position: absolute;
    bottom: 4px;
    left: 0;
    width: 100%;
    height: 8px;
    background-color: #d3ccff;
    z-index: -1;
    }

    .text-center .title-section {
    margin-left: auto;
    margin-right: auto;
    }

    .divider {
    display: block;
    margin-top: 16px;
    margin-bottom: 32px;
    width: 32px;
    height: 3px;
    border-radius: 40px;
    background-color: #6C55F9;
    }



    .btn-split {
    display: inline-flex;
    align-items: center;
    border-radius: 40px;
    padding-top: 6px;
    padding-bottom: 6px;
    padding-right: 6px;
    }

    .btn-split .fab {
    display: inline-block;
    margin-left: 12px;
    width: 30px;
    height: 30px;
    border-radius: 50%;
    line-height: 32px;
    text-align: center;
    background-color: #fff;
    color: #6C55F9;
    }


    .card-service {
    display: block;
    margin: 16px auto;
    padding: 32px 20px;
    max-width: 300px;
    text-align: center;
    color: #898798;
    border-radius: 8px;
    box-shadow: 0 3px 12px rgba(95, 92, 120, 0.12);
    }

    .card-service .header {
    margin-bottom: 24px;
    }

    .img-stack-element {
    position: relative;
    text-align: center;
    }

    .img-stack-element svg {
    display: inline-block;
    max-width: 460px;
    }

    @media (min-width: 992px) {
    .img-stack-element {
        transform: translateX(50px);
    }
    }


    .features {
    padding-top: 50px;
    padding-bottom: 50px;
    border-top: 1px solid #e9e8f5;
    border-bottom: 1px solid #e9e8f5;
    }

    .features .container {
    max-width: 980px;
    }

    .features h5 {
    color: #2D2B3A;
    }

    .features p {
    font-size: 13px;
    color: #898798;
    }


    .counter-section .row > *:first-child {
    border-radius: 6px 0 0 6px;
    }

    .counter-section .row > *:last-child {
    border-radius: 0 6px 6px 0;
    }

    .counter-section .row > * {
    padding-top: 64px;
    padding-bottom: 64px;
    border: 1px solid #e9e8f5;
    margin-left: -1px;
    }

    .counter-section p {
    margin-bottom: 6px;
    color: #B4B2C5;
    }


    .card-pricing {
    position: relative;
    display: block;
    margin: 0 auto;
    padding: 32px 20px;
    max-width: 300px;
    border: 1px solid #e9e8f5;
    border-radius: 6px;
    text-align: center;
    overflow: hidden;
    }

    .card-pricing .price-labled {
    position: absolute;
    top: 16px;
    right: -30px;
    width: 120px;
    height: 26px;
    line-height: 26px;
    background-color: #0ac7f6;
    color: #fff;
    transform: rotate(45deg);
    }

    .card-pricing .header {
    color: #B4B2C5;
    }

    .card-pricing .price-icon {
    font-size: 75px;
    line-height: 1;
    }

    .card-pricing .price-title {
    text-transform: uppercase;
    letter-spacing: 3px;
    font-size: 20px;
    }

    .card-pricing .price-tag .currency {
    display: inline-block;
    transform: translateY(-30px);
    }

    .card-pricing .price-tag .currency,
    .card-pricing .price-tag .period {
    font-weight: 600;
    font-size: 14px;
    }

    .card-pricing .price-tag h2 {
    display: inline-block;
    }

    .card-pricing.active {
    background-color: #6C55F9;
    border-color: #5d47eb;
    }

    .card-pricing.active .header {
    color: rgba(255, 255, 255, 0.5);
    }

    .card-pricing.active .price-title {
    color: #FAC14D;
    }

    .card-pricing.active .price-tag {
    color: #fff;
    }

    .card-pricing.active .price-info p {
    color: rgba(255, 255, 255, 0.75);
    }

    .card-pricing.active .btn-outline {
    color: #fff;
    }

    .card-pricing.active .btn-outline:hover {
    color: #6C55F9;
    }



    .card-blog {
    position: relative;
    display: block;
    margin: 0 auto;
    padding: 32px 20px 70px 20px;
    max-width: 260px;
    min-height: 270px;
    border-radius: 6px;
    box-shadow: 0 2px 6px rgba(100, 95, 136, 0.16);
    }

    .card-blog .header {
    margin-bottom: 16px;
    }

    .card-blog .avatar {
    position: relative;
    display: inline-block;
    margin-right: 6px;
    width: 44px;
    height: 44px;
    border-radius: 50%;
    background-color: #d3d0e4;
    overflow: hidden;
    }

    .card-blog .avatar img {
    width: 100%;
    height: 100%;
    }

    .card-blog .entry-footer {
    display: inline-block;
    vertical-align: top;
    }

    .card-blog .post-author {
    font-weight: 500;
    color: #645F88;
    }

    .card-blog .post-date {
    font-size: 13px;
    color: #B4B2C5;
    }

    .card-blog .post-title {
    margin-bottom: 8px;
    font-size: 18px;
    }

    .card-blog .post-title a {
    font-weight: 500;
    color: #2D2B3A;
    }

    .card-blog .post-excerpt {
    font-size: 14px;
    color: #898798;
    }

    .card-blog .footer {
    position: absolute;
    bottom: 20px;
    left: 20px;
    }

    .card-blog-row *:first-child .card-blog {
    background-color: #6C55F9;
    }

    .card-blog-row *:first-child .card-blog .post-author,
    .card-blog-row *:first-child .card-blog .post-title a,
    .card-blog-row *:first-child .card-blog .footer a {
    color: #fff;
    }

    .card-blog-row *:first-child .card-blog .post-date {
    color: rgba(255, 255, 255, 0.6);
    }

    .form-search-blog .custom-select {
    border-top-right-radius: 0;
    border-bottom-right-radius: 0;
    }

    .testi-image {
    position: relative;
    display: block;
    margin: 0 auto;
    width: 300px;
    height: 280px;
    background-color: #645F88;
    border-radius: 8px;
    overflow: hidden;
    }

    .testi-image img {
    width: 100%;
    height: auto;
    }

    .testi-content {
    font-size: 20px;
    }

    .testi-content .entry-footer {
    margin-top: 24px;
    font-size: 15px;
    }

    .client-section {
    padding: 64px 0;
    background-color: #F6F5FC;
    }

    .client-section .item {
    padding: 16px 0;
    text-align: center;
    }

    .contact-list {
    position: relative;
    padding-left: 0;
    list-style: none;
    }

    .contact-list li {
    margin-bottom: 12px;
    }

    .contact-list .icon {
    display: inline-block;
    margin-right: 6px;
    width: 40px;
    height: 40px;
    line-height: 40px;
    border-radius: 50%;
    text-align: center;
    border: 1px solid #D7D5E9;
    color: #6C55F9;
    }

    .contact-list .content {
    display: inline-block;
    color: #8e8aad;
    }

    .contact-list .content a {
    color: #8e8aad;
    }


    .page-footer {
    position: relative;
    display: block;
    padding-top: 80px;
    padding-bottom: 16px;
    background-color: #fff;
    border-top: 1px solid #e9e8f5;
    }

    .page-footer p a {
    transition: color .2s ease;
    }

    .page-footer h3,
    .page-footer h4,
    .page-footer h5 {
    color: #645F88;
    margin-bottom: 24px;
    font-weight: 600;
    }

    .page-footer p {
    color: #898798;
    }

    .footer-menu {
    position: relative;
    padding-left: 0;
    list-style: none;
    }

    .footer-menu li {
    margin-bottom: 12px;
    }

    .footer-link {
    display: inline-block;
    padding: 6px 0;
    }

    .footer-menu a,
    .footer-link {
    color: #898798;
    }

    .footer-menu a:hover,
    .footer-link:hover {
    color: #6C55F9;
    text-decoration: none;
    }

    .sosmed-button a {
    display: inline-block;
    width: 40px;
    height: 40px;
    line-height: 44px;
    text-align: center;
    border-radius: 50%;
    background-color: #F6F5FC;
    color: #898798;
    transition: all .2s linear;
    }

    .sosmed-button a:hover {
    background-color: #6C55F9;
    color: #fff;
    text-decoration: none;
    transform: rotate(360deg);
    }


    .blog-single-wrap {
    display: block;
    padding: 50px 0;
    }

    .blog-single-wrap .header {
    margin-bottom: 32px;
    background-color: #fff;
    border-radius: 6px;
    box-shadow: 0 2px 12px rgba(100, 95, 136, 0.2);
    overflow: hidden;
    }

    .blog-single-wrap .header .post-thumb {
    width: 100%;
    height: 250px;
    background-color: #F6F5FC;
    overflow: hidden;
    }

    .blog-single-wrap .header .post-thumb img {
    width: 100%;
    }

    .blog-single-wrap .header .meta-header {
    display: flex;
    flex-direction: row;
    align-items: baseline;
    justify-content: space-between;
    padding-left: 32px;
    padding-right: 32px;
    height: 50px;
    transform: translateY(-48px);
    }

    .blog-single-wrap .header .post-author .avatar {
    width: 80px;
    height: 80px;
    border-radius: 50%;
    border: 4px solid #fff;
    background-color: #fff;
    overflow: hidden;
    box-shadow: 0 2px 6px rgba(137, 135, 152, 0.4);
    transform: translateY(10px);
    }

    .blog-single-wrap .header .post-author .avatar img {
    width: 100%;
    height: 100%;
    }

    .blog-single-wrap .header .post-sharer a  {
    padding: 5px 10px;
    line-height: 1;
    box-shadow: none !important;
    }

    .blog-single-wrap .header .post-sharer a[class='btn'] {
    background-color: #ec9d1e;
    color: #fff;
    }

    .blog-single-wrap .header .post-sharer a[class='btn']:hover {
    background-color: #d88d14;
    color: #fff;
    }

    .blog-single-wrap .post-title {
    font-weight: 500;
    color: #212529;
    }

    .blog-single-wrap .post-meta {
    display: block;
    margin-bottom: 24px;
    }

    .blog-single-wrap .post-meta .icon {
    display: inline-block;
    width: 24px;
    height: 24px;
    line-height: 24px;
    border-radius: 50%;
    font-size: 12px;
    text-align: center;
    background-color: #645F88;
    color: #fff;
    }

    .blog-single-wrap .post-meta .post-date,
    .blog-single-wrap .post-meta .post-comment-count {
    display: inline-block;
    }

    .blog-single-wrap .post-meta .post-date a,
    .blog-single-wrap .post-meta .post-comment-count a {
    color: #645F88;
    }

    .blog-single-wrap .post-content .quote {
    display: block;
    padding: 16px 20px;
    background-color: #6C55F9;
    color: #fff;
    font-size: 18px;
    border-radius: 8px;
    }

    .blog-single-wrap .post-content .quote .author {
    display: block;
    margin-top: 16px;
    font-size: 14px;
    color: rgba(255, 255, 255, 0.8);
    }


    .widget-box {
    display: block;
    padding: 20px;
    margin-bottom: 32px;
    border-radius: 6px;
    border: 1px solid #EDECF5;
    box-shadow: 0 3px 9px rgba(100, 95, 136, 0.15);
    }

    .widget-title {
    color: #6C55F9;
    }

    .search-widget .form-control {
    margin-bottom: 8px;
    background-color: #F6F5FC;
    border-color: transparent;
    box-shadow: none !important;
    }

    .search-widget .form-control:focus {
    border-color: #dee1e6;
    }

    .search-widget .btn {
    text-transform: uppercase;
    }

    .categories {
    position: relative;
    list-style: none;
    padding-left: 0;
    }

    .categories li a {
    display: block;
    padding: 6px;
    color: #a4a1c8;
    transition: all .2s ease;
    }

    .categories li a:hover {
    color: #6C55F9;
    text-decoration: none;
    font-weight: 500;
    text-shadow: 0 2px 4px rgba(107, 85, 249, 0.5);
    }

    .blog-item {
    position: relative;
    display: flex;
    flex-direction: row;
    padding-bottom: 12px;
    margin-bottom: 20px;
    border-bottom: 1px solid #e4e7ee;
    }

    .blog-item .post-thumb {
    flex-shrink: 0;
    position: relative;
    display: inline-block;
    margin-right: 15px;
    width: 100px;
    height: 80px;
    background-color: #F6F5FC;
    overflow: hidden;
    }

    .blog-item .post-thumb img {
    width: auto;
    height: 100%;
    }

    .blog-item .post-title a {
    color: #8e8aad;
    transition: all .2s ease;
    }

    .blog-item .post-title a:hover {
    color: #6C55F9;
    text-decoration: none;
    }

    .blog-item .meta a {
    margin-right: 6px;
    font-size: 12px;
    color: #645F88;
    }

    .blog-item .meta a:hover {
    text-decoration: none;
    }

    .tag-cloud-link {
    display: inline-block;
    margin-bottom: 6px;
    padding: 4px 10px;
    font-size: 13px;
    background-color: #EDECF5;
    color: #645F88;
    border-radius: 3px;
    transition: all .2s ease;
    }

    .tag-cloud-link:hover {
    background-color: #645F88;
    color: #fff;
    text-decoration: none;
    }


    .maps-container {
    position: relative;
    display: block;
    width: 100%;
    height: 100%;
    background-color: #F6F5FC;
    overflow: hidden;
    }

    #google-maps {
    width: 100%;
    height: 100%;
    }

    .custom-img-1 {
    width: auto;
    max-width: 390px;
    }

    .custom-index {
    z-index: 11;
    }


    /* Custom Plugin */
    .owl-nav {
    display: block;
    margin: 15px auto;
    text-align: center;
    }

    .owl-carousel .owl-nav button.owl-next,
    .owl-carousel .owl-nav button.owl-prev {
    display: inline-block;
    padding: 6px 0 !important;
    background-color: #6C55F9;
    color: #fff;
    }

    .owl-carousel .owl-nav button.owl-next {
    padding-right: 14px !important;
    padding-left: 7px !important;
    border-radius: 0 40px 40px 0;
    }

    .owl-carousel .owl-nav button.owl-prev {
    padding-right: 7px !important;
    padding-left: 14px !important;
    border-radius: 40px 0 0 40px;
    }

    .owl-carousel .owl-dots {
    display: block;
    margin: 16px auto;
    text-align: center;
    }

    .owl-carousel button.owl-dot {
    display: inline-block;
    margin: 3px;
    width: 8px;
    height: 8px;
    border-radius: 50%;
    background-color: #aba7c2;
    transition: all .2s ease;
    }

    .owl-carousel button.owl-dot:focus {
    outline: none;
    }

    .owl-carousel button.owl-dot.active {
    background-color: #6C55F9;
    }
</style>
<body>
  <header class="pt-0 mt-0">
    <nav class="navbar navbar-expand-lg navbar-light sticky navbar-expand navbar-float">
      <div class="container">
          <img src="{{ asset('image/logo.png') }}" width="20%" alt="">
        {{-- <a href="index.html" class="navbar-brand"><span class="text-primary">Sixty Six Lanka</span>(Pvt).Ltd</a> --}}

        <button class="navbar-toggler" data-toggle="collapse" data-target="#navbarContent" aria-controls="navbarContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="navbar-collapse collapse" id="navbarContent">
          <ul class="navbar-nav ml-lg-4 pt-3 pt-lg-0">
            <li class="nav-item active">
              <a href="/" class="nav-link">Home</a>
            </li>
            <li class="nav-item">
              <a href="/contact" class="nav-link">Contact</a>
            </li>
          </ul>
          <div class="ml-auto d-flex">
            @guest
            @if (Route::has('login'))
                    <a class="nav-link {{request()->is('login')?'active':''}}" href="{{ route('login') }}">{{ __('Login') }}</a>
            @endif

            @if (Route::has('register'))
                    <a class="nav-link {{request()->is('register')?'active':''}}" href="{{ route('register') }}">{{ __('Register') }}</a>
            @endif
        @else
            <li class="nav-item dropdown nav_user_profile d-flex px-auto">
                @if (auth()->user()->image)
                    <img src="{{ asset('users/profile/'.Auth::user()->image) }}" alt="profile Image" width="50px">
                @endif
                <a id="navbarDropdown" class="nav-link dropdown-toggle name dropbtn px-auto"onclick="myFunction()" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                    {{ Auth::user()->name }}
                </a>

                <div class="dropdown-menu dropdown-menu-right " id="myDropdown" aria-labelledby="navbarDropdown">
                    @if (Auth::user()->role == 'admin' && Auth::user()->status == 1)
                        <a class="dropdown-item {{request()->is('home')?'active':''}}" href="/home">Profile</a>
                        <a class="dropdown-item {{request()->is('admin')?'active':''}}" href="/admin/">Dashboard</a>
                    @endif
                    @if (Auth::user()->role == 'super_admin')
                        <a class="dropdown-item {{request()->is('home')?'active':''}}" href="/home">Profile</a>
                        <a class="dropdown-item {{request()->is('superadmin')?'active':''}}" href="/superadmin/">Dashboard</a>
                    @endif
                    @if (Auth::user()->role == 'user')
                        <a class="dropdown-item {{request()->is('home')?'active':''}}" href="/home">Profile</a>
                        <a class="dropdown-item {{request()->is('preorder')?'active':''}}" href="/preorder/create">Pre Order</a>
                    @endif
                    <a class="dropdown-item" href="{{ route('logout') }}"
                        onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();">
                        {{ __('Logout') }}
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </div>
            </li>
        @endguest
          </div>
        </div>
      </div>
    </nav>

    <div class="page-banner home-banner">
      <div class="container h-100">
        <div class="row align-items-center h-100">
            <div class="col-lg-6 py-3 wow fadeInUp">
                <h1 class="mb-4">We make the things you need arrive on time.</h1>
                <p class="text-lg mb-5">You focus on what you need to do.</p>

                {{-- <a href="#" class="btn btn-outline border text-secondary">More Info</a> --}}
                @guest
                    <a href="/login" class="btn btn-primary btn-split ml-2">Sign Up <div class="fab"><span class="mai-play"><img src="{{ asset('image/home_page/delivery-courier.png') }}" width="20px" alt=""></span></div></a>
                @else
                    <a href="/home" class="btn btn-primary btn-split ml-2">Profile<div class="fab"><span class="mai-play"><img src="{{ asset('image/home_page/delivery-courier.png') }}" width="20px" alt=""></span></div></a>
                @endguest
            </div>
          <div class="col-lg-6 py-3 wow zoomIn">
            <div class="img-place">
                <img src="{{ asset('image/ss.png') }}" alt="">
            </div>
          </div>
        </div>
      </div>
    </div>
  </header>
  <!-- Back to top button -->
  <div class="back-to-top"></div>
  <main>
    <div class="page-section features">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-md-6 col-lg-4 py-3 wow fadeInUp">
            <div class="d-flex flex-row">
              <div class="img-fluid mr-3">
                <img src="{{ asset('image/home_page/delivery-truck.png') }}" width="50px" alt="">
              </div>
              <div>
                <h5>Courier Delivery</h5>
                <p>We ship your packages & shopping via Air Courier.</p>
              </div>
            </div>
          </div>

          <div class="col-md-6 col-lg-4 py-3 wow fadeInUp">
            <div class="d-flex flex-row">
              <div class="img-fluid mr-3">
                <img src="{{ asset('image/home_page/plane.png') }}" width="50px" alt="">
              </div>
              <div>
                <h5>Air Freight</h5>
                <p>Best service for your commercial Cargo from Sri Lanka.</p>
              </div>
            </div>
          </div>

          <div class="col-md-6 col-lg-4 py-3 wow fadeInUp">
            <div class="d-flex flex-row">
              <div class="img-fluid mr-3">
                <img src="{{ asset('image/home_page/cargo-ship.png') }}" width="50px" alt="">
              </div>
              <div>
                <h5>Sea Freight</h5>
                <p>Vessel leaving every week, we can do sea freight upto Male port.</p>
              </div>
            </div>
          </div>
        </div>
      </div> <!-- .container -->
    </div> <!-- .page-section -->

    <div class="page-section">
      <div class="container">
        <div class="row">
          <div class="col-lg-6 py-3 wow zoomIn">
            <div class="img-place text-center">
                <img src="{{ asset('image/home_page/delivery-courier.png') }}" style="width: 400px" alt="">
            </div>
          </div>
          <div class="col-lg-6 py-3 wow fadeInRight">
            <h2 class="title-section">About <span class="marked">Us</span></h2>
            <div class="divider"></div>
            <p><b>Sixty Six Lanka (Pvt) Ltd</b>, Sri Lanka was formed on 4th May 2018 for the purpose of Export & Imports, It was Formed by 5 Professionals with over 70 years of combined business and professional experience. We wanted to make a significant difference in the field of Sourcing, Buying, Payment assistance, Logistics & Courier thus giving an end to end solution for Retail & Commercial Buyers.</p>
            <div class="img-place mb-3">
                {{-- <img src="{{ asset('image/home_page/bg_image_1.png') }}" alt=""> --}}
            </div>
            <a href="#" class="btn btn-primary">More Details</a>
            <a href="#" class="btn btn-outline border ml-2">Success Stories</a>
          </div>
        </div>
      </div> <!-- .container -->
    </div> <!-- .page-section -->

    <div class="page-section">
      <div class="container">
        <div class="text-center wow fadeInUp">
          <h2 class="title-section">Our <span class="marked">Services</span></h2>
          <div class="divider mx-auto"></div>
          <div class="subhead">Apart from the below services, we can offer Pick up services, Packaging, Consolidation and storage facilities.</div>
        </div>

        <div class="row mt-5 text-center">
          <div class="col-lg-4 py-3 wow fadeInUp">
            <img src="{{ asset('image/home_page/delivery-truck.png') }}" width="50px" alt="">
            <h5>buy & Ship</h5>
            <p>Our expert buying agents work round the clock to get the stuff you need at the time you need in the place you want it to be..</p>
          </div>
          <div class="col-lg-4 py-3 wow fadeInUp">
            <img src="{{ asset('image/home_page/plane.png') }}" width="50px" alt="">
            <h5>Ship on Demand</h5>
            <p>You need bring to down your commodities or your favorites from somewhere in this universe and don’t know how to. Stop worrying..</p>
          </div>
          <div class="col-lg-4 py-3 wow fadeInUp">
            <img src="{{ asset('image/home_page/cargo-ship.png') }}" width="50px" alt="">
            <h5>Local</h5>
            <p>Add we cover the whole of Western province now.</p>
          </div>
        </div>
      </div> <!-- .container -->
    </div> <!-- .page-section -->

    <div class="page-section border-top">
      <div class="container">
        <div class="text-center wow fadeInUp">
          <h2 class="title-section">Pricing Plan</h2>
          <div class="divider mx-auto"></div>
        </div>

        <div class="row justify-content-center">
          <div class="col-12 col-lg-auto py-3 wow fadeInLeft">
            <div class="card-pricing">
              <div class="header">
                <div class="price-icon"><span class="mai-people"></span></div>
                <div class="price-title">1Kg - 10Kg</div>
              </div>
              <div class="body py-3">
                <div class="price-tag">
                  <span class="currency">$</span>
                  <h2 class="display-4">30</h2>
                  {{-- <span class="period">/monthly</span> --}}
                </div>
                <div class="price-info">
                  <p>Choose the plan that right for you</p>
                </div>
              </div>
              {{-- <div class="footer">
                <a href="#" class="btn btn-outline rounded-pill">Choose Plan</a>
              </div> --}}
            </div>
          </div>

          <div class="col-12 col-lg-auto py-3 wow fadeInUp">
            <div class="card-pricing active">
              <div class="header">
                <div class="price-labled">Best</div>
                <div class="price-icon"><span class="mai-business"></span></div>
                <div class="price-title">10Kg - 99Kg</div>
              </div>
              <div class="body py-3">
                <div class="price-tag">
                  <span class="currency">$</span>
                  <h2 class="display-4">60</h2>
                  {{-- <span class="period">/monthly</span> --}}
                </div>
                <div class="price-info">
                  <p>Choose the plan that right for you</p>
                </div>
              </div>
              {{-- <div class="footer">
                <a href="#" class="btn btn-outline rounded-pill">Choose Plan</a>
              </div> --}}
            </div>
          </div>

          <div class="col-12 col-lg-auto py-3 wow fadeInRight">
            <div class="card-pricing">
              <div class="header">
                <div class="price-icon"><span class="mai-rocket-outline"></span></div>
                <div class="price-title">100<sup>+</sup>Kg</div>
              </div>
              <div class="body py-3">
                <div class="price-tag">
                  <span class="currency">$</span>
                  <h2 class="display-4">90</h2>
                  {{-- <span class="period">/monthly</span> --}}
                </div>
                <div class="price-info">
                  <p>Choose the plan that right for you</p>
                </div>
              </div>
              {{-- <div class="footer">
                <a href="#" class="btn btn-outline rounded-pill">Choose Plan</a>
              </div> --}}
            </div>
          </div>

        </div>
      </div> <!-- .container -->
    </div> <!-- .page-section -->

    <div class="page-section">
      <div class="container">

        <div class="owl-carousel wow fadeInUp" id="testimonials">
          <div class="item">
            <div class="row align-items-center">
              <div class="col-md-6 py-3">
                <div class="testi-image">
                    <img src="{{ asset('image/home_page/bg_image_1.png') }}" alt="">
                </div>
              </div>
              <div class="col-md-6 py-3">
                <div class="testi-content">
                  <p>Necessitatibus ipsum magni accusantium consequatur delectus a repudiandae nemo quisquam dolorum itaque, tenetur, esse optio eveniet beatae explicabo sapiente quo.</p>
                  <div class="entry-footer">
                    <strong>Melvin Platje</strong> &mdash; <span class="text-grey">CEO Slurin Group</span>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div class="item">
            <div class="row align-items-center">
              <div class="col-md-6 py-3">
                <div class="testi-image">
                    <img src="{{ asset('image/home_page/bg_image_1.png') }}" alt="">
                </div>
              </div>
              <div class="col-md-6 py-3">
                <div class="testi-content">
                  <p>Repudiandae vero assumenda sequi labore ipsum eos ducimus provident a nam vitae et, dolorum temporibus inventore quaerat consectetur quos! Animi, qui ratione?</p>
                  <div class="entry-footer">
                    <strong>George Burke</strong> &mdash; <span class="text-grey">CEO Letro</span>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div> <!-- .container -->

    {{-- <div class="page-section border-top">
      <div class="container">
        <div class="text-center wow fadeInUp">
          <div class="subhead">Our Blog</div>
          <h2 class="title-section">Read our latest <span class="marked">News</span></h2>
          <div class="divider mx-auto"></div>
        </div>
        <div class="row my-5 card-blog-row">
          <div class="col-md-6 col-lg-3 py-3 wow fadeInUp">
            <div class="card-blog">
              <div class="header">
                <div class="entry-footer">
                  <div class="post-author">Sam Newman</div>
                  <a href="#" class="post-date">23 Apr 2020</a>
                </div>
              </div>
              <div class="body">
                <div class="post-title"><a href="blog-single.html">What is Business Management?</a></div>
              </div>
              <div class="footer">
                <a href="blog-single.html">Read More <span class="mai-chevron-forward text-sm"></span></a>
              </div>
            </div>
          </div>
          <div class="col-md-6 col-lg-3 py-3 wow fadeInUp">
            <div class="card-blog">
              <div class="header">
                <div class="avatar">
                    <img src="{{ asset('image/home_page/bg_image_1.png') }}" alt="">
                </div>
                <div class="entry-footer">
                  <div class="post-author">Sam Newman</div>
                  <a href="#" class="post-date">23 Apr 2020</a>
                </div>
              </div>
              <div class="body">
                <div class="post-title"><a href="blog-single.html">What is Business Management?</a></div>
                <div class="post-excerpt">Lorem, ipsum dolor sit amet consectetur adipisicing elit.</div>
              </div>
              <div class="footer">
                <a href="blog-single.html">Read More <span class="mai-chevron-forward text-sm"></span></a>
              </div>
            </div>
          </div>
          <div class="col-md-6 col-lg-3 py-3 wow fadeInUp">
            <div class="card-blog">
              <div class="header">
                <div class="avatar">
                    <img src="{{ asset('image/home_page/bg_image_1.png') }}" alt="">
                </div>
                <div class="entry-footer">
                  <div class="post-author">Sam Newman</div>
                  <a href="#" class="post-date">23 Apr 2020</a>
                </div>
              </div>
              <div class="body">
                <div class="post-title"><a href="blog-single.html">What is Business Management?</a></div>
                <div class="post-excerpt">Lorem, ipsum dolor sit amet consectetur adipisicing elit.</div>
              </div>
              <div class="footer">
                <a href="blog-single.html">Read More <span class="mai-chevron-forward text-sm"></span></a>
              </div>
            </div>
          </div>
          <div class="col-md-6 col-lg-3 py-3 wow fadeInUp">
            <div class="card-blog">
              <div class="header">
                <div class="avatar">
                    <img src="{{ asset('image/home_page/bg_image_1.png') }}" alt="">
                </div>
                <div class="entry-footer">
                  <div class="post-author">Sam Newman</div>
                  <a href="#" class="post-date">23 Apr 2020</a>
                </div>
              </div>
              <div class="body">
                <div class="post-title"><a href="blog-single.html">What is Business Management?</a></div>
                <div class="post-excerpt">Lorem, ipsum dolor sit amet consectetur adipisicing elit.</div>
              </div>
              <div class="footer">
                <a href="blog-single.html">Read More <span class="mai-chevron-forward text-sm"></span></a>
              </div>
            </div>
          </div>
        </div>

        <div class="text-center">
          <a href="blog.html" class="btn btn-outline-primary rounded-pill">Discover More</a>
        </div>
      </div> <!-- .container -->
    </div> <!-- .page-section --> --}}

    <div class="page-section client-section">
      <div class="container-fluid">
        <div class="row row-cols-2 row-cols-md-3 row-cols-lg-5 justify-content-center">
          <div class="item wow zoomIn">
                <img src="{{ asset('image/home_page/airbnb.png') }}" alt="">
          </div>
          <div class="item wow zoomIn">
                <img src="{{ asset('image/home_page/google.png') }}" alt="">
          </div>
          <div class="item wow zoomIn">
                <img src="{{ asset('image/home_page/mailchimp.png') }}" alt="">
          </div>
          <div class="item wow zoomIn">
                <img src="{{ asset('image/home_page/paypal.png') }}" alt="">
          </div>
          <div class="item wow zoomIn">
                <img src="{{ asset('image/home_page/stripe.png') }}" alt="">
          </div>
        </div>
      </div> <!-- .container-fluid -->
    </div> <!-- .page-section -->
  </main>

  <footer class="page-footer container">
      <div class="row">
        <div class="col-sm-6 py-2">
          <p id="copyright">&copy; 2020 <a href="/">Sixty Six Lanka(Pvt).Ltd</a>. All rights reserved</p>
        </div>
        <div class="col-sm-6 py-2 text-right">
          <div class="d-inline-block px-3">
            <a href="#">Contact Us</a>
          </div>
        </div>
      </div>
    </div> <!-- .container -->
  </footer> <!-- .page-footer -->
  <script>
    /* When the user clicks on the button,
    toggle between hiding and showing the dropdown content */
    function myFunction() {
      document.getElementById("myDropdown").classList.toggle("show");
    }

    // Close the dropdown if the user clicks outside of it
    window.onclick = function(event) {
      if (!event.target.matches('.dropbtn')) {
        var dropdowns = document.getElementsByClassName("dropdown-content");
        var i;
        for (i = 0; i < dropdowns.length; i++) {
          var openDropdown = dropdowns[i];
          if (openDropdown.classList.contains('show')) {
            openDropdown.classList.remove('show');
          }
        }
      }
    }
    </script>

  <script src="{{ asset('css/home_page/jquery.animateNumber.min.js') }}"></script>
  <script src="{{ asset('css/home_page/jquery.waypoints.min.js') }}"></script>
  <script src="{{ asset('css/home_page/wow.min.js') }}"></script>
  <script src="{{ asset('css/home_page/owl.carousel.min.js') }}"></script>
  <script src="{{ asset('js/home_page/bootstrap.bundle.min.js') }}"></script>
  <script src="{{ asset('js/home_page/google-maps.js') }}"></script>
  <script src="{{ asset('js/home_page/jquery-3.5.1.min.js') }}"></script>
  <script src="{{ asset('js/home_page/theme.js') }}"></script>


</body>
</html>
