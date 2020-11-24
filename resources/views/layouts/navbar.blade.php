	<nav class="navbar navbar-default navbar-fixed-top be-top-header">
        <div class="container-fluid">
          <div class="navbar-header"><a href="#" class="navbar-brand"></a></div>
          <div class="be-left-navbar">
            <ul class="nav navbar-nav navbar-left be-user-nav">
              <li class="dropdown"><a href="#" data-toggle="dropdown" role="button" aria-expanded="false" class="dropdown-toggle"><img src="{{ asset('assets/img/avatar.png') }}" alt="Avatar"><span class="user-name"></span></a>
                <ul role="menu" class="dropdown-menu">
                  <li>
                    <div class="user-info">
                      <div class="user-name">مرحباً  {{ \Auth::user()->first_name }}</div>
                    </div>
                  </li>
                  <li><a href="{{ route('show-password') }}"><span class="icon mdi mdi-key"></span> اعادة تعيين الرقم السري</a></li>
                  
                    <form id="logout" action="{{route('user-logout')}}" method="POST">
                          {{ csrf_field() }}
                    </form>
                  <li><a href="#" onclick="document.getElementById('logout').submit();"><span class="icon mdi mdi-power"></span> تسجيل الخروج</a></li>
                </ul>
              </li>
            </ul>
            <div class="page-title"><span>لوحة التحكم</span></div>
            {{-- <ul class="nav navbar-nav navbar-left be-icons-nav">
              <li class="dropdown"><a href="#" data-toggle="dropdown" role="button" aria-expanded="false" class="dropdown-toggle"><span class="icon mdi mdi-apps"></span></a>
                <ul class="dropdown-menu be-connections">
                  <li>
                    <div class="list">
                      <div class="content">
                        <div class="row">
                          <div class="col-xs-4"><a href="#" class="connection-item"><img src="assets/img/github.png" alt="Github"><span>GitHub</span></a></div>
                          <div class="col-xs-4"><a href="#" class="connection-item"><img src="assets/img/bitbucket.png" alt="Bitbucket"><span>Bitbucket</span></a></div>
                          <div class="col-xs-4"><a href="#" class="connection-item"><img src="assets/img/slack.png" alt="Slack"><span>Slack</span></a></div>
                        </div>
                        <div class="row">
                          <div class="col-xs-4"><a href="#" class="connection-item"><img src="assets/img/dribbble.png" alt="Dribbble"><span>Dribbble</span></a></div>
                          <div class="col-xs-4"><a href="#" class="connection-item"><img src="assets/img/mail_chimp.png" alt="Mail Chimp"><span>Mail Chimp</span></a></div>
                          <div class="col-xs-4"><a href="#" class="connection-item"><img src="assets/img/dropbox.png" alt="Dropbox"><span>Dropbox</span></a></div>
                        </div>
                      </div>
                    </div>
                    <div class="footer"> <a href="#">More</a></div>
                  </li>
                </ul>
              </li>
            </ul> --}}
          </div>
        </div>
      </nav>
