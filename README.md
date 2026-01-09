# Page Card System

**Versão:** 1.1  
**Autor:** Mateus Botelho 
**Descrição:**  
Plugin WordPress avançado para exibição de páginas ou posts em formato de **cards editoriais**, com múltiplos layouts, slider, lista vertical e horizontal. Permite controle de título, excerpt, meta, cores e tipografia, além de preview visual no admin.

---

## 📌 Funcionalidades

- Exibição de posts ou páginas como **cards** reutilizáveis.
- Layouts:
  - `featured` – destaque principal
  - `list` – lista vertical com imagem à esquerda
  - `horizontal` – cards alinhados horizontalmente
  - `slider` – um card por vez, navegação por setas e autoplay
- **Slider** com 1 card por vez (page view)
- Controle de caracteres do título (`title_length`)
- Exibir ou ocultar:
  - Excerpt (`show_excerpt`)
  - Meta (data e autor) (`show_meta`)
- Admin avançado:
  - Preview visual de todos os layouts
  - Explicação de cada parâmetro
  - Exemplos de shortcode
- CSS modular por layout
- Responsivo
- Tipografia consistente (`Poppins`)

---

## ⚙️ Instalação

1. Copie a pasta `page-card-system` para o diretório `/wp-content/plugins/`
2. Ative o plugin pelo menu **Plugins** no WordPress
3. Acesse o menu **Page Cards** no admin para visualizar a documentação e preview dos layouts
4. Adicione o shortcode nas páginas, posts ou blocos que desejar

---

## 📝 Shortcode

```text
[pcs_cards type="post|page" parent="ID" layout="featured|list|horizontal|slider" limit="5" offset="0" order="DESC" title_length="0" show_excerpt="true|false" show_meta="true|false"]
```

## Parâmetros

| Parâmetro    | Tipo             | Descrição                                       |
| ------------ | ---------------- | ----------------------------------------------- |
| type         | `post` ou `page` | Tipo de conteúdo a exibir                       |
| parent       | Número           | ID do pai (somente para `page`)                 |
| layout       | Texto            | `featured`, `list`, `horizontal`, `slider`      |
| limit        | Número           | Número de itens exibidos                        |
| offset       | Número           | Deslocamento na query                           |
| order        | `ASC` ou `DESC`  | Ordem dos posts/pages                           |
| title_length | Número           | Limite de caracteres do título (0 = sem limite) |
| show_excerpt | `true`/`false`   | Exibe resumo/excerpt                            |
| show_meta    | `true`/`false`   | Exibe data e autor                              |

## Exemplos

```text
[pcs_cards layout="featured" limit="1"]
```
```text
[pcs_cards layout="list" type="page" parent="12" limit="5" title_length="60" show_excerpt="true"]
```
```text
[pcs_cards layout="slider" limit="5" show_excerpt="true" show_meta="true"]
```

🗂 Estrutura de Arquivos

page-card-system/
├── page-card-system.php          # Core do plugin
├── admin/
│   ├── admin-page.php            # Interface do admin com preview
│   └── admin-style.css           # Estilo do admin
├── assets/
│   ├── css/
│   │   ├── base.css              # CSS base, variáveis e responsivo
│   │   ├── featured.css          # Layout featured
│   │   ├── list.css              # Layout lista vertical
│   │   ├── horizontal.css        # Layout horizontal
│   │   └── slider.css            # Layout slider
│   └── js/
│       └── slider.js             # Inicialização do Swiper slider
├── templates/
│   ├── featured.php              # Template featured
│   ├── list.php                  # Template list
│   ├── horizontal.php            # Template horizontal
│   └── slider.php                # Template slider

## ⚡ Notas de Desenvolvimento

- Tipografia: Padrão Poppins para todos os títulos.

- Slider: Usa Swiper.js CDN (v10). Pode ser substituído localmente.

- Admin: Preview real e interativo de todos os layouts. Parâmetros documentados.

- CSS Modular: Cada layout possui seu arquivo de estilo próprio.

- Shortcode: Pode ser usado em posts, páginas ou blocos HTML.

## 📝 Changelog

1.1

- Slider corrigido para 1 card por vez

- Parâmetros title_length, show_excerpt e show_meta

- Admin com preview visual

- CSS modular e responsivo

- Base sólida para integração futura e extensões

1.0

- Primeira versão funcional com layouts featured, list, horizontal e slider

- Shortcode básico com limit, parent, order
