<template>
    <div>
    <nav class="navbar navbar-expand-lg navbar-light bg-light py-3">
  <div class="container-fluid">
    <a class="navbar-brand fw-bold" href="/">Produk</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <router-link class="nav-link active" aria-current="page" to="/dashboard">Dashboard</router-link>
        </li>
        <li class="nav-item ms-3">
           <router-link to="/cart" class="nav-link"><i class="bi-cart h5"></i></router-link>
           <span class="badge bg-danger ms-4" style="position:absolute;margin-top:-35px;font-size:8px;">1</span>
        </li>
      </ul>
      <!-- <router-link class="fw-bold text-primary nav-link m-1" to="/login">Login</router-link>
      <router-link class="btn btn-dark nav-link text-white m-1" to="/register">Register</router-link> -->
    </div>
  </div>
</nav>

    <div class="container mt-4">
        <div class="row">
          <div v-for="(items, index) in item.data" :key="index" class="col-lg-3 p-2">
            <div class="card">
              <div class="col-auto" style="height:200px;">
                <img class="img-fluid" 
                style="
                width:100%;
                height:100%;
                object-fit:contain;
                object-position:center center;" 
                :src="path + items.barang" alt="">
              </div>
              <div class="card-footer ">
                <h4>{{ items.nama_item }}</h4>
                <h6 class="text-success mb-1">Rp {{ items.harga_satuan}}</h6>
                <span class="mb-2">Stok : {{ items.stok }}</span>
                <div class="text-center mt-2">
                <button class="btn btn-danger m-1 btn-sm ">Beli</button>
                <button class="btn btn-primary m-1 btn-sm">Masukan <i class="bi-cart"></i></button>
                </div>
              </div>
            </div>
          </div>
        </div>
    </div>
    </div>
</template>

<script >
import { onMounted ,ref } from 'vue'
import axios from 'axios'


export default {
    name :'Home',
    setup() {
          var path = "http://localhost:8000/storage/";
          let item = ref([]);
          onMounted(() => {
          axios.get('http://localhost:8000/api/item')
          .then((result) => {
            item.value = result.data
          }).catch((err) => {
            console.log(err.response.message)
          });
        
          });

        return {
          item,
          path,
          ref
        }
    }
    
}
</script>
