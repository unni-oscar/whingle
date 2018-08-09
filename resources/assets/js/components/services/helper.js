import moment from 'moment'
import TimeAgo from 'javascript-time-ago'
import en from 'javascript-time-ago/locale/en'
TimeAgo.locale(en)
const timeAgo = new TimeAgo('en-US')

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
    getValueByKey(key, data) {
        var i, len = data.length
        for (i=0; i < len; i++ ) {
            if(data[i] && data[i].hasOwnProperty('id')) {
                if(data[i]['id'] == key) {
                    return data[i]['name']
                }
            }
        }
        return null
    },
    getLastLogin(lastLoginDate) {
        return timeAgo.format(new Date(lastLoginDate));
    },
    getBackDate(yearsSubstract) {
        return moment().subtract(yearsSubstract, 'year').format('YYYY-MM-DD')
    },
    getAge(dob) {
        return moment().diff(dob, 'years') + ' yrs'
    }
}
