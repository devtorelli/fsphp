<article style="
    padding: 5px 20px;
    background: #eeeeee;
    border-radius: 4px;
">
  <h1><?= $profile->name; ?></h1>
  <p>Trabalha na <?= $profile->company; ?><br>
    <a title="Enviar e-mail" href="mailto: <?= $profile->email; ?>">Enviar e-mail</a>
  </p>

</article>
