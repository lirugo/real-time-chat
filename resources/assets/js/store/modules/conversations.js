import api from '../api/all'
import conversation from "./conversation";

const state = {
    conversations: [],
    loadingConversation: false,
};

const getters = {
    allConversations: state => {
        return state.conversations
    }
};

const actions = {
    getConversations ({dispatch, commit}, page){
        // api req
        api.getConversations(1).then((response) => {
            commit('setConversations', response.data.data)
        })
        // set conversations
    }
};

const mutations = {
    setConversations(state, conversations){
        state.conversations = conversations
    }
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