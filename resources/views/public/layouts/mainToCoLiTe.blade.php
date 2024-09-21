@include('public/includesToCoLiTe.head')
@yield('contentName') {{-- الاسم اللى بيظهر فى الصفحة --}}
@include('public/includesToCoLiTe.headCss')

@include('public/includesToCoLiTe.navbar')
@yield('header')
{{-- @include('public/includesToCoLiTe.header') --}} {{-- مختلف عنهم كلهم  --}}



@yield('content') {{-- السكشن  --}}

@include('public/includesToCoLiTe.footer')
