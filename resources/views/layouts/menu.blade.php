<li class="side-menus {{ Request::is('*') ? 'active' : '' }}">
    <a class="nav-link" href="/">
        <i class=" fas fa-building"></i><span>Dashboard</span>
    </a>
</li>
<li class="{{ Request::is('classRooms*') ? 'active' : '' }}">
    <a href="{{ route('classRooms.index') }}"><i class="fa fa-edit"></i><span>@lang('models/classRooms.plural')</span></a>
</li>

<li class="{{ Request::is('students*') ? 'active' : '' }}">
    <a href="{{ route('students.index') }}"><i class="fa fa-edit"></i><span>@lang('models/students.plural')</span></a>
</li>

