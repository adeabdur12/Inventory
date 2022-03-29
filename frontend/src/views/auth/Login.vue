<template>
    <div>
        <nav class="navbar navbar-light bg-light ">
        <a class="navbar-brand d-flex" href="#">
        <img src="../../assets/logo.png" alt="" class="mt-2 ms-3" width="30" height="24">
        <h3 class="ms-3">Inventory</h3>
        </a>
    </nav>
    <div class="container mt-5">
        <div class="col-lg-5 col-md-5 mx-auto">
            <div class="card">
                <div class="card-header">
                    <h5 class="text-center">Login</h5>
                </div>
                <div class="card-body">
                    <form action="">
                          <div class="mb-3 row">
                            <label for="staticEmail" class="col-sm-3 col-form-label">Email</label>
                            <div class="col-sm-9">
                            <input type="text"  class="form-control" id="staticEmail" placeholder="email@example.com">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="inputPassword" class="col-sm-3 col-form-label">Password</label>
                            <div class="col-sm-9">
                            <input type="password" class="form-control" id="inputPassword">
                            </div>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-dark col-12">Login</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    </div>
</template>

<script>

export default{
    setup() {
        
    }
}
</script>
