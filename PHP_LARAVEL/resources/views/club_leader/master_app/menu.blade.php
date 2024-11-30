
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
          <li class="{{Route::is('leader.home') || Route::is('leader.main') ? 'active' : ''}}">
            <a href="{{route('leader.home')}}"><i class="ft-home"></i><span class="menu-title" data-i18n="">Dashboard</span></a>
          </li>
          <li class="{{request()->is('*clubs*') ? 'active' : ''}} nav-item">
            <a href="{{route('leader.clubs.index')}}"><i class="ft-layout"></i><span class="menu-title" data-i18n="">Clubs</span></a>
          </li>
          <li class="{{request()->is('*feedbacks*') ? 'active' : ''}} nav-item">
            <a href="{{route('leader.feedbacks.index')}}"><i class="ft-star"></i><span class="menu-title" data-i18n="">Feedbacks</span></a>
          </li>
          <li class="{{request()->is('*events*') || request()->is('*registrations*') ? 'active' : ''}} nav-item">
            <a href="{{route('leader.events.index')}}"><i class="la la-hourglass-half"></i><span class="menu-title" data-i18n="">Events</span></a>
          </li>
          <li class="{{request()->is('*memberships*') ? 'active' : ''}} nav-item">
            <a href="{{route('leader.memberships.index')}}"><i class="la la-certificate"></i><span class="menu-title" data-i18n="">Memberships</span></a>
          </li>
          <li class="{{request()->is('*certificates*') ? 'active' : ''}} nav-item">
            <a href="{{route('leader.certificates.index')}}"><i class="la la-mortar-board"></i><span class="menu-title" data-i18n="">Certificates</span></a>
          </li>
          <li class="{{request()->is('*suggestions*') ? 'active' : ''}} nav-item">
            <a href="{{route('leader.suggestions.index')}}"><i class="la la-envelope"></i><span class="menu-title" data-i18n="">Suggestions</span></a>
          </li>

        </ul>
      </div>
      <div class="navigation-background"></div>
    </div>
