<?php
// Processa o upload da imagem
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_FILES['imagem']) && $_FILES['imagem']['error'] == 0) {
        $nomeArquivo = uniqid() . '-' . $_FILES['imagem']['name'];
        $caminhoDestino = '../uploads/' . $nomeArquivo;

        // Salvar a imagem na pasta "uploads"
        if (move_uploaded_file($_FILES['imagem']['tmp_name'], $caminhoDestino)) {
            echo "Imagem enviada com sucesso!";
            // Salvar no banco (exemplo básico)
            $conn = new mysqli('localhost', 'root', '', 'carely');
            $stmt = $conn->prepare("INSERT INTO iniciativas (nome, descricao, imagem) VALUES (?, ?, ?)");
            $stmt->bind_param("sss", $_POST['nome'], $_POST['descricao'], $nomeArquivo);
            $stmt->execute();
            echo "Iniciativa salva!";
        } else {
            echo "Erro ao salvar imagem.";
        }
    } else {
        echo "Erro no upload!";
    }
}
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <title>Upload de Iniciativa</title>
</head>
<body>
    <h2>Cadastrar Iniciativa</h2>
    <form action="" method="POST" enctype="multipart/form-data">
        <label>Nome da Iniciativa:</label>
        <input type="text" name="nome" required><br>
        
        <label>Descrição:</label>
        <textarea name="descricao" required></textarea><br>
        
        <label>Imagem:</label>
        <input type="file" name="imagem" accept="image/*" required><br>
        
        <button type="submit">Enviar</button>
    </form>
</body>
</html>
