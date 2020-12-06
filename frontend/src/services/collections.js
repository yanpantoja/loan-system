import { http } from './config';

export default {

    listar:() => {
        return http.get('collections?items=100')
    },

    salvar:(collection) => {
        return http.post('collections', collection)
    },

    atualizar:(collection, id) => {
        return http.put('collections/'+id, collection)
    }
}
