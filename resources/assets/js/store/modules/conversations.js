import conversation from "./conversation";
import api from '../api/all'

const state = {
    conversation: [],
    loadingConversation: false,
};

const getters = {

};

const actions = {
    getConversations ({dispatch, commit}, page){
        // api req
        // set conversations
    }
};

const mutations = {

};

const modules = {
    conversation: conversation
};

export default {
    state,
    getters,
    mutations,
    actions,
    modules
}