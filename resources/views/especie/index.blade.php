@extends("template.master")

@section("titulo", "Cadastro de Especies")

@section("cadastro")
	
	<FORM action="/especie" method="POST" class="row">
		
		@csrf
		<INPUT type="hidden" name="id" value="{{ $especie->id }}" />
		
		<H1>Especie</H1>
		
		<DIV class="form-group col-6">
			<LABEL for="descricao">Descrição:</LABEL>
			<INPUT type="text" name="descricao" value="{{ $especie->descricao }}" class="form-control" />
		</DIV>
		<DIV class="form-group col-6">
			<BUTTON type="submit" class="btn btn-info bottom">Salvar</BUTTON>
			<a href="/cliente" class="btn btn-info bottom">Novo</a>
		</DIV>		
		
	</FORM>
	
@endsection

@section("listagem")
		
	<H1>Listagem</H1>
	
	<TABLE class="table table-striped">
		<THEAD>
			<TR>
				<TH>Descrição</TH>
				<TH>Editar</TH>
				<TH>Excluir</TH>
			</TR>
		</THEAD>
		<TBODY>
			@foreach($especies as $especie)
				<TR>
					<TD>{{ $especie->descricao }}</TD>
					<TD>
						<a href="/especie/{{ $especie->id }}/edit" class="btn btn-dark">Editar</a>
					</TD>
					<TD>
						<FORM action="/especie/{{ $especie->id }}" method="POST">
							@csrf
							<INPUT type="hidden" name="_method" value="DELETE" />
							<BUTTON type="submit" class="btn btn-dark" onclick="return confirm('Deseja excluir?');">Excluir</BUTTON>
						</FORM>
					</TD>
				</TR>
			@endforeach
		</TBODY>
	</TABLE>

@endsection