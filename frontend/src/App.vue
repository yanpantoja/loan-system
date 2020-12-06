<template>
  <div id="app">

    <nav>
      <div class="nav-wrapper blue darken-1">
        <a href="#" class="brand-logo center">Sistema de Empréstimo</a>
      </div>
    </nav>

    <div class="container">

        <ul>
            <li v-for="(error, index) of errors" :key="index">
                {{ error[0] }}
            </li>
        </ul>

        <form @submit.prevent="salvar">

            <label>Nome</label>
            <input type="text" placeholder="Nome" v-model="collection.name">
            <label>Tipo</label>
            <input type="text" placeholder="Tipo" v-model="collection.collection_type">

            <button class="waves-effect waves-light btn-small">Salvar<i class="material-icons left">save</i></button>

        </form>

        <table>

            <thead>

            <tr>
                <th>NOME</th>
                <th>TIPO</th>
                <th>EMPRESTADO</th>
                <th>OPÇÕES</th>
            </tr>

            </thead>

            <tbody>

            <tr v-for="collection of collections" :key="collection.id">

                <td>{{collection.name}}</td>
                <td>{{collection.collection_type.split("\\")[3]}}</td>
                <td>{{collection.loaned}}</td>

                <td>
                <button @click="editar(collection)" class="waves-effect btn-small blue darken-1"><i class="material-icons">create</i></button>
                <button class="waves-effect btn-small red darken-1"><i class="material-icons">delete_sweep</i></button>
                </td>

            </tr>

            </tbody>

        </table>

    </div>

  </div>
</template>

<script>

import Collections from './services/collections'

export default {

    data() {
        return {
            collection: {
                id: '',
                name: '',
                collection_type: '',
            },
            collections: [],
            errors: []
        }
    },

    mounted() {
        this.listar()
    },

    methods: {
        listar() {
            Collections.listar().then(response => {
                this.collections = response.data.data
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

        setup() {
            const options = [
            'element',
            'ant-design-vue',
            'vuetify'
            ]

            return {
                options
            }
        }
    }

}

</script>

<style>

</style>
