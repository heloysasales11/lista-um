<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <title>Exercícios PHP</title>
</head>

<body>
  <h1>Exercícios PHP com Formulários</h1>

  <form method="post">
    <label for="exercicio">Escolha o exercício:</label>
    <select name="exercicio" id="exercicio" required onchange="this.form.submit()">
      <option value="">-- Selecione --</option>
      <option value="par_impar">Verificar Par ou Ímpar</option>
      <option value="tabuada">Tabuada</option>
      <option value="positivo_negativo">Positivo, Negativo ou Zero</option>
      <option value="fatorial">Fatorial</option>
      <option value="numero_amigo">Números Amigos</option>
      <option value="divisores">Divisores</option>
      <option value="numero_perfeito">Número Perfeito</option>
      <option value="contar_pares">Contar Pares</option>
      <option value="soma_intervalo">Soma no Intervalo</option>
      <option value="fibonacci">Sequência de Fibonacci</option>
      <option value="palindromo">Palíndromo</option>
      <option value="contar_vogais">Contar Vogais</option>
      <option value="celsius_fahrenheit">Celsius para Fahrenheit</option>
      <option value="bissexto">Ano Bissexto</option>
      <option value="imc">Calcular IMC</option>
      <option value="voto">Pode Votar?</option>
      <option value="validar_data">Validar Data</option>
      <option value="maior_numero">Maior Número</option>
      <option value="senha_forte">Senha Forte</option>
      <option value="login">Simular Login</option>
    </select>
  </form>

  <?php
  if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["exercicio"])) {
    $exercicio = $_POST["exercicio"];

    echo "<hr><h2>Formulário: $exercicio</h2>";

    switch ($exercicio) {
      case "par_impar":
        echo '<form method="post">
          <input type="hidden" name="exercicio" value="par_impar">
          <label>Número:</label>
          <input type="number" name="numero" required>
          <input type="submit" value="Verificar">
          </form>';
        if (isset($_POST["numero"])) {
          $n = $_POST["numero"];
          echo "<p>$n é " . ($n % 2 == 0 ? "par" : "ímpar") . ".</p>";
        }
        break;

      case "tabuada":
        echo '<form method="post">
          <input type="hidden" name="exercicio" value="tabuada">
          <label>Número:</label>
          <input type="number" name="numero" required>
          <input type="submit" value="Calcular">
          </form>';
        if (isset($_POST["numero"])) {
          $n = $_POST["numero"];
          echo "<h3>Tabuada de $n:</h3>";
          for ($i = 1; $i <= 10; $i++) {
            echo "$n x $i = " . ($n * $i) . "<br>";
          }
        }
        break;

      case "positivo_negativo":
        echo '<form method="post">
          <input type="hidden" name="exercicio" value="positivo_negativo">
          <label>Número:</label>
          <input type="number" name="numero" required>
          <input type="submit" value="Verificar">
          </form>';
        if (isset($_POST["numero"])) {
          $n = $_POST["numero"];
          if ($n > 0) {
            echo "<p>$n é positivo.</p>";
          } elseif ($n < 0) {
            echo "<p>$n é negativo.</p>";
          } else {
            echo "<p>$n é zero.</p>";
          }
        }
        break;

      case "fatorial":
        echo '<form method="post">
          <input type="hidden" name="exercicio" value="fatorial">
          <label>Número:</label>
          <input type="number" name="numero" required>
          <input type="submit" value="Calcular">
          </form>';
        if (isset($_POST["numero"])) {
          $n = $_POST["numero"];
          $fat = 1;
          for ($i = 1; $i <= $n; $i++) {
            $fat *= $i;
          }
          echo "<p>Fatorial de $n é $fat.</p>";
        }
        break;

      case "numero_amigo":
        echo '<form method="post">
          <input type="hidden" name="exercicio" value="numero_amigo">
          <label>Número 1:</label>
          <input type="number" name="num1" required>
          <label>Número 2:</label>
          <input type="number" name="num2" required>
          <input type="submit" value="Verificar">
          </form>';
        if (isset($_POST["num1"]) && isset($_POST["num2"])) {
          function somaDivisores($n)
          {
            $soma = 0;
            for ($i = 1; $i <= $n / 2; $i++) {
              if ($n % $i == 0) {
                $soma += $i;
              }
            }
            return $soma;
          }

          $num1 = $_POST["num1"];
          $num2 = $_POST["num2"];
          $soma1 = somaDivisores($num1);
          $soma2 = somaDivisores($num2);

          if ($soma1 == $num2 && $soma2 == $num1) {
            echo "<p>$num1 e $num2 são números amigos.</p>";
          } else {
            echo "<p>$num1 e $num2 não são números amigos.</p>";
          }
        }
        break;

      case "divisores":
        echo '<form method="post">
          <input type="hidden" name="exercicio" value="divisores">
          <label>Número:</label>
          <input type="number" name="numero" required>
          <input type="submit" value="Calcular">
          </form>';
        if (isset($_POST["numero"])) {
          $n = $_POST["numero"];
          echo "<p>Divisores de $n: ";
          for ($i = 1; $i <= $n; $i++) {
            if ($n % $i == 0) {
              echo "$i ";
            }
          }
          echo "</p>";
        }
        break;

      case "numero_perfeito":
        echo '<form method="post">
          <input type="hidden" name="exercicio" value="numero_perfeito">
          <label>Número:</label>
          <input type="number" name="numero" required>
          <input type="submit" value="Verificar">
          </form>';
        if (isset($_POST["numero"])) {
          function somaDivisoresProprios($n)
          {
            $soma = 0;
            for ($i = 1; $i <= $n / 2; $i++) {
              if ($n % $i == 0) {
                $soma += $i;
              }
            }
            return $soma;
          }

          $n = $_POST["numero"];
          if (somaDivisoresProprios($n) == $n) {
            echo "<p>$n é um número perfeito.</p>";
          } else {
            echo "<p>$n não é um número perfeito.</p>";
          }
        }
        break;

      case "contar_pares":
        echo '<form method="post">
          <input type="hidden" name="exercicio" value="contar_pares">
          <label>Quantidade de números:</label>
          <input type="number" name="quantidade" required>
          <input type="submit" value="Contar">
                      </form>';
        if (isset($_POST["quantidade"])) {
          $qtd = $_POST["quantidade"];
          echo '<form method="post">
            <input type="hidden" name="exercicio" value="contar_pares">
            <input type="hidden" name="quantidade" value="' . $qtd . '">';
          for ($i = 1; $i <= $qtd; $i++) {
            echo '<label>Número ' . $i . ':</label>
                            <input type="number" name="numero' . $i . '" required><br>';
          }
          echo '<input type="submit" value="Verificar">
                        </form>';
        }

        if (isset($_POST["numero1"])) {
          $qtd = $_POST["quantidade"];
          $pares = 0;
          for ($i = 1; $i <= $qtd; $i++) {
            $num = $_POST["numero" . $i];
            if ($num % 2 == 0) {
              $pares++;
            }
          }
          echo "<p>Quantidade de números pares: $pares</p>";
        }
        break;

      case "soma_intervalo":
        echo '<form method="post">
          <input type="hidden" name="exercicio" value="soma_intervalo">
          <label>Número inicial:</label>
          <input type="number" name="inicio" required>
          <label>Número final:</label>
          <input type="number" name="fim" required>
          <input type="submit" value="Calcular">
          </form>';
        if (isset($_POST["inicio"]) && isset($_POST["fim"])) {
          $inicio = $_POST["inicio"];
          $fim = $_POST["fim"];
          $soma = 0;
          for ($i = $inicio; $i <= $fim; $i++) {
            $soma += $i;
          }
          echo "<p>Soma dos números de $inicio a $fim: $soma</p>";
        }
        break;

      case "fibonacci":
        echo '<form method="post">
          <input type="hidden" name="exercicio" value="fibonacci">
          <label>Quantidade de termos:</label>
          <input type="number" name="termos" min="1" required>
          <input type="submit" value="Gerar">
          </form>';
        if (isset($_POST["termos"])) {
          $termos = $_POST["termos"];
          $a = 0;
          $b = 1;
          echo "<p>Sequência de Fibonacci com $termos termos:</p>";
          echo "$a $b ";
          for ($i = 2; $i < $termos; $i++) {
            $c = $a + $b;
            echo "$c ";
            $a = $b;
            $b = $c;
          }
        }
        break;

      case "palindromo":
        echo '<form method="post">
          <input type="hidden" name="exercicio" value="palindromo">
          <label>Palavra:</label>
          <input type="text" name="palavra" required>
          <input type="submit" value="Verificar">
          </form>';
        if (isset($_POST["palavra"])) {
          $p = strtolower(trim($_POST["palavra"]));
          $inv = strrev($p);
          echo "<p>A palavra '$p' " . ($p == $inv ? "é" : "não é") . " um palíndromo.</p>";
        }
        break;

      case "contar_vogais":
        echo '<form method="post">
          <input type="hidden" name="exercicio" value="contar_vogais">
          <label>Texto:</label>
          <input type="text" name="texto" required>
          <input type="submit" value="Contar">
          </form>';
        if (isset($_POST["texto"])) {
          $texto = strtolower($_POST["texto"]);
          $vogais = array('a', 'e', 'i', 'o', 'u');
          $contador = 0;
          for ($i = 0; $i < strlen($texto); $i++) {
            if (in_array($texto[$i], $vogais)) {
              $contador++;
            }
          }
          echo "<p>O texto tem $contador vogais.</p>";
        }
        break;

      case "celsius_fahrenheit":
        echo '<form method="post">
          <input type="hidden" name="exercicio" value="celsius_fahrenheit">
          <label>Temperatura:</label>
          <input type="number" step="0.1" name="temperatura" required>
          <label>Converter para:</label>
          <select name="conversao" required>
          <option value="celsius">Fahrenheit para Celsius</option>
          <option value="fahrenheit">Celsius para Fahrenheit</option>
          </select>
          <input type="submit" value="Converter">
          </form>';
        if (isset($_POST["temperatura"]) && isset($_POST["conversao"])) {
          $temp = $_POST["temperatura"];
          $conv = $_POST["conversao"];
          if ($conv == "celsius") {
            $resultado = ($temp - 32) * 5 / 9;
            echo "<p>$temp°F = " . round($resultado, 2) . "°C</p>";
          } else {
            $resultado = ($temp * 9 / 5) + 32;
            echo "<p>$temp°C = " . round($resultado, 2) . "°F</p>";
          }
        }
        break;

      case "bissexto":
        echo '<form method="post">
          <input type="hidden" name="exercicio" value="bissexto">
          <label>Ano:</label>
          <input type="number" name="ano" required>
          <input type="submit" value="Verificar">
          </form>';
        if (isset($_POST["ano"])) {
          $ano = $_POST["ano"];
          $bissexto = false;
          if (($ano % 4 == 0 && $ano % 100 != 0) || ($ano % 400 == 0)) {
            $bissexto = true;
          }
          echo "<p>O ano $ano " . ($bissexto ? "é" : "não é") . " bissexto.</p>";
        }
        break;

      case "imc":
        echo '<form method="post">
          <input type="hidden" name="exercicio" value="imc">
          <label>Peso (kg):</label>
          <input type="number" step="0.01" name="peso" required>
          <label>Altura (m):</label>
          <input type="number" step="0.01" name="altura" required>
          <input type="submit" value="Calcular IMC">
          </form>';
        if (isset($_POST["peso"]) && isset($_POST["altura"])) {
          $peso = $_POST["peso"];
          $altura = $_POST["altura"];
          $imc = $peso / ($altura * $altura);
          echo "<p>IMC: " . round($imc, 2) . "</p>";
          if ($imc < 18.5) echo "Abaixo do peso";
          elseif ($imc < 24.9) echo "Peso normal";
          elseif ($imc < 29.9) echo "Sobrepeso";
          else echo "Obesidade";
        }
        break;

      case "voto":
        echo '<form method="post">
          <input type="hidden" name="exercicio" value="voto">
          <label>Ano de nascimento:</label>
          <input type="number" name="ano_nascimento" required>
          <input type="submit" value="Verificar">
          </form>';
        if (isset($_POST["ano_nascimento"])) {
          $anoNasc = $_POST["ano_nascimento"];
          $anoAtual = date("Y");
          $idade = $anoAtual - $anoNasc;

          if ($idade < 16) {
            echo "<p>Com $idade anos: NÃO VOTA</p>";
          } elseif ($idade < 18 || $idade >= 70) {
            echo "<p>Com $idade anos: VOTO OPCIONAL</p>";
          } else {
            echo "<p>Com $idade anos: VOTO OBRIGATÓRIO</p>";
          }
        }
        break;

      case "validar_data":
        echo '<form method="post">
          <input type="hidden" name="exercicio" value="validar_data">
          <label>Dia:</label>
          <input type="number" name="dia" min="1" max="31" required>
          <label>Mês:</label>
          <input type="number" name="mes" min="1" max="12" required>
          <label>Ano:</label>
          <input type="number" name="ano" required>
          <input type="submit" value="Validar">
          </form>';
        if (isset($_POST["dia"]) && isset($_POST["mes"]) && isset($_POST["ano"])) {
          $dia = $_POST["dia"];
          $mes = $_POST["mes"];
          $ano = $_POST["ano"];

          if (checkdate($mes, $dia, $ano)) {
            echo "<p>A data $dia/$mes/$ano é válida.</p>";
          } else {
            echo "<p>A data $dia/$mes/$ano é inválida.</p>";
          }
        }
        break;

      case "maior_numero":
        echo '<form method="post">
          <input type="hidden" name="exercicio" value="maior_numero">
          <label>Quantidade de números:</label>
          <input type="number" name="quantidade" min="2" required>
          <input type="submit" value="Continuar">
          </form>';
        if (isset($_POST["quantidade"])) {
          $qtd = $_POST["quantidade"];
          echo '<form method="post">
            <input type="hidden" name="exercicio" value="maior_numero">
            <input type="hidden" name="quantidade" value="' . $qtd . '">';
          for ($i = 1; $i <= $qtd; $i++) {
            echo '<label>Número ' . $i . ':</label>
              <input type="number" name="numero' . $i . '" required><br>';
          }
          echo '<input type="submit" value="Verificar">
            </form>';
        }

        if (isset($_POST["numero1"])) {
          $qtd = $_POST["quantidade"];
          $maior = $_POST["numero1"];
          for ($i = 2; $i <= $qtd; $i++) {
            $num = $_POST["numero" . $i];
            if ($num > $maior) {
              $maior = $num;
            }
          }
          echo "<p>O maior número é: $maior</p>";
        }
        break;

      case "senha_forte":
        echo '<form method="post">
          <input type="hidden" name="exercicio" value="senha_forte">
          <label>Senha:</label>
          <input type="password" name="senha" required>
          <input type="submit" value="Verificar">
          </form>';
        if (isset($_POST["senha"])) {
          $senha = $_POST["senha"];
          $forte = true;
          $msg = "";

          if (strlen($senha) < 8) {
            $forte = false;
            $msg .= "A senha deve ter pelo menos 8 caracteres.<br>";
          }

          if (!preg_match('/[A-Z]/', $senha)) {
            $forte = false;
            $msg .= "A senha deve conter pelo menos uma letra maiúscula.<br>";
          }

          if (!preg_match('/[a-z]/', $senha)) {
            $forte = false;
            $msg .= "A senha deve conter pelo menos uma letra minúscula.<br>";
          }

          if (!preg_match('/[0-9]/', $senha)) {
            $forte = false;
            $msg .= "A senha deve conter pelo menos um número.<br>";
          }

          if (!preg_match('/[\W]/', $senha)) {
            $forte = false;
            $msg .= "A senha deve conter pelo menos um caractere especial.<br>";
          }

          if ($forte) {
            echo "<p>A senha é forte.</p>";
          } else {
            echo "<p>A senha não é forte:</p><p>$msg</p>";
          }
        }
        break;

      case "login":
        echo '<form method="post">
          <input type="hidden" name="exercicio" value="login">
          <label>Usuário:</label>
          <input type="text" name="usuario" required>
          <label>Senha:</label>
          <input type="password" name="senha" required>
          <input type="submit" value="Entrar">
          </form>';
        if (isset($_POST["usuario"]) && isset($_POST["senha"])) {
          $user = $_POST["usuario"];
          $pass = $_POST["senha"];
          if ($user == "admin" && $pass == "123456") {
            echo "<p>Login bem-sucedido!</p>";
          } else {
            echo "<p>Usuário ou senha incorretos.</p>";
          }
        }
        break;
    }
  }
  ?>
</body>

</html>