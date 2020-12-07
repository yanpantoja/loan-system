<template>
    <form id="form" v-on:submit.prevent="submit">
        <div class="row">
            <div class="col-12 form-group">
                <label class="col-form-label col-form-label-lg">Nome</label>
                <input type="text" placeholder="Nome da coleção" class="form-control">
            </div>
            <div class="col-12 form-group">
                <label class="col-form-label col-form-label-lg">Tipo</label>
                <select class="form-control form-control">
                    <option value="">Selecione o tipo da coleção</option>
                    <option :value="type" :key="index" v-for="(type, index) in typesCollections">{{ type }}</option>
                </select>
            </div>
            <div class="col-12 form-group">
                <label class="col-form-label col-form-label-lg">Sua coleção está emprestada?</label>
                <select class="form-control form-control">
                    <option value="Sim">Não</option>
                    <option value="Não">Sim</option>
                </select>
            </div>
            <div class="col-12 form-group">
                <label class="col-form-label col-form-label-lg">Se sim, para quem?</label>
                <div class="form-row">
                    <div class="form-group col-6">
                        <input type="text" placeholder="Nome da pessoa" class="form-control form-control">
                    </div>
                    <div class="form-group col-6">
                        <input type="text" placeholder="E-mail de contato" class="form-control form-control">
                    </div>
                </div>
            </div>
            <div class="col-12 form-group text-center">
                <button class="btn btn-vue btn-lg col-3">Salvar</button>
            </div>
        </div>
    </form>
</template>
<script>

export default {
    name: 'Form',
    data() {
        return {
            typesCollections: [
                'Livro',
                'Cd',
                'Dvd'
            ]
        }
    },

    mounted: function() {

    },

    methods: {

    }
}
</script>
<style>
.btn-vue{
    background: #53B985;
    color: #31485D;
    font-weight: bold;
}
</style>
