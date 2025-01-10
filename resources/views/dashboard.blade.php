<x-dashborad-layout title="dashborad">
    <x-slot:head>
        <h1><i class="fa fa-home"></i> لوحة التحكم</h1>
    </x-slot:head>
<div class="row">

    <div class="col-md-6 col-lg-3">
        <div class="widget-small primary coloured-icon"><i class="icon fa-solid fa-list fa-3x"></i>
            <div class="info">
                <h4>أقسام</h4>
                <p><b>{{$categories}}</b></p>
            </div>
        </div>
    </div>
    <div class="col-md-6 col-lg-3">
        <div class="widget-small primary coloured-icon"><i class="icon fa-solid fa-tag fa-3x"></i>
            <div class="info">
                <h4>وسوم</h4>
                <p><b>{{$tags}}</b></p>
            </div>
        </div>
    </div>
    <div class="col-md-6 col-lg-3">
        <div class="widget-small primary coloured-icon"><i class="icon fa-regular fa-paste fa-3x"></i>
            <div class="info">
                <h4>مقالات</h4>
                <p><b>{{$posts}}</b></p>
            </div>
        </div>
    </div>
    <div class="col-md-6 col-lg-3">
        <div class="widget-small primary coloured-icon"><i class="icon fa-solid fa-comments fa-3x"></i>
            <div class="info">
                <h4>تعليقات مستخدمين</h4>
                <p><b>{{$comments}}</b></p>
            </div>
        </div>
    </div>
    <div class="col-md-6 col-lg-3">
        <div class="widget-small primary coloured-icon"><i class="fa-solid fa-user-tie icon fa-3x"></i>
            <div class="info">
                <h4>مديرن</h4>
                <p><b>{{$admins}}</b></p>
            </div>
        </div>
    </div>
    <div class="col-md-6 col-lg-3">
        <div class="widget-small primary coloured-icon"><i class="icon fa fa-users fa-3x"></i>
            <div class="info">
                <h4>مستخدمين</h4>
                <p><b>{{$users}}</b></p>
            </div>
        </div>
    </div>
    <div class="col-md-6 col-lg-3">
        <div class="widget-small primary coloured-icon"><i class="icon fa-solid fa-headset fa-3x"></i>
            <div class="info">
                <h4> طلبات تواصل المستخدمين</h4>
                <p><b>{{$contactuss}}</b></p>
            </div>
        </div>
    </div>
    <div class="col-md-6 col-lg-3">
        <div class="widget-small primary coloured-icon"><i class="icon fa-regular fa-file fa-3x"></i>
            <div class="info">
                <h4>صفحات الموقع</h4>
                <p><b>{{$pages}}</b></p>
            </div>
        </div>
    </div>

    <div class="col-md-6 col-lg-3">
        <div class="widget-small primary coloured-icon"><i class="icon fa-solid fa-circle-question fa-3x"></i>
            <div class="info">
                <h4>أسئلة شائعة</h4>
                <p><b>{{$faqs}}</b></p>
            </div>
        </div>
    </div>

</div>

</x-dashborad-layout>