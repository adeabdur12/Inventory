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
            <div class="row">
                <div class="form-group py-2 mt-2">
                        <div class="col-7 col-lg-2 col-md-2 col-xl-2 border"
                        style="height:140px;">
                        <img v-if="url" :src="url"  alt="" class="img-fluid" style="
                        object-fit:contain;
                        object-position:center center;
                        width: 100%;
                        height:100%;">
                        <img v-else :src="path + item.barang"  alt="" class="img-fluid" style="
                        object-fit:contain;
                        object-position:center center;
                        width: 100%;
                        height:100%;">
                        </div>
                        <form @submit.prevent="submitImg()" enctype="multipart/form-data">
                        <label for="imgBarang" class="btn btn-primary btn-sm m-1 mt-2"><i class="bi-pencil"></i> Ubah</label>
                        <input type="file" id="imgBarang" style="display:none;" accept=".jpg,.jpeg,.png" ref="barang" class="form-control" @change="onFileChange">
                        <button v-if="url" type="submit" class="btn btn-info btn-sm m-1 mt-2 text-white">Simpan</button>
                        </form>
                        <p class="text-danger small mb-0" v-if="validateUrl.barang">
                            {{ validateUrl.barang[0] }}
                            </p>
                </div>
            </div>
            <form @submit.prevent="update()" enctype="multipart/form-data">
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
                    
                    <div class="form-group mt-3">
                        <button class="btn btn-primary btn-sm">Simpan</button>
                    </div>
            </form>
        </div>
    </div>
    
</div>
</div>
</template>

<script>
import { reactive, ref, onMounted } from 'vue'
import { useRouter , useRoute } from 'vue-router'
import axios from 'axios'
    
    export default {
        data(){
            return {
                url : null,
            }
        },
        setup(){
            var path = "http://localhost:8000/storage/";
            let item = reactive({
                nama_item : '',
                unit : '',
                stok : '',
                harga_satuan :''
            });

            let img = reactive({
                barang : '',
            });

        
            const validation = ref([]);
            const validateUrl = ref([]);
            
            const router = useRouter();
            const route = useRoute();

            function submitImg(){
                let fd = new FormData();
                fd.append('barang', this.img.barang);
                axios.put(`http://localhost:8000/api/item_img/${route.params.id}`, fd)
                .then(() => {
                    router.push({
                        name :'item.index'
                    });
                }).catch((err) => {
                    validateUrl.value = err.response.data.errors
                });
            }


            onMounted(() => {
                axios.get(`http://localhost:8000/api/item/${route.params.id}`)
                .then((result) => {
                    item.nama_item = result.data.data.nama_item
                    item.unit = result.data.data.unit
                    item.stok = result.data.data.stok
                    item.harga_satuan = result.data.data.harga_satuan
                    item.barang = result.data.data.barang
                })
            });

            function update(){
                axios.put(`http://localhost:8000/api/item/${route.params.id}`, item )
                .then(() => {
                    router.push({
                        name : 'item.index'
                    });
                }).catch((error) => {
                        validation.value = error.response.data.errors
                });
            }   
            
            return {
                item,
                validation,
                validateUrl,
                img,
                submitImg,
                router,
                route,
                path,
                update
            }
        }, 
        methods : {
            onFileChange(event){
               this.img.barang = event.target.files[0];
               this.url = URL.createObjectURL(event.target.files[0]);
            }
        }
        
    }

</script>
