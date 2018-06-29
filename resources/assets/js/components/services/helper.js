export default {
    logout(){
        return new Promise((resolve, reject) => {
            axios.get(
                '/api/logout')
            .then(resp => {
                localStorage.removeItem('auth_token');
                window.axios.defaults.headers.common['Authorization'] = '';
                resolve(resp.data)
            })
            .catch(err => {
                reject(err.response.data)
            })
        })
    },

    check(){
        return axios.post('/api/check').then(response =>  {
            return true;
        }).catch(error =>{
            return false;
        });
    },
}
