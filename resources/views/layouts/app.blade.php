@extends('layouts.base')
@section('title', 'Culture and Arts Office')
@section('content')
    @if (in_array(request()->route()->getName(), ['static-sign-in', 'static-sign-up', 'register', 'login', 'password.forgot', 'reset-password']))
        <div class="container position-sticky z-index-sticky top-0">
            <div class="row">
                <div class="col-12">
                    <x-navbars.navs.guest />
                </div>
            </div>
        </div>

        @if (in_array(request()->route()->getName(), ['static-sign-in', 'login', 'password.forgot', 'reset-password']))
            <main class="main-content mt-0">
                <div class="page-header page-header-bg align-items-start min-vh-100">
                    <span class="mask bg-gradient-dark opacity-6"></span>
                    @yield('page-content')
                    <x-footers.guest />
                </div>
            </main>
        @else
            @yield('page-content')
        @endif

    @elseif (request()->route()->getName() == 'rtl')
        @yield('page-content')

    @elseif (request()->route()->getName() == 'virtual-reality')
        <div class="virtual-reality">
            <x-navbars.navs.auth />
            <div class="border-radius-xl mx-2 mx-md-3 position-relative" style="background-image: url('{{ asset('assets/img/vr-bg.jpg') }}'); background-size: cover;">
                @if(auth()->check() && auth()->user()->role === 'superadmin')
                    <x-navbars.superadmin_sidebar />
                @elseif(auth()->check() && auth()->user()->role === 'admin')
                    <x-navbars.admin_sidebar />
                @else
                    @include('partials.sidebar')
                @endif
                <main class="main-content border-radius-lg h-100">
                    @yield('page-content')
                </main>
            </div>
            <x-footers.auth />
            <x-plugins />
        </div>

    @else
        @if(auth()->check() && auth()->user()->role === 'superadmin')
            <x-navbars.superadmin_sidebar />
        @elseif(auth()->check() && auth()->user()->role === 'admin')
            <x-navbars.admin_sidebar />
        @else
            @include('partials.sidebar')
        @endif
        <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg">
            <x-navbars.navs.auth />
            @yield('page-content')
            <x-footers.auth />
        </main>
        <x-plugins />
    @endif

    
@endsection
