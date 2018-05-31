import api from '../api/all'
import conversation from "./conversation";

const state = {
    conversations: [],
    loadingConversations: false,
};

const getters = {
    allConversations: state => {
        return state.conversations
    },
    loadingConversations: state => {
        return state.loadingConversations
    }
};

const actions = {
    getConversations ({dispatch, commit}, page){
        // set loading status true
        commit('setConversationsLoading', true)
        // api request
        api.getConversations(1).then((response) => {
            commit('setConversations', response.data.data)
            // set loading status false
            commit('setConversationsLoading', false)
        })
        // set conversations
    }
};

const mutations = {
    setConversations(state, conversations){
        state.conversations = conversations
    },
    setConversationsLoading(state, status){
        state.loadingConversations = status
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