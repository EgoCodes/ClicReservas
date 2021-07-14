<li class="{{ Request::is('empInfos*') ? 'active' : '' }}">
    <a href="{{ route('empInfos.index') }}"><i class="fa fa-edit"></i><span>Emp Infos</span></a>
</li>

<li class="{{ Request::is('empres*') ? 'active' : '' }}">
    <a href="{{ route('empres.index') }}"><i class="fa fa-edit"></i><span>Empres</span></a>
</li>

<li class="{{ Request::is('hors*') ? 'active' : '' }}">
    <a href="{{ route('hors.index') }}"><i class="fa fa-edit"></i><span>Hors</span></a>
</li>

<li class="{{ Request::is('perfilClis*') ? 'active' : '' }}">
    <a href="{{ route('perfilClis.index') }}"><i class="fa fa-edit"></i><span>Perfil Clis</span></a>
</li>

<li class="{{ Request::is('ventanillas*') ? 'active' : '' }}">
    <a href="{{ route('ventanillas.index') }}"><i class="fa fa-edit"></i><span>Ventanillas</span></a>
</li>

<li class="{{ Request::is('empHorarios*') ? 'active' : '' }}">
    <a href="{{ route('empHorarios.index') }}"><i class="fa fa-edit"></i><span>Emp Horarios</span></a>
</li>

<li class="{{ Request::is('contactos*') ? 'active' : '' }}">
    <a href="{{ route('contactos.index') }}"><i class="fa fa-edit"></i><span>Contactos</span></a>
</li>

<li class="{{ Request::is('comprasClis*') ? 'active' : '' }}">
    <a href="{{ route('comprasClis.index') }}"><i class="fa fa-edit"></i><span>Compras Clis</span></a>
</li>

<li class="{{ Request::is('clients*') ? 'active' : '' }}">
    <a href="{{ route('clients.index') }}"><i class="fa fa-edit"></i><span>Clients</span></a>
</li>

<li class="{{ Request::is('cantVents*') ? 'active' : '' }}">
    <a href="{{ route('cantVents.index') }}"><i class="fa fa-edit"></i><span>Cant Vents</span></a>
</li>

<li class="{{ Request::is('barris*') ? 'active' : '' }}">
    <a href="{{ route('barris.index') }}"><i class="fa fa-edit"></i><span>Barris</span></a>
</li>

