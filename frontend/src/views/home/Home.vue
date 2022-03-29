<script >

export default {
    name :'Home',
    setup() {
    }
}
</script>


<template>
    <div>
    <nav class="navbar navbar-expand-lg navbar-light bg-light py-3">
  <div class="container-fluid">
    <a class="navbar-brand fw-bold" href="#">Produk</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <router-link class="nav-link active" aria-current="page" to="/">Home</router-link>
        </li>
        <li class="nav-item ms-3">
            <form class="d-flex ">
            <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-dark" type="submit">Search</button>
        </form>
        </li>
      </ul>
      <router-link class="fw-bold text-primary nav-link m-1" to="/login">Login</router-link>
      <router-link class="btn btn-dark nav-link text-white m-1" to="/register">Register</router-link>
    </div>
  </div>
</nav>

    <div class="container">
        <p>sdfkyg</p>
    </div>
    </div>
</template>
