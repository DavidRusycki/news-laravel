<div>
    
<style>
.color-azul {
  background-color: #1f79ff !important;
  
}

.nav-link, .navbar-brand {
  color: white;
}

.navbar-nav .nav-link.active, .navbar-nav .nav-link.show {
  color: white;
  text-decoration: underline;
}

.navbar-brand:focus, .navbar-brand:hover {
  color: rgb(210, 210, 210);
}

.nav-link:hover {
  color: rgb(210, 210, 210);
}

</style>

<nav class="navbar navbar-expand-lg bg-body-tertiary color-azul">
  <div class="container-fluid .texto-branco ">
    <a  onClick="atualiza('home')" class="navbar-brand" href="/">NewsLetter</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a id="home" onClick="atualiza('home')" class="nav-link" aria-current="page" href="/">Home</a>
        </li>
        <li class="nav-item">
          <a  id="novo-post" onClick="atualiza('novo-post')" class="nav-link" href="/post/new">Novo Post</a>
        </li>
      </ul>
    </div>
  </div>
</nav>

<script>


function atualiza(string) {

  localStorage.selecionado = string;

  let list = document.getElementsByClassName('nav-link');

  for (let index = 0; index < list.length; index++) {
    list[index].classList.remove('active')
  }

  let elemento = document.getElementById(string);
  elemento.classList.add('active')
  
}

</script>


</div>