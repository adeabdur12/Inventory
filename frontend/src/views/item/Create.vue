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
            <form enctype="multipart/form-data">
                <div class="form-group">
                        <label for="nama_item">Nama Item</label>
                        <input type="text" name="nama_item" class="form-control" >
                        <p class="text-danger small mb-0"></p>
                    </div>
                    <div class="form-group">
                        <label for="nama_item">Unit</label>
                        <select class="form-select" name="unit">
                            <option value="">-pilih-</option>
                            <option value="kg">kg</option>
                            <option value="pcs">pcs</option>
                        </select>
                        <p class="text-danger small mb-0"></p>
                    </div>
                    <div class="form-group">
                        <label for="nama_item">Stok</label>
                        <input type="number"  class="form-control" name="stok">
                        <p class="text-danger small mb-0"></p>
                    </div>
                    <div class="form-group">
                        <label for="nama_item">Harga Satuan</label>
                        <input type="text" class="form-control" name="harga_satuan">
                        <p class="text-danger small mb-0"></p>
                    </div>
                    <div class="form-group">
                        <label for="nama_item">Barang</label>
                        <input type="file" ref="barang" class="form-control" @change="selectFile">
                        <p class="text-danger small mb-0"></p>
                    </div>
                    <div class="form-group mt-3">
                        <button class="btn btn-primary btn-sm" @click="sendForm">Submit</button>
                    </div>
            </form>
        </div>
    </div>
    
</div>
</div>
</template>

<script>
import axios from 'axios'
export default {
 name : 'Create Item',
 data(){
     return {
         item : {
             nama_item : '',
             unit : '',
             stok : '',
             harga_satuan : '',
             barang : ''
         }
     }
 },
 methods: {
     selectFile(){
         this.barang = this.$refs.barang.files[0]
     },sendFile(){
         const fd = new FormData();
         fd.append('barang', this.file);
         axios.post('http://localhost:8000/api/item',{file:this.file})
     }
 }
        
}
</script>
