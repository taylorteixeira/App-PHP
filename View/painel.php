<?php
include('../verifica_login.php');
?>
<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap"
      rel="stylesheet"
    />

    <link rel="icon" type="image/png" href="../assets/favicon.png" />

    <link
      rel="stylesheet"
      href="../css/spacetime.css
    "
    />

    <title>Spacetime</title>
    <script src="https://unpkg.com/@phosphor-icons/web"></script>
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>

  </head>
  <body>
    <aside>
      <img src="../assets/logo.svg" alt="Logo" />
      <!-- <img src="../assets/Avatar.png" alt="" /> -->

      <p>
        Cápsula do tempo de <br />
        <strong><?php echo $_SESSION['nome']; ?></strong>
      </p><br><br>

      <i>Colecione momentos marcantes da sua jornada e relembre aqui!</i>
      <br>
      <span><a href="../Model/logout.php"
          ><ion-icon name="arrow-back-circle-outline"></ion-icon></a></span>
    </aside>
    <nav>
    <div class="postagem">
      <h1>Postagem:</h1>
      <form method="post" action="../Controller/post.php">
        <label for="titulo">Título:</label><br>
        <input type="text" id="titulo" name="titulo"><br><br>
        
        <label for="conteudo">Conteúdo:</label><br>
        <input type="text" id="conteudo" name="conteudo"></input><br><br>
        
        <input type="submit" value="Publicar">
    </div>
    <br>
    </form>
      <!-- <a href="#" target="_blank" class="memory">
        <small>20 de Março de 2023</small>
        <h1>Jornada do Zero à Primeira Vaga</h1>
        <img
          src="../assets/jornada.png"
          alt="Rodrigo e Mayk apresentando o evento Jornada do Zero à Primeira Vaga"
        />
        <p>
          At vero eos et accusamus et iusto odio dignissimos ducimus qui
          blanditiis praesentium voluptatum deleniti atque corrupti quos dolores
          et quas molestias excepturi sint occaecati cupiditate non provident,
          similique...
        </p>
      </a> -->
      <h2>Postagens Recentes:</h2>
    
    <?php
      // Incluir o arquivo de conexão com o banco de dados
      include('../Model/conexao.php');

      // Selecionar todas as postagens da tabela "postagens" (supondo que a tabela já exista)
      $query = "SELECT * FROM postagens";
      $result = mysqli_query($conexao, $query);

      // Exibir as postagens
      while ($row = mysqli_fetch_assoc($result)) {
        echo "<br><br>";
        echo "<h1>"."Titúlo: ". $row['titulo'] . "</h3>";
        echo "<p>"."Hitória compartilhada: " . $row['conteudo'] . "</p>";
        echo "<small>".$row['data_publicacao']."</small>";
        echo "<br><hr>";
      }

      // Fechar a conexão com o banco de dados
      mysqli_close($conexao);
      ?>
    </nav>
  </body>
</html>
