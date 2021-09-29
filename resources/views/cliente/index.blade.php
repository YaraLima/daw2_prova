@extends("template.master")

@section("titulo", "Cadastro de Pet's")

@section("cadastro")

	<FORM method= "POST" action="/cliente"  class="row">
		
		@csrf 
		<INPUT type="hidden" id="id" name="id" value="{{ $cliente->id }}"/>
		
				<H1> Cadastro de Pet's </H1>
			
			<DIV class="form-group col-6" >
				<LABEL for="nome_animal">Nome do Animal: </LABEL> 
				<INPUT type="text" id="nome_animal" name="nome_animal" value="{{ $cliente->nome_animal }}" class="form-control" />
			</DIV>
			<DIV class="form-group col-6" >
				<LABEL for="nome_dono">Nome do Dono: </LABEL> 
				<INPUT type="text" id="nome_dono" name="nome_dono" value="{{ $cliente->nome_dono }}" class="form-control" /> 
			</DIV>
			<DIV class="form-group col-6" >
				<LABEL for="raca">Raça: </LABEL> 
				<INPUT type="text" id="raca"name="raca" value="{{ $cliente->raca }}" class="form-control" />
			</DIV>
			<DIV class="form-group col-6" >
				<LABEL for="data_nascimento">Data de Nascimento: </LABEL> 
				<INPUT type="date" id="data_nascimento" name="data_nascimento" value="{{ $cliente->data_nascimento }}" class="form-control" />
			</DIV>
			<DIV class="form-group col-6">
			<LABEL for="especie">Especie:</LABEL>
			<SELECT name="especie" class="form-control">
				<OPTION value=""></OPTION>
				@foreach($especies as $especie)
					@if ($especie->id == $cliente->especie)
						<OPTION value="{{ $especie->id }}" selected="selected">{{ $especie->descricao }}</OPTION>
					@else
						<OPTION value="{{ $especie->id }}">{{ $especie->descricao }}</OPTION>
					@endif
				@endforeach				
			</SELECT>
		</DIV>
				
			<DIV class="form-group col-6" >
				<BUTTON type="submit" class="btn btn-info bottom">Salvar</BUTTON>
			<a href="/cliente" class="btn btn-info bottom">Novo</a>
			</DIV>
	</FORM>
	
@endsection
		
@section("listagem")	
			
				<H2>Listagem</H2>	
		
				<TABLE class="table table-striped">
					<THEAD>
						<TR>
							<TH>Nome Animal</TH>
							<TH>Nome Dono</TH>
							<TH>Especie</TH>
							<TH>Editar</TH>
							<TH>Excluir</TH>
						</TR>
					</THEAD>
					<TBODY>
					@Foreach($clientes as $cliente)
				<TR>
					<TD>{{ $cliente->nome_animal }}</TD>
					<TD>{{ $cliente->nome_dono }}</TD>
					<TD>{{ $cliente->especie }}</TD>
					<TD>
						<a href="/cliente/{{ $cliente->id }}/edit"><BUTTON class="btn btn-dark" >EDITAR</BUTTON></a>
					</TD>
					<TD>
						<FORM action="/cliente/{{ $cliente->id }}" method="POST">
							@csrf
							<INPUT type="hidden" name="_method" value="DELETE" />
							<BUTTON type="submit"  class="btn btn-dark" onclick="return confirm('Deseja excluir?');" >EXCLUIR</BUTTON>
						</FORM>	
					</TD>
				</TR>
					@endforeach
				</TBODY>
				</TABLE>
@endsection