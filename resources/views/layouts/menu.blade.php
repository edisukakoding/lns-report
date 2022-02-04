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


<li class="{{ Request::is('guards*') ? 'active' : '' }}">
    <a href="{{ route('guards.index') }}"><i class="fa fa-edit"></i><span>@lang('models/guards.plural')</span></a>
</li>

<li class="{{ Request::is('periodSettings*') ? 'active' : '' }}">
    <a href="{{ route('periodSettings.index') }}"><i class="fa fa-edit"></i><span>@lang('models/periodSettings.plural')</span></a>
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

