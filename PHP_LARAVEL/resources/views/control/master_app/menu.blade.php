
<div class="main-menu menu-fixed menu-light menu-accordion menu-shadow " data-scroll-to-active="true" data-img="{{url('control/theme-assets/images/backgrounds/02.jpg')}}">
      <div class="navbar-header">
        <ul class="nav navbar-nav flex-row">
          <li class="nav-item mr-auto">
            <a class="navbar-brand" href="{{route('control.home')}}">
              <img class="brand-logo" alt="Chameleon admin logo" src="{{url('logo.svg')}}"/>
            </a>
          </li>
          <li class="nav-item d-md-none"><a class="nav-link close-navbar"><i class="ft-x"></i></a></li>
        </ul>
      </div>
      <div class="main-menu-content">
        <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
          <li class="{{Route::is('control.home') || Route::is('control.main') ? 'active' : ''}}">
            <a href="{{route('control.home')}}"><i class="ft-home"></i><span class="menu-title" data-i18n="">Dashboard</span></a>
          </li>
          <li class="{{request()->is('*admins*') ? 'active' : ''}} nav-item">
            <a href="{{route('control.admins.index')}}"><i class="ft-users"></i><span class="menu-title" data-i18n="">Admins</span></a>
          </li>
            <li class="{{request()->is('*leaders/requests*') ? 'active' : ''}} nav-item">
                <a href="{{route('control.leaders.requests')}}"><i class="ft-users"></i><span class="menu-title" data-i18n="">Leader Requests</span></a>
            </li>
          <li class="{{request()->is('*leaders*') ? 'active' : ''}} nav-item">
            <a href="{{route('control.leaders.index')}}"><i class="ft-users"></i><span class="menu-title" data-i18n="">Club Leaders</span></a>
          </li>
          <li class="{{request()->is('*students*') ? 'active' : ''}} nav-item">
            <a href="{{route('control.students.index')}}"><i class="la la-group"></i><span class="menu-title" data-i18n="">Students</span></a>
          </li>
          <li class="{{request()->is('*clubs*') ? 'active' : ''}} nav-item">
            <a href="{{route('control.clubs.index')}}"><i class="ft-layout"></i><span class="menu-title" data-i18n="">Clubs</span></a>
          </li>
          <li class="{{request()->is('*feedbacks*') ? 'active' : ''}} nav-item">
            <a href="{{route('control.feedbacks.index')}}"><i class="ft-star"></i><span class="menu-title" data-i18n="">Feedbacks</span></a>
          </li>
          <li class="{{request()->is('*events*') ? 'active' : ''}} nav-item">
            <a href="{{route('control.events.index')}}"><i class="la la-hourglass-half"></i><span class="menu-title" data-i18n="">Events</span></a>
          </li>
          <li class="{{request()->is('*memberships*') ? 'active' : ''}} nav-item">
            <a href="{{route('control.memberships.index')}}"><i class="la la-certificate"></i><span class="menu-title" data-i18n="">Memberships</span></a>
          </li>
          <li class="{{request()->is('*rp/top-membership*') ? 'active' : ''}} nav-item">
            <a href="{{route('control.rp.membership')}}"><i class="la la-line-chart"></i><span class="menu-title" data-i18n="">Top Clubs</span></a>
          </li>
          <li class="{{request()->is('*rp/top-student*') ? 'active' : ''}} nav-item">
            <a href="{{route('control.rp.students')}}"><i class="la la-mortar-board"></i><span class="menu-title" data-i18n="">Top Student</span></a>
          </li>

        </ul>
      </div>
      <div class="navigation-background"></div>
    </div>
