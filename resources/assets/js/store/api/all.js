export default {
    getConversation (page) {
        return new Promise((resolve, reject) => {
            axios.get('/webapi/conversations/' + page).then((response) => {
                resolve(response);
            });
        })
    },
    getConversations (page) {
        return new Promise((resolve, reject) => {
            axios.get('/webapi/conversations?page=' + page).then((response) => {
                resolve(response);
            });
        })
    }
}