@php
    use Illuminate\Support\Facades\Request;
@endphp
<li class="side-menus {{ Request::is('*') ? 'active' : '' }}">
    <a class="nav-link" href="{{ route('home') }}">
        <i class=" fas fa-tachometer-alt"></i><span>@lang('messages.menu.dashboard')</span>
    </a>
</li>
@if(in_array(\Illuminate\Support\Facades\Auth::user()->role, [\App\Models\User::TEACHER, \App\Models\User::ADMIN, \App\Models\User::HEADMASTER], true))
<li class="menu-header">Master</li>
<li class="nav-item dropdown {{
    in_array(Request::segment(2), [
    'periodSettings',
    'classRooms',
    'students'
    ]) ? 'active' : ''
    }}">
    <a href="#" class="nav-link has-dropdown"><i class="fas fa-building"></i><span>@lang('messages.menu.school')</span></a>
    <ul class="dropdown-menu">
        @if(in_array(\Illuminate\Support\Facades\Auth::user()->role, [\App\Models\User::ADMIN, \App\Models\User::HEADMASTER], true))
        <li class="{{ Request::is('admin/periodSettings*') ? 'active' : '' }}">
            <a class="nav-link"
               href="{{ route('periodSettings.index') }}">@lang('models/periodSettings.plural')
            </a>
        </li>
        <li class="{{ Request::is('admin/classRooms*') ? 'active' : '' }}">
            <a class="nav-link"
               href="{{ route('classRooms.index') }}">@lang('models/classRooms.plural')
            </a>
        </li>
        @endif
        <li class="{{ Request::is('admin/students*') ? 'active' : '' }}">
            <a class="nav-link"
               href="{{ route('students.index') }}">@lang('models/students.plural')
            </a>
        </li>
    </ul>
</li>

@if(in_array(\Illuminate\Support\Facades\Auth::user()->role, [\App\Models\User::ADMIN, \App\Models\User::HEADMASTER], true))
<li class="nav-item dropdown {{
    in_array(Request::segment(2), [
    'guards',
    'personals'
    ]) ? 'active' : ''
    }}">
    <a href="#" class="nav-link has-dropdown"><i class="fas fa-users"></i><span>@lang('messages.menu.parent')</span></a>
    <ul class="dropdown-menu">
        <li class="{{ Request::is('admin/guards*') ? 'active' : '' }}">
            <a class="nav-link"
               href="{{ route('guards.index') }}">@lang('models/guards.plural')
            </a>
        </li>
        <li class="{{ Request::is('admin/personals*') ? 'active' : '' }}">
            <a class="nav-link"
               href="{{ route('personals.index') }}">@lang('models/personals.plural')
            </a>
        </li>
    </ul>
</li>
@endif

<li class="nav-item dropdown {{
    in_array(Request::segment(2), [
        'scalaEvaluations',
        'evaluations',
        'attainments',
        'attainmentDetails',
        'anecdoteEvaluations',
        'anecdoteEvaluationDetails',
        'reports',
        'noteAssessments'
    ]) ? 'active' : ''
    }}">
    <a href="#" class="nav-link has-dropdown"><i class="fas fa-edit"></i><span>@lang('messages.menu.evaluation')</span></a>
    <ul class="dropdown-menu">

        <li class="{{ Request::is('teacher/scalaEvaluations*') ? 'active' : '' }}">
            <a class="nav-link"
               href="{{ route('scalaEvaluations.index') }}">@lang('models/scalaEvaluations.plural')
            </a>
        </li>
        <li class="{{ Request::is('teacher/attainment*') ? 'active' : '' }}">
            <a class="nav-link"
               href="{{ route('attainments.index') }}">@lang('models/attainments.plural')
            </a>
        </li>
        <li class="{{ Request::is('teacher/anecdoteEvaluation*') ? 'active' : '' }}">
            <a class="nav-link"
               href="{{ route('anecdoteEvaluations.index') }}">@lang('models/anecdoteEvaluations.plural')
            </a>
        </li>
        <li class="{{ Request::is('teacher/evaluations*') ? 'active' : '' }}">
            <a class="nav-link"
               href="{{ route('evaluations.index') }}">@lang('models/evaluations.plural')
            </a>
        </li>
        <li class="{{ Request::is('teacher/reports*') ? 'active' : '' }}">
            <a class="nav-link"
               href="{{ route('reports.index') }}">@lang('models/reports.plural')
            </a>
        </li>
        <li class="{{ Request::is('teacher/noteAssessments*') ? 'active' : '' }}">
            <a class="nav-link"
               href="{{ route('noteAssessments.index') }}">@lang('models/noteAssessments.plural')
            </a>
        </li>
    </ul>
</li>

<li class="nav-item dropdown {{
    in_array(Request::segment(2), [
        'scalaEvaluationSettings',
        'aspectSettings',
        'generalSettings'
    ]) ? 'active' : ''
    }}">
    <a href="#" class="nav-link has-dropdown"><i
            class="fas fa-cogs"></i><span>@lang('messages.menu.setting')</span></a>
    <ul class="dropdown-menu">
        <li class="{{ Request::is('teacher/scalaEvaluationSettings*') ? 'active' : '' }}">
            <a class="nav-link"
               href="{{ route('scalaEvaluationSettings.index') }}">@lang('models/scalaEvaluationSettings.plural')
            </a>
        </li>
        <li class="{{ Request::is('teacher/aspectSettings*') ? 'active' : '' }}">
            <a class="nav-link"
               href="{{ route('aspectSettings.index') }}">@lang('models/aspectSettings.plural')
            </a>
        </li>
        @if(in_array(\Illuminate\Support\Facades\Auth::user()->role, [\App\Models\User::HEADMASTER, \App\Models\User::ADMIN], true))
        <li class="{{ Request::is('admin/generalSettings*') ? 'active' : '' }}">
            <a class="nav-link"
               href="{{ route('generalSettings.show') }}">@lang('models/generalSettings.plural')
            </a>
        </li>
        @endif
        @if(\Illuminate\Support\Facades\Auth::user()->role === \App\Models\User::ADMIN)
        <li class="{{ Request::is('admin/users*') ? 'active' : '' }}">
            <a class="nav-link"
               href="{{ route('users.index') }}">Hak Akses
            </a>
        </li>
        @endif
    </ul>
</li>
@endif


