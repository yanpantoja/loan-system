<template>
  <div id="app" class="h-100">
    <div class="mb-4">
        <nav class="navbar navbar-dark bg-dark">
            <span class="navbar-brand mx-auto mb-0 h1">Sistema de Empréstimos</span>
        </nav>
    </div>

    <div class="col-md-10 rounded mx-auto shadow bg-white text-left pb-4">

        <Form />

        <div>
            <table class="table table-bordered mt-5">
                <thead>
                    <tr>
                        <th scope="col">Day</th>
                        <th scope="col">Article Name</th>
                        <th scope="col">Author</th>
                        <th scope="col">Shares</th>
                        <th scope="col">Actions</th>
                    </tr>
                </thead>
                <tbody>
                <tr>
                    <th scope="row">1</th>
                    <td>Bootstrap 4 CDN and Starter Template</td>
                    <td>Cristina</td>
                    <td>2.846</td>
                    <td>
                        <button type="button" class="btn btn-success"><i class="fas fa-edit"></i></button>
                        <button type="button" class="btn btn-danger"><i class="far fa-trash-alt"></i></button>
                    </td>
                </tr>
                <tr>
                    <th scope="row">2</th>
                    <td>Bootstrap Grid 4 Tutorial and Examples</td>
                    <td>Cristina</td>
                    <td>3.417</td>
                    <td>
                        <button type="button" class="btn btn-success"><i class="fas fa-edit"></i></button>
                        <button type="button" class="btn btn-danger"><i class="far fa-trash-alt"></i></button>
                    </td>
                </tr>
                <tr>
                    <th scope="row">3</th>
                    <td>Bootstrap Flexbox Tutorial and Examples</td>
                    <td>Cristina</td>
                    <td>1.234</td>
                    <td>
                        <button type="button" class="btn btn-success"><i class="fas fa-edit"></i></button>
                        <button type="button" class="btn btn-danger"><i class="far fa-trash-alt"></i></button>
                    </td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
  </div>
</template>

<script>
import Form from './components/Form.vue'

export default {
  name: 'App',
  components: {
    Form
  }
}
</script>

<style>
#app {
  font-family: Avenir, Helvetica, Arial, sans-serif;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
  text-align: center;
  color: #2c3e50;
}
.vue-bg {
  background: #bce5d0;
}
</style>
