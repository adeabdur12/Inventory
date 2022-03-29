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
                <div class="form-group py-2">
                        <label for="nama_item">Nama Item</label>
                        <input type="text" v-model="item.nama_item" class="form-control" >
                        <p class="text-danger small mb-0" v-if="validation.nama_item">
                            {{ validation.nama_item[0] }}
                            </p>
                    </div>
                    <div class="form-group py-2">
                        <label for="nama_item">Unit</label>
                        <select class="form-select" v-model="item.unit">
                            <option value="">-pilih-</option>
                            <option value="kg">kg</option>
                            <option value="pcs">pcs</option>
                        </select>
                        <p class="text-danger small mb-0" v-if="validation.unit">
                            {{ validation.unit[0] }}
                            </p>
                    </div>
                    <div class="form-group py-2">
                        <label for="nama_item">Stok</label>
                        <input type="number"  class="form-control" v-model="item.stok">
                        <p class="text-danger small mb-0" v-if="validation.stok">
                            {{ validation.stok[0] }}
                            </p>
                    </div>
                    <div class="form-group">
                        <label for="nama_item">Harga Satuan</label>
                        <input type="text" class="form-control" v-model="item.harga_satuan">
                        <p class="text-danger small mb-0" v-if="validation.harga_satuan">
                            {{ validation.harga_satuan[0] }}
                            </p>
                    </div>
                    <div class="form-group py-2">
                        <label for="nama_item">Barang</label>
                        <input type="file" accept=".jpg,.jpeg,.png" ref="barang" class="form-control" @change="onFileChange">
                        <p class="text-danger small mb-0" v-if="validation.barang">
                            {{ validation.barang[0] }}
                            </p>
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
                nama_item : '',
                unit : '',
                stok : '',
                harga_satuan :'',
                barang : ''
            });

            let validation = ref([]);
            
            const router = useRouter();

            function store(){
                let fd = new FormData();
                fd.append('nama_item', this.item.nama_item);
                fd.append('unit', this.item.unit);
                fd.append('stok', this.item.stok);
                fd.append('harga_satuan', this.item.harga_satuan);
                fd.append('barang', this.item.barang);

                axios.post('http://localhost:8000/api/item', fd)
                .then(() => {
                    router.push({
                        name : 'item.index'
                    });
                }).catch((error) => {
                    if (error.response.status == 422) {
                        validation.value = error.response.data.errors;
                    }
                    console.log(error);
                });
            }

            return {
                item,
                validation,
                router,
                store
            }
        },
        methods : {
            onFileChange(event){
                this.item.barang = event.target.files[0];
                
            }
        }
    }

</script>
