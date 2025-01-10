<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="description" content="plate deit">
    <title>test</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Main CSS-->
    <!-- Font-icon css-->
    <link rel="stylesheet"  type="text/css" href="{{asset('dashbord_style/css/bootstrap.css')}}" >
    <link rel="stylesheet" type="text/css" href="{{asset('dashbord_style/fonts/fontawesome/css/all.min.css')}}">
    <link rel="stylesheet"  type="text/css" href="{{asset('dashbord_style/css/brands.min.css')}}"/>
    <link rel="stylesheet" type="text/css" href="{{asset('dashbord_style/css/mainar.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('dashbord_style/css/custom.css')}}">
    
   <link rel="stylesheet" href="{{asset('css/all.min.css')}}">
   <style>
    .treeview-item{
        display: flex;
    column-gap: 10px;
    }
    .treeview-item i{
        margin-top: 5px;
    }
   </style>
    @stack('css')
</head>

<body class="app sidebar-mini">>
    <header class="app-header"><a class="app-header__logo" href="index.html">Plate diet</a>
        <a class="app-sidebar__toggle" href="#" data-toggle="sidebar" aria-label="Hide Sidebar"></a>
        <ul class="app-nav">
            <li class="app-search">
                <input class="app-search__input" type="search" placeholder="Search">
                <button class="app-search__button"><i class="fa fa-search"></i></button>
            </li>
            <!-- User Menu-->
            <li class="dropdown"><a class="app-nav__item" href="#" data-toggle="dropdown" aria-label="Open Profile Menu"><i class="fa fa-user fa-lg"></i></a>
                <ul class="dropdown-menu settings-menu dropdown-menu-right">
                    <li><a class="dropdown-item" href="{{route('admin.profile')}}"><i class="fa fa-user fa-lg"></i> تعديل بيانات الشخصية</a></li>
                    <li>
                        <form method="POST" action="{{route('logout')}}">
                            @csrf
                            <button class="dropdown-item" href="{{ route('logout') }}"><i class="bx bx-log-out"></i>
                                <i class="fa fa-sign-out fa-lg"></i> تسجيل الخروج</button>
                        </form>
                    </li>
                </ul>
            </li>
        </ul>
    </header>
    <!-- Sidebar menu-->
    <div class="app-sidebar__overlay" data-toggle="sidebar"></div>
    <aside class="app-sidebar">
        <div class="app-sidebar__user"><img class="app-sidebar__user-avatar" src="{{asset('assets/users/'.auth()->user()->image)}}" alt="User Image" width="100px" height="100px" style="margin-right:47px"></div>

        <p style="    color: white;
    text-align: center;
    font-size: 31px;
    margin-top: -20px;">{{$user->name}}</p>
        </div>
        <ul class="app-menu">
            <li><a class="app-menu__item @if($url=='admin/dashboard') active @endif" href="{{route('admin.dashboard')}}"><i class="app-menu__icon fa fa-dashboard"></i><span class="app-menu__label">لوحة التحكم</span></a></li>
            <li class="treeview @if($url=='admin/posts' || $url=='admin/comments' || $url=='admin/categories' || $url=='admin/tags' || $url=='admin/tags' || $url=='admin/faqs') is-expanded @endif"><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fa fa-laptop"></i><span class="app-menu__label">مقالات</span><i class="treeview-indicator fa fa-angle-right"></i></a>
                <ul class="treeview-menu">
                    <li><a class="treeview-item @if($url=='admin/posts') active @endif" href="{{route('admin.posts.index')}}"><i class="fa-regular fa-paste"></i>مقالات</a></li>
                    <li><a class="treeview-item @if($url=='admin/comments') active @endif" href="{{route('admin.comments.index')}}"><i class="fa-solid fa-comments"></i>مقالات تعليق</a></li>
                    <li><a class="treeview-item @if($url=='admin/categories') active @endif" href="{{route('admin.categories.index')}}"><i class="fa-solid fa-list"></i> اقسام</a></li>
                    <li><a class="treeview-item @if($url=='admin/tags') active @endif" href="{{route('admin.tags.index')}}"><i class="fa-solid fa-tag"></i> وسوم</a></li>
                    <li><a class="treeview-item @if($url=='admin/faqs') active @endif" href="{{route('admin.faqs.index')}}"><i class="fa-solid fa-circle-question"></i>الاسئلة الشائعه</a></li>
                </ul>
            </li>
           
            <li class="treeview
            @if($url=='admin/roles' || $url=='admin/supervisors' || $url=='admin/users') is-expanded @endif
            "><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fa fa-edit"></i><span class="app-menu__label">المستخدمين</span><i class="treeview-indicator fa fa-angle-right"></i></a>
                <ul class="treeview-menu">
                    @can('صلاحيات-عرض')
                    <li><a class="treeview-item @if($url=='admin/roles') active @endif"  href="{{route('admin.roles.index')}}"><i class="fa-solid fa-gear"></i> الصلاحيات</a></li>
                    @endcan
                    @can('مشرفين-عرض')
                    <li><a class="treeview-item @if($url=='admin/supervisors') active @endif" href="{{route('admin.supervisors.index')}}"><i class="icon fa-solid fa-user-tie"></i> المشرفين</a></li>
                    @endcan

                    @can("users-index")
                    <li><a class="treeview-item @if($url=='admin/users') active @endif" href="{{route('admin.users.index')}}"><i class="icon fa fa-circle-o"></i>المستخدمين</a></li>
                    @endcan
                </ul>
            </li>

            @can("طلبات التواصل")
            <li><a class="treeview-item @if($url=='admin/contactus') active @endif" href="{{route('admin.contactus.index')}}"><i class="fa-solid fa-headset"></i>طلبات التواصل المستخدمين </a></li>
            @endcan
            @can('صفحات الثابتة-عرض')
            <li><a class="treeview-item  @if($url=='admin/pages') active @endif" href="{{route('admin.pages.index')}}"><i class="fa-regular fa-file"></i> صفحات الموقع </a></li>
            @endcan
            <li><a class="app-menu__item" href="{{route('home')}}" target="_blank"><i class="app-menu__icon fa fa-file-code-o fa-regular fa-file"></i><span class="app-menu__label">صفحة الموقع</span></a></li>

        </ul>
    </aside>
    <main class="app-content">
        <div class="app-title">
            <div>
                {{$head}}
            </div>
        </div>
        {{$slot}}
    </main>
    @include('sweetalert::alert')
    @include('layouts.dashborad.footer')
    @stack('scripts')