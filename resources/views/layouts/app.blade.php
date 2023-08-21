<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        @include('header')
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>AL KORB</title>
        <link href="{{url('vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        <link rel="stylesheet" href="assets/css/fontawesome.css">
        <link rel="stylesheet" href="assets/css/templatemo-edu-meeting.css">
        <link rel="stylesheet" href="assets/css/owl.css">
        <link rel="stylesheet" href="assets/css/lightbox.css">
    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-gray-100 dark:bg-gray-900">
            <!-- Sub Header -->
{{-- <div class="sub-header">
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
              <li><a href="#"><i class="fa fa-facebook"></i></a></li>
              <li><a href="#"><i class="fa fa-instagram"></i></a></li>
              <li><a href="#"><i class="fa fa-behance"></i></a></li>
              <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div> --}}

  <!-- ***** Header Area Start ***** -->
  {{-- <header class="header-area header-sticky">
      <div class="container">
          <div class="row">
              <div class="col-12">
                  <nav class="main-nav">
                      <a href="/home" class="logo" style="width: 25%">
                          <img src="{{URL('logo.png')}}" alt="" style="width: 100%; height: 100%;display: inline">
                      </a>
                      <ul class="nav">
                          <li><a href="{{route('formations.index')}}">accueil</a></li>
                          <li><a href="/formation">Les Formations</a></li>
                          <li><a href="/formations#form">Coup d'œil</a></li>
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
        
                                    <x-dropdown-link :href="route('logout')"
                                            onclick="event.preventDefault();
                                                        this.closest('form').submit();">
                                        {{ __('Diconnect') }}
                                    </x-dropdown-link>
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
                  </nav>
              </div>
          </div>
      </div>
  </header> --}}
  @include('nav')
            {{-- @include('layouts.navigation') --}}

            <!-- Page Heading -->
            {{-- @if (isset($header))
                <header class="bg-white dark:bg-gray-800 shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endif --}}

            <!-- Page Content -->
            <br><br><br><br><br><main>
                {{ $slot }}
            </main>
        </div>
        @include('script')
    </body>
</html>
