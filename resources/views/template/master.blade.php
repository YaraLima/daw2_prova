<HTML>
	<HEAD>
		<TITLE>PetLove - @yield("titulo")</TITLE>
		<LINK rel="stylesheet" href="{{ asset('css/bootstrap.css') }}" />
		<LINK rel="stylesheet" href="{{ asset('css/custom.css') }}" />
	</HEAD>
	
	<BODY>
		
		<NAV class="navbar navbar-expand-sm bg-dark">
			
			<UL class="navbar-nav">
				
				<LI class="nav-item">
					<a class="nav-link" href="/">Home</a>
				</LI>
				
				<LI class="nav-item">
					<a class="nav-link" href="/cliente">Cliente</a>
				</LI>
				
				<LI class="nav-item">
					<a class="nav-link" href="/especie">Especie</a>
				</LI>
				
			</UL>
			
		</NAV>
		
		@if (Session::get("acao") == "salvo")
			<DIV class="alert alert-success">
				Salvo com Sucesso!
			</DIV>
		@endif
		
		@if (Session::get("acao") == "excluido")
			<DIV class="alert alert-danger">
				Excluído com Sucesso!
			</DIV>
		@endif
		
		<DIV class="container">
			
			<DIV>
				@yield("cadastro")
			</DIV>
			
			<DIV>
				@yield("listagem")
			</DIV>
			
		</DIV>
	</BODY>
</HTML>