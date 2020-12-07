import { http } from './config';

export default {

    listar:() => {
        return http.get('collections')
    },

    navigate:(page) => {
        return http.get('collections?page='+page)
    },

    salvar:(collection) => {
        return http.post('collections', collection)
    },

    atualizar:(collection, id) => {
        return http.put('collections/'+id, collection)
    },

    apagar:(collection, id) => {
        return http.delete('collections/'+id, {data: collection})
    }
}
