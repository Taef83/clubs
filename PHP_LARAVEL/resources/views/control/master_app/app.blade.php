<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <title>Clubs</title>
    @include('control.master_app.css')
    <!-- END Page Level CSS-->
    <!-- BEGIN Custom CSS-->
    <!-- END Custom CSS-->
  </head>
  <body class="vertical-layout vertical-menu 2-columns   menu-expanded fixed-navbar" data-open="click" data-menu="vertical-menu" data-color="{{!isset($color) ? 'bg-gradient-x-purple-blue' : $color}}" data-col="2-columns">

    <!-- fixed-top-->
    @include('control.master_app.top')

    @include('control.master_app.menu')


    <div class="app-content content">
      <div class="content-wrapper">
        <div class="content-wrapper-before"></div>
        <div class="content-header row">
            @yield('header')
        </div>

        <div class="content-body"><!-- Chart -->
            @yield('content')
        </div>
      </div>
    </div>
    @include('control.master_app.js')
  </body>
</html>