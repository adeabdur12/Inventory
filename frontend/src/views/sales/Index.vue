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
                <h4>Sales</h4>
                <router-link
                :to="{ name : 'item.create' }"
                class="btn btn-sm btn-primary m-1 rounded">Tambah Data</router-link>
                <hr>
            <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                    <th scope="col">No</th>
                    <th scope="col">Kode Transaksi</th>
                    <th scope="col">Tanggal Transaksi</th>
                    <th scope="col">item</th>
                    <th scope="col">Qty</th>
                    <th scope="col">Total Diskon</th>
                    <th scope="col">Total Harga</th>
                    <th scope="col">Total Bayar</th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="(sale, index) in sales.data" :key="index">
                        <td>1</td>
                        <td>{{ sale.kode_transaksi }}</td>
                        <td>{{ sale.tanggal_transaksi }}</td>
                        <td>{{ sale.item }}</td>
                        <td>{{ sale.total_diskon }}</td>
                        <td>{{ sale.total_harga }}</td>
                        <td>{{ sale.total_bayar }}</td>
                    <td>
                        <router-link
                        :to="{ name : 'item.edit',params:{id: sale.id} }"
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
        let sales = ref([]);
        var path = "http://localhost:8000/storage";
        // get data sales
        onMounted(() => {
            axios.get('http://localhost:8000/api/sales')
            .then((result) => {
                sales.value = result.data
            }).catch((err)=> {
                console.log(err.response.message)
            });
        });
        
        return {
                sales,
                path
            }
    }
}
</script>
