<template>
  <div id="app" class="h-100">
    <div class="mb-4">
        <nav class="navbar navbar-dark bg-dark">
            <span class="navbar-brand mx-auto mb-0 h1">Sistema de Empréstimos</span>
        </nav>
    </div>

    <div class="col-md-10 rounded mx-auto shadow bg-white text-left pb-4">

        <form @submit.prevent="salvar">
            <div class="row">
                <div class="col-12 mt-4">
                  <div v-for="(error, index) of errors" :key="index" class="alert alert-danger" role="alert">
                      {{ error[0] }}
                  </div>
                </div>

                <div class="mx-auto text-center">
                    <h2>Cadastrar nova coleção</h2>
                </div>

                <div class="col-12 form-group">
                    <label class="col-form-label col-form-label-lg">Nome</label>
                    <input type="text" placeholder="Nome da coleção" class="form-control" v-model="collection.name">
                </div>
                <div class="col-12 form-group">
                    <label class="col-form-label col-form-label-lg">Tipo</label>
                    <select class="form-control form-control" v-model="collection.collection_type">
                        <option value="">Selecione o tipo da coleção</option>
                        <option :value="type" :key="index" v-for="(type, index) in typesCollections">{{ type }}</option>
                    </select>
                </div>
                <div class="col-12 form-group">
                    <label class="col-form-label col-form-label-lg">Sua coleção está emprestada?</label>
                    <select class="form-control form-control" v-model="collection.loaned">
                        <option value="Não">Não</option>
                        <option value="Sim">Sim</option>
                    </select>
                </div>
                <div class="col-12 form-group" v-if="collection.loaned === 'Sim'">
                    <label class="col-form-label col-form-label-lg">Para quem?</label>
                    <div class="form-row">
                        <div class="form-group col-6">
                            <input type="text" placeholder="Nome da pessoa" class="form-control form-control" v-model="collection.user_name">
                        </div>
                        <div class="form-group col-6">
                            <input type="text" placeholder="E-mail de contato" class="form-control form-control" v-model="collection.email">
                        </div>
                    </div>
                </div>
                <div class="col-12 form-group text-center">
                    <button class="btn btn-primary btn-lg col-3">Salvar</button>
                </div>
            </div>
        </form>
        <hr>

        <div class="row mt-4">

            <div class="mx-auto text-center">
                    <h2>Lista de coleções</h2>
            </div>

            <table class="table table-bordered mt-5 text-center">
                <thead>
                    <tr>
                        <th scope="col">Nome</th>
                        <th scope="col">Tipo</th>
                        <th scope="col">Emprestado</th>
                        <th scope="col">
                          <div class="col-md-12">
                            <div>Nome</div>
                            <div>E-mail</div>
                          </div>
                        </th>
                        <th scope="col">Opções</th>
                    </tr>
                </thead>
                <tbody>
                <tr v-for="collection of collections" :key="collection.id">
                    <td class="align-middle">{{collection.name}}</td>
                    <td class="align-middle">{{collection.collection_type.split("\\")[3]}}</td>
                    <td class="align-middle">{{collection.loaned}}</td>
                    <td class="align-middle">
                      <div class="col-md-12">
                        <div>{{collection.user_name}}</div>
                        <div><p class="font-italic"><small>{{collection.email}}</small></p></div>
                      </div>
                    </td>
                    <td>
                        <button @click="editar(collection)" type="button" class="btn btn-success"><i class="fas fa-edit"></i></button>
                        <button type="button" class="btn btn-danger"><i class="far fa-trash-alt"></i></button>
                    </td>
                </tr>
                </tbody>
            </table>
        </div>
        <div class="row">
            <div class="mx-auto">
                <vc-pagination :source="pagination" @navigate="navigate"></vc-pagination>
            </div>
        </div>
    </div>
  </div>
</template>

<script>
import Collections from './services/collections'
import VcPagination from './components/Pagination'

export default {

    components: {
        VcPagination
    },

    data() {
        return {
            collection: {
                id: '',
                name: '',
                user_name: '',
                email: '',
                collection_type: '',
                loaned: 'Não',
            },
            collections: [],
            errors: [],
            typesCollections: [
                'Livro',
                'Cd',
                'Dvd'
            ],
            pagination: {}
        }
    },

    mounted() {
        this.listar()
    },

    methods: {

        listar() {
            Collections.listar().then(response => {
              console.log(response.data.data)
                this.collections = response.data.data
                this.pagination = response.data
            })
        },

        salvar() {
            if(!this.collection.id) {
                Collections.salvar(this.collection).then(response => {
                    this.collection = {}
                    alert(response.data.message.name + ' salvo com sucesso!')
                    this.listar()
                    this.errors = []
                }).catch(e => {
                    console.log(e.response.data)
                    this.errors = e.response.data
                })
            }else {
                Collections.atualizar(this.collection, this.collection.id).then(response => {
                    this.collection = {}
                    alert(response.data.message.name + ' atualizado com sucesso!')
                    this.listar()
                    this.errors = []
                }).catch(e => {
                    console.log(e.response.data)
                    this.errors = e.response.data
                })
            }
        },

        editar(collection) {
            this.collection = collection
        },

        navigate(page) {
            Collections.navigate(page).then(response => {
                this.collections = response.data.data
                this.pagination = response.data
            })
        }
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
