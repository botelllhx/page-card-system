<div class="pcs-admin">

  <h1>Page Card System</h1>
  <p class="pcs-admin-sub">
    Sistema modular para exibição de páginas ou posts em formato de cards editoriais.
  </p>

  <section class="pcs-admin-section">
    <h2>Layouts Disponíveis</h2>

    <div class="pcs-layouts">

      <div class="pcs-layout-card">
        <strong>Featured</strong>
        <p>Card em destaque, ideal para conteúdo principal.</p>
        <code>[pcs_cards layout="featured" limit="1"]</code>
      </div>

      <div class="pcs-layout-card">
        <strong>List</strong>
        <p>Lista vertical com imagem à esquerda e texto à direita.</p>
        <code>[pcs_cards layout="list" limit="5" title_length="60"]</code>
      </div>

      <div class="pcs-layout-card">
        <strong>Horizontal</strong>
        <p>Cards em linha horizontal.</p>
        <code>[pcs_cards layout="horizontal" limit="4"]</code>
      </div>

      <div class="pcs-layout-card">
        <strong>Slider</strong>
        <p>Um card por vez, navegação por setas ou autoplay.</p>
        <code>[pcs_cards layout="slider" limit="5" show_excerpt="true"]</code>
      </div>

    </div>
  </section>

  <section class="pcs-admin-section">
    <h2>Parâmetros do Shortcode</h2>

    <table class="pcs-admin-table">
      <tr>
        <th>Parâmetro</th>
        <th>Descrição</th>
      </tr>
      <tr>
        <td><code>type</code></td>
        <td><code>post</code> ou <code>page</code></td>
      </tr>
      <tr>
        <td><code>parent</code></td>
        <td>ID da página pai (somente para pages)</td>
      </tr>
      <tr>
        <td><code>layout</code></td>
        <td>featured, list, horizontal, slider</td>
      </tr>
      <tr>
        <td><code>limit</code></td>
        <td>Número de itens exibidos</td>
      </tr>
      <tr>
        <td><code>title_length</code></td>
        <td>Limite de caracteres do título</td>
      </tr>
      <tr>
        <td><code>show_excerpt</code></td>
        <td>true / false</td>
      </tr>
      <tr>
        <td><code>show_meta</code></td>
        <td>Exibe data e autor</td>
      </tr>
    </table>
  </section>

</div>
