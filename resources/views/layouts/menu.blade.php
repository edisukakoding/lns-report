<li class="side-menus {{ \Illuminate\Support\Facades\Request::is('*') ? 'active' : '' }}">
    <a class="nav-link" href="/">
        <i class=" fas fa-tachometer-alt"></i><span>Dashboard</span>
    </a>
</li>
<li class="menu-header">Master</li>
<li class="nav-item dropdown {{
    in_array(\Illuminate\Support\Facades\Request::segment(2), [
    'periodSettings',
    'classRooms',
    'students'
    ]) ? 'active' : ''
    }}">
    <a href="#" class="nav-link has-dropdown"><i class="fas fa-building"></i><span>Sekolah</span></a>
    <ul class="dropdown-menu">
        <li class="{{ \Illuminate\Support\Facades\Request::is('admin/periodSettings*') ? 'active' : '' }}">
            <a class="nav-link"
               href="{{ route('periodSettings.index') }}">@lang('models/periodSettings.plural')
            </a>
        </li>
        <li class="{{ \Illuminate\Support\Facades\Request::is('admin/classRooms*') ? 'active' : '' }}">
            <a class="nav-link"
               href="{{ route('classRooms.index') }}">@lang('models/classRooms.plural')
            </a>
        </li>
        <li class="{{ \Illuminate\Support\Facades\Request::is('admin/students*') ? 'active' : '' }}">
            <a class="nav-link"
               href="{{ route('students.index') }}">@lang('models/students.plural')
            </a>
        </li>
    </ul>
</li>

<li class="nav-item dropdown {{
    in_array(\Illuminate\Support\Facades\Request::segment(2), [
    'guards',
    'personals'
    ]) ? 'active' : ''
    }}">
    <a href="#" class="nav-link has-dropdown"><i class="fas fa-users"></i><span>Perwalian</span></a>
    <ul class="dropdown-menu">
        <li class="{{ \Illuminate\Support\Facades\Request::is('admin/guards*') ? 'active' : '' }}">
            <a class="nav-link"
               href="{{ route('guards.index') }}">@lang('models/guards.plural')
            </a>
        </li>
        <li class="{{ \Illuminate\Support\Facades\Request::is('admin/personals*') ? 'active' : '' }}">
            <a class="nav-link"
               href="{{ route('personals.index') }}">@lang('models/personals.plural')
            </a>
        </li>
    </ul>
</li>

<li class="nav-item dropdown {{
    in_array(\Illuminate\Support\Facades\Request::segment(2), [
    'scalaEvaluationSettings',
    'scalaEvaluations',
    ]) ? 'active' : ''
    }}">
    <a href="#" class="nav-link has-dropdown"><i class="fas fa-edit"></i><span>Penilaian</span></a>
    <ul class="dropdown-menu">
        <li class="{{ \Illuminate\Support\Facades\Request::is('admin/scalaEvaluationSettings*') ? 'active' : '' }}">
            <a class="nav-link"
               href="{{ route('scalaEvaluationSettings.index') }}">@lang('models/scalaEvaluationSettings.plural')
            </a>
        </li>
        <li class="{{ \Illuminate\Support\Facades\Request::is('admin/scalaEvaluations*') ? 'active' : '' }}">
            <a class="nav-link"
               href="{{ route('scalaEvaluations.index') }}">@lang('models/scalaEvaluations.plural')
            </a>
        </li>
    </ul>
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
