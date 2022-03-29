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
                         <router-link
                        :to="{ name : 'customer.index' }"
                        class="nav-link py-3 px-2"
                        title="" data-bs-toggle="tooltip" data-bs-placement="right" data-bs-original-title="Home"><i class="bi-people fs-1"></i>
                        </router-link>
                    </li>
                    <li>
                        <router-link
                        :to="{ name : 'sales.index' }"
                        class="nav-link py-3 px-2"
                        title="" data-bs-toggle="tooltip" data-bs-placement="right" data-bs-original-title="Home"><i class="bi-bag-check fs-1"></i>
                        </router-link>
                    </li>
                </ul>
            </div>
        </div>
        <div class="col-sm p-3 min-vh-100">
            <div class="container-fluid">
                <h4>Customer</h4>
                <hr>
                <router-link
                :to="{ name : 'customer.create' }"
                class="btn btn-sm btn-primary m-1 rounded">Tambah Data</router-link>
            <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                    <th scope="col">No</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Contact</th>
                    <th scope="col">Email</th>
                    <th scope="col">Alamat</th>
                    <th scope="col">Diskon</th>
                    <th scope="col">Tipe Diskon</th>
                    <th scope="col">KTP</th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="(customers, index) in customer.data" :key="index">
                        <td>1</td>
                        <td>{{ customers.nama}}</td>
                        <td>{{ customers.contact}}</td>
                        <td>{{ customers.email}}</td>
                        <td>{{ customers.alamat }}</td>
                        <td>{{ customers.diskon}}</td>
                        <td>{{ customers.tipe_diskon }}</td>
                        <td>{{ customers.ktp }}</td>
                    <td>
                        <router-link
                        :to="{ name : 'item.edit',params:{id: customers.id} }"
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
        let customer = ref([]);
        var path = "http://localhost:8000/storage";
        // get data customer
        onMounted(() => {
            axios.get('http://localhost:8000/api/customer')
            .then((result) => {
                customer.value = result.data
            }).catch((err)=> {
                console.log(err.response.message)
            });
        });

        return {
                customer,
                path
            }
    }
}
</script>
