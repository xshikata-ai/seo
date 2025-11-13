<?php
include dirname(__FILE__) . '/.private/config.php';
?>
<!DOCTYPE html>
<html lang="pt">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="COC CONSULTING - Soluções de contabilidade e consultoria para o seu sucesso empresarial.">
  <meta name="keywords" content="Contabilidade, Consultoria, Fiscalidade, Angola, Legalização de empresas, Processamento Salarial">
  <meta name="author" content="COC CONSULTING">
  <title>COC CONSULTING | Contabilidade e Consultoria em Angola</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" integrity="sha512-yHCK29kGHLHOjkWgl3bC4t1DcL9OVj0SKmINa+rXmFpjT9P9GGhd8NvdzV6LEho6SBnHdYchc+0FvZf8XvPl0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <style>
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }
    html, body {
      height: 100%;
      font-family: Arial, sans-serif;
      background-color: #fff;
      color: #333;
      line-height: 1.6;
    }
    header {
      background: #001f3f;
      color: white;
      padding: 20px 0;
      position: fixed;
      width: 100%;
      top: 0;
      z-index: 1000;
      box-shadow: 0 2px 5px rgba(0,0,0,0.1);
    }
    nav {
      display: flex;
      justify-content: space-between;
      align-items: center;
      max-width: 1100px;
      margin: auto;
      padding: 0 20px;
    }
    nav a {
      color: white;
      text-decoration: none;
      margin-left: 20px;
      font-weight: 500;
      transition: color 0.3s ease;
    }
    nav a:hover {
      color: #00bfff;
    }
    .banner {
      background: url("https://images.unsplash.com/photo-1600880292203-757bb62b4baf?auto=format&fit=crop&w=1400&q=80") center/cover no-repeat;
      height: 90vh;
      display: flex;
      align-items: center;
      justify-content: center;
      text-align: center;
      padding: 20px;
    }
    .banner h1 {
      font-size: 3rem;
      background: rgba(0, 0, 0, 0.5);
      padding: 20px;
      border-radius: 10px;
      color: #fff;
    }
    main {
      padding-top: 100px;
    }
    section {
      padding: 60px 20px;
      max-width: 1100px;
      margin: auto;
    }
    h2 {
      font-size: 2rem;
      margin-bottom: 20px;
      color: #001f3f;
    }
    .servicos-container {
      display: flex;
      flex-wrap: wrap;
      gap: 20px;
      justify-content: center;
    }
    .servico-card {
      flex: 1 1 250px;
      border: 1px solid #ccc;
      border-radius: 8px;
      padding: 20px;
      text-align: center;
      box-shadow: 0 2px 6px rgba(0,0,0,0.1);
      background-color: #f9f9f9;
    }
    .servico-card img {
      width: 64px;
      height: 64px;
      margin-bottom: 10px;
    }
    .contato form {
      display: flex;
      flex-direction: column;
      gap: 15px;
    }
    .contato input, .contato textarea {
      padding: 12px;
      border: 1px solid #ccc;
      font-size: 1rem;
      border-radius: 5px;
    }
    .contato button {
      padding: 12px;
      background: #001f3f;
      color: white;
      border: none;
      cursor: pointer;
      border-radius: 5px;
      transition: background 0.3s ease;
    }
    .contato button:hover {
      background: #003366;
    }
    footer {
      background: #001f3f;
      color: white;
      text-align: center;
      padding: 20px;
    }
    iframe {
      border-radius: 8px;
      box-shadow: 0 2px 6px rgba(0,0,0,0.1);
    }
    .info-line i {
      margin-right: 8px;
      color: #001f3f;
    }
  </style>
</head>
<body>
  <header>
    <nav>
      <div><strong>COC CONSULTING</strong></div>
      <div>
        <a href="#">Home</a>
        <a href="#sobre">Sobre</a>
        <a href="#servicos">Serviços</a>
        <a href="#contato">Contato</a>
        <a href="#endereco">Endereço</a>
      </div>
    </nav>
  </header>

  <div class="banner">
    <h1>Excelência em Contabilidade e Consultoria para o Futuro da Sua Empresa</h1>
  </div>

  <main>
    <section id="sobre">
      <h2>Sobre a COC CONSULTING</h2>
      <p>Na COC CONSULTING, ajudamos empresas a crescer com segurança, transparência e inteligência fiscal. Com anos de experiência no setor, oferecemos soluções personalizadas em contabilidade, fiscalidade e gestão empresarial.</p>
    </section>

    <section id="servicos">
      <h2>Nossos Serviços</h2>
      <div class="servicos-container">
        <div class="servico-card">
          <img src="https://cdn-icons-png.flaticon.com/512/4139/4139981.png" alt="Contabilidade">
          <h3>Contabilidade Geral e Fiscal</h3>
          <p>Apuração de impostos, escrituração contábil, demonstrações financeiras, balancetes mensais e controle patrimonial.</p>
        </div>
        <div class="servico-card">
          <img src="https://cdn-icons-png.flaticon.com/512/2965/2965567.png" alt="Legalização">
          <h3>Abertura e Legalização de Empresas</h3>
          <p>Registo de empresa, NIF, pacto social, inscrição na segurança social e licenciamento de atividade.</p>
        </div>
        <div class="servico-card">
          <img src="https://cdn-icons-png.flaticon.com/512/4329/4329973.png" alt="Consultoria">
          <h3>Consultoria Financeira e Empresarial</h3>
          <p>Planejamento estratégico, viabilidade, estruturação de custos, fluxo de caixa e performance.</p>
        </div>
        <div class="servico-card">
          <img src="https://cdn-icons-png.flaticon.com/512/1250/1250620.png" alt="RH">
          <h3>Processamento Salarial e RH</h3>
          <p>Folha de pagamento, impostos trabalhistas, admissões, rescisões e obrigações legais.</p>
        </div>
        <div class="servico-card">
          <img src="https://cdn-icons-png.flaticon.com/512/2889/2889676.png" alt="Declarações">
          <h3>Declarações Fiscais e Legais</h3>
          <p>Entrega de declarações, obrigações acessórias e cumprimento de prazos fiscais.</p>
        </div>
      </div>
    </section>

    <section id="contato" class="contato">
      <h2>Fale Conosco</h2>
      <form action="enviar.php" method="POST">
        <input type="text" name="nome" placeholder="Seu nome" required>
        <input type="email" name="email" placeholder="Seu e-mail" required>
        <textarea name="mensagem" rows="5" placeholder="Escreva sua mensagem aqui..." required></textarea>
        <button type="submit">Enviar Mensagem</button>
      </form>
    </section>

    <section id="endereco">
      <h2>Endereço e Contactos</h2>
      <p class="info-line"><i class="fas fa-map-marker-alt"></i> Rua das Empresas, Nº 123, Bairro Central, Luanda</p>
      <p class="info-line"><i class="fas fa-phone"></i> +244 923 456 789</p>
      <p class="info-line"><i class="fas fa-envelope"></i> info@coc-consulting-ao-196014.hostingersite.com</p>
      <p class="info-line"><i class="fas fa-clock"></i> Segunda a Sexta, das 8h00 às 17h00</p>
      <h3 style="margin-top: 30px;">Localização no Mapa</h3>
      <iframe src="https://maps.google.com/maps?q=Luanda&t=&z=13&ie=UTF8&iwloc=&output=embed"></iframe>
    </section>
  </main>

  <footer>
    <p>&copy; 2025 COC CONSULTING. Todos os direitos reservados.</p>
  </footer>
</body>
</html>
