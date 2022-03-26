<template>
<div class="container-fluid">
    <nav class="navbar navbar-light bg-light d-none d-lg-block d-xl-block">
        <a class="navbar-brand d-flex" href="#">
        <img src="../../assets/logo.png" alt="" class="mt-2" width="30" height="24">
        <h3 class="ms-3">Inventory</h3>
        </a>
    </nav>
    <div class="row mt-auto">
        <div class="col-sm-auto bg-light sticky-top">
            <div class="d-flex flex-sm-column flex-row flex-nowrap bg-light align-items-center sticky-top">
                <ul class="nav nav-pills nav-flush flex-sm-column flex-row flex-nowrap mb-auto mx-auto text-center align-items-center">
                    <li class="nav-item">
                        <router-link
                        :to="{ name : 'item.index' }"
                        class="nav-link py-3 px-2"
                        title="" data-bs-toggle="tooltip" data-bs-placement="right" data-bs-original-title="Home"><i class="bi-house fs-1"></i></router-link>
                    </li>
                    <li>
                        <a href="#" class="nav-link py-3 px-2" title="" data-bs-toggle="tooltip" data-bs-placement="right" data-bs-original-title="Dashboard">
                            <i class="bi-people fs-1"></i>
                        </a>
                    </li>
                    <li>
                        <a href="#" class="nav-link py-3 px-2" title="" data-bs-toggle="tooltip" data-bs-placement="right" data-bs-original-title="Orders">
                            <i class="bi-bag-check fs-1"></i>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="col-sm p-3 min-vh-100">
            <div class="container-fluid">
                <h4>Data Semua Item</h4>
                <!-- <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#exampleModal">
                Tambah Data
                </button> -->
                <router-link
                :to="{ name : 'item.create' }"
                class="btn btn-sm btn-primary m-1 rounded">Tambah Data</router-link>
                <hr>
            <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                    <th scope="col">No</th>
                    <th scope="col">Nama Item</th>
                    <th scope="col">Unit</th>
                    <th scope="col">Stok</th>
                    <th scope="col">Harga Satuan</th>
                    <th scope="col">Barang</th>
                    <th scope="col">Opsi</th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="(items, index ) in item.data" :key="index">
                    <th scope="row">1</th>
                    <td>{{ items.nama_item}}</td>
                    <td>{{ items.unit }}</td>
                    <td>{{ items.stok}}</td>
                    <td>{{ items.harga_satuan}}</td>
                    <td id="main">
                        <img :src="path + items.barang"  alt="" class="img-fluid" width="100">
                        
                    </td>
                    <td>
                        <router-link
                        :to="{ name : 'item.edit',params:{id: 1} }"
                        class="btn btn-sm btn-primary m-1 rounded shadow"><i class="bi-pencil"></i></router-link>
                        <button class="btn btn-sm btn-danger shadow"><i class="bi-trash"></i></button>
                    </td>
                    </tr>
                </tbody>
                </table>
    </div>
    
            </div>
        </div>
    </div>
</div>
</template>

<script>
import axios from 'axios'
import { onMounted, ref } from 'vue'

export default {
    
   setup() {
       let item = ref([]);
       var path = "http://localhost:8000/storage/";
       onMounted(() => {
           // get data item
           axios.get('http://localhost:8000/api/item')
           .then((result) => {
               item.value = result.data
           }).catch((err) => {
               console.log(err.response.message)
           });
       });

       return {
           item,
           path
       }
   }
}
</script>
