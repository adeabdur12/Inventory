<template>
    <div>
        <nav class="navbar navbar-expand-lg navbar-light bg-light py-3">
            <div class="container-fluid">
                <a class="navbar-brand fw-bold" href="/">Cart</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                    <router-link class="nav-link active btn btn-primary btn-sm text-white" aria-current="page" to="/">Kembali</router-link>
                    </li>
                </ul>
                </div>
            </div>
            </nav>
        <div class="container mt-3">
            <div class="card shadow">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="col-10 m-2 border mx-auto" style="height:350px;">
                        <img class="img-fluid" 
                        style="
                        width:100%;
                        height:100%;
                        object-fit:contain;
                        object-position:center center;" 
                        src="http://localhost:8000/storage/barang/HUcZ9gjiQyA8Si2oOVUaHqxJ4GJ6JIFI0gW3tRaS.jpg" alt="">
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="m-2 mt-3">
                            <h3>Barang</h3>
                            <h4 class="text-success">Rp 200000</h4>
                            <h6 class="mt-3">Quantity</h6>
                            <div class="d-flex col-6 ">
                                <button class="btn btn-primary btn-sm" @click="count--"><i class="bi-dash"></i></button>
                                <input type="text" class="form-control" v-model="count">
                                <button class="btn btn-primary btn-sm" @click="count++"><i class="bi-plus"></i></button>
                            </div>
                            <div class="mt-3">
                                <button class="btn btn-primary btn-sm m-1">Beli</button>
                                <button class="btn btn-danger btn-sm m-1"><i class="bi-trash"></i></button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import { reactive } from '@vue/reactivity'

export default {
    data(){
        return {
            count : 0
        }
    },
    setup(){

    }
}
</script>
