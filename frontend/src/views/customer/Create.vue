<template>
  <div>
<nav class="navbar navbar-light bg-light">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Inventory</a>
  </div>
</nav>
<div class="container">
    <router-link
    :to="{ name : 'customer.index' }"
    class="btn btn-sm btn-primary m-1 rounded mt-3">Kembali</router-link>
    <div class="card mt-3">
        <div class="card-header">
            <h4>Input Item</h4>
        </div>
        <div class="card-body">
            <form @submit.prevent="store()" enctype="multipart/form-data">
                <div class="form-group py-2">
                        <label for="nama">Nama</label>
                        <input type="text" v-model="customer.nama" class="form-control" >
                        <p class="text-danger small mb-0" v-if="validation.nama">
                            {{ validation.nama[0] }}
                            </p>
                    </div>
                    <div class="form-group py-2">
                        <label>Contact</label>
                        <input type="text" v-model="customer.contact" class="form-control" >
                        <p class="text-danger small mb-0" v-if="validation.contact">
                            {{ validation.contact[0] }}
                            </p>
                    </div>
                    <div class="form-group py-2">
                        <label>Email</label>
                        <input type="email"  class="form-control" v-model="customer.email">
                        <p class="text-danger small mb-0" v-if="validation.email">
                            {{ validation.email[0] }}
                            </p>
                    </div>
                    <div class="form-group">
                        <label>Alamat</label>
                        <textarea type="text" rows="3" class="form-control" v-model="customer.alamat"></textarea>
                        <p class="text-danger small mb-0" v-if="validation.alamat">
                            {{ validation.alamat[0] }}
                            </p>
                    </div>
                    <div class="form-group py-2">
                        <label>Diskon</label>
                        <input type="number" class="form-control" v-model="customer.diskon">
                        <p class="text-danger small mb-0" v-if="validation.diskon">
                            {{ validation.diskon[0] }}
                            </p>
                    </div>
                    <div class="form-group py-2">
                        <label>Tipe Diskon</label>
                        <select name="" id="" class="form-control">
                            <option value="">-pilih-</option>
                            <option value="fix">Fix</option>
                            <option value="persentase">Persentase</option>
                        </select>
                        <p class="text-danger small mb-0" v-if="validation.tipe_diskon">
                            {{ validation.tipe_diskon[0] }}
                            </p>
                    </div>
                    <div class="form-group py-2">
                        <label for="nama_item">KTP</label>
                        <input type="file" accept=".jpg,.jpeg,.png" ref="ktp" class="form-control" @change="onFileChange">
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
    <br><br>
</div>
</div>
</template>

<script>
import { reactive, ref } from 'vue'
import { useRouter } from 'vue-router'
import axios from 'axios'
    
    export default {
        setup(){
            const customer = reactive({
                nama : '',
                contact : '',
                email : '',
                alamat :'',
                diskon : '',
                tipe_diskon : '',
                ktp : '',
            });

            let validation = ref([]);
            
            const router = useRouter();

            function store(){
                let fd = new FormData();
                fd.append('nama', this.item.nama);
                fd.append('contact', this.item.contact);
                fd.append('email', this.item.email);
                fd.append('alamat', this.item.alamat);
                fd.append('diskon', this.item.diskon);
                fd.append('tipe_diskon', this.item.tipe_diskon);
                fd.append('ktp', this.item.ktp);

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
                customer,
                validation,
                router,
                store
            }
        },
        methods : {
            onFileChange(event){
                this.item.ktp = event.target.files[0];
                
            }
        }
    }

</script>
