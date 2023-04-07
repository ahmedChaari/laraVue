export default {
    data() {
        return {
            
        }
    },
methods: {
    async callApi(method, url, objet){
      try {
       return await axios({
            method: method,
            url: url,
            data: objet
          });
      } catch (e) {
        return e.response;
      }

    }
},
}