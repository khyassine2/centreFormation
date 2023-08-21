<!-- Sub Header -->
<div class="sub-header">
    <div class="container">
      <div class="row">
        <div class="col-lg-8 col-sm-8">
          <div class="left-content">
            <p>Sites de réseautage social du Centre <em>AL KORB</em> de DHAR LMEHRAZ.</p>
          </div>
        </div>
        <div class="col-lg-4 col-sm-4">
          <div class="right-icons">
            <ul>
              <li><a href="#"><i class="fa fa-facebook mabayenx"></i></a></li>
              <li><a href="#"><i class="fa fa-instagram mabayenx"></i></a></li>
              {{-- <li><a href="#"><i class="fa fa-behance"></i></a></li>
              <li><a href="#"><i class="fa fa-linkedin"></i></a></li> --}}
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- ***** Header Area Start ***** -->
  <header style="z-index: 2222" class="header-area header-sticky">
      <div class="container">
          <div class="row">
              <div class="col-12">
                  <nav class="main-nav">
                      <!-- ***** Logo Start ***** -->
                      <a  class="logo" style="width: 25%">
                          <img src="{{asset('logo.png')}}" alt="" style="width: 100%; height: 100%;display: inline">
                      </a>
                      <!-- ***** Logo End ***** -->
                      <!-- ***** Menu Start ***** -->
                      <ul class="nav">
                          <li><a href="{{route('formations.index')}}">accueil</a></li>
                          <li><a href="/formation">Les Formations</a></li>
                          <li><a href="/formations#form">Coup d'œil</a></li>
                          @can('isUser')
                            <li><a href="{{route('users.forms')}}">Ma Formation</a></li>
                          @endcan
                          @can('isAdmin')
                            <li class="has-sub">
                                
                                
                                    <a class="ml-4 font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500" href="javascript:void(0)">Admin</a>
                                  
                                    <ul class="sub-menu">
                                    
                                        
                                          <li><a href="{{route('etudiant.index',['role'=>'user'])}}">Etudiant</a></li>
                                          <li><a href="{{route('facture.index')}}">Facture</a></li>
                                        
                                        @can('isSupAdmin')
                                          <li><a href="/les_formations">Formation</a></li>
                                          <li><a href="{{route('catigorie.index')}}">Catigorie</a></li>
                                          <li><a href="{{route('etudiant.index',['role'=>'prof'])}}">Formateur</a></li>
                                          <li><a href="{{route('etudiant.index',['role'=>'admin'])}}">Admins</a></li>
                                        @endcan
                                    </ul>
                            </li>
                          @endcan
                          <li class="has-sub">
                              
                              @auth
                                <a class="ml-4 font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500" href="javascript:void(0)">{{Auth::user()->name}}</a>
                              @else
                                <a class="ml-4 font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500" href="javascript:void(0)">Profil</a>
                              @endauth
                              <ul class="sub-menu">
                                @auth
                                  <li><a href="/profile">Profil</a></li>
                                  <form method="POST" action="{{ route('logout') }}">
                                    @csrf
        
                                    <a  style="background: white;padding-left: 20px" href="{{route('logout')}}"
                                            onclick="event.preventDefault();
                                            this.closest('form').submit();">
                                        Deconnect
                                    </a>
                                  </form>
                                @else
                                  <li><a href="/login">Log in</a></li>
                                  <li><a href="/register">Sign in</a></li>
                                @endauth
                              </ul>
                          </li>
                      </ul>        
                      <a class='menu-trigger'>
                          <span></span>
                      </a>
                      <!-- ***** Menu End ***** -->
                  </nav>
              </div>
          </div>
      </div>
  </header>