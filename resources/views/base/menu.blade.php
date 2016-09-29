

<nav id="navbar-top" class="navbar navbar-inverse navbar-static-top" role="navigation" style="margin-bottom: 0">
	<div class="navbar-header">
		<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
			<span class="sr-only">Toggle navigation</span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
		</button>
		<a class="navbar-brand" href="{{url('/')}}">
			<img src="{{asset('/img/logo.png')}}">
		</a>
	</div>
	<!-- /.navbar-header -->

	<ul class="nav navbar-top-links navbar-right">

		<li class="text">
			
			@if($qntAgenda == 1)
				Você tem <b>uma</b> agenda 
			@elseif ($qntAgenda > 1) 
				Você tem <b>{{$qntAgenda}}</b> agendas 
			@else
				Você não tem agendas 
			@endif

			@if($qntPagamento == 1)
				e tem <b>um</b> pagamento para hoje.
			@elseif ($qntPagamento > 1) 
				e tem <b>{{$qntPagamento}}</b> pagamentos para hoje.
			@else
				e não tem pagamentos hoje.
			@endif



		</li>
		<li class="dropdown">
			<a class="dropdown-toggle" data-toggle="dropdown" href="#">
				<i class="fa fa-user fa-fw"></i> <i class="fa fa-caret-down"></i>
			</a>
			<ul class="dropdown-menu dropdown-user">
				<!-- <li class="divider"></li> -->
				<li><a href="{{url('logout')}}"><i class="fa fa-sign-out fa-fw"></i>Logout</a>
				</li>
			</ul>
			<!-- /.dropdown-user -->
		</li>
		<!-- /.dropdown -->
	</ul>


	<div class="navbar-inverse sidebar" role="navigation">
		<div class="sidebar-nav navbar-collapse">
			<ul class="nav" id="side-menu">
				<li>
					<a href="{{url('/')}}"><i class="fa fa-home fa-fw"></i> Inicio</a>
				</li>
				<li>
					<a href="#"><i class="fa fa-calendar fa-fw"></i> Agenda<span class="fa arrow"></span></a>
					<ul class="nav nav-second-level">
						<li>
							<a href="{{url('agenda')}}"><i class="fa fa-list"></i> Listar Agendas</a>
						</li>
						<li>
							<a href="{{url('agenda/create')}}"><i class="fa fa-plus"></i> Adicionar Agenda</a>
						</li>
					</ul>
					<!-- /.nav-second-level -->
				</li>
				<li>
					<a href="#"><i class="fa fa-shopping-cart fa-fw"></i> Fornecedor<span class="fa arrow"></span></a>
					<ul class="nav nav-second-level">
						<li>
							<a href="{{url('fornecedor')}}"><i class="fa fa-list"></i> Listar Fornecedores</a>
						</li>
						<li>
							<a href="{{url('fornecedor/create')}}"><i class="fa fa-plus"></i> Adicionar Fornecedor</a>
						</li>
					</ul>
					<!-- /.nav-second-level -->
				</li>
				<li>
					<a href="#"><i class="fa fa-users fa-fw"></i> Funcionários<span class="fa arrow"></span></a>
					<ul class="nav nav-second-level">
						<li>
							<a href="{{url('funcionario')}}"><i class="fa fa-list"></i> Listar Funcionários</a>
						</li>
						<li>
							<a href="{{url('funcionario/create')}}"><i class="fa fa-plus"></i> Adicionar Funcionário</a>
						</li>
						<li>
							<a href="{{url('horario')}}"><i class="fa fa-clock-o fa-fw"></i> Controle Horário</a>
						</li>                        
					</ul>
					<!-- /.nav-second-level -->
				</li>				
				<li>
					<a href="#"><i class="fa fa-cubes fa-fw"></i> Produtos<span class="fa arrow"></span></a>
					<ul class="nav nav-second-level">
						<li>
							<a href="{{url('produto')}}"><i class="fa fa-list"></i> Listar Produtos</a>
						</li>
						<li>
							<a href="{{url('produtos')}}"><i class="fa fa-file-text"></i> Relatório</a>
						</li>
						<li>
							<a href="{{url('produto/create')}}"><i class="fa fa-plus"></i> Novo Produto</a>
						</li>
					</ul>
					<!-- /.nav-second-level -->
				</li>
				<li>
					<a href="#"><i class="fa fa-barcode fa-fw"></i> Notas<span class="fa arrow"></span></a>
					<ul class="nav nav-second-level">
						<li>
							<a href="{{url('nota')}}"><i class="fa fa-list"></i> Listar Notas</a>
						</li>
						<li>
							<a href="{{url('relatorioNotas')}}"><i class="fa fa-file-text"></i> Relatório</a>
						</li>
						<li>
							<a href="{{url('nota/create')}}"><i class="fa fa-plus"></i> Nova Nota</a>
						</li>
					</ul>
					<!-- /.nav-second-level -->
				</li>
				<li>
					<a href="#"><i class="fa fa-money fa-fw"></i> Pagamentos<span class="fa arrow"></span></a>
					<ul class="nav nav-second-level">
						<li>
							<a href="{{url('pagamento')}}"><i class="fa fa-list"></i> Listar Pagamentos</a>
						</li>
						<li>
							<a href="{{url('pagamentos')}}"><i class="fa fa-file-text"></i> Relatório</a>
						</li>
						<li>
							<a href="{{url('pagamento/create')}}"><i class="fa fa-plus"></i> Novo Pagamento</a>
						</li>
					</ul>
					<!-- /.nav-second-level -->
				</li>
			</ul>
		</div>
		<!-- /.sidebar-collapse -->
	</div>
	<!-- /.navbar-static-side -->
</nav>