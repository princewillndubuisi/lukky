<nav id="sidebar" class="col-2">
    <!-- Sidebar Header-->
    <div class="sidebar-header d-flex align-items-center ">
        <x-app-layout>
        </x-app-layout>
    </div>
    <!-- Sidebar Navidation Menus-->
    <ul class="list-unstyled -mt-8">
            {{-- <li class="{{ Request::is('post_page') ? ' bg-secondary text-white' : 'bg-dark bg-gradient' }}"><a href=""> <i class="icon-grid"></i>Add Post </a></li> --}}
            <li class="{{ Request::is('show_post') ? ' bg-secondary text-white' : 'bg-dark bg-gradient' }}"><a href="{{route('show.post')}}"> <i class="fa fa-bar-chart"></i>Post </a></li>
            <li class="{{ Request::is('home') ? ' bg-secondary text-white' : 'bg-dark bg-gradient' }}"><a href="{{route('show.category')}}"> <i class="icon-home"></i>Category </a></li>
            <li><a href="forms.html"> <i class="icon-padnote"></i>Forms </a></li>
            <li><a href="login.html"> <i class="icon-logout"></i>Login page </a></li>
    </ul>
    {{-- <span class="heading">Extras</span> --}}
    {{-- <ul class="list-unstyled">
      <li> <a href="#"> <i class="icon-settings"></i>Demo </a></li>
      <li> <a href="#"> <i class="icon-writing-whiteboard"></i>Demo </a></li>
      <li> <a href="#"> <i class="icon-chart"></i>Demo </a></li>
    </ul> --}}
</nav>
