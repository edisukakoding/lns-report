<li class="side-menus {{ \Illuminate\Support\Facades\Request::is('*') ? 'active' : '' }}">
    <a class="nav-link" href="/">
        <i class=" fas fa-tachometer-alt"></i><span>Dashboard</span>
    </a>
</li>
<li class="menu-header">Master</li>
<li class="nav-item dropdown active">
    <a href="#" class="nav-link has-dropdown"><i class="fas fa-building"></i><span>Sekolah</span></a>
    <ul class="dropdown-menu">
        <li>
            <a class="{{ \Illuminate\Support\Facades\Request::is('periodSettings*') ? 'active' : 'nav-link' }}"
               href="{{ route('periodSettings.index') }}">@lang('models/periodSettings.plural')
            </a>
        </li>
        <li>
            <a class="{{ \Illuminate\Support\Facades\Request::is('classRooms*') ? 'active' : 'nav-link' }}"
               href="{{ route('classRooms.index') }}">@lang('models/classRooms.plural')
            </a>
        </li>
        <li>
            <a class="{{ \Illuminate\Support\Facades\Request::is('students*') ? 'active' : 'nav-link' }}"
               href="{{ route('students.index') }}">@lang('models/students.plural')
            </a>
        </li>
    </ul>
</li>


<li class="{{ Request::is('guards*') ? 'active' : '' }}">
    <a href="{{ route('guards.index') }}"><i class="fa fa-edit"></i><span>@lang('models/guards.plural')</span></a>
</li>

<li class="{{ Request::is('scalaEvaluationSettings*') ? 'active' : '' }}">
    <a href="{{ route('scalaEvaluationSettings.index') }}"><i class="fa fa-edit"></i><span>@lang('models/scalaEvaluationSettings.plural')</span></a>
</li>

<li class="{{ Request::is('personals*') ? 'active' : '' }}">
    <a href="{{ route('personals.index') }}"><i class="fa fa-edit"></i><span>@lang('models/personals.plural')</span></a>
</li>

<li class="{{ Request::is('anecdotEvaluations*') ? 'active' : '' }}">
    <a href="{{ route('anecdotEvaluations.index') }}"><i class="fa fa-edit"></i><span>@lang('models/anecdotEvaluations.plural')</span></a>
</li>

<li class="{{ Request::is('anecdotEvaluationDetails*') ? 'active' : '' }}">
    <a href="{{ route('anecdotEvaluationDetails.index') }}"><i class="fa fa-edit"></i><span>@lang('models/anecdotEvaluationDetails.plural')</span></a>
</li>

<li class="{{ Request::is('evaluations*') ? 'active' : '' }}">
    <a href="{{ route('evaluations.index') }}"><i class="fa fa-edit"></i><span>@lang('models/evaluations.plural')</span></a>
</li>

<li class="{{ Request::is('attainments*') ? 'active' : '' }}">
    <a href="{{ route('attainments.index') }}"><i class="fa fa-edit"></i><span>@lang('models/attainments.plural')</span></a>
</li>

<li class="{{ Request::is('attainmentDetails*') ? 'active' : '' }}">
    <a href="{{ route('attainmentDetails.index') }}"><i class="fa fa-edit"></i><span>@lang('models/attainmentDetails.plural')</span></a>
</li>

<li class="{{ Request::is('raports*') ? 'active' : '' }}">
    <a href="{{ route('raports.index') }}"><i class="fa fa-edit"></i><span>@lang('models/raports.plural')</span></a>
</li>

<li class="{{ Request::is('raportDetails*') ? 'active' : '' }}">
    <a href="{{ route('raportDetails.index') }}"><i class="fa fa-edit"></i><span>@lang('models/raportDetails.plural')</span></a>
</li>

<li class="{{ Request::is('raportEtcs*') ? 'active' : '' }}">
    <a href="{{ route('raportEtcs.index') }}"><i class="fa fa-edit"></i><span>@lang('models/raportEtcs.plural')</span></a>
</li>

