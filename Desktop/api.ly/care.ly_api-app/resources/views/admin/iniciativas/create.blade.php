<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <title>Cadastro de Iniciativas</title>
</head>
<body>
    <h1>Cadastrar Nova Iniciativa</h1>

    <form action="{{ route('admin.iniciativas.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <label>Nome: <input type="text" name="nome" required></label><br>

        <label>Descrição: <textarea name="descricao" required></textarea></label><br>

        <label>Imagem: <input type="file" name="imagem"></label><br>

        <button type="submit">Salvar</button>
    </form>
</body>
</html>
