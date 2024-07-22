<nav id="sidebar">
    <!-- Sidebar Header-->
    <div class="sidebar-header d-flex align-items-center">
        <x-app-layout>
        </x-app-layout>
    </div>
    <!-- Sidebar Navidation Menus--><span class="heading">Main</span>
    <ul class="list-unstyled">
            <li class="{{ Request::is('home') ? ' bg-secondary text-white' : 'bg-dark bg-gradient' }}"><a href="index.html"> <i class="icon-home"></i>Home </a></li>
            <li class="{{ Request::is('post_page') ? ' bg-secondary text-white' : 'bg-dark bg-gradient' }}"><a href="{{route('post.page')}}"> <i class="icon-grid"></i>Add Post </a></li>
            <li class="{{ Request::is('show_post') ? ' bg-secondary text-white' : 'bg-dark bg-gradient' }}"><a href="{{route('show.post')}}"> <i class="fa fa-bar-chart"></i>Show Post </a></li>
            <li><a href="forms.html"> <i class="icon-padnote"></i>Forms </a></li>
            <li><a href="#exampledropdownDropdown" aria-expanded="false" data-toggle="collapse"> <i class="icon-windows"></i>Example dropdown </a>
              <ul id="exampledropdownDropdown" class="collapse list-unstyled ">
                <li><a href="#">Page</a></li>
                <li><a href="#">Page</a></li>
                <li><a href="#">Page</a></li>
              </ul>
            </li>
            <li><a href="login.html"> <i class="icon-logout"></i>Login page </a></li>
    </ul><span class="heading">Extras</span>
    <ul class="list-unstyled">
      <li> <a href="#"> <i class="icon-settings"></i>Demo </a></li>
      <li> <a href="#"> <i class="icon-writing-whiteboard"></i>Demo </a></li>
      <li> <a href="#"> <i class="icon-chart"></i>Demo </a></li>
    </ul>
</nav>