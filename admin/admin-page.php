<div class="pcs-admin">
  <h1>Page Card System</h1>

  <div class="pcs-admin-grid">

    <div class="pcs-admin-card">
      <h2>Layouts disponíveis</h2>

      <span class="pcs-admin-badge">featured</span>
      <span class="pcs-admin-badge">list</span>
      <span class="pcs-admin-badge">horizontal</span>
      <span class="pcs-admin-badge">slider</span>

      <p>Todos os layouts respeitam imagem destacada e título.</p>
    </div>

    <div class="pcs-admin-card">
      <h2>Exemplo básico</h2>
      <code>[pcs_cards layout="featured" limit="1"]</code>
    </div>

    <div class="pcs-admin-card">
      <h2>Lista editorial (imagem + título)</h2>
      <code>[pcs_cards layout="list" limit="5"]</code>
    </div>

    <div class="pcs-admin-card">
      <h2>Páginas filhas</h2>
      <p>Use o <strong>parent</strong> para puxar páginas abaixo de outra.</p>
      <code>[pcs_cards type="page" parent="103580" layout="list"]</code>
    </div>

    <div class="pcs-admin-card">
      <h2>Slider de recentes</h2>
      <code>[pcs_cards layout="slider" limit="6"]</code>
    </div>

  </div>
</div>
