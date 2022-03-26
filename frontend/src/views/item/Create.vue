<template>
  <div>
<nav class="navbar navbar-light bg-light">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Inventory</a>
  </div>
</nav>
<div class="container">
    <router-link
    :to="{ name : 'item.index' }"
    class="btn btn-sm btn-primary m-1 rounded mt-3">Kembali</router-link>
    <div class="card mt-3">
        <div class="card-header">
            <h4>Input Item</h4>
        </div>
        <div class="card-body">
            <form @submit.prevent="store()" enctype="multipart/form-data">
                <div class="form-group">
                        <label for="nama_item">Nama Item</label>
                        <input type="text" class="form-control" v-model="item.nama_item">
                        <p class="text-danger small mb-0"></p>
                    </div>
                    <div class="form-group">
                        <label for="nama_item">Unit</label>
                        <select class="form-select" v-model="item.unit">
                            <option value="">-pilih-</option>
                            <option value="kg">kg</option>
                            <option value="pcs">pcs</option>
                        </select>
                        <p class="text-danger small mb-0"></p>
                    </div>
                    <div class="form-group">
                        <label for="nama_item">Stok</label>
                        <input type="number"  class="form-control" v-model="item.stok">
                        <p class="text-danger small mb-0"></p>
                    </div>
                    <div class="form-group">
                        <label for="nama_item">Harga Satuan</label>
                        <input type="text" class="form-control" v-model="item.harga_satuan">
                        <p class="text-danger small mb-0"></p>
                    </div>
                    <div class="form-group">
                        <label for="nama_item">Barang</label>
                        <input  type="text" class="form-control" v-model="item.barang">
                        <p class="text-danger small mb-0"></p>
                    </div>
                    <div class="form-group mt-3">
                        <button class="btn btn-primary btn-sm">Submit</button>
                    </div>
            </form>
        </div>
    </div>
    
</div>
</div>
</template>

<script>
import { reactive, ref } from 'vue'
import { useRouter } from 'vue-router'
import axios from 'axios'

export default {
    setup(){
         
        const item = reactive({
            'nama_item' :'',
            'unit' : '',
            'stok' : '',
            'harga_satuan' : '',
            'barang' : ''
        });

    const validation = ref([]);
    const router = useRouter();

        function store(){
            // const formData = new FormData();
            // formData.append('barang',this.selectedFile , this.selectedFile.name)
            axios.post(
                'http://localhost:8000/api/item',
                item
            )
            .then(() => {
                router.push({
                    name : item.index
                })
            }).catch((err) => {
                validation.value = err.response.data
            });
        }

        return  {
            item,
            validation,
            router,
            store
        }
    }
        
}
</script>
