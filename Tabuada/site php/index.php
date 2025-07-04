<?php 
$paginas = ['Matemática' => 'minha página de matemática aqui!', 'Álgebra' => 'estou na página de álgebra!', 
'Raciocínio Lógico' => 'Estou na página de raciocínio lógico!', 'Contatatos' => '<form><input type = "text">']
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <style type = "text/css"> 
    *{
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    header {
        background-color: beige;
        padding: 8px 10px;
        text-align: center;
    }


    a {
    display: inline-block;
    margin: 0 10px;
    color: grey;
    font-size: 17px;
}

    img {
    height: 200px;
    display: block;
    margin-right: auto;
    margin-left: auto;
    box-shadow: 2px 2px 5px rgba(0,0,0,0.3);
    border-radius: 25px;
}

    article {
    text-align: center;
    background-color: burlywood;
}

    section {
    text-align: center;
}

   footer {
    background-color: white;
        padding: 8px 10px;
   }

   body {
    background-color: grey;
   }
   
   .tabuada {
    margin-top: 30px;
    margin-bottom: 30px;
    padding: 22px;
    background-color: burlywood;
    display: inline-table;
    text-align: justify;
    padding-left: auto;
}

    p {
    margin-top: 10px;
    margin-bottom: 10px;
}



    </style>

</head>
<body>
<main>
<article>
   <H1> Tabuada </H1>
</article>
</main>

<header>

<?php 
foreach ($paginas as $key => $value) {
    echo '<a href=?page='.$key.'">'. ucfirst($key).'</a>';
}
?>
</header>

<section>

<h2><?php 

$pagina = (isset($_GET['page']) ? $_GET['page'] : 'home');
if(!array_key_exists($pagina, $paginas)){
    $pagina = 'Matemática';
}

echo ucfirst($pagina);
?>

</h2>

<p>
    <?php echo $paginas[$pagina];?>
</p>

</section>
<img src="imagens/abaco.jpg" height="200px" width="200px" alt=""/>

<div class = "tabuada">
<?php
// Tabuadas de 2 até 9
for ($numero = 2; $numero <= 9; $numero++) {
    echo '<div class="tabuada">';
    echo "<h3>Tabuada do $numero</h3>";

    for ($i = 1; $i <= 10; $i++) {
        $resultado = $numero * $i;
        echo "$numero X $i = $resultado <br>";
    }

    echo '</div>';
}
?>
</div>

<footer></footer>

</body> 
</html>