<template>
    <div class="container-fluid">
                <h4>Data Semua Item</h4>
                <router-link
          :to="{ name : 'item.create' }"
          class="btn btn-sm btn-primary m-1 rounded">Tambah Data</router-link>
                <hr>
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
    <tr>
      <th scope="row">1</th>
      <td>Sepatu</td>
      <td>kg</td>
      <td>20</td>
      <td>10000</td>
      <td>gbr</td>
      <td>
          
          <a href="" class="btn btn-sm btn-primary m-1"><i class="bi-pencil"></i></a>
          <a href="" class="btn btn-sm btn-danger m-1"><i class="bi-trash"></i></a>
      </td>
    </tr>
  </tbody>
</table>
   </div>
</template>

<script>

export default {
  
}
</script>
